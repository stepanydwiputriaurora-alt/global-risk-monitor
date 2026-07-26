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

    <div class="col-xl-8 col-lg-8 col-md-7">

        @include('components.map-card')

    </div>

    <div class="col-xl-4 col-lg-4 col-md-5">

        @include('components.weather-card')

    </div>

</div>




{{-- ===========================
CHART + NEWS + CURRENCY
=========================== --}}
<div class="row g-4 mt-1">

    <div class="col-xl-8 col-lg-8">

        @include('components.chart-card')

    </div>

    <div class="col-xl-4 col-lg-4">

        @include('components.news-card')

    </div>

</div>




@endsection