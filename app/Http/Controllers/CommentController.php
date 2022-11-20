<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $newComment = new Comment;
        $newComment->body = $request->comment['body'];
        $newComment->user_id = $request->user_id;
        $newComment->recipe_id = $request->recipe_id;
        $newComment->save();

        return $newComment;
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return "Comment deleted";
    }
}