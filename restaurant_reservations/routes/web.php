<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 

Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);
Route::get('/my-reservation', [App\Http\Controllers\IndexController::class, 'myReservations'])->name('myReservations');
Route::get('/restaurant/menu/{id}', [App\Http\Controllers\RestaurantController::class, 'menu'])->middleware('auth');
Route::get('/reservation-accepted/{id}', [App\Http\Controllers\RestaurantController::class, 'accept'])->middleware('auth');
Route::get('/restaurant-reservation-canceled/{id}', [App\Http\Controllers\RestaurantController::class, 'cancel'])->middleware('auth');
Route::get('/reservation-deleted/{id}', [App\Http\Controllers\RestaurantController::class, 'delete'])->middleware('auth');
Route::post('/reservation-create', [App\Http\Controllers\RestaurantController::class, 'store'])->name('reservation.store')->middleware('auth');
Auth::routes();


