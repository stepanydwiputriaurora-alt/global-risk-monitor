<div class="card dashboard-card weather-card h-100">

    {{-- Header --}}
    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-start">

        <div>

            <h5 class="fw-bold mb-1">
                <i class="fa-solid fa-cloud-sun text-warning me-2"></i>
                Weather
            </h5>

            <div class="mt-2">
                <select id="weather-country-select" class="form-select form-select-sm shadow-sm">
                    @foreach($countries ?? [] as $c)
                        <option value="{{ $c['lat'] }},{{ $c['lng'] }}" data-name="{{ $c['name'] }}" data-capital="{{ $c['capital'] }}" {{ $c['name'] === 'Indonesia' ? 'selected' : '' }}>
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="text-end">
            <span class="badge bg-success-subtle text-success mb-1 d-inline-block">
                Live
            </span>
            <div id="real-time-clock" class="text-muted small fw-bold">--:--:--</div>
        </div>

    </div>

    {{-- Body --}}
    <div class="card-body">

        <div class="text-center mb-4">

            <i class="fa-solid fa-cloud-sun weather-icon text-warning" id="weather-icon-main"></i>

            <h2 class="mt-3 mb-1 fw-bold" id="weather-temp">
                ...
            </h2>

            <p class="text-muted mb-0" id="weather-cond">
                Memuat...
            </p>

        </div>

        <div class="row text-center g-3">

            <div class="col-4">

                <div class="weather-item">

                    <i class="fa-solid fa-droplet text-primary mb-2"></i>

                    <div class="fw-semibold" id="weather-humidity">
                        ...
                    </div>

                    <small class="text-muted">
                        Humidity
                    </small>

                </div>

            </div>

            <div class="col-4">

                <div class="weather-item">

                    <i class="fa-solid fa-wind text-info mb-2"></i>

                    <div class="fw-semibold" id="weather-wind">
                        ...
                    </div>

                    <small class="text-muted">
                        Wind
                    </small>

                </div>

            </div>

            <div class="col-4">

                <div class="weather-item">

                    <i class="fa-solid fa-cloud-rain text-secondary mb-2"></i>

                    <div class="fw-semibold" id="weather-rain">
                        ...
                    </div>

                    <small class="text-muted">
                        Rain
                    </small>

                </div>

            </div>

        </div>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function getWeatherIcon(code) {
            if (code === 0)               return { cls: 'fa-solid fa-sun weather-icon text-warning',               label: 'Sunny' };
            if (code >= 1 && code <= 3)   return { cls: 'fa-solid fa-cloud-sun weather-icon text-secondary',       label: 'Partly Cloudy' };
            if (code >= 45 && code <= 48) return { cls: 'fa-solid fa-smog weather-icon text-muted',               label: 'Foggy' };
            if (code >= 51 && code <= 67) return { cls: 'fa-solid fa-cloud-rain weather-icon text-info',           label: 'Rainy' };
            if (code >= 71 && code <= 77) return { cls: 'fa-solid fa-snowflake weather-icon text-primary',         label: 'Snow' };
            if (code >= 80 && code <= 82) return { cls: 'fa-solid fa-cloud-showers-heavy weather-icon text-info', label: 'Heavy Rain' };
            if (code >= 95)               return { cls: 'fa-solid fa-cloud-bolt weather-icon text-danger',         label: 'Thunderstorm' };
            return                               { cls: 'fa-solid fa-cloud weather-icon text-secondary',           label: 'Cloudy' };
        }

        const selectEl = document.getElementById('weather-country-select');

        function fetchWeather() {
            const selectedOption = selectEl.options[selectEl.selectedIndex];
            if (!selectedOption || !selectedOption.value) return;

            const coords = selectedOption.value.split(',');
            if (coords.length !== 2) return;

            const lat = coords[0];
            const lon = coords[1];
            
            document.getElementById('weather-cond').innerText = 'Memuat...';

            const url = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m,relative_humidity_2m,wind_speed_10m,precipitation,weather_code&timezone=auto`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data && data.current) {
                        const c    = data.current;
                        const icon = getWeatherIcon(c.weather_code);
                        
                        const locationEl = document.getElementById('weather-location');
                        if (locationEl) {
                            locationEl.innerHTML = `📍 ${selectedOption.dataset.capital || selectedOption.dataset.name}, ${selectedOption.dataset.name}`;
                        }

                        document.getElementById('weather-icon-main').className = icon.cls;
                        document.getElementById('weather-temp').innerText      = `${c.temperature_2m}°C`;
                        document.getElementById('weather-cond').innerText      = icon.label;
                        document.getElementById('weather-humidity').innerText  = `${c.relative_humidity_2m}%`;
                        document.getElementById('weather-wind').innerText      = `${c.wind_speed_10m} km/h`;
                        document.getElementById('weather-rain').innerText      = `${c.precipitation} mm`;
                        
                        // Dispatch event for other components (like map)
                        document.dispatchEvent(new CustomEvent('weatherUpdated', { 
                            detail: { data: c, lat: lat, lon: lon, name: selectedOption.dataset.name, icon: icon } 
                        }));
                    }
                })
                .catch(err => {
                    console.error("Weather API error:", err);
                    document.getElementById('weather-cond').innerText = 'Unavailable';
                    document.getElementById('weather-temp').innerText = '--';
                });
        }

        selectEl.addEventListener('change', fetchWeather);
        
        // Initial fetch
        fetchWeather();

        // Real time clock
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('real-time-clock').innerText = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    });
</script>
@endpush