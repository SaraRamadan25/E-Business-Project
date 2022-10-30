<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\NewsController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// public routes

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::apiResource('/newss',NewsController::class);




/*Route::prefix('v1')->group(function (){
    Route::apiResource('posts', PostController::class);*/

/*});*/

// protected routes
 // we will put the routes that we want to protect here,
// and the other routes that will be visible to any user
// we will put it as public.
Route::group(['middleware'=>['auth:sanctum']], function () {
       Route::apiResource('posts', PostController::class);
Route::post('/logout',[AuthController::class,'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
