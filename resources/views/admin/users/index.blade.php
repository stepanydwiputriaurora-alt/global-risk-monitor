@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Kelola User</h2>
        <p class="text-muted mb-0">Manajemen pengguna sistem.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-user-plus me-1"></i> Tambah User
        </a>
    </div>
</div>

{{-- Stats Cards --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-3 d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle" style="width: 48px; height: 48px; flex-shrink: 0;">
                    <i class="fa-solid fa-users fa-lg"></i>
                </div>
                <div>
                    <div class="text-muted small">Total User</div>
                    <div class="fw-bold fs-5">{{ $totalUsers }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-3 d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-danger-subtle text-danger rounded-circle" style="width: 48px; height: 48px; flex-shrink: 0;">
                    <i class="fa-solid fa-user-shield fa-lg"></i>
                </div>
                <div>
                    <div class="text-muted small">Admin</div>
                    <div class="fw-bold fs-5">{{ $totalAdmins }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-3 d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-success-subtle text-success rounded-circle" style="width: 48px; height: 48px; flex-shrink: 0;">
                    <i class="fa-solid fa-user fa-lg"></i>
                </div>
                <div>
                    <div class="text-muted small">User Biasa</div>
                    <div class="fw-bold fs-5">{{ $totalRegular }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Alerts --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check me-1"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation me-1"></i> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- Users Table --}}
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Terdaftar</th>
                        <th class="pe-4 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                    <tr>
                        <td class="ps-4">{{ $users->firstItem() + $index }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white" style="width: 36px; height: 36px; flex-shrink: 0; font-size: 0.8rem; background: {{ $user->role === 'admin' ? 'linear-gradient(135deg, #667eea, #764ba2)' : 'linear-gradient(135deg, #11998e, #38ef7d)' }};">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $user->name }}</div>
                                    @if($user->id === auth()->id())
                                        <span class="badge bg-primary-subtle text-primary" style="font-size: 0.65em;">Anda</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                    <i class="fa-solid fa-shield-halved me-1"></i> Admin
                                </span>
                            @else
                                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                    <i class="fa-solid fa-user me-1"></i> User
                                </span>
                            @endif
                        </td>
                        <td class="text-muted">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="pe-4 text-end">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary" title="Edit User">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user {{ $user->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus User">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada user terdaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $users->links() }}
    </div>
</div>
@endsection
