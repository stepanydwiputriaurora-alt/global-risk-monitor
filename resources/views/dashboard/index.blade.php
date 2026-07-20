@extends('layouts.app')

@section('content')

{{-- ===========================
HERO
=========================== --}}
@include('components.hero')


{{-- ===========================
STATISTIC
=========================== --}}
<div class="mt-4">
    @include('components.dashboard-statistic')
</div>


{{-- ===========================
MAP + WEATHER
=========================== --}}
<div class="row g-4 mt-1">

    <div class="col-xl-8 col-lg-8">

        @include('components.map-card')

    </div>

    <div class="col-xl-4 col-lg-4">

        @include('components.weather-card')

    </div>

</div>


{{-- ===========================
TRACKING + CURRENCY
=========================== --}}
<div class="row g-4 mt-1">

    <div class="col-xl-8 col-lg-8">

        @include('components.tracking-card')

    </div>

    <div class="col-xl-4 col-lg-4">

        @include('components.currency-card')

    </div>

</div>


{{-- ===========================
CHART + NEWS
=========================== --}}
<div class="row g-4 mt-1">

    <div class="col-xl-8 col-lg-8">

        @include('components.chart-card')

    </div>

    <div class="col-xl-4 col-lg-4">

        @include('components.news-card')

    </div>

</div>


{{-- ===========================
BOTTOM SECTION
=========================== --}}
<div class="row g-4 mt-1 mb-3">

    <div class="col-xl-4 col-lg-4 col-md-6">

        @include('components.comparison-card')

    </div>

    <div class="col-xl-4 col-lg-4 col-md-6">

        @include('components.favorite-card')

    </div>

    <div class="col-xl-4 col-lg-4">

        @include('components.port-map-card')

    </div>

</div>

@endsection