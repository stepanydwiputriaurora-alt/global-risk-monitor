<div class="hero-card">

    <div class="row align-items-center">

        {{-- LEFT --}}
        <div class="col-lg-8">

            <h4 class="fw-bold mb-3">
                Pilih Negara untuk Analisis Risiko
            </h4>

        {{-- Country --}}
        <div class="mt-2">

            <form action="{{ route('countries') }}" method="GET">

                <div class="row g-3">

                    <div class="col-md-8">

                        <select name="country" class="form-select hero-input">
                            @foreach($countries as $c)
                                <option value="{{ $c['name'] }}">{{ $c['name'] }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-4">

                        <button type="submit" class="btn btn-outline-primary hero-btn w-100">

                            <i class="fa-solid fa-chart-line me-2"></i>

                            Lihat Analisis

                        </button>

                    </div>

                </div>

            </form>

        </div>

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-4 text-center">

            <img
                src="{{ asset('images/cargo-ship.png') }}"
                class="hero-image-small"
                alt="Cargo Ship">

        </div>

    </div>

</div>