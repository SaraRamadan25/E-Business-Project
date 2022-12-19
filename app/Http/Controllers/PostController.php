<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{

    public function index(): view
    {
        $posts = Post::query()
        ->latest()
        ->paginate();
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post): view
    {
        return view('posts.show',compact('post'));
    }

    public function create(): view
    {
        return view('posts.create',[
            'tags'=>Tag::all(),
            'categories'=>Category::all()
   ]);
    }
    public function store(): RedirectResponse
    {

       $attributes = request()->validate([
            'name' => 'required|string',
            'image' => 'required|image',
            'title' => 'required|string',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'user_id'=>'int'

        ]);

        $post = Post::create([
            'name' => $attributes['name'],
            'title' => $attributes['title'],
            'excerpt' => $attributes['excerpt'],
            'content' => $attributes['content'],
            'image' => $attributes['image']->store('photos', 'public'),
            'user_id' => auth()->id(),
        ]);
        $post
            ->tags()
            ->sync(request('tags'));

        $post->categories()
            ->sync(request('categories'));
        return redirect()->route('posts.index');
    }



    public function edit(Post $post): view
    {

        return view('posts.edit',compact('post'));
    }

    public function update(Post $post): RedirectResponse
    {
        request()->validate([
            'title'=>'required|string',
            'excerpt'=>'required|string',
        ]);
        $post->update(request()->all());
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

}

/*

*/
