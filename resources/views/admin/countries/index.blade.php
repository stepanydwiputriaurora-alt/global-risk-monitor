@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Dataset Negara</h2>
        <p class="text-muted mb-0">Data negara dari <strong>restcountries.com</strong> yang tersimpan di database lokal.</p>
    </div>
    <form action="{{ route('admin.countries.sync') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success" onclick="return confirm('Mulai tarik data negara dari API restcountries.com? Proses ini akan memperbarui seluruh data negara.')">
            <i class="fa-solid fa-rotate me-2"></i> Tarik Data API Negara
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
                        <th class="fw-semibold border-bottom-0 py-3">Bendera</th>
                        <th class="fw-semibold border-bottom-0 py-3">Nama Negara</th>
                        <th class="fw-semibold border-bottom-0 py-3">Kode</th>
                        <th class="fw-semibold border-bottom-0 py-3">Ibu Kota</th>
                        <th class="fw-semibold border-bottom-0 py-3">Region</th>
                        <th class="fw-semibold border-bottom-0 py-3">Mata Uang</th>
                        <th class="fw-semibold border-bottom-0 py-3">Lat / Lng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($countries as $i => $country)
                    <tr>
                        <td class="ps-4 text-muted">{{ $countries->firstItem() + $i }}</td>
                        <td>
                            @if($country->flag)
                                <img src="{{ $country->flag }}" alt="{{ $country->name }}" width="28" class="rounded border">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $country->name }}</td>
                        <td><span class="badge bg-secondary-subtle text-secondary">{{ $country->code }}</span></td>
                        <td>{{ $country->capital ?? '—' }}</td>
                        <td>{{ $country->region ?? '—' }}</td>
                        <td>{{ $country->currency }} {{ $country->currency_symbol }}</td>
                        <td class="small text-muted">{{ $country->latitude }}, {{ $country->longitude }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-earth-asia fa-3x mb-3 text-light d-block"></i>
                            <p class="mb-1 fw-semibold">Belum ada data negara.</p>
                            <p class="mb-0 small">Klik tombol <strong>"Tarik Data API Negara"</strong> di atas untuk mengambil data dari restcountries.com.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($countries->hasPages())
    <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
        {{ $countries->links() }}
    </div>
    @endif
</div>
@endsection
