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

    const countryMarkers = @json($countryMarkers ?? []);

    countryMarkers.forEach(function(c) {
        if (c.lat && c.lng) {
            L.marker([c.lat, c.lng])
                .addTo(map)
                .bindPopup(
                    '<div style="min-width:160px;">' +
                    '<img src="' + c.flag + '" width="24" style="border-radius:3px;border:1px solid #eee;" class="me-2">' +
                    '<b>' + c.name + '</b><br>' +
                    '<small class="text-muted">Capital: ' + c.capital + '</small><br>' +
                    '<small class="text-muted">Region: ' + c.region + '</small><br>' +
                    '<small class="text-muted">Population: ' + c.population + '</small>' +
                    '</div>'
                );
        }
    });

    setTimeout(() => {
        map.invalidateSize();
    }, 300);

});

</script>

@endpush