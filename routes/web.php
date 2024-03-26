<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

Route::controller(MyController::class)->group(function () {
    Route::get('/hello', 'hello');
});

Route::controller(MyController::class)->group(function () {
    Route::get('/name', 'name');
});
