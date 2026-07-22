@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            🌍 Global Country Dashboard
        </h2>

        <p class="text-muted mb-0">
            Monitor economic, demographic, and environmental information for each country.
        </p>

    </div>

    {{-- Tombol Sinkronisasi hanya untuk Admin --}}
    @if(auth()->check() && auth()->user()->isAdmin())
        <form action="{{ route('admin.countries.sync') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-sm"
                onclick="return confirm('Tarik data negara terbaru dari API restcountries.com?')">
                <i class="fa-solid fa-rotate me-2"></i> Sinkronisasi Data Negara
            </button>
        </form>
    @endif

</div>

{{-- Banner jika data negara belum ada di database --}}
@if($needsSync ?? false)
<div class="alert alert-warning rounded-4 d-flex align-items-center gap-3 mb-4" role="alert">
    <i class="fa-solid fa-triangle-exclamation fa-lg"></i>
    <div>
        <strong>Data negara belum tersedia.</strong>
        @if(auth()->user()->isAdmin())
            Klik tombol <strong>"Sinkronisasi Data Negara"</strong> di kanan atas untuk menarik data dari API restcountries.com.
        @else
            Silakan hubungi administrator untuk melakukan sinkronisasi data negara.
        @endif
    </div>
</div>
@endif



{{-- Country Selection --}}
<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">

        <form method="GET" action="{{ route('countries') }}">

            <div class="row align-items-end">

                <div class="col-lg-6">

                    <label class="form-label fw-semibold">
                        Select Country
                    </label>

                    <select
                        name="country"
                        class="form-select form-select-lg"
                        onchange="this.form.submit()">

                        @foreach($countries as $item)

                            <option
                                value="{{ $item['name'] }}"
                                {{ $country['name'] == $item['name'] ? 'selected' : '' }}>

                                {{ $item['name'] }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-lg-6">

                    <div class="row g-3 mt-1 mt-lg-0">

                        <div class="col-md-4">

                            <div class="border rounded-4 p-3 text-center h-100">

                                <div class="text-muted small">
                                    Region
                                </div>

                                <div class="fw-bold mt-2">
                                    {{ $country['region'] }}
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded-4 p-3 text-center h-100">

                                <div class="text-muted small">
                                    Capital
                                </div>

                                <div class="fw-bold mt-2">
                                    {{ $country['capital'] }}
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded-4 p-3 text-center h-100">

                                <div class="text-muted small">
                                    Time Zone
                                </div>

                                <div class="fw-bold mt-2">
                                    {{ $country['timezone'] }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

{{-- Country Banner --}}
<div class="card border-0 shadow-sm rounded-4 mb-4" id="country-banner">

    <div class="card-body">

        <div class="row align-items-center">

            <div class="col-lg-2 text-center">

                <img
                    id="api-flag"
                    src="{{ $country['flag'] }}"
                    alt="{{ $country['name'] }}"
                    class="img-fluid rounded shadow"
                    style="max-height:120px;">

            </div>

            <div class="col-lg-10">

                <div class="d-flex align-items-center gap-3 mb-1">
                    <h2 class="fw-bold mb-0" id="api-name">
                        {{ $country['name'] }}
                    </h2>

                    @if($isFavorited)
                        <form action="{{ route('favorites.destroy', \App\Models\Favorite::where('country_name', $country['name'])->first()->id ?? 0) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-warning text-dark fw-semibold rounded-pill px-3 shadow-sm">
                                <i class="fa-solid fa-star me-1"></i> Favorited
                            </button>
                        </form>
                    @else
                        <form action="{{ route('favorites.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="country_code" value="{{ $country['code'] ?? 'ID' }}">
                            <input type="hidden" name="country_name" value="{{ $country['name'] }}">
                            <input type="hidden" name="flag" value="{{ $country['flag'] }}">
                            <input type="hidden" name="risk" value="Low">
                            <input type="hidden" name="score" value="85">
                            <button type="submit" class="btn btn-sm btn-outline-secondary fw-semibold rounded-pill px-3 shadow-sm">
                                <i class="fa-regular fa-star me-1"></i> Add to Favorite
                            </button>
                        </form>
                    @endif
                </div>

                <p class="text-muted mb-2" id="api-official-name">

                    {{ $country['official_name'] }}

                </p>

                <div class="row">

                    <div class="col-md-4">

                        <strong>Sub Region</strong><br>

                        <span id="api-subregion">{{ $country['subregion'] }}</span>

                    </div>

                    <div class="col-md-4">

                        <strong>Language</strong><br>

                        <span id="api-language">{{ $country['language'] }}</span>

                    </div>

                    <div class="col-md-4">

                        <strong>Area</strong><br>

                        <span id="api-area">{{ $country['area'] }}</span> km²

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- Statistics --}}
<div class="row g-4 mb-4">

    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-muted">
                            GDP
                        </small>

                        <h2 class="fw-bold mt-2" id="api-gdp">
                            {{ $economy['gdp'] ?? 'N/A' }}
                        </h2>

                        <span class="badge bg-success-subtle text-success">
                            Growing Economy
                        </span>

                    </div>

                    <div class="fs-1">
                        📈
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-muted">
                            Inflation
                        </small>

                        <h2 class="fw-bold mt-2" id="api-inflation">
                            {{ $economy['inflation'] ?? 'N/A' }}
                        </h2>

                        <span class="badge bg-warning-subtle text-warning">
                            Stable
                        </span>

                    </div>

                    <div class="fs-1">
                        📊
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-muted">
                            Population
                        </small>

                        <h2 class="fw-bold mt-2" id="api-population">
                            {{ $economy['population'] ?? 'N/A' }}
                        </h2>

                        <span class="badge bg-primary-subtle text-primary">
                            Large Population
                        </span>

                    </div>

                    <div class="fs-1">
                        👥
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-muted">
                            Currency
                        </small>

                        <h2 class="fw-bold mt-2" id="stat-currency-code">
                            <span class="spinner-border spinner-border-sm text-muted" role="status"></span>
                        </h2>

                        <span class="badge bg-info-subtle text-info" id="stat-currency-name">
                            Loading...
                        </span>

                    </div>

                    <div class="fs-1">
                        💱
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="row g-4">

    {{-- Currency Detail --}}
    <div class="col-lg-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-header bg-white border-0 pt-4 d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">
                    💱 Currency Information
                </h5>
                <small class="text-muted" id="currency-source">Loading...</small>

            </div>

            <div class="card-body">

                <div class="text-center mb-4">

                    <h2 class="fw-bold" id="currency-name">
                        <span class="spinner-border text-muted" style="width:1.5rem;height:1.5rem;"></span>
                    </h2>

                    <h1 class="display-5 text-primary fw-bold" id="currency-code">
                        —
                    </h1>

                    <p class="text-muted" id="currency-desc">
                        Fetching exchange rate data...
                    </p>

                </div>

                <hr>

                <div class="row text-center g-3">

                    <div class="col-4">
                        <div class="border rounded-4 p-3">
                            <small class="text-muted d-block">Symbol</small>
                            <strong id="currency-symbol">—</strong>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="border rounded-4 p-3">
                            <small class="text-muted d-block">vs USD</small>
                            <strong id="currency-vs-usd">—</strong>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="border rounded-4 p-3">
                            <small class="text-muted d-block">vs EUR</small>
                            <strong id="currency-vs-eur">—</strong>
                        </div>
                    </div>

                </div>

                <div class="mt-4">
                    <h6 class="fw-bold text-muted mb-2">Kurs Terhadap Mata Uang Utama</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless mb-0">
                            <tbody id="currency-rates-table">
                                <tr><td colspan="2" class="text-center text-muted"><small>Memuat kurs...</small></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- Weather --}}
    <div class="col-lg-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-header bg-white border-0 pt-4 d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">
                    🌤 Current Weather
                </h5>
                <small class="text-muted" id="weather-source">Loading...</small>

            </div>

            <div class="card-body">

                <div class="text-center">

                    <div style="font-size:80px;" id="weather-icon">
                        <span class="spinner-border text-muted" style="width:3rem;height:3rem;"></span>
                    </div>

                    <h1 class="display-4 fw-bold mb-0" id="weather-temp">
                        —
                    </h1>

                    <h5 class="text-muted" id="weather-condition">
                        Fetching...
                    </h5>

                </div>

                <hr>

                <div class="row text-center g-3">

                    <div class="col-4">

                        <div class="border rounded-4 p-3">

                            <small class="text-muted d-block">
                                Humidity
                            </small>

                            <strong id="weather-humidity">—</strong>

                        </div>

                    </div>

                    <div class="col-4">

                        <div class="border rounded-4 p-3">

                            <small class="text-muted d-block">
                                Wind
                            </small>

                            <strong id="weather-wind">—</strong>

                        </div>

                    </div>

                    <div class="col-4">

                        <div class="border rounded-4 p-3">

                            <small class="text-muted d-block">
                                Pressure
                            </small>

                            <strong id="weather-pressure">—</strong>

                        </div>

                    </div>

                </div>

                <div class="mt-4">

                    <div class="progress rounded-pill" style="height:10px;">

                        <div class="progress-bar bg-success" id="weather-humidity-bar"
                             role="progressbar"
                             style="width:0%">
                        </div>

                    </div>

                    <small class="text-muted" id="weather-desc">Data cuaca realtime dari Open-Meteo API.</small>

                </div>

            </div>

        </div>

    </div>



