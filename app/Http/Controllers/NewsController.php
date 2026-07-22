<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    /**
     * GNews API — free tier: 100 req/day
     * Fetch berita berdasarkan kategori: economy, logistics, geopolitics
     */
    public function index(Request $request)
    {
        $category = $request->query('category', 'logistics');

        // Mapping kategori ke query GNews
        $queryMap = [
            'logistics'   => 'logistics OR "supply chain" OR shipping OR freight',
            'economy'     => 'economy OR "global trade" OR inflation OR GDP OR "trade war"',
            'geopolitics' => 'geopolitics OR sanctions OR "trade conflict" OR war OR "political risk"',
            'trending'    => '"global economy" OR "supply chain" OR "international trade"',
        ];

        $q = $queryMap[$category] ?? $queryMap['logistics'];

        $cacheKey = "gnews_{$category}";

        $articles = Cache::remember($cacheKey, 1800, function () use ($q) {
            $apiKey = config('services.gnews.api_key');

            if (!$apiKey) {
                return [];
            }

            try {
                $response = Http::timeout(10)->get('https://gnews.io/api/v4/search', [
                    'q'      => $q,
                    'lang'   => 'en',
                    'max'    => 8,
                    'apikey' => $apiKey,
                ]);

                if ($response->successful()) {
                    return $response->json('articles') ?? [];
                }
            } catch (\Exception $e) {
                // fail silently
            }

            return [];
        });

        // Jika GNews kosong (belum ada API key atau rate limit), fallback ke RSS NewsData
        if (empty($articles)) {
            $articles = $this->fetchFromAlternativeSource($category);
        }

        return response()->json([
            'success'  => true,
            'category' => $category,
            'articles' => $articles,
            'source'   => empty(config('services.gnews.api_key')) ? 'fallback' : 'gnews',
        ]);
    }

    /**
     * Fallback: fetch dari NewsData.io (free, tidak perlu API key untuk basic)
     * atau dari RSS feed BBC/Reuters
     */
    private function fetchFromAlternativeSource(string $category): array
    {
        $rssUrls = [
            'logistics'   => 'https://feeds.reuters.com/reuters/businessNews',
            'economy'     => 'https://feeds.reuters.com/reuters/businessNews',
            'geopolitics' => 'https://feeds.reuters.com/reuters/worldNews',
        ];

        $url = $rssUrls[$category] ?? $rssUrls['logistics'];

        try {
            $response = Http::timeout(8)->withHeaders([
                'Accept' => 'application/rss+xml, application/xml, text/xml',
            ])->get($url);

            if (!$response->successful()) {
                return $this->getDemoArticles($category);
            }

            $xml = simplexml_load_string($response->body());
            if (!$xml) {
                return $this->getDemoArticles($category);
            }

            $articles = [];
            $items    = $xml->channel->item ?? [];
            $count    = 0;

            foreach ($items as $item) {
                if ($count >= 6) break;

                $articles[] = [
                    'title'       => (string) $item->title,
                    'description' => strip_tags((string) ($item->description ?? '')),
                    'url'         => (string) $item->link,
                    'image'       => null,
                    'publishedAt' => (string) ($item->pubDate ?? now()->toIso8601String()),
                    'source'      => ['name' => 'Reuters'],
                ];

                $count++;
            }

            return $articles;
        } catch (\Exception $e) {
            return $this->getDemoArticles($category);
        }
    }

    /**
     * Demo articles jika semua sumber gagal
     */
    private function getDemoArticles(string $category): array
    {
        $demos = [
            'logistics' => [
                ['title' => 'Global Supply Chain Disruptions Ease in Q3 2025', 'description' => 'Major shipping routes see reduced congestion as ports ramp up capacity.', 'url' => '#', 'image' => null, 'publishedAt' => now()->subHours(2)->toIso8601String(), 'source' => ['name' => 'Demo']],
                ['title' => 'Singapore Port Handles Record Container Volume', 'description' => 'Singapore MPA reports 15% increase in container throughput year-over-year.', 'url' => '#', 'image' => null, 'publishedAt' => now()->subHours(5)->toIso8601String(), 'source' => ['name' => 'Demo']],
                ['title' => 'Freight Rates Stabilize After Post-Pandemic Spike', 'description' => 'Container shipping costs return to pre-2020 levels amid improved logistics.', 'url' => '#', 'image' => null, 'publishedAt' => now()->subHours(8)->toIso8601String(), 'source' => ['name' => 'Demo']],
            ],
            'economy' => [
                ['title' => 'IMF Revises Global GDP Growth Forecast Upward', 'description' => 'International Monetary Fund raises 2025 growth projection to 3.2%.', 'url' => '#', 'image' => null, 'publishedAt' => now()->subHours(3)->toIso8601String(), 'source' => ['name' => 'Demo']],
                ['title' => 'Inflation Eases in Emerging Markets', 'description' => 'Central banks in Southeast Asia signal potential rate cuts as CPI stabilizes.', 'url' => '#', 'image' => null, 'publishedAt' => now()->subHours(6)->toIso8601String(), 'source' => ['name' => 'Demo']],
                ['title' => 'US Dollar Weakens Against Asian Currencies', 'description' => 'USD depreciates 1.5% against a basket of Asian currencies this week.', 'url' => '#', 'image' => null, 'publishedAt' => now()->subHours(9)->toIso8601String(), 'source' => ['name' => 'Demo']],
            ],
            'geopolitics' => [
                ['title' => 'New Trade Agreement Between ASEAN Nations Signed', 'description' => 'Regional trade bloc expands cooperation on digital economy and green energy.', 'url' => '#', 'image' => null, 'publishedAt' => now()->subHours(4)->toIso8601String(), 'source' => ['name' => 'Demo']],
                ['title' => 'Red Sea Shipping Lanes See Reduced Incidents', 'description' => 'Naval operations restore safety to critical maritime corridor.', 'url' => '#', 'image' => null, 'publishedAt' => now()->subHours(7)->toIso8601String(), 'source' => ['name' => 'Demo']],
                ['title' => 'G7 Summit Focuses on Supply Chain Resilience', 'description' => 'World leaders agree on new frameworks to diversify critical supply chains.', 'url' => '#', 'image' => null, 'publishedAt' => now()->subHours(10)->toIso8601String(), 'source' => ['name' => 'Demo']],
            ],
        ];

        return $demos[$category] ?? $demos['logistics'];
    }
}
