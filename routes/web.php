<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogdetailsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home',[HomeController::class,'index'])->name('home');

Route::post('/home/msg',[ContactController::class,'store'])
    ->name('home.store');

Route::post('/details/comment',[CommentController::class,'store'])
    ->name('details.store');


Route::get('/blog',[BlogController::class,'index'])
    ->name('blog.index');
Route::get('/details',[BlogdetailsController::class,'index']
)->name('details.index');


Route::get('/posts',[PostController::class,'index'])
    ->name('posts.index');

Route::get('/posts/create',[PostController::class,'create'])
    ->name('posts.create');

Route::post('/posts',[PostController::class,'store'])
    ->name('posts.store');

Route::get('/posts/{post}',[PostController::class,'show'])
    ->name('posts.show');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])
    ->name('posts.edit');
Route::patch('/posts/{post}',[PostController::class,'update'])
    ->name('posts.update');
Route::delete('/posts/{post}',[PostController::class,'destroy'])
    ->name('posts.destroy');


Route::get('/plans',[PlanController::class,'index'])
    ->name('plans.index');

Route::get('/posts/{plan}',[PlanController::class,'show'])
    ->name('plans.show');

Route::get('/news',[NewsController::class,'index'])
    ->name('news.index');
Route::get('/news/{new}',[NewsController::class,'show'])
    ->name('news.show');







