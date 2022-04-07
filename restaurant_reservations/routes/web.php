<?php

use Illuminate\Support\Facades\Route;

Route::get('/index', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/make-reservation', [App\Http\Controllers\IndexController::class, 'makeReservation'])->name('makeReservation');
Route::get('/restaurant3/menu3', [App\Http\Controllers\Restaurant3Controller::class, 'menu']);
Route::get('/restaurant2/menu2', [App\Http\Controllers\Restaurant2Controller::class, 'menu']);
Route::get('/restaurant1/menu1', [App\Http\Controllers\Restaurant1Controller::class, 'menu']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//background-color: var(--bs-body-bg);

