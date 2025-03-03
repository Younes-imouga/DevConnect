<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request, Posts $post)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        $comment->load('user.profile');

        return response()->json([
            'success' => true,
            'comment' => $comment,
        ]);
    }
}
