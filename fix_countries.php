<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

App\Models\Country::truncate();
echo "Wiped countries table.\n";

try {
    $service = app(App\Services\CountryApiService::class);
    $count = $service->syncCountries();
    echo "Synced " . $count . " countries.\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
