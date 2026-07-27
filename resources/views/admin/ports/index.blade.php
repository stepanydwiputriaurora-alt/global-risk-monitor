@extends('layouts.admin')

@section('content')
{{-- ── CSS & Flag Icons ─────────────────────────────────────────────────────── --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.3/css/flag-icons.min.css">

<style>
/* ── Port icon ──────────────────────────────────────────────── */
.port-icon-wrap {
    width: 32px; height: 32px; border-radius: 50%;
    background: rgba(37,99,235,.1); display: flex;
    align-items: center; justify-content: center;
    font-size: .72rem; color: #2563eb; flex-shrink: 0;
}
</style>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h2 class="fw-bold mb-1">Dataset Pelabuhan (World Port Index)</h2>
        <p class="text-muted mb-0">Data live pelabuhan terbesar per negara dari NGA World Port Index.</p>
    </div>
</div>

<div class="card dashboard-card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 fw-semibold border-bottom-0 py-3">No</th>
                        <th class="fw-semibold border-bottom-0 py-3">Pelabuhan</th>
                        <th class="fw-semibold border-bottom-0 py-3">Negara</th>
                        <th class="fw-semibold border-bottom-0 py-3">Lokasi (Koordinat)</th>
                        <th class="fw-semibold border-bottom-0 py-3">Ukuran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ports as $index => $port)
                    <tr>
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                        
                        {{-- Pelabuhan --}}
                        <td>
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
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-triangle-exclamation fa-2x mb-2 d-block text-warning"></i>
                            Data pelabuhan tidak tersedia.<br>
                            <small>Pastikan koneksi ke NGA WPI API aktif.</small>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- Footer --}}
    <div class="px-4 py-3 border-top d-flex align-items-center justify-content-between bg-light rounded-bottom-4">
        <small class="text-muted">
            <i class="fa-solid fa-database text-primary me-1"></i>
            <strong>NGA World Port Index</strong> — msi.nga.mil
        </small>
        <small class="text-muted fw-semibold">
            Total: {{ count($ports) }} negara
        </small>
    </div>
</div>
@endsection
