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
                                    <th width="180">Product</th>
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

                        <div class="card-body">

                            @if($shipment->status == 'Pending')

                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">✅ Shipment Created</li>
                                    <li class="list-group-item text-warning fw-bold">🟡 Waiting for Departure</li>
                                    <li class="list-group-item text-muted">⚪ In Transit</li>
                                    <li class="list-group-item text-muted">⚪ Arrived Destination</li>
                                    <li class="list-group-item text-muted">⚪ Delivered</li>

                                </ul>

                            @elseif($shipment->status == 'In Transit')

                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">✅ Shipment Created</li>
                                    <li class="list-group-item">✅ Departed {{ $shipment->origin_port }}</li>
                                    <li class="list-group-item fw-bold text-success">🚢 In Transit</li>
                                    <li class="list-group-item text-muted">⚪ Arrived {{ $shipment->destination_port }}</li>
                                    <li class="list-group-item text-muted">⚪ Delivered</li>

                                </ul>

                            @elseif($shipment->status == 'Arrived')

                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">✅ Shipment Created</li>
                                    <li class="list-group-item">✅ Departed {{ $shipment->origin_port }}</li>
                                    <li class="list-group-item">✅ Arrived {{ $shipment->destination_port }}</li>
                                    <li class="list-group-item">✅ Customs Clearance</li>
                                    <li class="list-group-item text-primary fw-bold">📦 Delivered</li>

                                </ul>

                            @elseif($shipment->status == 'Delayed')

                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">✅ Shipment Created</li>
                                    <li class="list-group-item">✅ Departed {{ $shipment->origin_port }}</li>
                                    <li class="list-group-item text-danger fw-bold">❌ Shipment Delayed</li>
                                    <li class="list-group-item text-muted">⚪ Awaiting Update</li>
                                    <li class="list-group-item text-muted">⚪ Delivered</li>

                                </ul>

                            @endif

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

                <a href="{{ route('home') }}" class="btn btn-primary">

                    ← Back to Dashboard

                </a>

            </div>

        </div>

    </div>

</div>

@endsection