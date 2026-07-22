<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required'
        ]);

        $shipment = Shipment::with('events')->where(
            'tracking_number',
            $request->tracking_number
        )->first();

        if (!$shipment) {

            return back()->with(
                'error',
                'Tracking Number tidak ditemukan.'
            );

        }

        return view('shipments.detail', compact('shipment'));
    }
}