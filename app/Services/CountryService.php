<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CountryService
{
    public function getCountries()
    {
        $response = Http::timeout(15)->get(
            'https://restcountries.com/v3.1/all?fields=name,cca2,capital,region,subregion,population,currencies,languages,flags,latlng,timezones,area'
        );

        if (!$response->successful()) {
            return [];
        }

        return collect($response->json())
            ->sortBy('name.common')
            ->map(function ($country) {

                $currencyCode = '-';
                $currencyName = '-';

                if (!empty($country['currencies'])) {
                    $currencyCode = array_key_first($country['currencies']);
                    $currencyName = $country['currencies'][$currencyCode]['name'] ?? '-';
                }

                return [

                    'code' => $country['cca2'] ?? '',

                    'name' => $country['name']['common'] ?? '-',

                    'official_name' => $country['name']['official'] ?? '-',

                    'capital' => $country['capital'][0] ?? '-',

                    'region' => $country['region'] ?? '-',

                    'subregion' => $country['subregion'] ?? '-',

                    'population' => number_format($country['population'] ?? 0),

                    'currency_code' => $currencyCode,

                    'currency_name' => $currencyName,

                    'language' => !empty($country['languages'])
                        ? implode(', ', array_values($country['languages']))
                        : '-',

                    'flag' => $country['flags']['png'] ?? '',

                    'latitude' => $country['latlng'][0] ?? 0,

                    'longitude' => $country['latlng'][1] ?? 0,

                    'timezone' => $country['timezones'][0] ?? '-',

                    'area' => number_format($country['area'] ?? 0),
                ];
            })
            ->values()
            ->toArray();
    }
}