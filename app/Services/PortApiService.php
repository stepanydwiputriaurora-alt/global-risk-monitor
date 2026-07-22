<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Port;
use App\Models\Country;
use Illuminate\Support\Facades\Log;

class PortApiService
{
    /**
     * Fetch World Port Index data and sync to database.
     * Since the actual WPI API requires authentication or complex parsing,
     * this implementation uses a simulated WPI dataset for demonstration.
     */
    public function syncPorts()
    {
        // Simulated World Port Index Dataset
        // In a real scenario, this would be: 
        // $response = Http::get('https://api.example.com/world-port-index');
        // $ports = $response->json();
        
        $portsData = [
            ['port_name' => 'Port of Singapore', 'country' => 'Singapore', 'lat' => 1.264, 'lng' => 103.840],
            ['port_name' => 'Shanghai Port', 'country' => 'China', 'lat' => 31.230, 'lng' => 121.473],
            ['port_name' => 'Port of Rotterdam', 'country' => 'Netherlands', 'lat' => 51.922, 'lng' => 4.481],
            ['port_name' => 'Port of Los Angeles', 'country' => 'United States', 'lat' => 33.728, 'lng' => -118.262],
            ['port_name' => 'Jebel Ali Port', 'country' => 'United Arab Emirates', 'lat' => 24.985, 'lng' => 55.027],
            ['port_name' => 'Port of Hamburg', 'country' => 'Germany', 'lat' => 53.548, 'lng' => 9.987],
            ['port_name' => 'Port of Antwerp', 'country' => 'Belgium', 'lat' => 51.219, 'lng' => 4.402],
            ['port_name' => 'Tanjung Pelepas', 'country' => 'Malaysia', 'lat' => 1.363, 'lng' => 103.548],
            ['port_name' => 'Tanjung Priok', 'country' => 'Indonesia', 'lat' => -6.104, 'lng' => 106.883],
            ['port_name' => 'Port of Tokyo', 'country' => 'Japan', 'lat' => 35.619, 'lng' => 139.779],
            ['port_name' => 'Port of Sydney', 'country' => 'Australia', 'lat' => -33.856, 'lng' => 151.215],
            ['port_name' => 'Port of Santos', 'country' => 'Brazil', 'lat' => -23.961, 'lng' => -46.300],
            ['port_name' => 'Port of Vancouver', 'country' => 'Canada', 'lat' => 49.282, 'lng' => -123.120],
            ['port_name' => 'Port of Felixstowe', 'country' => 'United Kingdom', 'lat' => 51.956, 'lng' => 1.313],
            ['port_name' => 'Port of Durban', 'country' => 'South Africa', 'lat' => -29.871, 'lng' => 31.033],
        ];

        $syncedCount = 0;

        foreach ($portsData as $data) {
            // Find country in database by matching name
            // The CountrySeeder might use different names (e.g. "USA" instead of "United States")
            // so we do a flexible search
            $country = Country::where('name', 'like', '%' . $data['country'] . '%')
                              ->orWhere('official_name', 'like', '%' . $data['country'] . '%')
                              ->first();

            if ($country) {
                // Update or Create the port
                Port::updateOrCreate(
                    [
                        'port_name' => $data['port_name'],
                        'country_id' => $country->id,
                    ],
                    [
                        'latitude' => $data['lat'],
                        'longitude' => $data['lng'],
                    ]
                );
                $syncedCount++;
            } else {
                Log::warning("Port Sync: Country not found for port {$data['port_name']} ({$data['country']})");
            }
        }

        return $syncedCount;
    }
}
