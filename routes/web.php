<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/',HomeController::class)->name("home");

Route::get('/posts',[PostController::class, "index"])->name("posts.index");

Route::middleware(['auth:sanctum',
    config('jetstream.auth_session'), 'verified',])->group(function () {

//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');


});
