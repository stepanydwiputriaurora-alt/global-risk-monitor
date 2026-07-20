<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;

Route::view('/', 'dashboard.index')->name('dashboard');

Route::view('/tracking', 'tracking.index')->name('tracking');

Route::get('/tracking/search', [ShipmentController::class, 'search'])
    ->name('tracking.search');

Route::view('/countries', 'countries.index')->name('countries');
Route::view('/weather', 'weather.index')->name('weather');
Route::view('/currency', 'currency.index')->name('currency');
Route::view('/news', 'news.index')->name('news');
Route::view('/ports', 'ports.index')->name('ports');
Route::view('/analytics', 'analytics.index')->name('analytics');
Route::view('/comparison', 'comparison.index')->name('comparison');
Route::view('/favorites', 'favorites.index')->name('favorites');

Route::view('/admin/login', 'admin.login')->name('admin.login');
Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');