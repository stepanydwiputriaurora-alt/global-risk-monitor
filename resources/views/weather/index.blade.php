@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Weather Global Updates</h2>
        <p class="text-muted mb-0">Real-time weather monitoring across key locations.</p>
    </div>
</div>



<div class="row g-4">
    <div class="col-xl-4 col-lg-5 col-md-5">
        @include('components.weather-card')
    </div>
    <div class="col-xl-8 col-lg-7 col-md-7">
        <div class="card dashboard-card h-100">
            <div class="card-header bg-transparent border-0">
                <h5 class="fw-bold mb-1">Interactive Weather Map</h5>
                <small class="text-muted" id="map-subtitle">Global weather patterns and forecasts</small>
            </div>
            <div class="card-body p-0 position-relative">
                <div id="weatherMap" style="width: 100%; height: 400px; border-radius: 0 0 20px 20px;"></div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize map
    delete L.Icon.Default.prototype._getIconUrl;
    L.Icon.Default.mergeOptions({
        iconRetinaUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
        iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
    });

    let map = L.map('weatherMap').setView([20, 10], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    let currentMarker = null;

    // Listen to weather updates from the weather-card component
    document.addEventListener('weatherUpdated', function(e) {
        const { data, lat, lon, name, icon } = e.detail;

        document.getElementById('map-subtitle').innerText = `Weather patterns and forecasts for ${name}`;

        if (currentMarker) {
            map.removeLayer(currentMarker);
        }

        map.flyTo([lat, lon], 5, { animate: true, duration: 1.5 });

        currentMarker = L.marker([lat, lon]).addTo(map)
            .bindPopup(
                `<div class="text-center" style="min-width:120px;">
                    <b class="d-block mb-1">${name}</b>
                    <i class="${icon.cls} fa-2x mb-1"></i>
                    <h5 class="mb-0 fw-bold">${data.temperature_2m}°C</h5>
                    <small class="text-muted">${icon.label}</small>
                </div>`
            )
            .openPopup();
    });

    setTimeout(() => {
        map.invalidateSize();
    }, 500);
});
</script>
@endsection
