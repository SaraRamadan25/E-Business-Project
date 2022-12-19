<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): view
    {
        $posts = Post::query()->latest()->paginate();
        $categories = Category::query()->distinct()->get();
        $tags = Tag::query()->get()->all();


        return view('blog',compact('posts','categories','tags'));
    }


}
