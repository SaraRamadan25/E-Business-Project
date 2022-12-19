<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TagController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return TagResource::collection(Tag::all());
    }

    public function store(Request $request)
    {
        return Tag::create($request->all());
    }

    public function show($id)
    {
        return Tag::find($id);
    }


    public function update(Request $request, $id)
    {
        $tag =  Tag::find($id);
        $tag->update($request->all());
        return $tag;
    }


    public function destroy($id): int
    {
        return Tag::destroy($id);
    }
}
