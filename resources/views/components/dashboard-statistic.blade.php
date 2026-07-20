<div class="row g-4 mb-4">

    {{-- Active Shipment --}}
    <div class="col-xl col-lg-6 col-md-6">

        <div class="card stat-card h-100">

            <div class="card-body d-flex align-items-center">

                <div class="stat-icon bg-primary-subtle text-primary">
                    <i class="fa-solid fa-box"></i>
                </div>

                <div class="ms-3">

                    <small class="text-muted d-block">
                        Active Shipments
                    </small>

                    <h3 class="fw-bold mb-1">
                        {{ $activeShipments ?? 128 }}
                    </h3>

                    <small class="text-success fw-semibold">
                        <i class="fa-solid fa-arrow-trend-up me-1"></i>
                        +12.5% This Month
                    </small>

                </div>

            </div>

        </div>

    </div>

    {{-- Countries --}}
    <div class="col-xl col-lg-6 col-md-6">

        <div class="card stat-card h-100">

            <div class="card-body d-flex align-items-center">

                <div class="stat-icon bg-success-subtle text-success">

                    <i class="fa-solid fa-earth-asia"></i>

                </div>

                <div class="ms-3">

                    <small class="text-muted d-block">
                        Countries
                    </small>

                    <h3 class="fw-bold mb-1">
                        {{ $countries ?? '250+' }}
                    </h3>

                    <small class="text-muted">
                        Worldwide Coverage
                    </small>

                </div>

            </div>

        </div>

    </div>

    {{-- High Risk --}}
    <div class="col-xl col-lg-6 col-md-6">

        <div class="card stat-card h-100">

            <div class="card-body d-flex align-items-center">

                <div class="stat-icon bg-warning-subtle text-warning">

                    <i class="fa-solid fa-shield-halved"></i>

                </div>

                <div class="ms-3">

                    <small class="text-muted d-block">
                        High Risk
                    </small>

                    <h3 class="fw-bold mb-1">
                        {{ $highRisk ?? 18 }}
                    </h3>

                    <small class="text-danger fw-semibold">
                        3 New Alerts
                    </small>

                </div>

            </div>

        </div>

    </div>

    {{-- Average Risk --}}
    <div class="col-xl col-lg-6 col-md-6">

        <div class="card stat-card h-100">

            <div class="card-body d-flex align-items-center">

                <div class="stat-icon bg-info-subtle text-info">

                    <i class="fa-solid fa-chart-line"></i>

                </div>

                <div class="ms-3">

                    <small class="text-muted d-block">
                        Average Risk
                    </small>

                    <h3 class="fw-bold mb-1">
                        {{ $averageRisk ?? '36.7' }}
                    </h3>

                    <small class="text-info fw-semibold">
                        Medium Risk
                    </small>

                </div>

            </div>

        </div>

    </div>

    {{-- Weather --}}
    <div class="col-xl col-lg-6 col-md-6">

        <div class="card stat-card h-100">

            <div class="card-body d-flex align-items-center">

                <div class="stat-icon bg-danger-subtle text-danger">

                    <i class="fa-solid fa-cloud-bolt"></i>

                </div>

                <div class="ms-3">

                    <small class="text-muted d-block">
                        Extreme Weather
                    </small>

                    <h3 class="fw-bold mb-1">
                        7
                    </h3>

                    <small class="text-danger fw-semibold">
                        Countries Affected
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>