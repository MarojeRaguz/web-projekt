<?php

use Illuminate\Support\Facades\Route;

Route::get('/index', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/my-reservation', [App\Http\Controllers\IndexController::class, 'myReservations'])->name('myReservations');
Route::get('/restaurant/{id}', [App\Http\Controllers\RestaurantController::class, 'menu']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//background-color: var(--bs-body-bg);

