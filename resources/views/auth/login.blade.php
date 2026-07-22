@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            
            <div class="text-center mb-4">
                <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-3" style="width: 64px; height: 64px;">
                    <i class="fa-solid fa-globe fa-2x"></i>
                </div>
                <h3 class="fw-bold mb-1">Welcome Back</h3>
                <p class="text-muted">Sign in to Global Risk Monitor</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 pb-0">
                            <ul class="mb-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted">Email Address</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fa-solid fa-envelope text-muted"></i>
                                </span>
                                <input type="email" name="email" class="form-control bg-light border-start-0 ps-0" placeholder="admin@globalrisk.monitor" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted">Password</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fa-solid fa-lock text-muted"></i>
                                </span>
                                <input type="password" name="password" class="form-control bg-light border-start-0 ps-0" placeholder="••••••••" required>
                            </div>
                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold">
                                Sign In
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            
            <div class="text-center mt-4">
                <small class="text-muted">
                    Test Admin: admin@gmail.com | 12345678<br>
                    Test User: user@gmail.com | 12345678
                </small>
            </div>

        </div>
    </div>
</div>
@endsection
