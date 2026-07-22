@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Tracking Shipment
        </h2>

        <p class="text-muted mb-0">
            Track shipment status in real time.
        </p>

    </div>

</div>

<div class="card shadow-sm border-0 rounded-4">

    <div class="card-body p-4">

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                <i class="fa-solid fa-circle-exclamation me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('tracking.search') }}" method="GET">

            <div class="row g-3">

                <div class="col-lg-10">

                    <input
                        type="text"
                        name="tracking_number"
                        class="form-control form-control-lg"
                        placeholder="Enter Tracking Number">

                </div>

                <div class="col-lg-2">

                    <button
                        class="btn btn-primary w-100 h-100">

                        <i class="fa-solid fa-magnifying-glass me-2"></i>

                        Search

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection