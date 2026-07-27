<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;

class WorldBankService
{
    private string $baseUrl = 'https://api.worldbank.org/v2';

    /**
     * Real World Bank data (2022-2023) for major countries.
     * GDP in USD, Inflation in %, Population in persons, Exports/Imports in USD.
     */
    private array $fallbackData = [
        'ID' => ['gdp' => 1319100000000,  'inflation' => 3.7,  'population' => 277534122,  'exports' => 291979000000,  'imports' => 237447000000],
        'US' => ['gdp' => 27360000000000, 'inflation' => 3.4,  'population' => 334914895,  'exports' => 3050000000000, 'imports' => 3170000000000],
        'CN' => ['gdp' => 17790000000000, 'inflation' => 0.2,  'population' => 1425671352, 'exports' => 3380000000000, 'imports' => 2560000000000],
        'JP' => ['gdp' => 4213000000000,  'inflation' => 3.2,  'population' => 123294513,  'exports' => 917000000000,  'imports' => 981000000000],
        'DE' => ['gdp' => 4457000000000,  'inflation' => 5.9,  'population' => 83794770,   'exports' => 1940000000000, 'imports' => 1770000000000],
        'IN' => ['gdp' => 3549000000000,  'inflation' => 5.7,  'population' => 1428627663, 'exports' => 776000000000,  'imports' => 898000000000],
        'GB' => ['gdp' => 3089000000000,  'inflation' => 7.9,  'population' => 67736802,   'exports' => 899000000000,  'imports' => 953000000000],
        'FR' => ['gdp' => 2924000000000,  'inflation' => 5.7,  'population' => 67935660,   'exports' => 961000000000,  'imports' => 1010000000000],
        'BR' => ['gdp' => 2175000000000,  'inflation' => 4.6,  'population' => 215313498,  'exports' => 339000000000,  'imports' => 258000000000],
        'CA' => ['gdp' => 2140000000000,  'inflation' => 3.9,  'population' => 38781291,   'exports' => 743000000000,  'imports' => 716000000000],
        'AU' => ['gdp' => 1723000000000,  'inflation' => 5.6,  'population' => 26141369,   'exports' => 474000000000,  'imports' => 403000000000],
        'KR' => ['gdp' => 1709000000000,  'inflation' => 3.6,  'population' => 51712619,   'exports' => 632000000000,  'imports' => 642000000000],
        'MX' => ['gdp' => 1322000000000,  'inflation' => 7.9,  'population' => 128455567,  'exports' => 593000000000,  'imports' => 562000000000],
        'ES' => ['gdp' => 1580000000000,  'inflation' => 3.5,  'population' => 47519628,   'exports' => 622000000000,  'imports' => 641000000000],
        'SA' => ['gdp' => 1069000000000,  'inflation' => 2.3,  'population' => 36947025,   'exports' => 381000000000,  'imports' => 217000000000],
        'CH' => ['gdp' => 884000000000,   'inflation' => 2.1,  'population' => 8796669,    'exports' => 531000000000,  'imports' => 432000000000],
        'NL' => ['gdp' => 1081000000000,  'inflation' => 4.1,  'population' => 17890000,   'exports' => 964000000000,  'imports' => 889000000000],
        'SE' => ['gdp' => 593000000000,   'inflation' => 8.5,  'population' => 10551707,   'exports' => 273000000000,  'imports' => 267000000000],
        'SG' => ['gdp' => 497000000000,   'inflation' => 6.1,  'population' => 5917648,    'exports' => 564000000000,  'imports' => 500000000000],
        'NO' => ['gdp' => 546000000000,   'inflation' => 5.5,  'population' => 5403021,    'exports' => 282000000000,  'imports' => 131000000000],
        'MY' => ['gdp' => 406000000000,   'inflation' => 3.5,  'population' => 33573874,   'exports' => 300000000000,  'imports' => 250000000000],
        'TH' => ['gdp' => 514000000000,   'inflation' => 1.2,  'population' => 71801279,   'exports' => 284000000000,  'imports' => 270000000000],
        'PH' => ['gdp' => 404000000000,   'inflation' => 6.0,  'population' => 117337368,  'exports' => 75000000000,   'imports' => 124000000000],
        'VN' => ['gdp' => 430000000000,   'inflation' => 3.3,  'population' => 98858950,   'exports' => 354000000000,  'imports' => 327000000000],
        'PK' => ['gdp' => 375000000000,   'inflation' => 29.2, 'population' => 231402117,  'exports' => 30000000000,   'imports' => 55000000000],
        'EG' => ['gdp' => 396000000000,   'inflation' => 33.9, 'population' => 105914499,  'exports' => 52000000000,   'imports' => 81000000000],
        'ZA' => ['gdp' => 377000000000,   'inflation' => 5.9,  'population' => 60414495,   'exports' => 123000000000,  'imports' => 115000000000],
        'NG' => ['gdp' => 477000000000,   'inflation' => 24.7, 'population' => 223804632,  'exports' => 55000000000,   'imports' => 52000000000],
        'AR' => ['gdp' => 641000000000,   'inflation' => 113.4,'population' => 45773884,   'exports' => 88000000000,   'imports' => 77000000000],
        'IT' => ['gdp' => 2254000000000,  'inflation' => 5.6,  'population' => 59030133,   'exports' => 685000000000,  'imports' => 674000000000],
        'TR' => ['gdp' => 1119000000000,  'inflation' => 64.8, 'population' => 85816199,   'exports' => 255000000000,  'imports' => 362000000000],
        'RU' => ['gdp' => 2240000000000,  'inflation' => 7.4,  'population' => 144444359,  'exports' => 592000000000,  'imports' => 304000000000],
        'PL' => ['gdp' => 811000000000,   'inflation' => 11.4, 'population' => 41026067,   'exports' => 368000000000,  'imports' => 360000000000],
        'BE' => ['gdp' => 627000000000,   'inflation' => 4.1,  'population' => 11686140,   'exports' => 542000000000,  'imports' => 527000000000],
        'AT' => ['gdp' => 516000000000,   'inflation' => 7.7,  'population' => 9132383,    'exports' => 254000000000,  'imports' => 252000000000],
        'AE' => ['gdp' => 509000000000,   'inflation' => 4.8,  'population' => 9441129,    'exports' => 573000000000,  'imports' => 470000000000],
        'IR' => ['gdp' => 366000000000,   'inflation' => 44.6, 'population' => 88550570,   'exports' => 42000000000,   'imports' => 61000000000],
        'IL' => ['gdp' => 521000000000,   'inflation' => 4.2,  'population' => 9174520,    'exports' => 175000000000,  'imports' => 155000000000],
        'PT' => ['gdp' => 267000000000,   'inflation' => 5.3,  'population' => 10247605,   'exports' => 132000000000,  'imports' => 140000000000],
        'CZ' => ['gdp' => 341000000000,   'inflation' => 12.1, 'population' => 10827529,   'exports' => 234000000000,  'imports' => 219000000000],
        'NZ' => ['gdp' => 247000000000,   'inflation' => 5.7,  'population' => 5123412,    'exports' => 66000000000,   'imports' => 71000000000],
        'DK' => ['gdp' => 406000000000,   'inflation' => 7.7,  'population' => 5932654,    'exports' => 242000000000,  'imports' => 207000000000],
        'FI' => ['gdp' => 303000000000,   'inflation' => 6.3,  'population' => 5545475,    'exports' => 120000000000,  'imports' => 117000000000],
        'HU' => ['gdp' => 213000000000,   'inflation' => 17.6, 'population' => 10156239,   'exports' => 153000000000,  'imports' => 148000000000],
        'CL' => ['gdp' => 344000000000,   'inflation' => 12.8, 'population' => 19629590,   'exports' => 98000000000,   'imports' => 92000000000],
        'CO' => ['gdp' => 363000000000,   'inflation' => 11.7, 'population' => 52215503,   'exports' => 60000000000,   'imports' => 76000000000],
        'BD' => ['gdp' => 460000000000,   'inflation' => 9.0,  'population' => 173562364,  'exports' => 55000000000,   'imports' => 75000000000],
        'MM' => ['gdp' => 64000000000,    'inflation' => 26.7, 'population' => 54409800,   'exports' => 20000000000,   'imports' => 24000000000],
        'KZ' => ['gdp' => 261000000000,   'inflation' => 14.7, 'population' => 19606633,   'exports' => 84000000000,   'imports' => 50000000000],
        'KE' => ['gdp' => 118000000000,   'inflation' => 9.2,  'population' => 55100586,   'exports' => 13000000000,   'imports' => 23000000000],
        'GH' => ['gdp' => 76000000000,    'inflation' => 38.1, 'population' => 33475870,   'exports' => 17000000000,   'imports' => 16000000000],
        'ET' => ['gdp' => 156000000000,   'inflation' => 30.2, 'population' => 126527060,  'exports' => 4000000000,    'imports' => 17000000000],
        'TZ' => ['gdp' => 79000000000,    'inflation' => 4.3,  'population' => 65497748,   'exports' => 7000000000,    'imports' => 13000000000],
        'UZ' => ['gdp' => 90000000000,    'inflation' => 12.3, 'population' => 36413888,   'exports' => 19000000000,   'imports' => 26000000000],
        'IQ' => ['gdp' => 264000000000,   'inflation' => 5.2,  'population' => 43533592,   'exports' => 110000000000,  'imports' => 70000000000],
        'QA' => ['gdp' => 219000000000,   'inflation' => 3.0,  'population' => 2695122,    'exports' => 110000000000,  'imports' => 42000000000],
        'KW' => ['gdp' => 163000000000,   'inflation' => 3.7,  'population' => 4310108,    'exports' => 87000000000,   'imports' => 34000000000],
        'UA' => ['gdp' => 160000000000,   'inflation' => 12.9, 'population' => 43531422,   'exports' => 44000000000,   'imports' => 50000000000],
        'RO' => ['gdp' => 351000000000,   'inflation' => 11.7, 'population' => 19051562,   'exports' => 103000000000,  'imports' => 125000000000],
        'GR' => ['gdp' => 239000000000,   'inflation' => 4.2,  'population' => 10413982,   'exports' => 65000000000,   'imports' => 89000000000],
    ];

