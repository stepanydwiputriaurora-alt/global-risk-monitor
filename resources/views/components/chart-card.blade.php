<div class="mt-4">

    <div class="mb-4">

        <h4 class="fw-bold mb-1">
            <i class="fa-solid fa-chart-line text-primary me-2"></i>
            Analytics Dashboard
        </h4>

        <p class="text-muted mb-0">
            Business Intelligence Overview — Data from World Bank & ExchangeRate API
        </p>

    </div>

    <div class="row g-4">

        {{-- GDP Trend --}}
        <div class="col-lg-6">
            <div class="card analytics-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">
                            <i class="fa-solid fa-money-bill-trend-up text-success me-2"></i>
                            GDP Trend (Indonesia)
                        </h5>
                        <span class="badge bg-success-subtle text-success">World Bank</span>
                    </div>
                    <div class="analytics-chart">
                        <canvas id="gdpChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Inflation Trend --}}
        <div class="col-lg-6">
            <div class="card analytics-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">
                            <i class="fa-solid fa-fire text-warning me-2"></i>
                            Inflation Trend (Indonesia)
                        </h5>
                        <span class="badge bg-warning-subtle text-warning">World Bank</span>
                    </div>
                    <div class="analytics-chart">
                        <canvas id="inflationChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- USD / IDR Trend --}}
        <div class="col-lg-6">
            <div class="card analytics-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">
                            <i class="fa-solid fa-coins text-purple me-2" style="color:#9333ea;"></i>
                            USD / IDR Rate
                        </h5>
                        <span class="badge bg-purple-subtle text-purple" style="background:rgba(147,51,234,.15);color:#9333ea;">ExchangeRate API</span>
                    </div>
                    <div class="analytics-chart">
                        <canvas id="currencyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Shipment Risk Trend --}}
        <div class="col-lg-6">
            <div class="card analytics-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">
                            <i class="fa-solid fa-triangle-exclamation text-danger me-2"></i>
                            Shipment Risk Trend
                        </h5>
                        <span class="badge bg-danger-subtle text-danger">Live DB</span>
                    </div>
                    <div class="analytics-chart">
                        <canvas id="riskChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const defaultOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: { mode: 'index', intersect: false },
        },
        scales: {
            x: { grid: { display: false } },
            y: { grid: { color: 'rgba(0,0,0,0.05)' } },
        },
    };

    // ── GDP Chart (World Bank — Triliun USD) ─────────────────
    const gdpLabels = {!! json_encode($gdpData['labels'] ?? ['2019','2020','2021','2022','2023']) !!};
    const gdpValues = {!! json_encode($gdpData['data']   ?? [1.12, 1.06, 1.19, 1.32, 1.37]) !!};

    new Chart(document.getElementById('gdpChart'), {
        type: 'line',
        data: {
            labels: gdpLabels,
            datasets: [{
                label: 'GDP (Trillion USD)',
                data: gdpValues,
                borderColor: '#16a34a',
                backgroundColor: 'rgba(22,163,74,0.15)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#16a34a',
                pointRadius: 4,
            }],
        },
        options: {
            ...defaultOptions,
            scales: {
                ...defaultOptions.scales,
                y: {
                    ...defaultOptions.scales.y,
                    ticks: { callback: v => '$' + v + 'T' },
                },
            },
        },
    });

    // ── Inflation Chart (World Bank — %) ─────────────────────
    const inflationLabels = {!! json_encode($inflationData['labels'] ?? ['2019','2020','2021','2022','2023']) !!};
    const inflationValues = {!! json_encode($inflationData['data']   ?? [2.8, 2.0, 1.6, 4.2, 3.7]) !!};

    new Chart(document.getElementById('inflationChart'), {
        type: 'line',
        data: {
            labels: inflationLabels,
            datasets: [{
                label: 'Inflation (%)',
                data: inflationValues,
                borderColor: '#f59e0b',
                backgroundColor: 'rgba(245,158,11,0.15)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#f59e0b',
                pointRadius: 4,
            }],
        },
        options: {
            ...defaultOptions,
            scales: {
                ...defaultOptions.scales,
                y: {
                    ...defaultOptions.scales.y,
                    ticks: { callback: v => v + '%' },
                },
            },
        },
    });

    // ── USD/IDR Currency Chart ────────────────────────────────
    const currencyLabels = {!! json_encode($currencyData['labels'] ?? ['Feb','Mar','Apr','May','Jun','Jul']) !!};
    const currencyValues = {!! json_encode($currencyData['data']   ?? [15800,15950,16100,16300,15900,16250]) !!};

    new Chart(document.getElementById('currencyChart'), {
        type: 'line',
        data: {
            labels: currencyLabels,
            datasets: [{
                label: 'USD / IDR',
                data: currencyValues,
                borderColor: '#9333ea',
                backgroundColor: 'rgba(147,51,234,0.15)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#9333ea',
                pointRadius: 4,
            }],
        },
        options: {
            ...defaultOptions,
            scales: {
                ...defaultOptions.scales,
                y: {
                    ...defaultOptions.scales.y,
                    ticks: { callback: v => 'Rp' + v.toLocaleString('id-ID') },
                },
            },
        },
    });

    // ── Shipment Risk Chart (Live DB — %) ────────────────────
    const riskLabels = {!! json_encode($riskChartData['labels'] ?? []) !!};
    const riskValues = {!! json_encode($riskChartData['data']   ?? []) !!};

    new Chart(document.getElementById('riskChart'), {
        type: 'bar',
        data: {
            labels: riskLabels,
            datasets: [{
                label: 'Delayed Shipment %',
                data: riskValues,
                backgroundColor: riskValues.map(v =>
                    v === 0   ? 'rgba(22,163,74,0.7)'   :
                    v < 30    ? 'rgba(22,163,74,0.7)'   :
                    v < 60    ? 'rgba(245,158,11,0.7)'  :
                                'rgba(239,68,68,0.7)'
                ),
                borderRadius: 6,
                borderSkipped: false,
            }],
        },
        options: {
            ...defaultOptions,
            scales: {
                ...defaultOptions.scales,
                y: {
                    ...defaultOptions.scales.y,
                    max: 100,
                    ticks: { callback: v => v + '%' },
                },
            },
        },
    });

});
</script>
@endpush