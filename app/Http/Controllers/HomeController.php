<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index()
{
    $plans = Plan::all();
    $posts = Post::all();
    return view('index',compact('plans','posts'));
}
}
