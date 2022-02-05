<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){

    return view('home');

})->name('home');

// Modelname:post and key is 'id'... post:id

Route::post('/posts/{post}/likes',[PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class, 'destroy']);

Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::post('/posts',[PostController::class, 'storePost']);
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/logout',[LogoutController::class,'logout'])->name('logout');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'login']);

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

//index is the method which we are going to call from the class Controller named 'register'     


Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::POST('/register',[RegisterController::class, 'store']);


Route::get('/users/{user:name}/posts',[UserPostController::class, 'index'])->name('users.posts');




Route::get('/pages', function () {
  
    return view('pages.index');
});