<div class="row g-4 mt-1">

    <div class="col-lg-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    📊 Economic Indicators
                </h5>

            </div>

            <div class="card-body">

                <table class="table table-borderless align-middle mb-0">

                    <tr>

                        <td>GDP Growth</td>

                        <td class="text-end fw-bold text-success">
                            +5.2%
                        </td>

                    </tr>

                    <tr>

                        <td>Unemployment</td>

                        <td class="text-end fw-bold">
                            5.3%
                        </td>

                    </tr>

                    <tr>

                        <td>Exports</td>

                        <td class="text-end fw-bold">
                            {{ $economy['exports'] ?? 'N/A' }}
                        </td>

                    </tr>

                    <tr>

                        <td>Imports</td>

                        <td class="text-end fw-bold">
                            {{ $economy['imports'] ?? 'N/A' }}
                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>
</div>



@push('scripts')
<script>

        // 3. Weather API — fetch langsung dari browser ke open-meteo.com (bypass PHP cURL SSL issue)
        const countryLat  = {{ $country['latitude']  ?? 0 }};
        const countryLng  = {{ $country['longitude'] ?? 0 }};

        function getWeatherEmoji(code) {
            if (code === 0) return '☀️';
            if ([1, 2].includes(code)) return '🌤';
            if (code === 3) return '☁️';
            if ([45, 48].includes(code)) return '🌫️';
            if ([51, 53, 55].includes(code)) return '🌦️';
            if ([61, 63, 65].includes(code)) return '🌧️';
            if ([71, 73, 75].includes(code)) return '🌨️';
            if ([80, 81, 82].includes(code)) return '🌧️';
            if (code === 95) return '⛈️';
            return '🌡️';
        }

        function getWeatherDesc(code) {
            if (code === 0) return 'Clear Sky';
            if ([1, 2, 3].includes(code)) return 'Partly Cloudy';
            if ([45, 48].includes(code)) return 'Fog';
            if ([51, 53, 55].includes(code)) return 'Drizzle';
            if ([61, 63, 65].includes(code)) return 'Rain';
            if ([71, 73, 75].includes(code)) return 'Snow';
            if ([80, 81, 82].includes(code)) return 'Rain Shower';
            if (code === 95) return 'Thunderstorm';
            return 'Unknown';
        }

        if (countryLat !== 0 || countryLng !== 0) {
            const weatherUrl = `https://api.open-meteo.com/v1/forecast?latitude=${countryLat}&longitude=${countryLng}&current=temperature_2m,relative_humidity_2m,wind_speed_10m,pressure_msl,weather_code`;

            fetch(weatherUrl)
                .then(res => res.json())
                .then(data => {
                    const current = data.current;
                    if (!current) return;

                    const temp      = current.temperature_2m;
                    const humidity  = current.relative_humidity_2m;
                    const wind      = current.wind_speed_10m;
                    const pressure  = current.pressure_msl;
                    const wcode     = current.weather_code;

                    document.getElementById('weather-icon').innerText      = getWeatherEmoji(wcode);
                    document.getElementById('weather-temp').innerText      = `${temp}°C`;
                    document.getElementById('weather-condition').innerText = getWeatherDesc(wcode);
                    document.getElementById('weather-humidity').innerText  = `${humidity}%`;
                    document.getElementById('weather-wind').innerText      = `${wind} km/h`;
                    document.getElementById('weather-pressure').innerText  = `${pressure ? Math.round(pressure) : '-'} hPa`;
                    document.getElementById('weather-humidity-bar').style.width = `${humidity}%`;
                    document.getElementById('weather-source').innerText   = '● Live — Open-Meteo';
                    document.getElementById('weather-source').className   = 'text-success small';
                    document.getElementById('weather-desc').innerText     = `Cuaca realtime: ${getWeatherDesc(wcode)}, kelembaban ${humidity}%.`;
                })
                .catch(err => {
                    document.getElementById('weather-icon').innerText      = '❓';
                    document.getElementById('weather-temp').innerText      = 'N/A';
                    document.getElementById('weather-condition').innerText = 'Unavailable';
                    document.getElementById('weather-source').innerText   = 'API tidak tersedia';
                    document.getElementById('weather-source').className   = 'text-danger small';
                    console.error('Weather API error:', err);
                });
        } else {
            document.getElementById('weather-icon').innerText      = '📍';
            document.getElementById('weather-temp').innerText      = 'N/A';
            document.getElementById('weather-condition').innerText = 'Koordinat tidak tersedia';
            document.getElementById('weather-source').innerText   = 'No coordinates';
        }

        // 4. Currency API — fetch langsung dari open.er-api.com
        const currencyCode = "{{ $country['currency_code'] ?? '' }}";
        const currencyName = "{{ $country['currency_name'] ?? 'N/A' }}";
        
        if (currencyCode && currencyCode !== '-' && currencyCode !== 'N/A') {
            document.getElementById('stat-currency-code').innerText = currencyCode;
            document.getElementById('stat-currency-name').innerText = currencyName;
            document.getElementById('currency-code').innerText = currencyCode;
            document.getElementById('currency-name').innerText = currencyName;
            
            fetch(`https://open.er-api.com/v6/latest/${currencyCode}`)
                .then(res => res.json())
                .then(data => {
                    if (data && data.result === 'success') {
                        document.getElementById('currency-source').innerText = '● Live — Exchange Rate API';
                        document.getElementById('currency-source').className = 'text-success small';
                        document.getElementById('currency-desc').innerText = `Data kurs realtime berdasarkan mata uang dasar ${currencyCode}.`;
                        
                        // Symbol - we don't always get symbol from APIs easily, we'll just show the code if we don't have it
                        document.getElementById('currency-symbol').innerText = currencyCode;
                        
                        const rates = data.rates;
                        if (rates) {
                            const usdRate = rates.USD ? (1 / rates.USD).toFixed(2) : '-';
                            const eurRate = rates.EUR ? (1 / rates.EUR).toFixed(2) : '-';
                            
                            document.getElementById('currency-vs-usd').innerText = rates.USD ? `${rates.USD.toFixed(4)} USD` : '-';
                            document.getElementById('currency-vs-eur').innerText = rates.EUR ? `${rates.EUR.toFixed(4)} EUR` : '-';
                            
                            // Build table of major currencies
                            const majorCurrencies = ['USD', 'EUR', 'GBP', 'JPY', 'AUD', 'SGD', 'CNY'];
                            let tableHtml = '';
                            
                            majorCurrencies.forEach(cur => {
                                if (cur !== currencyCode && rates[cur]) {
                                    tableHtml += `
                                        <tr>
                                            <td class="text-start fw-semibold">1 ${currencyCode} to ${cur}</td>
                                            <td class="text-end text-primary fw-bold">${rates[cur].toFixed(4)}</td>
                                        </tr>
                                    `;
                                }
                            });
                            
                            if (tableHtml) {
                                document.getElementById('currency-rates-table').innerHTML = tableHtml;
                            } else {
                                document.getElementById('currency-rates-table').innerHTML = '<tr><td colspan="2" class="text-center text-muted"><small>Data kurs tidak tersedia</small></td></tr>';
                            }
                        }
                    } else {
                        handleCurrencyError();
                    }
                })
                .catch(err => {
                    console.error('Currency API error:', err);
                    handleCurrencyError();
                });
        } else {
            handleCurrencyError();
            document.getElementById('stat-currency-code').innerText = 'N/A';
            document.getElementById('stat-currency-name').innerText = 'Unknown Currency';
            document.getElementById('currency-code').innerText = 'N/A';
            document.getElementById('currency-name').innerText = 'Unknown Currency';
        }
        
        function handleCurrencyError() {
            document.getElementById('currency-source').innerText = 'API tidak tersedia';
            document.getElementById('currency-source').className = 'text-danger small';
            document.getElementById('currency-desc').innerText = 'Gagal memuat data kurs mata uang.';
            document.getElementById('currency-rates-table').innerHTML = '<tr><td colspan="2" class="text-center text-danger"><small>Gagal memuat data</small></td></tr>';
        }
</script>
@endpush
@endsection