<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PortController;

class AdminPortController extends Controller
{
    /**
     * Display a listing of the ports based on the live API (same as user dashboard).
     */
    public function index(Request $request)
    {
        // Get the same data used in the user dashboard
        $response = app(PortController::class)->apiIndex($request);
        $data = $response->getData(true);
        $ports = $data['ports'] ?? [];

        return view('admin.ports.index', compact('ports'));
    }
}
