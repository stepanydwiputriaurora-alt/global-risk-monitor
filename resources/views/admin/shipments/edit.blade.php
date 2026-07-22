@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Kelola Resi: <span class="text-primary">{{ $shipment->tracking_number }}</span></h2>
        <p class="text-muted mb-0">Perbarui status barang dan tambahkan riwayat perjalanan.</p>
    </div>
    <a href="{{ route('admin.shipments.index') }}" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-2"></i> Kembali
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row g-4">
    <!-- Kolom Kiri: Form Update Info Dasar -->
    <div class="col-xl-5">
        <div class="card dashboard-card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
                <h6 class="fw-bold mb-0">Update Status & Info</h6>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.shipments.update', $shipment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status Saat Ini</label>
                        <select name="status" class="form-select" required>
                            <option value="Pending" {{ $shipment->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="In Transit" {{ $shipment->status == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                            <option value="Delayed" {{ $shipment->status == 'Delayed' ? 'selected' : '' }}>Delayed</option>
                            <option value="Arrived" {{ $shipment->status == 'Arrived' ? 'selected' : '' }}>Arrived</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lokasi Negara Terkini</label>
                        <input type="text" name="current_country" class="form-control" value="{{ $shipment->current_country }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Produk/Barang</label>
                        <input type="text" name="product_name" class="form-control" value="{{ $shipment->product_name }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tanggal Tiba Aktual (Opsional)</label>
                        <input type="date" name="actual_arrival" class="form-control" value="{{ $shipment->actual_arrival ? \Carbon\Carbon::parse($shipment->actual_arrival)->format('Y-m-d') : '' }}">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-semibold">Simpan Perubahan Info</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Timeline & Tambah Event -->
    <div class="col-xl-7">
        <div class="card dashboard-card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0">Riwayat Perjalanan (Timeline)</h6>
            </div>
            <div class="card-body p-4">
                
                <!-- Form Tambah Event -->
                <div class="bg-light p-3 rounded-4 mb-4">
                    <h6 class="fw-bold mb-3 text-primary"><i class="fa-solid fa-plus-circle me-2"></i>Tambah Pembaruan (Log)</h6>
                    <form action="{{ route('admin.shipments.update', $shipment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="add_event" value="1">
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Status (e.g. In Transit)</label>
                                <input type="text" name="event_status" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Lokasi (e.g. Singapore Port)</label>
                                <input type="text" name="event_location" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Waktu Pembaruan</label>
                                <input type="datetime-local" name="event_date_time" class="form-control form-control-sm" value="{{ now()->format('Y-m-d\TH:i') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Icon (Opsional)</label>
                                <select name="event_icon" class="form-select form-select-sm">
                                    <option value="fa-solid fa-box">Box</option>
                                    <option value="fa-solid fa-ship">Ship</option>
                                    <option value="fa-solid fa-truck">Truck</option>
                                    <option value="fa-solid fa-plane">Plane</option>
                                    <option value="fa-solid fa-check-circle">Check (Arrived)</option>
                                    <option value="fa-solid fa-triangle-exclamation">Warning</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold">Keterangan / Deskripsi</label>
                                <input type="text" name="event_description" class="form-control form-control-sm" placeholder="Catatan tambahan bila ada">
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-sm btn-primary w-100 fw-semibold">Tambah Pembaruan</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Timeline List -->
                <div class="timeline-container px-2">
                    @forelse($shipment->events as $event)
                        <div class="d-flex mb-4 position-relative">
                            <!-- Timeline line -->
                            @if(!$loop->last)
                                <div class="position-absolute" style="left: 19px; top: 40px; bottom: -20px; width: 2px; background-color: #e9ecef;"></div>
                            @endif
                            
                            <div class="bg-primary-subtle text-primary rounded-circle d-flex justify-content-center align-items-center flex-shrink-0 z-1" style="width: 40px; height: 40px;">
                                <i class="{{ $event->icon }}"></i>
                            </div>
                            <div class="ms-3 pt-1">
                                <h6 class="fw-bold mb-1">{{ $event->status }}</h6>
                                <p class="text-muted small mb-1">
                                    <i class="fa-solid fa-location-dot me-1"></i> {{ $event->location }}
                                </p>
                                @if($event->description)
                                    <p class="text-secondary small mb-1">{{ $event->description }}</p>
                                @endif
                                <small class="text-muted" style="font-size: 0.75rem;">
                                    {{ \Carbon\Carbon::parse($event->date_time)->format('d M Y, H:i') }}
                                </small>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted small">Belum ada riwayat perjalanan.</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
