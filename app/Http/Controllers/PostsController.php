<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Content;
use App\Models\Likes;
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
        return view('dashboard', compact('posts'));
    }

    public function toggleLike(Posts $post)
    {
        $like = $post->likes()->where('user_id', auth()->id())->first();
        
        if ($like) {
            $like->delete();
            $isLiked = false;
        } else {
            $post->likes()->create([
                'user_id' => auth()->id()
            ]);
            $isLiked = true;
        }
        
        return response()->json([
            'success' => true,
            'likesCount' => $post->likes()->count(),
            'isLiked' => $isLiked
        ]);
    }

    public function checkLike(Posts $post)
    {
        return response()->json([
            'isLiked' => $post->likes()->where('user_id', auth()->id())->exists()
        ]);
    }
    
} 