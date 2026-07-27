@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Admin Dashboard</h2>
        <p class="text-muted mb-0">Kelola sistem, pengguna, dan konten data.</p>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Shipment Tracking Card -->
    <div class="col-md-3">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-body p-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center bg-warning-subtle text-warning rounded-circle mb-3" style="width: 64px; height: 64px;">
                    <i class="fa-solid fa-box-open fa-2x"></i>
                </div>
                <h5 class="fw-bold mb-2">Tracking Barang</h5>
                <p class="text-muted small mb-4">Kelola resi pengiriman, perbarui status dan timeline perjalanan.</p>
                <a href="{{ route('admin.shipments.index') }}" class="btn btn-warning text-dark w-100 fw-semibold">Kelola Resi</a>
            </div>
        </div>
    </div>

    <!-- User Management Card -->
    <div class="col-md-3">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-body p-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle mb-3" style="width: 64px; height: 64px;">
                    <i class="fa-solid fa-users fa-2x"></i>
                </div>
                <h5 class="fw-bold mb-2">User</h5>
                <p class="text-muted small mb-4">Kelola hak akses pengguna, tambah, atau nonaktifkan akun.</p>
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary w-100 fw-semibold">Kelola User</a>
            </div>
        </div>
    </div>

    <!-- Port Dataset Card -->
    <div class="col-md-3">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-body p-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center bg-info-subtle text-info rounded-circle mb-3" style="width: 64px; height: 64px;">
                    <i class="fa-solid fa-anchor fa-2x"></i>
                </div>
                <h5 class="fw-bold mb-2">Dataset Pelabuhan</h5>
                <p class="text-muted small mb-4">Perbarui data statistik, status, dan informasi pelabuhan global.</p>
                <a href="{{ route('admin.ports.index') }}" class="btn btn-info text-white w-100 fw-semibold">Kelola Dataset</a>
            </div>
        </div>
    </div>

    <!-- Analysis Articles Card -->
    <div class="col-md-3">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-body p-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center bg-success-subtle text-success rounded-circle mb-3" style="width: 64px; height: 64px;">
                    <i class="fa-solid fa-newspaper fa-2x"></i>
                </div>
                <h5 class="fw-bold mb-2">Artikel Analisis</h5>
                <p class="text-muted small mb-4">Buat, edit, atau hapus artikel berita analitik dan laporan risiko.</p>
                <button class="btn btn-success w-100 fw-semibold">Kelola Artikel</button>
            </div>
        </div>
    </div>
</div>


@endsection
