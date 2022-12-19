<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();

        $input['post_id'] = '1';
        $input['user_id'] = auth()->id();
        Comment::create($input);

        $attributes = request()->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'content'=>'required|string',
            'user_id'=>'required|integer',
           'post_id'=>'required|integer',

        ]);


        $comment = Comment::create([$attributes]);

        return redirect()->route('details.index');

    }

}
