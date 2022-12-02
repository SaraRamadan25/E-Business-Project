<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NewsResource::collection(News::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return NewsResource
     */
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
            "title" => $request->title,
            "description"=>$request->description,
            "image"=>$request->image
        ]);
        $news->save();
        return new NewsResource($news);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show(News $news)
    {
        return new NewsResource($news);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validator = Validator::make($request->all(),[

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json([
            "error"=>false,
            "message"=>"news deleted"
        ],200);
    }
}
