<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishesController;

Auth::routes();


Route::get('/',[App\Http\Controllers\OrderController::class,'index'])->name('order');
Route::post('/order_add',[App\Http\Controllers\OrderController::class,'add'])->name('order_add');
Route::get('order_list',[App\Http\Controllers\OrderController::class,'orderList'])->name('order_list');
Route::get('order/{order}/serve',[App\Http\Controllers\OrderController::class,'serve'])->name('order.serve');

Route::resource('dishes','DishesController');
Route::get('order',[App\Http\Controllers\DishesController::class,'order'])->name('kitchen.order');
Route::get('order/{order}/approve',[App\Http\Controllers\DishesController::class,'approve'])->name('order.approve');
Route::get('order/{order}/cancel',[App\Http\Controllers\DishesController::class,'cancel'])->name('order.cancel');
Route::get('order/{order}/ready',[App\Http\Controllers\DishesController::class,'ready'])->name('order.ready');
