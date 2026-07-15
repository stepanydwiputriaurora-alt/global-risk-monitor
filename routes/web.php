<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;

Route::view('/', 'dashboard.index')->name('home');

Route::get('/tracking',[ShipmentController::class,'search'])->name('tracking.search');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::view('/countries','countries.index');
Route::view('/weather','weather.index');
Route::view('/currency','currency.index');
Route::view('/news','news.index');
Route::view('/ports','ports.index');
Route::view('/analytics','analytics.index');
Route::view('/comparison','comparison.index');
Route::view('/favorites','favorites.index');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::view('/admin/login','admin.login');
Route::view('/admin/dashboard','admin.dashboard');