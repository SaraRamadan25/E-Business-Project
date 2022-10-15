<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogdetailsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $comments = Comment::all();
        return view('blog-details',compact('posts','comments'));
    }
}
