<div class="card dashboard-card currency-card h-100">

    {{-- Header --}}
    <div class="card-header bg-transparent border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="fa-solid fa-money-bill-trend-up text-success me-2"></i>

                Currency Exchange

            </h5>

            <a href="#" class="small text-decoration-none fw-semibold">

                View All

            </a>

        </div>

    </div>

    {{-- Body --}}
    <div class="card-body pt-0">

        {{-- Current Exchange --}}
        <div class="currency-highlight mb-4">

            <small class="text-muted">

                Current Exchange Rate

            </small>

            <h4 class="fw-bold mt-3">

                🇺🇸 USD

                <i class="fa-solid fa-arrow-right-long mx-2 text-secondary"></i>

                🇮🇩 IDR

            </h4>

            <div class="exchange-rate mt-3">

                <span class="currency-unit">

                    1 USD

                </span>

                <span class="mx-2 text-secondary">

                    =

                </span>

                <span class="currency-value">
                    Memuat...
                </span>

            </div>

            <div class="mt-3">

                <span class="badge bg-success-subtle text-success px-3 py-2">

                    <i class="fa-solid fa-arrow-trend-up me-1"></i>

                    +0.35% Today

                </span>

            </div>

            <div class="small text-muted mt-3">

                <i class="fa-regular fa-clock me-1"></i>

                Updated 10:31 WIB

            </div>

        </div>

        {{-- Currency List --}}

        <div class="currency-list">
            <div class="text-center text-muted py-3">
                <div class="spinner-border spinner-border-sm me-2" role="status"></div> Memuat kurs mata uang...
            </div>
        </div>

    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('https://api.exchangerate-api.com/v4/latest/USD')
            .then(res => res.json())
            .then(data => {
                if(data && data.rates) {
                    const idr = data.rates.IDR;
                    const eur = data.rates.EUR;
                    const sgd = data.rates.SGD;
                    const cny = data.rates.CNY;
                    const jpy = data.rates.JPY;

                    // Update main highlight
                    document.querySelector('.currency-value').innerText = `Rp${idr.toLocaleString('id-ID')}`;
                    
                    // Update list
                    const listContainer = document.querySelector('.currency-list');
                    listContainer.innerHTML = `
                        <div class="currency-row">
                            <div><strong>🇺🇸 USD / IDR</strong></div>
                            <div>Rp${idr.toLocaleString('id-ID')}</div>
                            <div class="text-success fw-semibold">Live</div>
                        </div>
                        <div class="currency-row">
                            <div><strong>🇪🇺 EUR / IDR</strong></div>
                            <div>Rp${((1/eur)*idr).toLocaleString('id-ID', {maximumFractionDigits: 0})}</div>
                            <div class="text-success fw-semibold">Live</div>
                        </div>
                        <div class="currency-row">
                            <div><strong>🇸🇬 SGD / IDR</strong></div>
                            <div>Rp${((1/sgd)*idr).toLocaleString('id-ID', {maximumFractionDigits: 0})}</div>
                            <div class="text-success fw-semibold">Live</div>
                        </div>
                        <div class="currency-row">
                            <div><strong>🇨🇳 CNY / IDR</strong></div>
                            <div>Rp${((1/cny)*idr).toLocaleString('id-ID', {maximumFractionDigits: 0})}</div>
                            <div class="text-success fw-semibold">Live</div>
                        </div>
                        <div class="currency-row border-0">
                            <div><strong>🇯🇵 JPY / IDR</strong></div>
                            <div>Rp${((1/jpy)*idr).toLocaleString('id-ID', {maximumFractionDigits: 0})}</div>
                            <div class="text-success fw-semibold">Live</div>
                        </div>
                    `;
                    
                    // Update timestamp
                    const date = new Date(data.time_last_updated * 1000);
                    const timeString = date.toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'});
                    document.querySelector('.currency-highlight .small.text-muted:last-child').innerHTML = `<i class="fa-regular fa-clock me-1"></i>Updated ${timeString} WIB`;
                }
            })
            .catch(err => console.error("Currency API error:", err));
    });
</script>
@endpush