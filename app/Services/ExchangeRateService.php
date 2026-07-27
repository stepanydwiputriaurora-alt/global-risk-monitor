<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExchangeRateService
{
    public function latest(string $base = 'USD'): array
    {
        try {
            $response = Http::timeout(3)->get(
                "https://open.er-api.com/v6/latest/{$base}"
            );

            if (!$response->successful()) {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }

        return $response->json();
    }
}