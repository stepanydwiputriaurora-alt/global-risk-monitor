<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\ShipmentEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.shipments.index', compact('shipments'));
    }

    public function create()
    {
        return view('admin.shipments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tracking_number' => 'required|unique:shipments,tracking_number',
            'product_name' => 'required',
            'origin_country' => 'required',
            'destination_country' => 'required',
            'origin_port' => 'required',
            'destination_port' => 'required',
            'estimated_arrival' => 'nullable|date',
        ]);

        $validated['current_country'] = $validated['origin_country'];
        $validated['current_port'] = $validated['origin_port'];
        $validated['status'] = 'Pending';

        $shipment = Shipment::create($validated);

        // Add initial event
        $shipment->events()->create([
            'status' => 'Shipment Info Received',
            'location' => $shipment->origin_country,
            'description' => 'Information received from sender.',
            'date_time' => now(),
            'icon' => 'fa-solid fa-file-invoice',
        ]);

        return redirect()->route('admin.shipments.index')->with('success', 'Shipment created successfully!');
    }

    public function show(string $id)
    {
        $shipment = Shipment::with('events')->findOrFail($id);
        return view('admin.shipments.show', compact('shipment'));
    }

    public function edit(string $id)
    {
        $shipment = Shipment::with('events')->findOrFail($id);
        return view('admin.shipments.edit', compact('shipment'));
    }

    public function update(Request $request, string $id)
    {
        $shipment = Shipment::findOrFail($id);

        if ($request->has('add_event')) {
            $eventData = $request->validate([
                'event_status' => 'required',
                'event_location' => 'required',
                'event_description' => 'nullable',
                'event_date_time' => 'required|date',
                'event_icon' => 'nullable'
            ]);

            $shipment->events()->create([
                'status' => $eventData['event_status'],
                'location' => $eventData['event_location'],
                'description' => $eventData['event_description'],
                'date_time' => $eventData['event_date_time'],
                'icon' => $eventData['event_icon'] ?? 'fa-solid fa-box',
            ]);

            // Update shipment's current status and location based on the new event
            $shipment->update([
                'status' => $eventData['event_status'],
                'current_country' => $eventData['event_location']
            ]);

            return back()->with('success', 'Event added successfully!');
        }

        // Otherwise update basic details
        $validated = $request->validate([
            'product_name' => 'required',
            'status' => 'required',
            'current_country' => 'required',
            'current_port' => 'nullable',
            'actual_arrival' => 'nullable|date',
        ]);

        $shipment->update($validated);

        return back()->with('success', 'Shipment updated successfully!');
    }

    public function destroy(string $id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->delete();

        return redirect()->route('admin.shipments.index')->with('success', 'Shipment deleted successfully!');
    }
}
