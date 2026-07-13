<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Facades\Http;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $response = Http::get('https://restcountries.com/v3.1/all');

        if (!$response->successful()) {
            $this->command->error('Gagal mengambil data dari REST Countries API');
            return;
        }

        $countries = $response->json();

        foreach ($countries as $country) {

            // Lewati jika tidak memiliki kode negara
            if (!isset($country['cca2']) || empty($country['cca2'])) {
                continue;
            }

            // Capital
            $capital = null;
            if (isset($country['capital']) && is_array($country['capital'])) {
                $capital = $country['capital'][0];
            }

            // Currency
            $currency = null;
            $currencySymbol = null;

            if (isset($country['currencies']) && is_array($country['currencies'])) {
                $currency = array_key_first($country['currencies']);

                if ($currency && isset($country['currencies'][$currency]['symbol'])) {
                    $currencySymbol = $country['currencies'][$currency]['symbol'];
                }
            }

            // Latitude & Longitude
            $latitude = null;
            $longitude = null;

            if (isset($country['latlng']) && count($country['latlng']) >= 2) {
                $latitude = $country['latlng'][0];
                $longitude = $country['latlng'][1];
            }

            // Timezone
            $timezone = null;

            if (isset($country['timezones']) && is_array($country['timezones'])) {
                $timezone = $country['timezones'][0];
            }

            Country::updateOrCreate(
                [
                    'code' => $country['cca2'],
                ],
                [
                    'name'              => $country['name']['common'] ?? '',
                    'official_name'     => $country['name']['official'] ?? '',
                    'capital'           => $capital,
                    'region'            => $country['region'] ?? '',
                    'subregion'         => $country['subregion'] ?? '',
                    'currency'          => $currency,
                    'currency_symbol'   => $currencySymbol,
                    'flag'              => $country['flags']['png'] ?? '',
                    'latitude'          => $latitude,
                    'longitude'         => $longitude,
                    'timezone'          => $timezone,
                ]
            );
        }

        $this->command->info('Countries imported successfully!');
    }
}