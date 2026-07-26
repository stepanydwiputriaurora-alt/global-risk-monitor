<?php
$r = file_get_contents('https://open.er-api.com/v6/latest/USD');
if ($r === false) {
    echo "FAILED to connect\n";
    exit;
}
$d = json_decode($r, true);
echo "Result: " . ($d['result'] ?? 'no result key') . "\n";
echo "Rates count: " . count($d['rates'] ?? []) . "\n";

// Test a few currencies
$currencies = ['IDR', 'AUD', 'USD', 'EUR', 'JPY'];
foreach ($currencies as $cur) {
    $val = $d['rates'][$cur] ?? 'N/A';
    echo "$cur: $val\n";
}
