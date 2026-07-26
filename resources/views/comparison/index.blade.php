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
                    <label class="form-label text-muted d-block mb-2">
                        Economic Stability 
                        <span class="float-end small" id="lbl-economic">C1: 0% | C2: 0%</span>
                    </label>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div id="bar-economic-c1" class="progress-bar bg-primary" style="width: 0%"></div>
                        <div id="bar-economic-c2" class="progress-bar bg-info" style="width: 0%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted d-block mb-2">
                        Political Risk (Stability)
                        <span class="float-end small" id="lbl-political">C1: 0% | C2: 0%</span>
                    </label>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div id="bar-political-c1" class="progress-bar bg-warning" style="width: 0%"></div>
                        <div id="bar-political-c2" class="progress-bar bg-danger" style="width: 0%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted d-block mb-2">
                        Infrastructure Index
                        <span class="float-end small" id="lbl-infrastructure">C1: 0% | C2: 0%</span>
                    </label>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div id="bar-infrastructure-c1" class="progress-bar bg-success" style="width: 0%"></div>
                        <div id="bar-infrastructure-c2" class="progress-bar bg-primary" style="width: 0%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted d-block mb-2">
                        Logistics Performance
                        <span class="float-end small" id="lbl-logistics">C1: 0% | C2: 0%</span>
                    </label>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div id="bar-logistics-c1" class="progress-bar bg-info" style="width: 0%"></div>
                        <div id="bar-logistics-c2" class="progress-bar bg-warning" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    function updateMetricRow(idPrefix, c1Name, c2Name, c1Score, c2Score) {
        // Calculate percentages so they fill the bar relatively
        const total = c1Score + c2Score;
        const c1Pct = total > 0 ? (c1Score / total) * 100 : 0;
        const c2Pct = total > 0 ? (c2Score / total) * 100 : 0;
        
        document.getElementById(`bar-${idPrefix}-c1`).style.width = `${c1Pct}%`;
        document.getElementById(`bar-${idPrefix}-c2`).style.width = `${c2Pct}%`;
        
        // Add title for hover
        document.getElementById(`bar-${idPrefix}-c1`).title = `${c1Name}: ${c1Score}`;
        document.getElementById(`bar-${idPrefix}-c2`).title = `${c2Name}: ${c2Score}`;
        
        document.getElementById(`lbl-${idPrefix}`).innerHTML = `<span class="fw-bold text-primary">${c1Name}</span>: ${c1Score} &nbsp;|&nbsp; <span class="fw-bold text-info">${c2Name}</span>: ${c2Score}`;
    }

    document.addEventListener('comparisonUpdated', function(e) {
        const data = e.detail.data;
        const c1 = data.country1;
        const c2 = data.country2;
        
        const m1 = c1.metrics;
        const m2 = c2.metrics;
        
        updateMetricRow('economic', c1.name, c2.name, m1.economic, m2.economic);
        updateMetricRow('political', c1.name, c2.name, m1.political, m2.political);
        updateMetricRow('infrastructure', c1.name, c2.name, m1.infrastructure, m2.infrastructure);
        updateMetricRow('logistics', c1.name, c2.name, m1.logistics, m2.logistics);
    });
});
</script>
@endpush

@endsection
