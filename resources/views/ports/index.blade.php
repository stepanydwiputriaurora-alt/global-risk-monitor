@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Port Dashboard</h2>
        <p class="text-muted mb-0">Monitor port congestion and activities globally.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-6 col-lg-6">
        @include('components.port-map-card')
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">Port Status List</h5>
                <small class="text-muted">Detailed monitoring metrics</small>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Port Name</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Congestion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(['Singapore', 'Rotterdam', 'Shanghai', 'Los Angeles'] as $port)
                            <tr>
                                <td class="fw-semibold">{{ $port }}</td>
                                <td><span class="text-muted">Global</span></td>
                                <td><span class="badge bg-success-subtle text-success">Normal</span></td>
                                <td>Low</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
