@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Settings</h2>
        <p class="text-muted mb-0">Manage your application preferences.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-4 col-lg-4">
        <div class="card dashboard-card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action p-4 active border-0" style="background-color: var(--bs-primary); color: white;">
                        <i class="fa-solid fa-user me-3"></i> Account Profile
                    </a>
                    <a href="#" class="list-group-item list-group-item-action p-4 border-0 border-bottom">
                        <i class="fa-solid fa-bell me-3 text-muted"></i> Notification Preferences
                    </a>
                    <a href="#" class="list-group-item list-group-item-action p-4 border-0 border-bottom">
                        <i class="fa-solid fa-shield-halved me-3 text-muted"></i> Security
                    </a>
                    <a href="#" class="list-group-item list-group-item-action p-4 border-0">
                        <i class="fa-solid fa-key me-3 text-muted"></i> API Keys
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-8 col-lg-8">
        <div class="card dashboard-card border-0 shadow-sm rounded-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">Account Profile</h5>
                <small class="text-muted">Update your personal information</small>
            </div>
            <div class="card-body p-4">
                <form>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">First Name</label>
                            <input type="text" class="form-control form-control-lg bg-light" value="Admin" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Last Name</label>
                            <input type="text" class="form-control form-control-lg bg-light" value="User" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-medium">Email Address</label>
                            <input type="email" class="form-control form-control-lg bg-light" value="admin@globalrisk.monitor" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-medium">Company / Organization</label>
                            <input type="text" class="form-control form-control-lg bg-light" value="Global Risk Monitor Inc." readonly>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="button" class="btn btn-primary btn-lg px-5" disabled>Save Changes (Demo Mode)</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
