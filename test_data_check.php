<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Check what's stored in DB for countries
$c = App\Models\Country::where('code', 'ID')->first();
echo "=== DB Fields for Indonesia ===\n";
echo "population: " . ($c->population ?? 'NULL') . "\n";
echo "area: " . ($c->area ?? 'NULL') . "\n";
echo "currency: " . ($c->currency ?? 'NULL') . "\n";
echo "currency_symbol: " . ($c->currency_symbol ?? 'NULL') . "\n";
echo "\n";

// Test World Bank API for Indonesia
echo "=== World Bank API Test ===\n";
$indicators = [
    'NY.GDP.MKTP.CD' => 'GDP',
    'FP.CPI.TOTL.ZG' => 'Inflation',
    'SP.POP.TOTL' => 'Population',
];
foreach ($indicators as $code => $name) {
    $url = "https://api.worldbank.org/v2/country/ID/indicator/{$code}?format=json&per_page=1&mrnev=1";
    $r = @file_get_contents($url);
    if ($r === false) {
        echo "$name: FAILED TO CONNECT\n";
        continue;
    }
    $d = json_decode($r, true);
    $val = $d[1][0]['value'] ?? 'NULL';
    $year = $d[1][0]['date'] ?? '?';
    echo "$name ({$year}): $val\n";
}
