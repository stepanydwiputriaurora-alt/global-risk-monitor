@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Edit User</h2>
        <p class="text-muted mb-0">Perbarui informasi akun pengguna.</p>
    </div>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">

                {{-- User Info Header --}}
                <div class="d-flex align-items-center gap-3 mb-4 pb-4 border-bottom">
                    <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white" style="width: 56px; height: 56px; font-size: 1.2rem; background: {{ $user->role === 'admin' ? 'linear-gradient(135deg, #667eea, #764ba2)' : 'linear-gradient(135deg, #11998e, #38ef7d)' }};">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0">{{ $user->name }}</h5>
                        <small class="text-muted">Terdaftar sejak {{ $user->created_at->format('d M Y') }}</small>
                    </div>
                    @if($user->id === auth()->id())
                        <span class="badge bg-primary ms-auto px-3 py-2 rounded-pill">Akun Anda</span>
                    @endif
                </div>

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">
                            <i class="fa-solid fa-user me-1 text-primary"></i> Nama Lengkap
                        </label>
                        <input type="text" class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">
                            <i class="fa-solid fa-envelope me-1 text-primary"></i> Email
                        </label>
                        <input type="email" class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="mb-4">
                        <label for="role" class="form-label fw-semibold">
                            <i class="fa-solid fa-shield-halved me-1 text-primary"></i> Role
                        </label>
                        <select class="form-select form-select-lg rounded-3 @error('role') is-invalid @enderror"
                                id="role" name="role" required>
                            <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">
                            <i class="fa-solid fa-lock me-1 text-primary"></i> Password Baru
                            <span class="text-muted fw-normal">(kosongkan jika tidak diubah)</span>
                        </label>
                        <input type="password" class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror"
                               id="password" name="password" placeholder="Masukkan password baru...">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">
                            <i class="fa-solid fa-lock me-1 text-primary"></i> Konfirmasi Password Baru
                        </label>
                        <input type="password" class="form-control form-control-lg rounded-3"
                               id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru...">
                    </div>

                    {{-- Submit --}}
                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-3">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-lg px-4 rounded-3">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
