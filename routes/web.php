<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){

    return view('home');

})->name('home');

Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::post('/posts',[PostController::class, 'storePost']);

Route::post('/logout',[LogoutController::class,'logout'])->name('logout');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'login']);

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

//index is the method which we are going to call from the class Controller named 'register'     


Route::get('/register',[RegisterController::class, 'index'])->name('register');



Route::POST('/register',[RegisterController::class, 'store']);




Route::get('/pages', function () {
  
    return view('pages.index');
});

