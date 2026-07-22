<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExchangeRateService
{
    public function latest(string $base = 'USD'): array
    {
        $response = Http::timeout(20)->get(
            "https://open.er-api.com/v6/latest/{$base}"
        );

        if (!$response->successful()) {
            return [];
        }

        return $response->json();
    }
}