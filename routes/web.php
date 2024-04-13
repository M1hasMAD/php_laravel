<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// like Controller in Java
Route::controller(PostController::class)->group(function () {
    Route::get('/post', 'postById');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'posts')->name('post.posts'); // name(singular number.method) -> for route
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post/condition', 'postByCondition');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post/condition/first', 'firstPostByCondition');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post/create', 'create');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post/update', 'update');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post/softDelete', 'softDelete');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post/restore', 'restore');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post/first_or_create', 'firstOrCreate');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post/update_or_create', 'updateOrCreate');
});

// the same as the previous ones
Route::get('/about', [AboutController::class, 'about'])->name('about.about');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact.contact');

Route::get('/main', [MainController::class, 'main'])->name('main.main');
