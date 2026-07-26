<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WorldBankService
{
    private string $baseUrl = 'https://api.worldbank.org/v2';

    public function getEconomicData(string $countryCode): array
    {
        return [
            'gdp' => $this->getIndicator($countryCode, 'NY.GDP.MKTP.CD'),
            'inflation' => $this->getIndicator($countryCode, 'FP.CPI.TOTL.ZG'),
            'population' => $this->getIndicator($countryCode, 'SP.POP.TOTL'),
            'exports' => $this->getIndicator($countryCode, 'NE.EXP.GNFS.CD'),
            'imports' => $this->getIndicator($countryCode, 'NE.IMP.GNFS.CD'),
        ];
    }

    private function getIndicator(string $countryCode, string $indicator): array
    {
        $url = "{$this->baseUrl}/country/{$countryCode}/indicator/{$indicator}";

        $response = Http::timeout(20)->get($url, [
            'format' => 'json',
            'per_page' => 1,
            'mrnev' => 1,
        ]);

        if (!$response->successful()) {
            return ['formatted' => 'N/A', 'raw' => 0];
        }

        $data = $response->json();

        if (!isset($data[1][0]['value']) || $data[1][0]['value'] === null) {
            return ['formatted' => 'N/A', 'raw' => 0];
        }
        
        $val = $data[1][0]['value'];
        
        if ($indicator === 'NY.GDP.MKTP.CD' || $indicator === 'NE.EXP.GNFS.CD' || $indicator === 'NE.IMP.GNFS.CD') {
            return [
                'formatted' => '$' . number_format($val / 1000000000000, 2) . ' T',
                'raw' => $val
            ];
        }
        
        if ($indicator === 'FP.CPI.TOTL.ZG') {
            return [
                'formatted' => number_format($val, 1) . '%',
                'raw' => $val
            ];
        }
        
        if ($indicator === 'SP.POP.TOTL') {
            return [
                'formatted' => number_format($val / 1000000, 1) . ' M',
                'raw' => $val
            ];
        }

        return [
            'formatted' => number_format($val),
            'raw' => $val
        ];
    }
}