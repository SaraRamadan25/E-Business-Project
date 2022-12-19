<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(Post::all());
    }

    public function store(Request $request)
    {
        return Post::create($request->all());
    }

    public function show($id)
    {
        return Post::find($id);
    }


    public function update(Request $request, $id)
    {
      $post =  Post::find($id);
          $post->update($request->all());
          return $post;
    }


    public function destroy($id): int
    {
        return Post::destroy($id);
    }
}
