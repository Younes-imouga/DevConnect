<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Content;
use App\Models\Connections;
use App\Models\PostTag;
use App\Models\Tags;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'code' => 'nullable|string',
            'link' => 'nullable|url',
            'type' => 'required|in:none,code,image,link',
            'tags' => 'nullable|string',
        ]);

        $post = Posts::create([
            'user_id' => auth()->id(),
            'text' => $request->content,
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            Content::create([
                'posts_id' => $post->id,
                'type' => 'image',
                'content' => $path,
            ]);
        }

        if ($request->type !== "none" && $request->type !== "image") {
            Content::create([
                'posts_id' => $post->id,
                'type' => $request->type,
                'content' => $request->type === 'code' ? $request->code : ($request->type === 'link' ? $request->link : $request->content),
            ]);
        }

        if ($request->tags) {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tag) {
                $tag = trim($tag);
                $tagModel = Tags::firstOrCreate(['name' => $tag]);
                $post->tags()->attach($tagModel->id);
            }
        }

        return redirect()->route('dashboard');
    }

    
    public function myPosts()
    {
        $posts = Posts::where('user_id', auth()->id())->with('content')->get();
        return view('posts.my-posts', compact('posts'));
    }

    public function edit($id)
    {
        $post = Posts::with('content')->findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'code' => 'nullable|string',
            'link' => 'nullable|url',
            'type' => 'required|in:none,code,image,link',
        ]);

        $post = Posts::findOrFail($id);
        $post->text = $request->content;
        $post->save();

        Content::where('posts_id', $post->id)->delete();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            Content::create([
                'posts_id' => $post->id,
                'type' => 'image',
                'content' => $path, 
            ]);
        }

        if ($request->type !== "none" && $request->type !== "image") {
            Content::create([
                'posts_id' => $post->id,
                'type' => $request->type,
                'content' => $request->type === 'code' ? $request->code : ($request->type === 'link' ? $request->link : $request->content),
            ]);
        }

        return redirect()->route('posts.my')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        Content::where('posts_id', $id)->delete();

        return redirect()->route('posts.my')->with('success', 'Post deleted successfully!');
    }

    public function dashboard()
    {
        $posts = Posts::with('content')->orderBy('created_at', 'desc')->get();
        $user = auth()->user();
        
        $postCount = $user->posts()->count();
        
        $connectionCount = Connections::where(function($query) use ($user) {
            $query->where('user_id', $user->id)->orWhere('connected_user_id', $user->id);
        })->where('status', 'accepted')->count();
        
        $topTags = Tags::withCount('posts')->orderBy('posts_count', 'desc')->take(3)->get();

        return view('dashboard', compact('posts', 'postCount', 'connectionCount', 'topTags'));
    }

    public function Connections(){
        $Connection = Connections::where('user_id', auth()->id())->orWhere('connected_user_id', auth()->id())->with('connectedUser')->get();
        $recievedConnections = Connections::where('connected_user_id', auth()->id())->with('user')->get();
        return view('Connection', compact('Connection', 'recievedConnections'));
    }
} 