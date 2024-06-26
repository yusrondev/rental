<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\TransactionController;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/login', [FrontendController::class, 'login']);
Route::get('/register', [FrontendController::class, 'register']);
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/detail/{id}', [FrontendController::class, 'detail']);

// chart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/store', [CartController::class, 'store']);
Route::get('/cart/delete/{id}', [CartController::class, 'delete']);

// transaction
Route::post('/transaction/store', [TransactionController::class, 'store']);
Route::get('/transaction/cancel/{id}', [TransactionController::class, 'cancel']);

Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');