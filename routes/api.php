<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\TagController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can posts API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// public routes
// index store show update destroy // doesn't contain create/edit




Route::apiResource('/news',NewsController::class);
Route::apiResource('/posts',PostController::class);
Route::apiResource('/plans',PlanController::class);
Route::apiResource('/posts/{id}/comments',CommentController::class);
Route::apiResource('/comments',CommentController::class);
Route::apiResource('/tags',TagController::class);








/*Route::prefix('v1')->group(function (){
    Route::apiResource('posts', PostController::class);*/

/*});*/

// protected routes
 // we will put the routes that we want to protect here,
// and the other routes that will be visible to any user
// we will put it as public.
/*Route::group(['middleware'=>['auth:sanctum']], function () {
       Route::apiResource('posts', PostController::class)->except('posts.index','posts.show');*/
Route::post('/logout',[AuthController::class,'logout'])
;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
