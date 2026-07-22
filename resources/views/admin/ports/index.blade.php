@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Dataset Pelabuhan (World Port Index)</h2>
        <p class="text-muted mb-0">Manajemen data pelabuhan global yang tersinkronisasi dari World Port Index.</p>
    </div>
    <form action="{{ route('admin.ports.sync') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary" onclick="return confirm('Mulai proses sinkronisasi dari API World Port Index? Ini mungkin membutuhkan waktu beberapa saat.')">
            <i class="fa-solid fa-rotate me-2"></i> Tarik Data API
        </button>
    </form>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show rounded-4" role="alert">
        <i class="fa-solid fa-circle-exclamation me-2"></i>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card dashboard-card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 fw-semibold border-bottom-0 py-3">No</th>
                        <th class="fw-semibold border-bottom-0 py-3">Nama Pelabuhan</th>
                        <th class="fw-semibold border-bottom-0 py-3">Negara</th>
                        <th class="fw-semibold border-bottom-0 py-3">Latitude</th>
                        <th class="fw-semibold border-bottom-0 py-3">Longitude</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ports as $index => $port)
                    <tr>
                        <td class="ps-4">{{ $ports->firstItem() + $index }}</td>
                        <td class="fw-bold text-primary">{{ $port->port_name }}</td>
                        <td>
                            @if($port->country)
                                <img src="{{ $port->country->flag }}" alt="flag" width="20" class="me-2 rounded-sm border">
                                {{ $port->country->name }}
                            @else
                                <span class="text-muted">Tidak diketahui</span>
                            @endif
                        </td>
                        <td>{{ $port->latitude }}</td>
                        <td>{{ $port->longitude }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-anchor fa-3x mb-3 text-light"></i>
                            <p class="mb-0">Belum ada data pelabuhan. Silakan klik tombol "Tarik Data API".</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($ports->hasPages())
    <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
        {{ $ports->links() }}
    </div>
    @endif
</div>
@endsection
