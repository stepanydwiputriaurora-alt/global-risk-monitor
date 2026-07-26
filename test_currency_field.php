<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$countries = App\Models\Country::whereIn('code', ['ID', 'AU', 'US', 'JP', 'DE', 'CN', 'GB', 'SG'])->get(['name', 'code', 'currency', 'currency_symbol']);
foreach ($countries as $c) {
    echo "{$c->code} | {$c->name} | currency: {$c->currency} | symbol: {$c->currency_symbol}\n";
}
