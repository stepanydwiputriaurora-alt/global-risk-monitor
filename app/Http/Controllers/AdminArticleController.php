<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Fetch DB Articles
        $dbArticles = Article::latest()->get()->map(function($article) {
            return (object) [
                'id' => $article->id,
                'title' => $article->title,
                'author' => $article->author,
                'status' => $article->status,
                'image' => $article->image,
                'slug' => $article->slug,
                'url' => $article->url,
                'created_at' => $article->created_at,
                'is_local' => true,
            ];
        })->toArray();

        // 2. Fetch API Articles (mirroring NewsController logic)
        $apiArticles = [];
        try {
            $response = Http::timeout(10)->get('https://saurav.tech/NewsAPI/top-headlines/category/business/us.json');
            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['articles']) && is_array($data['articles'])) {
                    $apiArticles = collect($data['articles'])->take(15)->map(function($item) {
                        return (object) [
                            'id' => null,
                            'title' => $item['title'] ?? 'Untitled',
                            'author' => $item['author'] ?? ($item['source']['name'] ?? 'API Source'),
                            'status' => 'published',
                            'image' => $item['urlToImage'] ?? null,
                            'url' => $item['url'] ?? null,
                            'created_at' => \Carbon\Carbon::parse($item['publishedAt'] ?? now()),
                            'is_local' => false,
                        ];
                    })->toArray();
                }
            }
        } catch (\Exception $e) {
            // fail silently
        }

        // 3. Merge and Sort
        $allArticles = array_merge($dbArticles, $apiArticles);
        usort($allArticles, function($a, $b) {
            return $b->created_at <=> $a->created_at;
        });

        // Use pagination manually since it's an array
        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
        $perPage = 10;
        $currentItems = array_slice($allArticles, ($currentPage - 1) * $perPage, $perPage);
        $articles = new \Illuminate\Pagination\LengthAwarePaginator($currentItems, count($allArticles), $perPage, $currentPage, [
            'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
        ]);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $slug = Str::slug($request->title);
        $count = Article::where('slug', 'like', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . time();
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $slug = $article->slug;
        if ($request->title !== $article->title) {
            $slug = Str::slug($request->title);
            $count = Article::where('slug', 'like', "{$slug}%")->where('id', '!=', $article->id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . time();
            }
        }

        $imagePath = $article->image;
        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
