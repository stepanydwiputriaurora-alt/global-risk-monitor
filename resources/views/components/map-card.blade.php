<div class="card border-0 shadow-sm rounded-4 h-100">

    {{-- Header --}}
    <div class="card-header bg-white border-0 px-4 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <div class="d-flex align-items-center gap-2 mb-1">

                    <h5 class="fw-bold mb-0">
                        🌍 Global Risk Map
                    </h5>

                    <span class="badge bg-success-subtle text-success px-3 py-2">
                        ● Live
                    </span>

                </div>

                <small class="text-muted">
                    Monitor global shipment risk across multiple countries
                </small>

            </div>

            <select class="form-select shadow-sm" style="width:170px">

                <option>Risk Map</option>
                <option>GDP</option>
                <option>Weather</option>
                <option>Shipment</option>

            </select>

        </div>

    </div>

    {{-- Map --}}
    <div class="card-body p-0 position-relative">

        {{-- Legend --}}
        <div
            class="legend-card position-absolute">

            <h6 class="fw-bold mb-3">
                Risk Level
            </h6>

            <div class="legend-item">
                <span class="legend-color bg-success"></span>
                Low Risk
            </div>

            <div class="legend-item">
                <span class="legend-color bg-warning"></span>
                Medium Risk
            </div>

            <div class="legend-item">
                <span class="legend-color bg-orange"></span>
                High Risk
            </div>

            <div class="legend-item">
                <span class="legend-color bg-danger"></span>
                Very High Risk
            </div>

            <div class="legend-item">
                <span class="legend-color bg-secondary"></span>
                No Data
            </div>

        </div>

        <div id="worldMap"></div>

    </div>

</div>

@push('scripts')

<script>

document.addEventListener("DOMContentLoaded", function () {

    let map = L.map('worldMap').setView([20, 10], 2);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

        attribution: '© OpenStreetMap'

    }).addTo(map);

    const locations = [

        [[-6.2088,106.8456], "<b>Indonesia</b><br>Medium Risk"],
        [[1.3521,103.8198], "<b>Singapore</b><br>Low Risk"],
        [[3.1390,101.6869], "<b>Malaysia</b><br>Medium Risk"],
        [[13.7563,100.5018], "<b>Thailand</b><br>Medium Risk"],
        [[39.9042,116.4074], "<b>China</b><br>High Risk"],
        [[35.6762,139.6503], "<b>Japan</b><br>Low Risk"],
        [[37.5665,126.9780], "<b>South Korea</b><br>Low Risk"],
        [[-35.2809,149.1300], "<b>Australia</b><br>Low Risk"],
        [[38.9072,-77.0369], "<b>United States</b><br>Medium Risk"]

    ];

    locations.forEach(location => {

        L.marker(location[0])

            .addTo(map)

            .bindPopup(location[1]);

    });

    setTimeout(() => {

        map.invalidateSize();

    }, 300);

});

</script>

@endpush