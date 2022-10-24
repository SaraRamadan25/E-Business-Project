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

    public function show(News $id){
        $news = News::find($id);
        return view('news.show',compact('news'));
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
            'image'=>'image',


        ]);

        $news = News::create([

            'title' =>request('title'),
            'description' =>request('description'),
            'image'=>request('image')->store('photos','public'),

        ]);
        return redirect()->route('news.index');

    }

    public function edit(News $news)
    {
        //admin and the person who wrote the post
        return view('news.edit',compact('news'));
    }

    public function update(News $news)
    {
        request()->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|image',

        ]);
        $news->update(request()->all());
        return redirect()->route('news.index');
    }
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
