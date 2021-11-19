<?php

use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::apiResource('stocks', StockController::class);
