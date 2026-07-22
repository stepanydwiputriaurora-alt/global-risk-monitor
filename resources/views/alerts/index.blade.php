@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Alerts & Notifications</h2>
        <p class="text-muted mb-0">Recent events and system notifications.</p>
    </div>
</div>

<div class="card dashboard-card border-0 shadow-sm rounded-4">
    <div class="card-header bg-transparent border-0 pt-4 px-4">
        <h5 class="fw-bold mb-1">Recent Alerts</h5>
    </div>
    <div class="card-body p-0">
        <div class="list-group list-group-flush rounded-bottom-4 overflow-hidden">
            <div class="list-group-item p-4 border-0 border-bottom">
                <div class="d-flex w-100 justify-content-between align-items-center mb-2">
                    <h6 class="mb-0 fw-bold"><i class="fa-solid fa-triangle-exclamation text-warning me-2"></i> High Port Congestion in Shanghai</h6>
                    <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-2 text-muted">Vessel waiting times have increased by 40% due to recent weather anomalies affecting port operations and logistics.</p>
                <small class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill">Logistics</small>
            </div>
            <div class="list-group-item p-4 border-0 border-bottom">
                <div class="d-flex w-100 justify-content-between align-items-center mb-2">
                    <h6 class="mb-0 fw-bold"><i class="fa-solid fa-bolt text-danger me-2"></i> Severe Weather Warning</h6>
                    <small class="text-muted">5 days ago</small>
                </div>
                <p class="mb-2 text-muted">Typhoon approaching the Southeast Asian coast, expect major shipment delays across major ports in the region.</p>
                <small class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">Weather</small>
            </div>
            <div class="list-group-item p-4 border-0">
                <div class="d-flex w-100 justify-content-between align-items-center mb-2">
                    <h6 class="mb-0 fw-bold"><i class="fa-solid fa-money-bill-trend-up text-primary me-2"></i> Currency Fluctuation Alert</h6>
                    <small class="text-muted">1 week ago</small>
                </div>
                <p class="mb-2 text-muted">USD to IDR exchange rate has experienced a sharp increase over the last 24 hours, affecting international trade margins.</p>
                <small class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">Economy</small>
            </div>
        </div>
    </div>
</div>
@endsection
