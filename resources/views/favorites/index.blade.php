@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            ⭐ Favorite Countries
        </h2>

        <p class="text-muted mb-0">
            Manage countries you have marked as favorites.
        </p>

    </div>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white border-0">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">
                Favorite List
            </h5>

            <span class="badge bg-warning text-dark">
                {{ $favorites->count() }} Countries
            </span>

        </div>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        @if($favorites->count())

        <div class="table-responsive">

            <table class="table align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Country</th>
                        <th>Risk</th>
                        <th>Score</th>
                        <th width="120">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($favorites as $favorite)

                    <tr>

                        <td>
                            @if(filter_var($favorite->flag, FILTER_VALIDATE_URL))
                                <img src="{{ $favorite->flag }}" alt="Flag" style="width: 30px; height: auto;" class="me-2 rounded shadow-sm">
                            @else
                                {{ $favorite->flag }}
                            @endif
                            {{ $favorite->country_name }}
                        </td>

                        <td>

                            @if($favorite->risk == 'Low Risk')

                                <span class="badge bg-success">

                                    {{ $favorite->risk }}

                                </span>

                            @elseif($favorite->risk == 'Medium Risk')

                                <span class="badge bg-warning text-dark">

                                    {{ $favorite->risk }}

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    {{ $favorite->risk }}

                                </span>

                            @endif

                        </td>

                        <td class="fw-bold">

                            {{ $favorite->score }}

                        </td>

                        <td>

                            <form action="{{ route('favorites.destroy',$favorite->id) }}"
                                  method="POST">

                                @csrf

                                @method('DELETE')

                                <button
                                    class="btn btn-outline-danger btn-sm">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        <div class="text-center py-5">

            <i class="fa-regular fa-star fa-4x text-warning mb-3"></i>

            <h5>

                No Favorite Countries

            </h5>

            <p class="text-muted">

                Add your favorite countries from the Countries page.

            </p>

            <a href="{{ route('countries') }}"
               class="btn btn-warning">

                Go to Countries

            </a>

        </div>

        @endif

    </div>

</div>

@endsection