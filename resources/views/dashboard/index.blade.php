@extends('layouts.app')

@section('content')

@include('components.hero')

@include('components.dashboard-statistic')

<div class="row mt-4">

    <!-- MAP -->
    <div class="col-lg-8">

        @include('components.map-card')

    </div>

    <!-- PANEL KANAN -->
    <div class="col-lg-4">

        @include('components.weather-card')

        <div class="mt-4">

            @include('components.currency-card')

        </div>

        <div class="mt-4">

            @include('components.tracking-card')

        </div>

    </div>

</div>

@endsection