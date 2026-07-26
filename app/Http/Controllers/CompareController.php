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
            // Map currency names (stored in DB) → ISO 4217 codes (used by API)
            $currencyNameToCode = [
                'Afghan Afghani' => 'AFN', 'Albanian Lek' => 'ALL', 'Algerian Dinar' => 'DZD',
                'Angolan Kwanza' => 'AOA', 'Argentine Peso' => 'ARS', 'Armenian Dram' => 'AMD',
                'Australian Dollar' => 'AUD', 'Azerbaijani Manat' => 'AZN', 'Bahamian Dollar' => 'BSD',
                'Bahraini Dinar' => 'BHD', 'Bangladeshi Taka' => 'BDT', 'Barbadian Dollar' => 'BBD',
                'Belarusian Ruble' => 'BYN', 'Belize Dollar' => 'BZD', 'Bhutanese Ngultrum' => 'BTN',
                'Bolivian Boliviano' => 'BOB', 'Bosnia-Herzegovina Convertible Mark' => 'BAM',
                'Botswanan Pula' => 'BWP', 'Brazilian Real' => 'BRL', 'Brunei Dollar' => 'BND',
                'Bulgarian Lev' => 'BGN', 'Burundian Franc' => 'BIF', 'Cambodian Riel' => 'KHR',
                'Canadian Dollar' => 'CAD', 'Cape Verdean Escudo' => 'CVE', 'Central African CFA Franc' => 'XAF',
                'Chilean Peso' => 'CLP', 'Chinese Yuan' => 'CNY', 'Colombian Peso' => 'COP',
                'Comorian Franc' => 'KMF', 'Congolese Franc' => 'CDF', 'Costa Rican Colón' => 'CRC',
                'Croatian Kuna' => 'HRK', 'Cuban Peso' => 'CUP', 'Czech Koruna' => 'CZK',
                'Danish Krone' => 'DKK', 'Djiboutian Franc' => 'DJF', 'Dominican Peso' => 'DOP',
                'Egyptian Pound' => 'EGP', 'Eritrean Nakfa' => 'ERN', 'Ethiopian Birr' => 'ETB',
                'Euro' => 'EUR', 'Fijian Dollar' => 'FJD', 'Gambian Dalasi' => 'GMD',
                'Georgian Lari' => 'GEL', 'Ghanaian Cedi' => 'GHS', 'Guatemalan Quetzal' => 'GTQ',
                'Guinean Franc' => 'GNF', 'Guyanaese Dollar' => 'GYD', 'Haitian Gourde' => 'HTG',
                'Honduran Lempira' => 'HNL', 'Hong Kong Dollar' => 'HKD', 'Hungarian Forint' => 'HUF',
                'Icelandic Króna' => 'ISK', 'Indian Rupee' => 'INR', 'Indonesian Rupiah' => 'IDR',
                'Iranian Rial' => 'IRR', 'Iraqi Dinar' => 'IQD', 'Israeli Shekel' => 'ILS',
                'Jamaican Dollar' => 'JMD', 'Japanese Yen' => 'JPY', 'Jordanian Dinar' => 'JOD',
                'Kazakhstani Tenge' => 'KZT', 'Kenyan Shilling' => 'KES', 'Kuwaiti Dinar' => 'KWD',
                'Kyrgystani Som' => 'KGS', 'Laotian Kip' => 'LAK', 'Lebanese Pound' => 'LBP',
                'Lesotho Loti' => 'LSL', 'Liberian Dollar' => 'LRD', 'Libyan Dinar' => 'LYD',
                'Macanese Pataca' => 'MOP', 'Macedonian Denar' => 'MKD', 'Malagasy Ariary' => 'MGA',
                'Malawian Kwacha' => 'MWK', 'Malaysian Ringgit' => 'MYR', 'Maldivian Rufiyaa' => 'MVR',
                'Mauritanian Ouguiya' => 'MRU', 'Mauritian Rupee' => 'MUR', 'Mexican Peso' => 'MXN',
                'Moldovan Leu' => 'MDL', 'Mongolian Tugrik' => 'MNT', 'Moroccan Dirham' => 'MAD',
                'Mozambican Metical' => 'MZN', 'Namibian Dollar' => 'NAD', 'Nepalese Rupee' => 'NPR',
                'New Taiwan Dollar' => 'TWD', 'New Zealand Dollar' => 'NZD', 'Nicaraguan Córdoba' => 'NIO',
                'Nigerian Naira' => 'NGN', 'North Korean Won' => 'KPW', 'Norwegian Krone' => 'NOK',
                'Omani Rial' => 'OMR', 'Pakistani Rupee' => 'PKR', 'Panamanian Balboa' => 'PAB',
                'Papua New Guinean Kina' => 'PGK', 'Paraguayan Guarani' => 'PYG', 'Peruvian Sol' => 'PEN',
                'Philippine Peso' => 'PHP', 'Polish Zloty' => 'PLN', 'Pound Sterling' => 'GBP',
                'Qatari Rial' => 'QAR', 'Romanian Leu' => 'RON', 'Russian Ruble' => 'RUB',
                'Rwandan Franc' => 'RWF', 'Samoan Tala' => 'WST', 'Saudi Riyal' => 'SAR',
                'Serbian Dinar' => 'RSD', 'Seychellois Rupee' => 'SCR', 'Sierra Leonean Leone' => 'SLL',
                'Singapore Dollar' => 'SGD', 'Somali Shilling' => 'SOS', 'South African Rand' => 'ZAR',
                'South Korean Won' => 'KRW', 'Sri Lankan Rupee' => 'LKR', 'Sudanese Pound' => 'SDG',
                'Swazi Lilangeni' => 'SZL', 'Swedish Krona' => 'SEK', 'Swiss Franc' => 'CHF',
                'Syrian Pound' => 'SYP', 'São Tomé & Príncipe Dobra' => 'STN', 'Tajikistani Somoni' => 'TJS',
                'Tanzanian Shilling' => 'TZS', 'Thai Baht' => 'THB', 'Tongan Paʻanga' => 'TOP',
                'Trinidad & Tobago Dollar' => 'TTD', 'Tunisian Dinar' => 'TND', 'Turkish Lira' => 'TRY',
                'Turkmenistani Manat' => 'TMT', 'Ugandan Shilling' => 'UGX', 'Ukrainian Hryvnia' => 'UAH',
                'United Arab Emirates Dirham' => 'AED', 'US Dollar' => 'USD', 'Uruguayan Peso' => 'UYU',
                'Uzbekistani Som' => 'UZS', 'Vanuatu Vatu' => 'VUV', 'Venezuelan Bolívar' => 'VES',
                'Vietnamese Dong' => 'VND', 'West African CFA Franc' => 'XOF', 'Yemeni Rial' => 'YER',
                'Zambian Kwacha' => 'ZMW', 'Zimbabwean Dollar' => 'ZWL',
            ];

            $currency1Name = $country1->currency ?? '';
            $currency2Name = $country2->currency ?? '';
            $currency1Code = $currencyNameToCode[$currency1Name] ?? null;
            $currency2Code = $currencyNameToCode[$currency2Name] ?? null;

            $symbol1 = $country1->currency_symbol ?? '';
            $symbol2 = $country2->currency_symbol ?? '';

            $rate1 = ($currency1Code && isset($rates[$currency1Code]))
                ? $symbol1 . ' ' . number_format($rates[$currency1Code], 2) . " ({$currency1Code})"
                : 'N/A';
            $rate2 = ($currency2Code && isset($rates[$currency2Code]))
                ? $symbol2 . ' ' . number_format($rates[$currency2Code], 2) . " ({$currency2Code})"
                : 'N/A';


            // Calculate Metrics (0-100)
            $calcMetrics = function($econ, $risk) {
                // Economic Stability: 100 - (inflation * 2) + (GDP in T * 10), clamped to 10-100
                $inflation = $econ['inflation']['raw'] ?? 0;
                $gdpTrillions = ($econ['gdp']['raw'] ?? 0) / 1000000000000;
                $economic = min(100, max(10, 100 - ($inflation * 2) + ($gdpTrillions * 10)));
                
                // Political Risk: directly mapped from risk score (reversed so higher is better for progress bar, wait, usually progress bar for risk is "stability", let's use 100 - risk for stability)
                $political = max(10, 100 - $risk['score']);
                
                // Infrastructure: 50 + GDP bonus
                $infrastructure = min(100, max(10, 50 + ($gdpTrillions * 20)));
                
                // Logistics: 100 - risk
                $logistics = max(10, 100 - $risk['score'] + rand(-5, 5)); // Add tiny variance for demo
                
                return [
                    'economic' => round($economic),
                    'political' => round($political),
                    'infrastructure' => round($infrastructure),
                    'logistics' => round($logistics)
                ];
            };

            return [
                'country1' => [
                    'code'        => $c1Code,
                    'name'        => $country1->name,
                    'flag'        => $country1->flag,
                    'gdp'         => $econ1['gdp']['formatted'] ?? 'N/A',
                    'inflation'   => $econ1['inflation']['formatted'] ?? 'N/A',
                    'population'  => $econ1['population']['formatted'] ?? 'N/A',
                    'temperature' => $weather1,
                    'risk'        => $risk1,
                    'currency'    => $rate1,
                    'metrics'     => $calcMetrics($econ1, $risk1)
                ],
                'country2' => [
                    'code'        => $c2Code,
                    'name'        => $country2->name,
                    'flag'        => $country2->flag,
                    'gdp'         => $econ2['gdp']['formatted'] ?? 'N/A',
                    'inflation'   => $econ2['inflation']['formatted'] ?? 'N/A',
                    'population'  => $econ2['population']['formatted'] ?? 'N/A',
                    'temperature' => $weather2,
                    'risk'        => $risk2,
                    'currency'    => $rate2,
                    'metrics'     => $calcMetrics($econ2, $risk2)
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
