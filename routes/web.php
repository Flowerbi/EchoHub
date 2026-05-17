<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\PageController;
use App\Http\Controllers\Application\RegisterController;
use App\Http\Controllers\Application\LoginController;
use App\Http\Controllers\Application\PostController;
use App\Http\Controllers\Application\ProfileController;

Route::controller(PageController::class)->group(function(){
   Route::get('/', 'home')->name('home.page');
   Route::get('/register', 'register')->middleware('guest')->name('register.page');
   Route::get('/login', 'login')->middleware('guest')->name('login.page');
   Route::get('/post_add', 'post_add')->middleware('admin')->name('post.page.add');
   Route::get('/post/{post}', 'post')->name('post.page');
   Route::get('/profile/{profile}', 'profile')->middleware('current_profile')->name('profile.page');
   Route::get('/profile/{profile}/edit', 'profile_edit')->middleware('current_profile')->name('profile.edit.page');
});

Route::controller(ProfileController::class)->group(function(){
    Route::post('/profile/{profile}/edit', 'profile_edit')->name('profile.edit.action');
});

Route::controller(RegisterController::class)->group(function(){
    Route::post('/register', 'register')->name('register.action');
});

Route::controller(LoginController::class)->group(function(){
    Route::post('/login', 'login')->name('login.action');
    Route::post('/logout', 'logout')->name('logout.action');
});

Route::controller(PostController::class)->group(function(){
    Route::post('/post_add', 'post_add')->name('post.add.action');
    Route::post('/comment/add/{post}', 'comment_add')->name('comment.add.action');
    Route::post('/comment/delete/{comment}', 'comment_delete')->name('comment.delete.action');
});
