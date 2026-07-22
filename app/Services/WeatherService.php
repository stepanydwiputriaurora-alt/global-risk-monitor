<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getCurrentWeather(float $latitude, float $longitude): array
    {
        try {
            $response = Http::timeout(5)->get(
                'https://api.open-meteo.com/v1/forecast',
                [
                    'latitude'  => $latitude,
                    'longitude' => $longitude,
                    'current'   => implode(',', [
                        'temperature_2m',
                        'relative_humidity_2m',
                        'wind_speed_10m',
                        'pressure_msl',
                        'weather_code',
                    ]),
                ]
            );
        } catch (\Exception $e) {
            return [
                'temperature' => '-', 'humidity' => '-',
                'wind' => '-', 'pressure' => '-', 'condition' => 'Unavailable',
            ];
        }

        if (!$response->successful()) {
            return [
                'temperature' => '-',
                'humidity' => '-',
                'wind' => '-',
                'pressure' => '-',
                'condition' => 'Unknown',
            ];
        }

        $current = $response->json('current');

        return [
            'temperature' => $current['temperature_2m'] ?? '-',
            'humidity' => $current['relative_humidity_2m'] ?? '-',
            'wind' => $current['wind_speed_10m'] ?? '-',
            'pressure' => $current['pressure_msl'] ?? '-',
            'condition' => $this->weatherDescription(
                $current['weather_code'] ?? 0
            ),
        ];
    }

    private function weatherDescription($code): string
    {
        return match ((int) $code) {

            0 => 'Clear Sky',

            1, 2, 3 => 'Partly Cloudy',

            45, 48 => 'Fog',

            51, 53, 55 => 'Drizzle',

            61, 63, 65 => 'Rain',

            71, 73, 75 => 'Snow',

            80, 81, 82 => 'Rain Shower',

            95 => 'Thunderstorm',

            default => 'Unknown',
        };
    }
}