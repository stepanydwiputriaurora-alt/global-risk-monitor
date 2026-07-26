<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CompareController;

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Remove old admin login view if any route points to it, we now use a unified login
// Route::view('/admin/login', 'admin.login')->name('admin.login');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes (Admin & User)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Shipment Tracking
    Route::view('/tracking', 'tracking.index')->name('tracking');
    Route::get('/tracking/search', [ShipmentController::class, 'search'])->name('tracking.search');

    // Countries
    Route::get('/countries', [CountryController::class, 'index'])->name('countries');

    // Favorites
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    // Other Pages
    Route::get('/weather', function () {
        $countries = App\Models\Country::orderBy('name')->get(['name', 'latitude as lat', 'longitude as lng', 'capital']);
        return view('weather.index', compact('countries'));
    })->name('weather');
    Route::view('/currency', 'currency.index')->name('currency');
    Route::view('/news', 'news.index')->name('news');
    Route::view('/ports', 'ports.index')->name('ports');
    Route::view('/analytics', 'analytics.index')->name('analytics');
    Route::view('/comparison', 'comparison.index')->name('comparison');
    Route::view('/alerts', 'alerts.index')->name('alerts');
    Route::view('/settings', 'settings.index')->name('settings');

    // -------------------------------------------------------
    // Internal JSON API (used by dashboard AJAX components)
    // -------------------------------------------------------
    Route::get('/api/news', [NewsController::class, 'index'])->name('api.news');
    Route::get('/api/compare', [CompareController::class, 'compare'])->name('api.compare');
    Route::get('/api/countries-list', [CompareController::class, 'countriesList'])->name('api.countries-list');

});

/*
|--------------------------------------------------------------------------
| Admin Only Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::resource('/admin/shipments', \App\Http\Controllers\AdminShipmentController::class, ['as' => 'admin']);
    
    // Admin Placeholder Routes
    Route::view('/admin/users', 'admin.users.index')->name('admin.users.index');
    Route::get('/admin/ports', [\App\Http\Controllers\AdminPortController::class, 'index'])->name('admin.ports.index');
    Route::post('/admin/ports/sync', [\App\Http\Controllers\AdminPortController::class, 'sync'])->name('admin.ports.sync');
    Route::view('/admin/articles', 'admin.articles.index')->name('admin.articles.index');
    Route::get('/admin/countries', [\App\Http\Controllers\AdminCountryController::class, 'index'])->name('admin.countries.index');
    Route::post('/admin/countries/sync', [\App\Http\Controllers\AdminCountryController::class, 'sync'])->name('admin.countries.sync');
    
});