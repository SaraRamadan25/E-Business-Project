<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogdetailsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(1);
        $comments = Comment::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('blog-details',compact('posts','comments','tags','categories'));
    }
}
