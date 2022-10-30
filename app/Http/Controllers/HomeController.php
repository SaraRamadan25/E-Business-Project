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
    $newss = News::latest()->take(3)->get();
    return view('index',compact('plans','posts','users','newss'));
}
}
