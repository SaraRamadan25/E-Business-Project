<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Plan;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index()
{
    $plans = Plan::all();
    $posts = Post::all();
    $users = User::all();
    $news = News::all();
    return view('index',compact('plans','posts','users','news'));
}
}
