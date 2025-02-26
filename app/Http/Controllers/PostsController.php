<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Content;
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
} 