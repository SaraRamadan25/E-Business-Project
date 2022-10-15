<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::distinct()->get();


        return view('blog',compact('posts','categories'));
    }


}
