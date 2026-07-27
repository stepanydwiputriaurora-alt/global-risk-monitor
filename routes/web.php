<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\PortController;

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
    Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/ports', [PortController::class, 'index'])->name('ports');
    Route::get('/analytics', function (Illuminate\Http\Request $request) {
        $countries = App\Models\Country::orderBy('name')->get();
        $selectedCountry = $request->get('country', 'Indonesia');
        $country = $countries->firstWhere('name', $selectedCountry) ?? $countries->first();
        
        $hash = crc32($country->code ?? 'ID');
        
        $baseGdp = 0.5 + ($hash % 300) / 100;
        $gdpData = [
            'labels' => ['2019', '2020', '2021', '2022', '2023'],
            'data' => [round($baseGdp, 2), round($baseGdp * 0.95, 2), round($baseGdp * 1.08, 2), round($baseGdp * 1.15, 2), round($baseGdp * 1.20, 2)]
        ];

        $baseInf = 1.5 + ($hash % 60) / 10;
        $inflationData = [
            'labels' => ['2019', '2020', '2021', '2022', '2023'],
            'data' => [round($baseInf, 1), round($baseInf * 0.8, 1), round($baseInf * 0.6, 1), round($baseInf * 2.2, 1), round($baseInf * 1.8, 1)]
        ];

        $currencyCode = $country->currency ?? 'USD';
        if ($currencyCode === '-' || empty($currencyCode)) {
            // Check storage map
            $mapPath = storage_path('app/currency_map.json');
            if (file_exists($mapPath)) {
                $currencyMap = json_decode(file_get_contents($mapPath), true);
                $currencyCode = $currencyMap[$country->code ?? ''] ?? 'USD';
            } else {
                $currencyCode = 'USD';
            }
        }
        
        $baseCur = 10 + ($hash % 15000);
        $currencyData = [
            'labels' => ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            'data' => [round($baseCur), round($baseCur * 1.01), round($baseCur * 1.02), round($baseCur * 1.04), round($baseCur * 0.98), round($baseCur * 1.02)],
            'name' => 'USD / ' . $currencyCode
        ];

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
        $baseRisk = 10 + abs($hash % 50);
        $riskChartData = [
            'labels' => $months,
            'data' => [
                round($baseRisk),
                round($baseRisk * 1.10),
                round($baseRisk * 0.90),
                round($baseRisk * 1.25),
                round($baseRisk * 0.85),
                round($baseRisk * 1.15),
                round($baseRisk * 0.95),
            ]
        ];

        return view('analytics.index', compact('countries', 'selectedCountry', 'country', 'gdpData', 'inflationData', 'currencyData', 'riskChartData'));
    })->name('analytics');
    Route::view('/comparison', 'comparison.index')->name('comparison');
    Route::view('/alerts', 'alerts.index')->name('alerts');
    Route::view('/settings', 'settings.index')->name('settings');

    // -------------------------------------------------------
    // Internal JSON API (used by dashboard AJAX components)
    // -------------------------------------------------------
    Route::get('/api/news', [NewsController::class, 'index'])->name('api.news');
    Route::get('/api/compare', [CompareController::class, 'compare'])->name('api.compare');
    Route::get('/api/countries-list', [CompareController::class, 'countriesList'])->name('api.countries-list');
    Route::get('/api/ports', [PortController::class, 'apiIndex'])->name('api.ports');

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
    Route::resource('/admin/users', \App\Http\Controllers\AdminUserController::class, ['as' => 'admin'])->except(['show']);
    Route::get('/admin/ports', [\App\Http\Controllers\AdminPortController::class, 'index'])->name('admin.ports.index');
    Route::resource('/admin/articles', \App\Http\Controllers\AdminArticleController::class, ['as' => 'admin']);
    Route::post('/admin/countries/sync', [\App\Http\Controllers\AdminCountryController::class, 'sync'])->name('admin.countries.sync');

    
});