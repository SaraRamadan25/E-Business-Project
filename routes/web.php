<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogdetailsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Orchid\Screens\EmailSenderScreen;
use App\Orchid\Screens\posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can posts web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//filtering
Route::get('/posts/tags/{tag}',[TagController::class,'index'])->middleware('auth');


Route::get('/blog',[BlogController::class,'index'])
    ->name('blog.index');

Route::post('/posts/{id}/comments',[CommentController::class,'store']);

Route::get('/details',[BlogdetailsController::class,'index'])
    ->name('details.index');


Route::resource('/posts',PostController::class);
Route::resource('/plans',PlanController::class);
Route::resource('/news',NewsController::class);

Route::post('/contact',[ContactController::class,'store'])
    ->name('contact.store');


Route::screen('email', EmailSenderScreen::class)->name('platform.email');
Route::screen('/posts', posts::class)->name('platform.posts');
Route::screen('/news', posts::class)->name('platform.news');
Route::screen('/plans', posts::class)->name('platform.plans');


Route::get('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');













