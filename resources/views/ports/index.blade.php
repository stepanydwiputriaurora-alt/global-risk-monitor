@extends('layouts.app')

@section('content')

{{-- ── CSS & Flag Icons ─────────────────────────────────────────────────────── --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.3/css/flag-icons.min.css">

<style>
/* ── Page header badge ─────────────────────────────────────── */
.port-header-badge {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 5px 14px; border-radius: 20px; font-size: .78rem; font-weight: 600;
}

/* ── Card shared ───────────────────────────────────────────── */
.port-card { border-radius: 16px; border: none; box-shadow: 0 2px 12px rgba(0,0,0,.07); }
.port-card .card-header { border-radius: 16px 16px 0 0; border: none; }

/* ── Map ────────────────────────────────────────────────────── */
#portMap { height: 320px; border-radius: 12px; z-index: 0; }
.map-search-wrap { position: relative; margin-bottom: 12px; }
.map-search-wrap .map-search-icon {
    position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
    color: #94a3b8; font-size: .75rem; pointer-events: none;
}
.map-search-wrap input {
    padding-left: 34px; border-radius: 10px;
    font-size: .82rem; border-color: #e2e8f0;
}
.map-search-wrap input:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,.12); }

/* ── Map legend ─────────────────────────────────────────────── */
.map-legend { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; margin-top: 10px; }
.map-legend span { font-size: .76rem; display: flex; align-items: center; gap: 5px; color: #64748b; }
.dot-large  { width:10px;height:10px;border-radius:50%;background:#22c55e;display:inline-block; }
.dot-medium { width:10px;height:10px;border-radius:50%;background:#3b82f6;display:inline-block; }
.dot-small  { width:10px;height:10px;border-radius:50%;background:#f59e0b;display:inline-block; }

/* ── Table ──────────────────────────────────────────────────── */
#portTable { font-size: .82rem; }
#portTable thead th {
    font-size: .72rem; font-weight: 700; color: #64748b;
    text-transform: uppercase; letter-spacing: .05em;
    background: #f8fafc; border-bottom: 1px solid #e2e8f0;
    padding: 12px 14px; white-space: nowrap;
    position: sticky; top: 0; z-index: 1;
}
#portTable tbody td { padding: 10px 14px; vertical-align: middle; border-color: #f1f5f9; }
#portTable tbody tr:hover { background: rgba(59,130,246,.04); }

/* ── Port icon ──────────────────────────────────────────────── */
.port-icon-wrap {
    width: 32px; height: 32px; border-radius: 50%;
    background: rgba(37,99,235,.1); display: flex;
    align-items: center; justify-content: center;
    font-size: .72rem; color: #2563eb; flex-shrink: 0;
}

/* ── Scrollbar ──────────────────────────────────────────────── */
.port-table-wrap { max-height: 440px; overflow-y: auto; }
.port-table-wrap::-webkit-scrollbar { width: 4px; }
.port-table-wrap::-webkit-scrollbar-track { background: #f1f5f9; }
.port-table-wrap::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
</style>

{{-- ── Page Header ─────────────────────────────────────────────────────────── --}}
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h2 class="fw-bold mb-1">Port Dashboard</h2>
        <p class="text-muted mb-0" style="font-size:.86rem;">
            Data live dari
            <a href="https://msi.nga.mil" target="_blank" rel="noopener" class="fw-semibold text-primary text-decoration-none">
                NGA World Port Index
            </a>
            — 1 pelabuhan terbesar per negara
        </p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <span class="port-header-badge bg-primary bg-opacity-10 text-primary">
            <i class="fa-solid fa-anchor"></i> {{ count($ports) }} Negara
        </span>
        <span class="port-header-badge bg-success bg-opacity-10 text-success">
            <i class="fa-solid fa-circle" style="font-size:.5rem;"></i> Live WPI API
        </span>
    </div>
</div>

<div class="row g-4">

    {{-- ══════════════════════════════════════════════════════════════
         LEFT: PORT MAP (Leaflet + WPI markers dari $ports)
         ══════════════════════════════════════════════════════════════ --}}
    <div class="col-xl-6 col-lg-6">
        <div class="card port-card h-100">
            <div class="card-header bg-white pt-4 px-4 pb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-0">
                            <i class="fa-solid fa-map-location-dot text-primary me-2"></i>
                            Port Location Map
                        </h5>
                        <small class="text-muted">Klik marker untuk detail pelabuhan</small>
                    </div>
                    <span class="badge bg-light text-muted fw-normal" style="font-size:.7rem;">
                        {{ count($ports) }} markers
                    </span>
                </div>
            </div>
            <div class="card-body pt-0 px-4 pb-4">

                {{-- Map search --}}
                <div class="map-search-wrap">
                    <i class="fa-solid fa-magnifying-glass map-search-icon"></i>
                    <select
                        id="mapSearchInput"
                        class="form-select"
                        style="padding-left:34px; border-radius:10px; font-size:.82rem; border-color:#e2e8f0; cursor:pointer;"
                        autocomplete="off">
                        <option value="">Pilih Negara di Peta...</option>
                        @foreach($ports as $port)
                            <option value="{{ strtolower($port['country']) }}">{{ $port['country'] }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Leaflet map container --}}
                <div id="portMap"></div>

                {{-- Legend --}}
                <div class="map-legend">
                    <span><i class="dot-large"></i> Large</span>
                    <span><i class="dot-medium"></i> Medium</span>
                    <span><i class="dot-small"></i> Small / Very Small</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════
         RIGHT: PORT STATUS TABLE (1 per country, WPI data)
         ══════════════════════════════════════════════════════════════ --}}
    <div class="col-xl-6 col-lg-6">
        <div class="card port-card h-100">
            <div class="card-header bg-white pt-4 px-4 pb-3">
                <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap">
                    <div>
                        <h5 class="fw-bold mb-0">
                            <i class="fa-solid fa-ship text-primary me-2"></i>
                            Port Status List
                        </h5>
                        <small class="text-muted">World Port Index — 1 pelabuhan terbesar per negara</small>
                    </div>
                    {{-- Search box --}}
                    <div class="input-group input-group-sm" style="width:200px; flex-shrink:0;">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="fa-solid fa-earth-asia" style="font-size:.7rem; color:#94a3b8;"></i>
                        </span>
                        <select
                            id="tableSearchInput"
                            class="form-select border-start-0 ps-0"
                            style="font-size:.78rem; cursor:pointer;">
                            <option value="">Semua Negara</option>
                            @foreach($ports as $port)
                                <option value="{{ strtolower($port['country']) }}">{{ $port['country'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="port-table-wrap">
                    <table class="table table-hover mb-0" id="portTable">
                        <thead>
                            <tr>
                                <th class="ps-4">Pelabuhan</th>
                                <th>Negara</th>
                                <th>Lokasi</th>
                                <th>Ukuran</th>
                            </tr>
                        </thead>
                        <tbody id="portTableBody">
                            @forelse($ports as $port)
                            <tr class="port-row"
                                data-name="{{ strtolower($port['name']) }}"
                                data-country="{{ strtolower($port['country']) }}"
                                data-lat="{{ $port['latitude'] ?? '' }}"
                                data-lng="{{ $port['longitude'] ?? '' }}"
                                style="cursor:pointer;"
                                onclick="flyToPort({{ $port['latitude'] ?? 'null' }}, {{ $port['longitude'] ?? 'null' }}, '{{ addslashes($port['name']) }}')">

                                {{-- Pelabuhan --}}
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="port-icon-wrap">
                                            <i class="fa-solid fa-anchor"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold" style="color:#1e293b; line-height:1.3;">
                                                {{ $port['name'] }}
                                            </div>
                                            @if(!empty($port['unlo_code']))
                                            <div style="font-size:.67rem; color:#94a3b8; font-family:monospace;">
                                                {{ $port['unlo_code'] }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                {{-- Negara + bendera --}}
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        @if(!empty($port['country_code']))
                                        <span class="fi fi-{{ strtolower($port['country_code']) }}"
                                              style="font-size:1.15rem; border-radius:3px;"
                                              title="{{ $port['country'] }}"></span>
                                        @endif
                                        <div>
                                            <div style="font-weight:600; color:#334155; line-height:1.3;">
                                                {{ $port['country'] }}
                                            </div>
                                            @if(!empty($port['region']))
                                            <div style="font-size:.66rem; color:#94a3b8;">{{ $port['region'] }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                {{-- Koordinat --}}
                                <td>
                                    @if(!is_null($port['latitude']) && !is_null($port['longitude']))
                                    <span style="font-size:.73rem; font-family:monospace; color:#475569; white-space:nowrap;">
                                        <i class="fa-solid fa-location-dot text-primary me-1" style="font-size:.6rem;"></i>
                                        {{ number_format((float)$port['latitude'],  3) }}°,
                                        {{ number_format((float)$port['longitude'], 3) }}°
                                    </span>
                                    @else
                                    <span class="text-muted">—</span>
                                    @endif
                                </td>

                                {{-- Ukuran --}}
                                <td>
                                    @php
                                        $sz = $port['harbor_size'] ?? 'Unknown';
                                        $szClass = match($sz) {
                                            'Large'      => 'success',
                                            'Medium'     => 'primary',
                                            'Small'      => 'warning',
                                            'Very Small' => 'secondary',
                                            default      => 'light',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $szClass }}-subtle text-{{ $szClass }} fw-semibold"
                                          style="font-size:.67rem;">
                                        {{ $sz }}
                                    </span>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-triangle-exclamation fa-2x mb-2 d-block text-warning"></i>
                                    Data pelabuhan tidak tersedia.<br>
                                    <small>Pastikan koneksi ke NGA WPI API aktif.</small>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Footer --}}
                <div class="px-4 py-3 border-top d-flex align-items-center justify-content-between"
                     style="background:#f8fafc; border-radius:0 0 16px 16px;">
                    <small class="text-muted">
                        <i class="fa-solid fa-database text-primary me-1"></i>
                        <strong>NGA World Port Index</strong> — msi.nga.mil
                    </small>
                    <small id="tableCount" class="text-muted fw-semibold">
                        {{ count($ports) }} negara
                    </small>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

{{-- ── Scripts: Map + Search (in @push so it runs AFTER Leaflet is loaded) ── --}}
@push('scripts')
<script>
// ── Port data dari PHP controller ────────────────────────────────────────────
const WPI_PORTS = @json($ports);

// ── Leaflet map setup ────────────────────────────────────────────────────────
let portMap;
let allMarkers = [];

function getMarkerColor(harborSize) {
    switch (harborSize) {
        case 'Large':      return '#22c55e';
        case 'Medium':     return '#3b82f6';
        case 'Small':      return '#f59e0b';
        case 'Very Small': return '#94a3b8';
        default:           return '#64748b';
    }
}

function makeCircleIcon(color) {
    const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14">
        <circle cx="7" cy="7" r="6" fill="${color}" stroke="white" stroke-width="2"/>
    </svg>`;
    return L.divIcon({
        html: svg,
        className: '',
        iconSize: [14, 14],
        iconAnchor: [7, 7],
        popupAnchor: [0, -8]
    });
}

document.addEventListener('DOMContentLoaded', function () {

    // ── Init map ─────────────────────────────────────────────────────────────
    portMap = L.map('portMap', { zoomControl: true }).setView([20, 15], 2);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
        maxZoom: 18
    }).addTo(portMap);

    // ── Plot markers ──────────────────────────────────────────────────────────
    WPI_PORTS.forEach(function (port) {
        if (port.latitude == null || port.longitude == null) return;

        const color  = getMarkerColor(port.harbor_size);
        const icon   = makeCircleIcon(color);
        const lat    = parseFloat(port.latitude);
        const lng    = parseFloat(port.longitude);

        const marker = L.marker([lat, lng], { icon: icon })
            .addTo(portMap)
            .bindPopup(`
                <div style="min-width:180px;font-family:Inter,sans-serif;">
                    <div style="font-weight:700;font-size:.88rem;color:#1e293b;margin-bottom:4px;">
                        ⚓ ${port.name}
                    </div>
                    <div style="font-size:.78rem;color:#64748b;margin-bottom:6px;">
                        ${port.country}
                        ${port.region ? '<span style="color:#94a3b8;"> · ' + port.region + '</span>' : ''}
                    </div>
                    <div style="font-size:.73rem;font-family:monospace;color:#475569;">
                        ${lat.toFixed(3)}°, ${lng.toFixed(3)}°
                    </div>
                    <div style="margin-top:6px;">
                        <span style="background:${color}22;color:${color};padding:2px 8px;
                              border-radius:10px;font-size:.68rem;font-weight:600;">
                            ${port.harbor_size}
                        </span>
                        ${port.unlo_code ? '<span style="font-size:.67rem;color:#94a3b8;margin-left:6px;">'+port.unlo_code+'</span>' : ''}
                    </div>
                </div>
            `);

        allMarkers.push({ marker, port });
    });

    // Fix tile rendering setelah layout selesai
    setTimeout(() => portMap.invalidateSize(), 300);

    // ── Map search ────────────────────────────────────────────────────────────
    const mapSearchInput = document.getElementById('mapSearchInput');
    if (mapSearchInput) {
        mapSearchInput.addEventListener('change', function () {
            const q = this.value.trim().toLowerCase();
            if (!q) return;

            const found = allMarkers.find(function (m) {
                return m.port.country.toLowerCase() === q;
            });

            if (found && found.port.latitude != null) {
                portMap.setView([found.port.latitude, found.port.longitude], 7, { animate: true });
                found.marker.openPopup();
            }
        });
    }

    // ── Table search ──────────────────────────────────────────────────────────
    const tableSearchInput = document.getElementById('tableSearchInput');
    const portRows         = document.querySelectorAll('.port-row');
    const tableCount       = document.getElementById('tableCount');
    const totalRows        = portRows.length;

    if (tableSearchInput) {
        tableSearchInput.addEventListener('change', function () {
            const q = this.value.trim().toLowerCase();
            let visible = 0;

            portRows.forEach(function (row) {
                const countryMatch = (row.dataset.country || '').includes(q);
                const show = !q || countryMatch;
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            tableCount.textContent = q
                ? visible + ' dari ' + totalRows + ' negara'
                : totalRows + ' negara';
        });
    }
});

// ── Fly to port saat klik baris tabel ────────────────────────────────────────
function flyToPort(lat, lng, name) {
    if (lat == null || lng == null || !portMap) return;
    portMap.setView([lat, lng], 8, { animate: true });

    const found = allMarkers.find(function (m) {
        return m.port.name === name;
    });
    if (found) found.marker.openPopup();
}
</script>
@endpush
