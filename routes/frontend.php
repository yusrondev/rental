<?php

use App\Http\Controllers\Frontend\FrontendController;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/detail/{id}', [FrontendController::class, 'detail']);