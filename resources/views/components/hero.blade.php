<div class="hero-card">

    <div class="row align-items-center">

        {{-- LEFT --}}
        <div class="col-lg-8">

            <h4 class="fw-bold mb-3">
                Track Your Shipment
            </h4>

            {{-- Tracking --}}
            <form action="{{ route('tracking.search') }}" method="GET">

                <div class="mb-3">

                    <input
                        type="text"
                        name="tracking_number"
                        class="form-control hero-input"
                        placeholder="Masukkan Tracking Number (Contoh: GRM-2026-000001)">

                </div>

                <button class="btn btn-primary hero-btn">

                    <i class="fa-solid fa-magnifying-glass me-2"></i>

                    Search

                </button>

            </form>

            {{-- Country --}}
            <div class="mt-4">

                <label class="form-label fw-semibold">

                    Pilih Negara untuk Analisis

                </label>

                <div class="row g-3">

                    <div class="col-md-8">

                        <select class="form-select hero-input">

                            <option>🇮🇩 Indonesia</option>
                            <option>🇸🇬 Singapore</option>
                            <option>🇲🇾 Malaysia</option>
                            <option>🇨🇳 China</option>

                        </select>

                    </div>

                    <div class="col-md-4">

                        <button class="btn btn-outline-primary hero-btn w-100">

                            <i class="fa-solid fa-chart-line me-2"></i>

                            Lihat Analisis

                        </button>

                    </div>

                </div>

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