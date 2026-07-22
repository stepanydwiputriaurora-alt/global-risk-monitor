<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\CountryApiService;

class AdminCountryController extends Controller
{
    /**
     * Display listing of all countries stored in the database.
     */
    public function index()
    {
        $countries = Country::orderBy('name')->paginate(20);
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Pull country data from restcountries.com API and sync to DB.
     */
    public function sync(CountryApiService $service)
    {
        try {
            $count = $service->syncCountries();
            return redirect()->back()
                ->with('success', "Berhasil menyinkronkan $count negara dari restcountries.com.");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menyinkronkan data negara: ' . $e->getMessage());
        }
    }
}
