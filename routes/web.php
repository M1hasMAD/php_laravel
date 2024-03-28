<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::controller(PostController::class)->group(function () {
    Route::get('/post', 'postById');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'posts');
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
