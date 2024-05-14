<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// like Controller in Java
Route::controller(PostController::class)->group(function () {
    Route::get('/posts/create', 'create')->name('post.create');
});

Route::controller(PostController::class)->group(function () {
    Route::post('/posts', 'store')->name('post.store');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'posts')->name('post.index'); // name(singular number.method) -> for route
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts/{post}', 'show')->name('post.show');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts/{post}/edit', 'edit')->name('post.edit');
});

Route::controller(PostController::class)->group(function () {
    Route::patch('/posts/{post}', 'update')->name('post.update'); // patch() - update(change) existing data, put() - add smth to already existing data
});

Route::controller(PostController::class)->group(function () {
    Route::delete('/posts/{post}', 'destroy')->name('post.delete');
});

//Route::controller(PostController::class)->group(function () {
//    Route::get('/posts', 'postById');
//});
//
//Route::controller(PostController::class)->group(function () {
//    Route::get('/post/condition', 'postByCondition');
//});
//
//Route::controller(PostController::class)->group(function () {
//    Route::get('/post/condition/first', 'firstPostByCondition');
//});
//
//Route::controller(PostController::class)->group(function () {
//    Route::get('/posts/update', 'update');
//});
//
//Route::controller(PostController::class)->group(function () {
//    Route::get('/post/softDelete', 'softDelete');
//});
//
//Route::controller(PostController::class)->group(function () {
//    Route::get('/post/restore', 'restore');
//});
//
//Route::controller(PostController::class)->group(function () {
//    Route::get('/post/first_or_create', 'firstOrCreate');
//});
//
//Route::controller(PostController::class)->group(function () {
//    Route::get('/post/update_or_create', 'updateOrCreate');
//});

// the same as the previous ones
Route::get('/about', [AboutController::class, 'about'])->name('about.about');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact.contact');

Route::get('/main', [MainController::class, 'main'])->name('main.main');
