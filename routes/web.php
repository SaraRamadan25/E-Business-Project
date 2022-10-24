<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogdetailsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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



Route::post('/contact',[ContactController::class,'store'])
    ->name('contact.store');

Route::get('/blog',[BlogController::class,'index'])
    ->name('blog.index');

Route::get('/details',[BlogdetailsController::class,'index']
)->name('details.index');
Route::post('/details/comment',[CommentController::class,'store'])
    ->name('details.store');

Route::get('/posts',[PostController::class,'index'])
    ->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])
    ->name('posts.create')->middleware('auth');
Route::post('/posts',[PostController::class,'store'])
    ->name('posts.store');
Route::get('/posts/{post}',[PostController::class,'show'])
    ->name('posts.show');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])
    ->name('posts.edit')->middleware('auth');
Route::patch('/posts/{post}',[PostController::class,'update'])
    ->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}',[PostController::class,'destroy'])
    ->name('posts.destroy')->middleware('auth');


Route::get('/plans',[PlanController::class,'index'])
    ->name('plans.index');
Route::get('/plans/create',[PlanController::class,'create'])
    ->name('plans.create');
Route::get('/plans/{plan}',[PlanController::class,'show'])
    ->name('plans.show');

Route::post('/plans',[PlanController::class,'store'])
    ->name('plans.store');

Route::get('/newss',[NewsController::class,'index'])
    ->name('news.index');
Route::get('/newss/create',[NewsController::class,'create'])
    ->name('news.create');

Route::get('/newss/{news}/edit',[NewsController::class,'edit'])
    ->name('news.edit')->middleware('auth'); //dont work

Route::patch('/newss/{news}',[NewsController::class,'update'])
    ->name('news.update')->middleware('auth');
Route::post('/newss',[NewsController::class,'store'])
    ->name('news.store');
Route::get('/newss/{id}',[NewsController::class,'show'])
    ->name('news.show');
Route::delete('/newss/{news}',[NewsController::class,'destroy'])
    ->name('news.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');









