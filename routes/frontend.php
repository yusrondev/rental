<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\TransactionController;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/login', [FrontendController::class, 'login']);
Route::get('/register', [FrontendController::class, 'register']);
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/detail/{id}', [FrontendController::class, 'detail']);

// chart
Route::get('/transaction', [TransactionController::class, 'index']);
Route::post('/transaction/store', [TransactionController::class, 'store']);