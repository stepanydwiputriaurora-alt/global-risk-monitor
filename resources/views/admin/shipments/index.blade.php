@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Kelola Tracking Pengiriman</h2>
        <p class="text-muted mb-0">Daftar semua resi dan status pengiriman saat ini.</p>
    </div>
    <a href="{{ route('admin.shipments.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus me-2"></i> Buat Resi Baru
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card dashboard-card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 fw-semibold border-bottom-0 py-3">Tracking Number</th>
                        <th class="fw-semibold border-bottom-0 py-3">Produk</th>
                        <th class="fw-semibold border-bottom-0 py-3">Asal & Tujuan</th>
                        <th class="fw-semibold border-bottom-0 py-3">Status Terkini</th>
                        <th class="pe-4 text-end fw-semibold border-bottom-0 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($shipments as $shipment)
                    <tr>
                        <td class="ps-4 fw-bold text-primary">{{ $shipment->tracking_number }}</td>
                        <td>{{ $shipment->product_name }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="small text-muted">Dari: {{ $shipment->origin_country }}</span>
                                <span class="small fw-semibold">Ke: {{ $shipment->destination_country }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-primary-subtle text-primary">{{ $shipment->status }}</span><br>
                            <small class="text-muted"><i class="fa-solid fa-location-dot me-1"></i>{{ $shipment->current_country }}</small>
                        </td>
                        <td class="pe-4 text-end">
                            <a href="{{ route('admin.shipments.edit', $shipment->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-pen-to-square"></i> Kelola
                            </a>
                            <form action="{{ route('admin.shipments.destroy', $shipment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data resi ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-box-open fa-3x mb-3 text-light"></i>
                            <p class="mb-0">Belum ada data pengiriman.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($shipments->hasPages())
    <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
        {{ $shipments->links() }}
    </div>
    @endif
</div>
@endsection