    public function getEconomicData(string $countryCode): array
    {
        $code = strtoupper($countryCode);

        // 1. Use built-in dataset first (instant, always available)
        if (isset($this->fallbackData[$code])) {
            return $this->formatFallback($this->fallbackData[$code]);
        }

        // 2. Country not in dataset — try live API with short timeout
        $indicators = [
            'gdp'        => 'NY.GDP.MKTP.CD',
            'inflation'  => 'FP.CPI.TOTL.ZG',
            'population' => 'SP.POP.TOTL',
            'exports'    => 'NE.EXP.GNFS.CD',
            'imports'    => 'NE.IMP.GNFS.CD',
        ];

        $results = [];

        try {
            $responses = Http::pool(function (Pool $pool) use ($code, $indicators) {
                $reqs = [];
                foreach ($indicators as $key => $indicator) {
                    $url = "{$this->baseUrl}/country/{$code}/indicator/{$indicator}";
                    $reqs[] = $pool->as($key)->timeout(3)->get($url, [
                        'format'   => 'json',
                        'per_page' => 1,
                        'mrnev'    => 1,
                    ]);
                }
                return $reqs;
            });

            foreach ($indicators as $key => $indicator) {
                $response = $responses[$key];
                if ($response instanceof \Exception || !$response->successful()) {
                    $results[$key] = ['formatted' => 'N/A', 'raw' => 0];
                    continue;
                }

                $data = $response->json();

                if (!isset($data[1][0]['value']) || $data[1][0]['value'] === null) {
                    $results[$key] = ['formatted' => 'N/A', 'raw' => 0];
                    continue;
                }

                $results[$key] = $this->formatValue($key, $indicator, $data[1][0]['value']);
            }
        } catch (\Exception $e) {
            foreach ($indicators as $key => $indicator) {
                $results[$key] = ['formatted' => 'N/A', 'raw' => 0];
            }
        }

        return $results;
    }

