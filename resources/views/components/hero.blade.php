<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <!-- Kiri -->
            <div class="col-lg-7">

                <span class="badge bg-primary px-3 py-2 mb-3">
                    Real-Time Supply Chain Intelligence
                </span>

                <h1 class="display-4 fw-bold mb-3">
                    🌍 Global Risk Monitor
                </h1>

                <p class="text-secondary fs-5">
                    Monitor shipment status, country risks, weather,
                    exchange rates, and global news in one platform.
                </p>

            </div>

            <!-- Kanan -->
            <div class="col-lg-5 text-center">

                <img
                    src="https://cdn-icons-png.flaticon.com/512/3082/3082037.png"
                    class="img-fluid"
                    style="max-height:260px;">

            </div>

        </div>

        <hr class="my-4">

        <div class="row">

            <!-- Tracking -->
            <div class="col-lg-8">

                <h4 class="fw-bold mb-3">

                    <i class="fa-solid fa-magnifying-glass text-primary"></i>

                    Track Your Shipment

                </h4>

                <form action="{{ route('tracking.search') }}" method="GET">

                    <div class="input-group input-group-lg">

                        <input
                            type="text"
                            name="tracking_number"
                            class="form-control"
                            placeholder="Masukkan Tracking Number (Contoh : GRM-2026-000001)"
                            required>

                        <button class="btn btn-primary px-4">

                            <i class="fa-solid fa-search"></i>

                            Search

                        </button>

                    </div>

                </form>

            </div>

            <!-- Pilih Negara -->
            <div class="col-lg-4">

                <label class="form-label fw-semibold">

                    Pilih Negara untuk Analisis

                </label>

                <select class="form-select mb-2">

                    <option selected>🇮🇩 Indonesia</option>
                    <option>🇸🇬 Singapore</option>
                    <option>🇲🇾 Malaysia</option>
                    <option>🇹🇭 Thailand</option>
                    <option>🇨🇳 China</option>
                    <option>🇯🇵 Japan</option>
                    <option>🇰🇷 South Korea</option>
                    <option>🇺🇸 United States</option>

                </select>

                <button class="btn btn-outline-primary w-100">

                    <i class="fa-solid fa-chart-column"></i>

                    Lihat Analisis

                </button>

            </div>

        </div>

    </div>

</div>