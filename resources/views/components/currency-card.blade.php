<div class="card dashboard-card currency-card h-100">

    {{-- Header --}}
    <div class="card-header bg-transparent border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="fa-solid fa-money-bill-trend-up text-success me-2"></i>

                Currency Exchange

            </h5>

            <a href="#" class="small text-decoration-none fw-semibold" data-bs-toggle="modal" data-bs-target="#currencyAllModal">

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

                <span id="currency-update-time">Updated --:-- WIB</span>

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

{{-- Modal: All Exchange Rates --}}
<div class="modal fade" id="currencyAllModal" tabindex="-1" aria-labelledby="currencyAllModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <div>
                    <h5 class="modal-title fw-bold mb-1" id="currencyAllModalLabel">
                        <i class="fa-solid fa-globe text-primary me-2"></i>All Exchange Rates
                    </h5>
                    <small class="text-muted">Base currency: USD — <span id="modal-update-time">Memuat...</span></small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3">
                <input type="text" id="currency-search" class="form-control mb-3" placeholder="🔍 Search currency code or name...">
                <div id="modal-currency-list">
                    <div class="text-center text-muted py-4">
                        <div class="spinner-border spinner-border-sm me-2" role="status"></div> Memuat semua kurs...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const fallbackRates = {
            "USD": 1, "IDR": 16000, "EUR": 0.92, "GBP": 0.79,
            "JPY": 150, "AUD": 1.52, "SGD": 1.35, "MYR": 4.7, "CNY": 7.2,
            "HKD": 7.83, "CHF": 0.9, "CAD": 1.36, "KRW": 1340, "THB": 35,
            "PHP": 57, "INR": 83, "BRL": 5.0, "ZAR": 18.5, "AED": 3.67
        };

        let allRatesData = {};

        const currencyNames = (() => {
            try { return new Intl.DisplayNames(['en'], { type: 'currency' }); } catch(e) { return null; }
        })();

        function getCurrencyName(code) {
            if (currencyNames) { try { return currencyNames.of(code); } catch(e) {} }
            return code;
        }

        function populateCard(rates, timestamp) {
            const idr = rates.IDR || 16000;
            const eur = rates.EUR || 0.92;
            const sgd = rates.SGD || 1.35;
            const cny = rates.CNY || 7.2;
            const jpy = rates.JPY || 150;

            document.querySelector('.currency-value').innerText = `Rp${idr.toLocaleString('id-ID')}`;

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

            if (timestamp) {
                const date = new Date(timestamp * 1000);
                const timeStr = date.toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'});
                document.getElementById('currency-update-time').innerHTML = `<i class="fa-regular fa-clock me-1"></i>Updated ${timeStr} WIB`;
                document.getElementById('modal-update-time').innerText = `Updated ${timeStr} WIB`;
            } else {
                document.getElementById('modal-update-time').innerText = 'Using offline fallback data';
            }
        }

        function renderModalTable(rates, query = '') {
            const idr = rates['IDR'] || 16000;
            const tbody = document.getElementById('modal-currency-list');
            const entries = Object.entries(rates);
            const filtered = query
                ? entries.filter(([code]) =>
                    code.toLowerCase().includes(query.toLowerCase()) ||
                    getCurrencyName(code).toLowerCase().includes(query.toLowerCase()))
                : entries;

            if (filtered.length === 0) {
                tbody.innerHTML = `<div class="text-center text-muted py-3">Tidak ada mata uang yang cocok.</div>`;
                return;
            }

            let html = `<table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th class="text-end">Rate vs USD</th>
                        <th class="text-end">Equiv. in IDR</th>
                    </tr>
                </thead><tbody>`;

            for (const [code, rate] of filtered) {
                const name = getCurrencyName(code);
                const equivIDR = code === 'IDR' ? idr : ((1 / rate) * idr);
                const formattedRate = rate >= 1000
                    ? rate.toLocaleString('en-US', {maximumFractionDigits: 2})
                    : rate.toLocaleString('en-US', {maximumFractionDigits: 4});
                html += `<tr>
                    <td><span class="badge bg-primary-subtle text-primary fw-bold">${code}</span></td>
                    <td class="text-muted small">${name}</td>
                    <td class="text-end fw-semibold">${formattedRate}</td>
                    <td class="text-end text-success fw-bold">Rp${equivIDR.toLocaleString('id-ID', {maximumFractionDigits: 0})}</td>
                </tr>`;
            }

            html += `</tbody></table>`;
            tbody.innerHTML = html;
        }

        // Search in modal
        const searchInput = document.getElementById('currency-search');
        searchInput.addEventListener('input', function() {
            if (Object.keys(allRatesData).length > 0) {
                renderModalTable(allRatesData, this.value);
            }
        });

        // When modal opens, render table
        document.getElementById('currencyAllModal').addEventListener('show.bs.modal', function() {
            if (Object.keys(allRatesData).length > 0) {
                renderModalTable(allRatesData, searchInput.value);
            }
        });

        // Fetch rates
        async function loadRates() {
            try {
                const controller = new AbortController();
                const tid = setTimeout(() => controller.abort(), 4000);
                const res = await fetch('https://open.er-api.com/v6/latest/USD', { signal: controller.signal });
                clearTimeout(tid);
                if (!res.ok) throw new Error('API error');
                const data = await res.json();
                if (data && data.rates) {
                    allRatesData = data.rates;
                    populateCard(data.rates, data.time_last_update_unix ?? null);
                    return;
                }
            } catch (e) {
                console.warn('Live rates failed, using fallback:', e);
            }
            // Fallback
            allRatesData = fallbackRates;
            populateCard(fallbackRates, null);
        }

        loadRates();
    });
</script>
@endpush