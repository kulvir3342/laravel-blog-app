<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, string $id) {

        $request->validate([
            'comment' => 'required',
        ]);

        $post = Post::find($id);
        $post->comment()->create([
            'content'=> $request->comment,
        ]);

        return redirect()->back();
    }
}
