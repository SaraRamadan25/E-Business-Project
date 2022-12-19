<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Plan;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
public function index(): view
{
    $plans = Plan::query()->get()->all();
    $users = User::query()->get()->all();
    $news = News::query()->latest()->take(3)->get();
    return view('index',compact('plans','users','news'));
}
}
