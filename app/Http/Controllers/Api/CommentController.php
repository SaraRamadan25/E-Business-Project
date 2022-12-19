<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CommentController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CommentResource::collection(Comment::all());
    }

    public function store(Request $request)
    {
        return Comment::create($request->all());
    }

    public function show($id)
    {
        return Comment::find($id);
    }


    public function update(Request $request, $id)
    {
        $comment =  Comment::find($id);
        $comment->update($request->all());
        return $comment;
    }


    public function destroy($id): int
    {
        return Comment::destroy($id);
    }


}
