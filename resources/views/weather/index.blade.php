@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Weather Global Updates</h2>
        <p class="text-muted mb-0">Real-time weather monitoring across key locations.</p>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-4 col-lg-6">
        <label class="form-label fw-bold">Select Country for Weather Data</label>
        <select id="country-selector" class="form-select form-select-lg">
            <option value="Indonesia">Indonesia</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Singapore">Singapore</option>
            <option value="Thailand">Thailand</option>
            <option value="Philippines">Philippines</option>
            <option value="Vietnam">Vietnam</option>
            <option value="Japan">Japan</option>
            <option value="South Korea">South Korea</option>
            <option value="China">China</option>
            <option value="India">India</option>
            <option value="Australia">Australia</option>
            <option value="United States">United States</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Germany">Germany</option>
            <option value="France">France</option>
            <option value="Brazil">Brazil</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Russia">Russia</option>
            <option value="South Africa">South Africa</option>
            <option value="Nigeria">Nigeria</option>
        </select>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-4 col-lg-6">
        @include('components.weather-card')
    </div>
    <div class="col-xl-8 col-lg-6">
        <div class="card dashboard-card h-100">
            <div class="card-header bg-transparent border-0">
                <h5 class="fw-bold mb-1">Interactive Weather Map</h5>
                <small class="text-muted" id="map-subtitle">Global weather patterns and forecasts</small>
            </div>
            <div class="card-body">
                <div class="bg-light rounded h-100 w-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                    <span class="text-muted"><i class="fa-solid fa-map-location-dot fa-2x mb-2 d-block text-center"></i>Map Layer Placeholder</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Country coordinates for Open-Meteo API
    const countryCoords = {
        'Indonesia':     { lat: -6.2088,   lon: 106.8456,  city: 'Jakarta' },
        'Malaysia':      { lat: 3.1390,    lon: 101.6869,  city: 'Kuala Lumpur' },
        'Singapore':     { lat: 1.3521,    lon: 103.8198,  city: 'Singapore' },
        'Thailand':      { lat: 13.7563,   lon: 100.5018,  city: 'Bangkok' },
        'Philippines':   { lat: 14.5995,   lon: 120.9842,  city: 'Manila' },
        'Vietnam':       { lat: 21.0285,   lon: 105.8542,  city: 'Hanoi' },
        'Japan':         { lat: 35.6762,   lon: 139.6503,  city: 'Tokyo' },
        'South Korea':   { lat: 37.5665,   lon: 126.9780,  city: 'Seoul' },
        'China':         { lat: 39.9042,   lon: 116.4074,  city: 'Beijing' },
        'India':         { lat: 28.6139,   lon: 77.2090,   city: 'New Delhi' },
        'Australia':     { lat: -33.8688,  lon: 151.2093,  city: 'Sydney' },
        'United States': { lat: 38.9072,   lon: -77.0369,  city: 'Washington D.C.' },
        'United Kingdom':{ lat: 51.5074,   lon: -0.1278,   city: 'London' },
        'Germany':       { lat: 52.5200,   lon: 13.4050,   city: 'Berlin' },
        'France':        { lat: 48.8566,   lon: 2.3522,    city: 'Paris' },
        'Brazil':        { lat: -15.8267,  lon: -47.9218,  city: 'Brasília' },
        'Saudi Arabia':  { lat: 24.7136,   lon: 46.6753,   city: 'Riyadh' },
        'Russia':        { lat: 55.7558,   lon: 37.6176,   city: 'Moscow' },
        'South Africa':  { lat: -25.7479,  lon: 28.2293,   city: 'Pretoria' },
        'Nigeria':       { lat: 9.0765,    lon: 7.3986,    city: 'Abuja' },
    };

    function getWeatherIcon(code) {
        if (code === 0)                return { cls: 'fa-solid fa-sun weather-icon text-warning',               label: 'Sunny' };
        if (code >= 1 && code <= 3)    return { cls: 'fa-solid fa-cloud-sun weather-icon text-secondary',       label: 'Partly Cloudy' };
        if (code >= 45 && code <= 48)  return { cls: 'fa-solid fa-smog weather-icon text-muted',               label: 'Foggy' };
        if (code >= 51 && code <= 67)  return { cls: 'fa-solid fa-cloud-rain weather-icon text-info',           label: 'Rainy' };
        if (code >= 71 && code <= 77)  return { cls: 'fa-solid fa-snowflake weather-icon text-primary',         label: 'Snow' };
        if (code >= 80 && code <= 82)  return { cls: 'fa-solid fa-cloud-showers-heavy weather-icon text-info', label: 'Heavy Rain' };
        if (code >= 95)                return { cls: 'fa-solid fa-cloud-bolt weather-icon text-danger',         label: 'Thunderstorm' };
        return                                { cls: 'fa-solid fa-cloud weather-icon text-secondary',           label: 'Cloudy' };
    }

    function fetchWeather(country) {
        const coord = countryCoords[country];
        if (!coord) return;

        // Show loading state
        document.getElementById('weather-temp').innerText     = '...';
        document.getElementById('weather-cond').innerText     = 'Loading...';
        document.getElementById('weather-humidity').innerText = '...';
        document.getElementById('weather-wind').innerText     = '...';
        document.getElementById('weather-rain').innerText     = '...';
        document.getElementById('weather-location').innerHTML = `📍 ${coord.city}, ${country}`;
        document.getElementById('map-subtitle').innerText     = `Weather patterns and forecasts for ${country}`;

        const url = `https://api.open-meteo.com/v1/forecast?latitude=${coord.lat}&longitude=${coord.lon}&current=temperature_2m,relative_humidity_2m,wind_speed_10m,precipitation,weather_code&timezone=auto`;

        fetch(url)
            .then(res => res.json())
            .then(data => {
                if (data && data.current) {
                    const c    = data.current;
                    const icon = getWeatherIcon(c.weather_code);

                    document.getElementById('weather-icon-main').className = icon.cls;
                    document.getElementById('weather-temp').innerText      = `${c.temperature_2m}°C`;
                    document.getElementById('weather-cond').innerText      = icon.label;
                    document.getElementById('weather-humidity').innerText  = `${c.relative_humidity_2m}%`;
                    document.getElementById('weather-wind').innerText      = `${c.wind_speed_10m} km/h`;
                    document.getElementById('weather-rain').innerText      = `${c.precipitation} mm`;
                }
            })
            .catch(err => {
                console.error('Weather API error:', err);
                document.getElementById('weather-cond').innerText = 'Data unavailable';
            });
    }

    // Load default on page load
    fetchWeather('Indonesia');

    // Listen for dropdown change
    document.getElementById('country-selector').addEventListener('change', function() {
        fetchWeather(this.value);
    });
});
</script>
@endsection
