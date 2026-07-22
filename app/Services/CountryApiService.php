<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Country;
use Illuminate\Support\Facades\Log;

class CountryApiService
{
    /**
     * Fetch all countries from restcountries.com and sync to the local database.
     * Returns the count of successfully synced countries.
     */
    public function syncCountries(): int
    {
        $response = Http::withoutVerifying()->timeout(30)->get(
            'https://restcountries.com/v3.1/all?fields=name,cca2,capital,region,subregion,currencies,flags,latlng,timezones,languages,area,population'
        );

        if (!$response->successful()) {
            Log::error('CountryApiService: Failed to fetch from restcountries.com — status ' . $response->status());
            throw new \Exception('Gagal terhubung ke API restcountries.com. Status: ' . $response->status());
        }

        $raw = $response->json();
        
        file_put_contents('debug.txt', json_encode($raw));

        if (empty($raw)) {
            throw new \Exception('API mengembalikan data kosong.');
        }

        $syncedCount = 0;

        foreach ($raw as $item) {
            try {
                $code = $item['cca2'] ?? null;
                if (!$code) continue;

                $currencyCode   = '-';
                $currencySymbol = '-';
                if (!empty($item['currencies'])) {
                    $currencyCode   = array_key_first($item['currencies']);
                    $currencySymbol = $item['currencies'][$currencyCode]['symbol'] ?? '-';
                }

                $language = '-';
                if (!empty($item['languages'])) {
                    $language = reset($item['languages']);
                }

                Country::updateOrCreate(
                    ['code' => $code],
                    [
                        'name'            => $item['name']['common']     ?? '-',
                        'official_name'   => $item['name']['official']   ?? '-',
                        'capital'         => $item['capital'][0]         ?? '-',
                        'region'          => $item['region']             ?? '-',
                        'subregion'       => $item['subregion']          ?? '-',
                        'currency'        => $currencyCode,
                        'currency_symbol' => $currencySymbol,
                        'flag'            => $item['flags']['png']       ?? '',
                        'latitude'        => $item['latlng'][0]          ?? null,
                        'longitude'       => $item['latlng'][1]          ?? null,
                        'timezone'        => $item['timezones'][0]       ?? '-',
                        'language'        => $language,
                        'area'            => $item['area']               ?? null,
                        'population'      => $item['population']         ?? null,
                    ]
                );

                $syncedCount++;
            } catch (\Exception $e) {
                Log::warning('CountryApiService: Skipping country — ' . $e->getMessage());
            }
        }

        return $syncedCount;
    }
}
