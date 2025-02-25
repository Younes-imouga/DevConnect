<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        // Create the post
        $post = Posts::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');

            Content::create([
                'post_id' => $post->id,
                'type' => 'image',
                'content' => $path, 
            ]);
        }

        if ($request->type !== "none" && $request->type !== "image") {
            // Create content entry based on the selected type
            Content::create([
                'post_id' => $post->id,
                'type' => $request->type,
                'content' => $request->type === 'code' ? $request->code : ($request->type === 'link' ? $request->link : $request->content),
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }
} 