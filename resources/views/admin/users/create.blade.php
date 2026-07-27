@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Tambah User Baru</h2>
        <p class="text-muted mb-0">Buat akun pengguna baru ke dalam sistem.</p>
    </div>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">
                            <i class="fa-solid fa-user me-1 text-primary"></i> Nama Lengkap
                        </label>
                        <input type="text" class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
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
                               id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
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
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">
                            <i class="fa-solid fa-lock me-1 text-primary"></i> Password
                        </label>
                        <input type="password" class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror"
                               id="password" name="password" placeholder="Minimal 6 karakter" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">
                            <i class="fa-solid fa-lock me-1 text-primary"></i> Konfirmasi Password
                        </label>
                        <input type="password" class="form-control form-control-lg rounded-3"
                               id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                    </div>

                    {{-- Submit --}}
                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-3">
                            <i class="fa-solid fa-user-plus me-1"></i> Simpan User
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-lg px-4 rounded-3">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
