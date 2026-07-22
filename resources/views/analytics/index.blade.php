@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Analytics</h2>
        <p class="text-muted mb-0">Deep dive into data and statistics.</p>
    </div>
</div>

<div class="row g-4">
    <!-- Top Chart -->
    <div class="col-12">
        @include('components.chart-card')
    </div>
    
    <!-- Analytics Insights -->
    <div class="col-xl-6 col-lg-6">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1"><i class="fa-solid fa-lightbulb text-warning me-2"></i>Data Insights</h5>
                <small class="text-muted">Key takeaways from recent trends</small>
            </div>
            <div class="card-body p-4">
                <div class="d-flex align-items-start mb-4">
                    <div class="bg-primary-subtle text-primary p-3 rounded-3 me-3">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Upward Trend in Global Trade</h6>
                        <p class="text-muted small mb-0">Maritime traffic has increased by 12% in the last quarter compared to the previous year.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <div class="bg-warning-subtle text-warning p-3 rounded-3 me-3">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Supply Chain Disruptions</h6>
                        <p class="text-muted small mb-0">Weather anomalies caused a 5% delay in average shipment times in Southeast Asia.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start">
                    <div class="bg-success-subtle text-success p-3 rounded-3 me-3">
                        <i class="fa-solid fa-shield-check"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Risk Mitigation Improved</h6>
                        <p class="text-muted small mb-0">Adoption of new tracking technologies has reduced overall operational risk by 8%.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Breakdown -->
    <div class="col-xl-6 col-lg-6">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1"><i class="fa-solid fa-chart-pie text-info me-2"></i>Risk Category Breakdown</h5>
                <small class="text-muted">Distribution of risk factors across all regions</small>
            </div>
            <div class="card-body p-4">
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted fw-semibold">Weather & Climate</span>
                        <span class="text-dark fw-bold">45%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div class="progress-bar bg-danger" style="width: 45%"></div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted fw-semibold">Geopolitics</span>
                        <span class="text-dark fw-bold">25%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: 25%"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted fw-semibold">Logistics & Supply Chain</span>
                        <span class="text-dark fw-bold">20%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div class="progress-bar bg-primary" style="width: 20%"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted fw-semibold">Economy & Currency</span>
                        <span class="text-dark fw-bold">10%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div class="progress-bar bg-success" style="width: 10%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
