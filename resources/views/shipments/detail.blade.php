@extends('layouts.app')

@section('content')

@php
$statusColor = match($shipment->status){
    'Pending' => 'warning',
    'In Transit' => 'success',
    'Delayed' => 'danger',
    'Arrived' => 'primary',
    default => 'secondary'
};
@endphp

<div class="container-fluid">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold mb-1">
                        Shipment Detail
                    </h2>

                    <p class="text-muted mb-0">
                        Tracking Number :
                        <strong>{{ $shipment->tracking_number }}</strong>
                    </p>

                </div>

                <span class="badge bg-{{ $statusColor }} fs-6 px-4 py-2">
                    {{ $shipment->status }}
                </span>

            </div>

            <div class="row">

                <div class="col-lg-6">

                    <div class="card border rounded-4 shadow-sm mb-4">

                        <div class="card-header bg-white">

                            <h5 class="fw-bold mb-0">
                                Shipment Information
                            </h5>

                        </div>

                        <div class="card-body">

                            <table class="table table-borderless align-middle">

                                <tr>
                                    <th width="180">Order Date</th>
                                    <td>{{ $shipment->created_at->format('d M Y, H:i') }}</td>
                                </tr>

                                <tr>
                                    <th>Product</th>
                                    <td>{{ $shipment->product_name }}</td>
                                </tr>

                                <tr>
                                    <th>Origin</th>
                                    <td>
                                        {{ $shipment->origin_port }},
                                        {{ $shipment->origin_country }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Destination</th>
                                    <td>
                                        {{ $shipment->destination_port }},
                                        {{ $shipment->destination_country }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Current Location</th>
                                    <td>
                                        {{ $shipment->current_port }},
                                        {{ $shipment->current_country }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Container</th>
                                    <td>{{ $shipment->container_number }}</td>
                                </tr>

                                <tr>
                                    <th>Estimated Arrival</th>
                                    <td>{{ $shipment->estimated_arrival }}</td>
                                </tr>

                                <tr>
                                    <th>Actual Arrival</th>
                                    <td>{{ $shipment->actual_arrival ?? '-' }}</td>
                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card border rounded-4 shadow-sm mb-4">

                        <div class="card-header bg-white">

                            <h5 class="fw-bold mb-0">
                                Shipment Progress
                            </h5>

                        </div>

                            <div class="timeline-container px-2 py-3">
                                @forelse($shipment->events as $event)
                                    <div class="d-flex mb-4 position-relative">
                                        @if(!$loop->last)
                                            <div class="position-absolute" style="left: 19px; top: 35px; bottom: -25px; width: 2px; background-color: #e9ecef;"></div>
                                        @endif
                                        
                                        <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center flex-shrink-0 z-1" style="width: 38px; height: 38px;">
                                            <i class="{{ $event->icon }}" style="font-size: 14px;"></i>
                                        </div>
                                        <div class="ms-3 pt-1">
                                            <h6 class="fw-bold mb-1">{{ $event->status }}</h6>
                                            <p class="text-muted small mb-1">
                                                <i class="fa-solid fa-location-dot me-1 text-danger"></i> {{ $event->location }}
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
                                    <p class="text-muted text-center py-4 mb-0">Belum ada pembaruan riwayat perjalanan.</p>
                                @endforelse
                            </div>

                    </div>

                    <div class="card border rounded-4 shadow-sm">

                        <div class="card-header bg-white">

                            <h5 class="fw-bold mb-0">
                                Shipment Summary
                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="row text-center">

                                <div class="col-4">

                                    <h6 class="text-muted">
                                        Origin
                                    </h6>

                                    <strong>
                                        {{ $shipment->origin_country }}
                                    </strong>

                                </div>

                                <div class="col-4">

                                    <h6 class="text-muted">
                                        Current
                                    </h6>

                                    <strong>
                                        {{ $shipment->current_country }}
                                    </strong>

                                </div>

                                <div class="col-4">

                                    <h6 class="text-muted">
                                        Destination
                                    </h6>

                                    <strong>
                                        {{ $shipment->destination_country }}
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="mt-4">

                <a href="{{ route('tracking') }}" class="btn btn-primary">

                    ← Back to Tracking

                </a>

            </div>

        </div>

    </div>

</div>

@endsection