@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Risk Comparison</h2>
        <p class="text-muted mb-0">Compare risk metrics across different regions or entities.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-6 col-lg-6">
        @include('components.comparison-card')
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">Detailed Metrics</h5>
                <small class="text-muted">In-depth statistical comparison</small>
            </div>
            <div class="card-body p-4">
                <div class="mb-4">
                    <label class="form-label text-muted d-block mb-2">Economic Stability</label>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                        <div class="progress-bar bg-info" style="width: 25%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted d-block mb-2">Political Risk</label>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: 40%"></div>
                        <div class="progress-bar bg-danger" style="width: 60%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted d-block mb-2">Infrastructure Index</label>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div class="progress-bar bg-success" style="width: 85%"></div>
                        <div class="progress-bar bg-primary" style="width: 15%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted d-block mb-2">Logistics Performance</label>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div class="progress-bar bg-info" style="width: 60%"></div>
                        <div class="progress-bar bg-warning" style="width: 40%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
