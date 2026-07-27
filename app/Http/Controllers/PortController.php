<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PortController extends Controller
{
    /**
     * NGA Maritime Safety Information – World Port Index public API.
     */
    const NGA_WPI_API = 'https://msi.nga.mil/api/publications/world-port-index';

    /**
     * Show the Port Dashboard page.
     * Fetches 1 representative (largest) port per country from the NGA WPI API.
     */
    public function index(Request $request)
    {
        $ports = Cache::remember('wpi_one_per_country', 600, function () {
            return $this->fetchOnePortPerCountry();
        });

        // Pass to view
        return view('ports.index', compact('ports'));
    }

    /**
     * JSON endpoint used by AJAX calls (e.g. search).
     */
    public function apiIndex(Request $request)
    {
        $ports = Cache::remember('wpi_one_per_country', 600, function () {
            return $this->fetchOnePortPerCountry();
        });

        return response()->json([
            'success' => true,
            'total'   => count($ports),
            'ports'   => $ports,
            'source'  => 'NGA World Port Index (msi.nga.mil)',
        ]);
    }

    /**
     * Fetch a large batch from NGA WPI, then keep only 1 port per country
     * (prefer the one with the largest harbor: L > M > S > V > U).
     */
    private function fetchOnePortPerCountry(): array
    {
        try {
            $response = Http::timeout(20)
                ->withHeaders(['Accept' => 'application/json'])
                ->get(self::NGA_WPI_API, [
                    'output'     => 'json',
                    'maxResults' => 6000,   // pull a large set to get everything
                ]);

            if (!$response->successful()) {
                Log::warning('NGA WPI API non-200', ['status' => $response->status()]);
                return $this->fallbackPorts();
            }

            $raw = $response->json()['ports'] ?? [];

            if (empty($raw)) {
                return $this->fallbackPorts();
            }

            return $this->pickOnePerCountry($raw);

        } catch (\Exception $e) {
            Log::error('NGA WPI fetch failed: ' . $e->getMessage());
            return $this->fallbackPorts();
        }
    }

    /**
     * Match a raw list of WPI ports with our database countries.
     * Priority: harbor size L > M > S > V > U (largest wins).
     */
    private function pickOnePerCountry(array $raw): array
    {
        $dbCountries = \App\Models\Country::orderBy('name')->get();
        $sizeRank = ['L' => 4, 'M' => 3, 'S' => 2, 'V' => 1, 'U' => 0];
        $portsByCode = [];

        foreach ($raw as $port) {
            $code = strtoupper($port['countryCode'] ?? '');
            if (!$code) continue;

            $rank = $sizeRank[strtoupper($port['harborSize'] ?? 'U')] ?? 0;

            if (
                !isset($portsByCode[$code]) ||
                $rank > ($portsByCode[$code]['_rank'])
            ) {
                $portsByCode[$code] = $port;
                $portsByCode[$code]['_rank'] = $rank;
            }
        }

        $result = [];
        foreach ($dbCountries as $country) {
            $code = strtoupper($country->code);
            $port = $portsByCode[$code] ?? null;

            if ($port) {
                $result[] = [
                    'port_number'  => $port['portNumber']  ?? null,
                    'name'         => $port['portName']     ?? 'Unknown Port',
                    'country'      => $country->name,
                    'country_code' => $country->code,
                    'region'       => $port['regionName']   ?? '',
                    'latitude'     => $port['ycoord']       ?? null,
                    'longitude'    => $port['xcoord']       ?? null,
                    'harbor_size'  => $this->harborSizeLabel($port['harborSize'] ?? 'U'),
                    'harbor_type'  => $port['harborType']   ?? '',
                    'unlo_code'    => $port['unloCode']     ?? null,
                    'nav_area'     => $port['navArea']      ?? null,
                ];
            } else {
                $result[] = [
                    'port_number'  => null,
                    'name'         => 'Port of ' . ($country->capital ?: $country->name),
                    'country'      => $country->name,
                    'country_code' => $country->code,
                    'region'       => $country->region ?? '',
                    'latitude'     => $country->latitude,
                    'longitude'    => $country->longitude,
                    'harbor_size'  => 'Unknown',
                    'harbor_type'  => 'Estimated',
                    'unlo_code'    => null,
                    'nav_area'     => null,
                ];
            }
        }

        return $result;
    }

    /**
     * Translate WPI harbor-size codes to readable labels.
     */
    private function harborSizeLabel(string $code): string
    {
        return match (strtoupper($code)) {
            'L'     => 'Large',
            'M'     => 'Medium',
            'S'     => 'Small',
            'V'     => 'Very Small',
            default => 'Unknown',
        };
    }

    /**
     * Hardcoded fallback — one representative port per country —
     * used when the NGA API is unreachable.
     */
    private function fallbackPorts(): array
    {
        return [
            ['port_number' => null, 'name' => 'Port of Singapore',          'country' => 'Singapore',             'country_code' => 'SG', 'region' => 'SINGAPORE',            'latitude' =>   1.264, 'longitude' =>  103.840, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'SG SIN', 'nav_area' => 'IX'],
            ['port_number' => null, 'name' => 'Port of Shanghai',            'country' => 'China',                 'country_code' => 'CN', 'region' => 'CHINA EAST COAST',     'latitude' =>  31.230, 'longitude' =>  121.473, 'harbor_size' => 'Large',  'harbor_type' => 'RN', 'unlo_code' => 'CN SHA', 'nav_area' => 'XI'],
            ['port_number' => null, 'name' => 'Port of Rotterdam',           'country' => 'Netherlands',           'country_code' => 'NL', 'region' => 'NETHERLANDS',          'latitude' =>  51.922, 'longitude' =>    4.481, 'harbor_size' => 'Large',  'harbor_type' => 'RN', 'unlo_code' => 'NL RTM', 'nav_area' => 'I'],
            ['port_number' => null, 'name' => 'Port of Los Angeles',         'country' => 'United States',         'country_code' => 'US', 'region' => 'UNITED STATES W COAST','latitude' =>  33.728, 'longitude' => -118.262, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'US LAX', 'nav_area' => 'XII'],
            ['port_number' => null, 'name' => 'Jebel Ali Port',              'country' => 'United Arab Emirates',  'country_code' => 'AE', 'region' => 'UNITED ARAB EMIRATES', 'latitude' =>  24.985, 'longitude' =>   55.027, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'AE JEA', 'nav_area' => 'IX'],
            ['port_number' => null, 'name' => 'Port of Hamburg',             'country' => 'Germany',               'country_code' => 'DE', 'region' => 'GERMANY',              'latitude' =>  53.548, 'longitude' =>    9.987, 'harbor_size' => 'Large',  'harbor_type' => 'RN', 'unlo_code' => 'DE HAM', 'nav_area' => 'I'],
            ['port_number' => null, 'name' => 'Port of Antwerp',             'country' => 'Belgium',               'country_code' => 'BE', 'region' => 'BELGIUM',              'latitude' =>  51.219, 'longitude' =>    4.402, 'harbor_size' => 'Large',  'harbor_type' => 'RN', 'unlo_code' => 'BE ANR', 'nav_area' => 'I'],
            ['port_number' => null, 'name' => 'Tanjung Pelepas',             'country' => 'Malaysia',              'country_code' => 'MY', 'region' => 'MALAYSIA PENINSULA',   'latitude' =>   1.363, 'longitude' =>  103.548, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'MY TPP', 'nav_area' => 'IX'],
            ['port_number' => null, 'name' => 'Tanjung Priok',               'country' => 'Indonesia',             'country_code' => 'ID', 'region' => 'JAVA',                 'latitude' =>  -6.104, 'longitude' =>  106.883, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'ID JKT', 'nav_area' => 'IX'],
            ['port_number' => null, 'name' => 'Port of Tokyo',               'country' => 'Japan',                 'country_code' => 'JP', 'region' => 'JAPAN',                'latitude' =>  35.619, 'longitude' =>  139.779, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'JP TYO', 'nav_area' => 'XI'],
            ['port_number' => null, 'name' => 'Port of Busan',               'country' => 'South Korea',           'country_code' => 'KR', 'region' => 'SOUTH KOREA',          'latitude' =>  35.179, 'longitude' =>  129.075, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'KR PUS', 'nav_area' => 'XI'],
            ['port_number' => null, 'name' => 'Port of Santos',              'country' => 'Brazil',                'country_code' => 'BR', 'region' => 'BRAZIL',               'latitude' => -23.961, 'longitude' =>  -46.300, 'harbor_size' => 'Large',  'harbor_type' => 'RN', 'unlo_code' => 'BR SSZ', 'nav_area' => 'V'],
            ['port_number' => null, 'name' => 'Port of Vancouver',           'country' => 'Canada',                'country_code' => 'CA', 'region' => 'CANADA WEST COAST',    'latitude' =>  49.282, 'longitude' => -123.120, 'harbor_size' => 'Large',  'harbor_type' => 'RN', 'unlo_code' => 'CA VAN', 'nav_area' => 'XII'],
            ['port_number' => null, 'name' => 'Port of Felixstowe',          'country' => 'United Kingdom',        'country_code' => 'GB', 'region' => 'ENGLAND EAST COAST',   'latitude' =>  51.956, 'longitude' =>    1.313, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'GB FXT', 'nav_area' => 'I'],
            ['port_number' => null, 'name' => 'Port of Durban',              'country' => 'South Africa',          'country_code' => 'ZA', 'region' => 'SOUTH AFRICA',         'latitude' => -29.871, 'longitude' =>   31.033, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'ZA DUR', 'nav_area' => 'VI'],
            ['port_number' => null, 'name' => 'Port of Mumbai',              'country' => 'India',                 'country_code' => 'IN', 'region' => 'INDIA WEST COAST',     'latitude' =>  18.950, 'longitude' =>   72.840, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'IN BOM', 'nav_area' => 'IX'],
            ['port_number' => null, 'name' => 'Port of Sydney',              'country' => 'Australia',             'country_code' => 'AU', 'region' => 'AUSTRALIA EAST COAST', 'latitude' => -33.856, 'longitude' =>  151.215, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'AU SYD', 'nav_area' => 'XI'],
            ['port_number' => null, 'name' => 'Port of Colombo',             'country' => 'Sri Lanka',             'country_code' => 'LK', 'region' => 'SRI LANKA',            'latitude' =>   6.947, 'longitude' =>   79.843, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'LK CMB', 'nav_area' => 'IX'],
            ['port_number' => null, 'name' => 'Port of Barcelona',           'country' => 'Spain',                 'country_code' => 'ES', 'region' => 'SPAIN NE COAST',       'latitude' =>  41.350, 'longitude' =>    2.165, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'ES BCN', 'nav_area' => 'III'],
            ['port_number' => null, 'name' => 'Port of Piraeus',             'country' => 'Greece',                'country_code' => 'GR', 'region' => 'GREECE WEST COAST',    'latitude' =>  37.943, 'longitude' =>   23.637, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'GR PIR', 'nav_area' => 'III'],
            ['port_number' => null, 'name' => 'Port of Alexandria',          'country' => 'Egypt',                 'country_code' => 'EG', 'region' => 'EGYPT',                'latitude' =>  31.200, 'longitude' =>   29.870, 'harbor_size' => 'Large',  'harbor_type' => 'CB', 'unlo_code' => 'EG ALY', 'nav_area' => 'III'],
        ];
    }
}
