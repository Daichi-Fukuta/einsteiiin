<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, Comment::$rules);
        $post_id = $request->post_id;
        $comment = new Comment;
        $form = $request->all();
        unset($form['_token']);
        $comment->fill($form)->save();
        return redirect(route('posts_show', ['id' => $post_id]));
    }
}
