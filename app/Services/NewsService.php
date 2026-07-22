<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NewsService
{
    public function getNews(string $keyword = 'logistics'): array
    {
        $response = Http::timeout(20)->get(
            'https://gnews.io/api/v4/search',
            [
                'q' => $keyword,
                'lang' => 'en',
                'max' => 5,
                // Isi API key nanti di .env
                'apikey' => env('GNEWS_API_KEY')
            ]
        );

        if (!$response->successful()) {
            return [];
        }

        return $response->json()['articles'] ?? [];
    }
}