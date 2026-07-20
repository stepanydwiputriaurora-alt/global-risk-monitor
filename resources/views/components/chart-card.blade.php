<div class="mt-4">

    <div class="mb-4">

        <h4 class="fw-bold mb-1">

            <i class="fa-solid fa-chart-line text-primary me-2"></i>

            Analytics Dashboard

        </h4>

        <p class="text-muted mb-0">

            Business Intelligence Overview

        </p>

    </div>

    <div class="row g-4">

        {{-- GDP --}}
        <div class="col-lg-6">

            <div class="card analytics-card h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        GDP Trend

                    </h5>

                    <div class="analytics-chart">

                        <canvas id="gdpChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

        {{-- Inflation --}}
        <div class="col-lg-6">

            <div class="card analytics-card h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        Inflation Trend

                    </h5>

                    <div class="analytics-chart">

                        <canvas id="inflationChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

        {{-- Currency --}}
        <div class="col-lg-6">

            <div class="card analytics-card h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        USD / IDR Trend

                    </h5>

                    <div class="analytics-chart">

                        <canvas id="currencyChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

        {{-- Risk --}}
        <div class="col-lg-6">

            <div class="card analytics-card h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        Global Risk Score Trend

                    </h5>

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

    new Chart(document.getElementById('gdpChart'), {
        type: 'line',
        data: {
            labels: ['2020','2021','2022','2023','2024'],
            datasets: [{
                label: 'GDP',
                data: [10,12,15,19,20],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37,99,235,.2)',
                fill: true,
                tension: .4
            }]
        },
        options:{
            responsive:true,
            maintainAspectRatio:false
        }
    });

    new Chart(document.getElementById('inflationChart'), {
        type: 'line',
        data: {
            labels: ['2020','2021','2022','2023','2024'],
            datasets: [{
                label: 'Inflation',
                data: [2,3,5,5,3],
                borderColor: '#16a34a',
                backgroundColor: 'rgba(22,163,74,.2)',
                fill: true,
                tension: .4
            }]
        },
        options:{
            responsive:true,
            maintainAspectRatio:false
        }
    });

    new Chart(document.getElementById('currencyChart'), {
        type: 'line',
        data: {
            labels: ['2020','2021','2022','2023','2024'],
            datasets: [{
                label: 'USD/IDR',
                data: [12000,14500,13200,15600,17000],
                borderColor: '#9333ea',
                backgroundColor: 'rgba(147,51,234,.2)',
                fill: true,
                tension: .4
            }]
        },
        options:{
            responsive:true,
            maintainAspectRatio:false
        }
    });

    new Chart(document.getElementById('riskChart'), {
        type: 'line',
        data: {
            labels: ['2020','2021','2022','2023','2024'],
            datasets: [{
                label: 'Risk',
                data: [35,55,42,60,75],
                borderColor: '#f97316',
                backgroundColor: 'rgba(249,115,22,.2)',
                fill: true,
                tension: .4
            }]
        },
        options:{
            responsive:true,
            maintainAspectRatio:false
        }
    });

});
</script>
@endpush