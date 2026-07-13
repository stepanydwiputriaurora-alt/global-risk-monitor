<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $shipment = [

            'tracking_number' => $request->tracking_number,
            'product_name' => 'Laptop ASUS ROG',
            'origin' => 'Shanghai, China',
            'destination' => 'Belawan, Indonesia',
            'current_location' => 'Port of Singapore',
            'status' => 'In Transit',
            'eta' => '20 July 2026',
            'risk' => 'Medium',
            'reason' => 'Heavy Rain in Singapore'

        ];

        return view('shipments.detail', compact('shipment'));
    }
}