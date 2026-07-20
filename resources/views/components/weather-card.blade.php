<div class="card dashboard-card weather-card h-100">

    {{-- Header --}}
    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-start">

        <div>

            <h5 class="fw-bold mb-1">
                <i class="fa-solid fa-cloud-sun text-warning me-2"></i>
                Weather
            </h5>

            <small class="text-muted">
                📍 Indonesia
            </small>

        </div>

        <span class="badge bg-success-subtle text-success">
            Live
        </span>

    </div>

    {{-- Body --}}
    <div class="card-body">

        <div class="text-center mb-4">

            <i class="fa-solid fa-sun weather-icon"></i>

            <h2 class="mt-3 mb-1 fw-bold">
                29°C
            </h2>

            <p class="text-muted mb-0">
                Sunny
            </p>

        </div>

        <div class="row text-center g-3">

            <div class="col-4">

                <div class="weather-item">

                    <i class="fa-solid fa-droplet text-primary mb-2"></i>

                    <div class="fw-semibold">
                        78%
                    </div>

                    <small class="text-muted">
                        Humidity
                    </small>

                </div>

            </div>

            <div class="col-4">

                <div class="weather-item">

                    <i class="fa-solid fa-wind text-info mb-2"></i>

                    <div class="fw-semibold">
                        10 km/h
                    </div>

                    <small class="text-muted">
                        Wind
                    </small>

                </div>

            </div>

            <div class="col-4">

                <div class="weather-item">

                    <i class="fa-solid fa-cloud-rain text-secondary mb-2"></i>

                    <div class="fw-semibold">
                        5%
                    </div>

                    <small class="text-muted">
                        Rain
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>