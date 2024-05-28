<?php

use App\Http\Controllers\Frontend\FrontendController;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/detail/{id}', [FrontendController::class, 'detail']);