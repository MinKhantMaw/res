<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishesController;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::resource('dishes','DishesController');
