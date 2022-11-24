<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store($post_id)
    {
        request()->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'content'=>'required|string'

        ]);

        $comment = Comment::create([
            'name' =>request('name'),
            'email' =>request('email'),
            'content' =>request('content'),
            'user_id' =>auth()->id(),
            'post_id'=>$post_id,

        ]);
        return redirect()->route('details.index');

    }







}
