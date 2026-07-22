<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Services\WorldBankService;
use App\Services\ExchangeRateService;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CompareController extends Controller
{
    public function __construct(
        private WorldBankService $worldBank,
        private ExchangeRateService $exchangeRate,
        private WeatherService $weather
    ) {}

    /**
     * GET /api/compare?c1=ID&c2=AU
     * Returns JSON with economic & weather comparison of 2 countries
     */
    public function compare(Request $request)
    {
        $c1Code = strtoupper($request->query('c1', 'ID'));
        $c2Code = strtoupper($request->query('c2', 'AU'));

        $cacheKey = "compare_{$c1Code}_{$c2Code}";

        $result = Cache::remember($cacheKey, 3600, function () use ($c1Code, $c2Code) {
            $country1 = Country::where('code', $c1Code)->first();
            $country2 = Country::where('code', $c2Code)->first();

            if (!$country1 || !$country2) {
                return null;
            }

            // Economic data from World Bank
            $econ1 = $this->worldBank->getEconomicData($c1Code);
            $econ2 = $this->worldBank->getEconomicData($c2Code);

            // Exchange rates (USD as base)
            $rates = [];
            try {
                $rateData = $this->exchangeRate->latest('USD');
                $rates    = $rateData['rates'] ?? [];
            } catch (\Exception $e) {
                // skip
            }

            // Weather (current temperature)
            $weather1 = $this->getWeather($country1);
            $weather2 = $this->getWeather($country2);

            // Risk Level — derived from delayed shipments ratio
            $risk1 = $this->getRiskLevel($c1Code);
            $risk2 = $this->getRiskLevel($c2Code);

            // Currency rate vs USD
            $currency1Code = $country1->currency ?? '-';
            $currency2Code = $country2->currency ?? '-';
            $rate1 = isset($rates[$currency1Code]) ? number_format($rates[$currency1Code], 2) . " {$currency1Code}" : 'N/A';
            $rate2 = isset($rates[$currency2Code]) ? number_format($rates[$currency2Code], 2) . " {$currency2Code}" : 'N/A';

            return [
                'country1' => [
                    'code'        => $c1Code,
                    'name'        => $country1->name,
                    'flag'        => $country1->flag,
                    'gdp'         => $econ1['gdp'],
                    'inflation'   => $econ1['inflation'],
                    'population'  => $econ1['population'],
                    'temperature' => $weather1,
                    'risk'        => $risk1,
                    'currency'    => $rate1,
                ],
                'country2' => [
                    'code'        => $c2Code,
                    'name'        => $country2->name,
                    'flag'        => $country2->flag,
                    'gdp'         => $econ2['gdp'],
                    'inflation'   => $econ2['inflation'],
                    'population'  => $econ2['population'],
                    'temperature' => $weather2,
                    'risk'        => $risk2,
                    'currency'    => $rate2,
                ],
            ];
        });

        if (!$result) {
            return response()->json([
                'success' => false,
                'message' => 'One or both country codes not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $result,
        ]);
    }

    /**
     * GET /api/countries-list — return list of countries for select dropdowns
     */
    public function countriesList()
    {
        $countries = Cache::remember('countries_list_select', 3600, function () {
            return Country::orderBy('name')
                ->get(['name', 'code', 'flag'])
                ->map(fn ($c) => [
                    'code' => $c->code,
                    'name' => $c->name,
                    'flag' => $c->flag,
                ])
                ->toArray();
        });

        return response()->json($countries);
    }

    private function getWeather(Country $country): string
    {
        if (!$country->latitude || !$country->longitude) {
            return 'N/A';
        }

        try {
            $response = Http::timeout(5)->get(
                'https://api.open-meteo.com/v1/forecast',
                [
                    'latitude'  => $country->latitude,
                    'longitude' => $country->longitude,
                    'current'   => 'temperature_2m',
                ]
            );

            if ($response->successful()) {
                $temp = $response->json('current.temperature_2m');
                return $temp !== null ? "{$temp}°C" : 'N/A';
            }
        } catch (\Exception $e) {
            // skip
        }

        return 'N/A';
    }

    private function getRiskLevel(string $countryCode): array
    {
        // For now, base risk on global delayed shipment ratio
        // In a real app this could be country-specific
        $total   = \App\Models\Shipment::count();
        $delayed = \App\Models\Shipment::where('status', 'Delayed')->count();
        $ratio   = $total > 0 ? round(($delayed / $total) * 100) : 30;

        if ($ratio < 20) {
            return ['label' => '🟢 Low', 'score' => $ratio, 'class' => 'success'];
        } elseif ($ratio < 50) {
            return ['label' => '🟡 Medium', 'score' => $ratio, 'class' => 'warning'];
        } else {
            return ['label' => '🔴 High', 'score' => $ratio, 'class' => 'danger'];
        }
    }
}
