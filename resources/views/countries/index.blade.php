@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            🌍 Global Country Dashboard
        </h2>

        <p class="text-muted mb-0">
            Monitor economic and environmental information for each country.
        </p>

    </div>

</div>

{{-- Country Selection --}}
<div class="card shadow-sm border-0 rounded-4 mb-4">

    <div class="card-body">

        <div class="row align-items-end">

            <div class="col-lg-6">

                <label class="form-label fw-semibold">
                    Select Country
                </label>

                <select class="form-select form-select-lg">

                    <option>🇮🇩 Indonesia</option>
                    <option>🇨🇳 China</option>
                    <option>🇩🇪 Germany</option>
                    <option>🇦🇺 Australia</option>
                    <option>🇸🇬 Singapore</option>

                </select>

            </div>

        </div>

    </div>

</div>


{{-- Statistic --}}
<div class="row g-4 mb-4">

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <small class="text-muted">
                    Gross Domestic Product
                </small>

                <h2 class="fw-bold mt-2">
                    $1.58 T
                </h2>

                <span class="text-success">
                    GDP
                </span>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <small class="text-muted">
                    Inflation
                </small>

                <h2 class="fw-bold mt-2">
                    2.8%
                </h2>

                <span class="text-warning">
                    Stable
                </span>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <small class="text-muted">
                    Population
                </small>

                <h2 class="fw-bold mt-2">
                    281 M
                </h2>

                <span class="text-primary">
                    Population
                </span>

            </div>

        </div>

    </div>

</div>


<div class="row g-4">

    {{-- Currency --}}
    <div class="col-lg-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    💱 Currency
                </h5>

            </div>

            <div class="card-body">

                <h2 class="fw-bold">
                    Indonesian Rupiah
                </h2>

                <h4 class="text-primary">
                    IDR
                </h4>

                <p class="text-muted mt-3">
                    Official currency used in Indonesia.
                </p>

            </div>

        </div>

    </div>

    {{-- Weather --}}
    <div class="col-lg-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    🌤 Current Weather
                </h5>

            </div>

            <div class="card-body text-center">

                <div style="font-size:70px;">
                    ☀️
                </div>

                <h1 class="fw-bold">
                    31°C
                </h1>

                <h5>
                    Sunny
                </h5>

                <hr>

                <div class="row">

                    <div class="col">

                        <strong>Humidity</strong>

                        <p>76%</p>

                    </div>

                    <div class="col">

                        <strong>Wind</strong>

                        <p>12 km/h</p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- Summary --}}
<div class="card border-0 shadow-sm rounded-4 mt-4">

    <div class="card-header bg-white border-0">

        <h5 class="fw-bold mb-0">
            📄 Country Overview
        </h5>

    </div>

    <div class="card-body">

        <p class="text-muted mb-0">

            Indonesia has one of the largest economies in Southeast Asia with
            stable inflation, a large population, and a tropical climate that
            supports agriculture and maritime trade.

        </p>

    </div>

</div>

@endsection