<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Port;
use App\Services\PortApiService;

class AdminPortController extends Controller
{
    /**
     * Display a listing of the ports.
     */
    public function index()
    {
        $ports = Port::with('country')->paginate(15);
        return view('admin.ports.index', compact('ports'));
    }

    /**
     * Sync ports from the World Port Index API/Dataset.
     */
    public function sync(PortApiService $portService)
    {
        try {
            $syncedCount = $portService->syncPorts();
            return redirect()->route('admin.ports.index')
                ->with('success', "Berhasil menyinkronkan $syncedCount pelabuhan dari World Port Index.");
        } catch (\Exception $e) {
            return redirect()->route('admin.ports.index')
                ->with('error', 'Gagal menyinkronkan data pelabuhan: ' . $e->getMessage());
        }
    }
}
