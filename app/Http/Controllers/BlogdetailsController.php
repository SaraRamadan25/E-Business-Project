<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogdetailsController extends Controller
{
    public function index(): view
    {
        $posts = Post::query()->latest()->paginate(1);
        $comments = Comment::query()->get()->all();
        $tags = Tag::query()->get()->all();
        $categories = Category::query()->get()->all();
        return view('blog-details',compact('posts','comments','tags','categories'));
    }
}
