<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(3)->get();
        return view('news.index',compact('news'));
    }

    public function show(News $new){
        return view('news.show',compact('new'));
    }
    public function create()
    { //only people who logged in
        return view('news.create');
    }

    public function store()
    {

        request()->validate([
            'title'=>'required|string',
            'description'=>'required|string',


        ]);

        $new = News::create([

            'title' =>request('title'),
            'description' =>request('description'),
            'user_id' => Auth::id()
        ]);
        return redirect()->route('news.index');

    }

    public function edit(News $new)
    {
        //admin and the person who wrote the post
        return view('news.edit',compact('new'));
    }

    public function update(News $new)
    {
        request()->validate([
            'title'=>'required|string',
            'description'=>'required|string',
        ]);
        $new->update(request()->all());
        return redirect()->route('news.index');
    }
}
