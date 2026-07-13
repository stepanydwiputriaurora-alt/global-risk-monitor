<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;

Route::get('/', [ShipmentController::class, 'index'])->name('home');

Route::get('/tracking', [ShipmentController::class, 'search'])->name('tracking.search');