<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag): Factory|View|Application
    {
        $posts = $tag->posts;
        return view('posts.index',compact('posts'));

    }
}




