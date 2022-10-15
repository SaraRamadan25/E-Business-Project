<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show',compact('post'));
    }
    public function create()
    { //only people who logged in
        return view('posts.create');
    }

    public function store()
    {

        request()->validate([
            'name'=>'required|string',
            'image'=>'image',
            'title'=>'required|string',
            'excerpt'=>'required|string',
            'content'=>'required|string'

        ]);

        $post = Post::create([
            'name' =>request('name'),
            'image'=>request('image'),
            'title' =>request('title'),
            'excerpt' =>request('excerpt'),
            'content' =>request('content'),
            'user_id' => '1',
        ]);
        return redirect()->route('posts.index');

    }

    public function edit(Post $post)
    {
        //admin and the person who wrote the post
        return view('posts.edit',compact('post'));
    }

    public function update(Post $post)
    {
        request()->validate([
            'title'=>'required|string',
            'excerpt'=>'required|string',
        ]);
        $post->update(request()->all());
        return redirect()->route('posts.index');
    }

}
