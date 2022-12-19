<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): view
    {
        $news = News::query()->latest()->take(3)->get();
        return view('news.index',compact('news'));
    }

    public function show($id): view
    {
        $news = News::query()->find($id);
        return view('news.show',compact('news'));
    }
    public function create(): view
    { //only people who logged in
        return view('news.create');
    }

    public function store(): RedirectResponse
    {

       $attributes = request()->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'image'=>'image',


        ]);

        $news = News::create([

            'title' =>$attributes['title'],
            'description' =>$attributes['description'],
            'image'=>$attributes['image']->store('photos','public')


        ]);
        return redirect()->route('news.index');

    }

    public function edit(News $news): view
    {
        //admin and the person who wrote the post
        return view('news.edit',compact('news'));
    }

    public function update(News $news): RedirectResponse
    {
        request()->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'image'=>'image',
        ]);

        $news->update(request()->all());
        return redirect()->route('news.index');
    }
    public function destroy(News $news): RedirectResponse
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