    private function formatFallback(array $raw): array
    {
        return [
            'gdp'        => ['formatted' => '$' . number_format($raw['gdp'] / 1e12, 2) . ' T',   'raw' => $raw['gdp']],
            'inflation'  => ['formatted' => number_format($raw['inflation'], 1) . '%',             'raw' => $raw['inflation']],
            'population' => ['formatted' => number_format($raw['population'] / 1e6, 1) . ' M',   'raw' => $raw['population']],
            'exports'    => ['formatted' => '$' . number_format($raw['exports'] / 1e9, 1) . ' B', 'raw' => $raw['exports']],
            'imports'    => ['formatted' => '$' . number_format($raw['imports'] / 1e9, 1) . ' B', 'raw' => $raw['imports']],
        ];
    }

    private function formatValue(string $key, string $indicator, $val): array
    {
        if (in_array($indicator, ['NY.GDP.MKTP.CD', 'NE.EXP.GNFS.CD', 'NE.IMP.GNFS.CD'])) {
            return ['formatted' => '$' . number_format($val / 1e12, 2) . ' T', 'raw' => $val];
        } elseif ($indicator === 'FP.CPI.TOTL.ZG') {
            return ['formatted' => number_format($val, 1) . '%', 'raw' => $val];
        } elseif ($indicator === 'SP.POP.TOTL') {
            return ['formatted' => number_format($val / 1e6, 1) . ' M', 'raw' => $val];
        }
        return ['formatted' => number_format($val), 'raw' => $val];
    }
}