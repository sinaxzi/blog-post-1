<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/user/{user:username}/posts',[UserPostController::class,'index'])->name('user.posts');

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);


Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/posts',[PostController::class,'store']);
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/like',[PostLikeController::class,'store'])->name('posts.like');
Route::delete('/posts/{post}/like',[PostLikeController::class,'destroy'])->name('posts.like');







