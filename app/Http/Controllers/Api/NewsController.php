<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return NewsResource::collection(News::all());
    }

  public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "title" =>"required",
            "description"=>"required",
            "image"=>"required"
            ]);
        if ($validator->fails()){
            return response()->json([
                "error"=>true,
                "errors"=>$validator->errors()
            ]);
        }
        $news = new News([
            $request->all()
        ]);
        $news->save();
        return new NewsResource($news);
    }

    public function show(News $news)
    {
        return new NewsResource($news);
    }

    public function update(Request $request, News $news): NewsResource|JsonResponse
    {
        $validator = Validator::make($request->all(),[
            $attributes =
            "title" =>"required",
            "description"=>"required",
            "image"=>"required"
        ]);
        if ($validator->fails()){
            return response()->json([
                "errors"=>true,
                "errors"=>$validator->errors()
            ]);
        }
        $news->title = $request->title;
        $news->description = $request->description;
        $news->image = $request->image;
        $news->save();

         return new NewsResource($news);
    }

    public function destroy(News $news): JsonResponse
    {
        $news->delete();
        return response()->json([
            "error"=>false,
            "message"=>"news deleted"
        ],200);
    }
}
