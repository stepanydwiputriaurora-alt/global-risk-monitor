<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::latest()->get();

        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
        Favorite::updateOrCreate(

            [
                'country_code' => $request->country_code
            ],

            [
                'country_name' => $request->country_name,
                'flag'         => $request->flag,
                'risk'         => $request->risk,
                'score'        => $request->score
            ]

        );

        return redirect()->back()->with('success', 'Country added to favorites.');
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return redirect()->back()->with('success', 'Country removed from favorites.');
    }
}