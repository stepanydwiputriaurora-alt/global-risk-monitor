<div class="card comparison-card mt-4">

    <div class="card-header bg-transparent border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">
                <i class="fa-solid fa-globe text-primary me-2"></i>
                Country Comparison
            </h5>

            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-info-subtle text-info" id="compare-source-badge">
                    <i class="fa-solid fa-circle me-1" style="font-size:.5rem;"></i> World Bank
                </span>
                <a href="{{ route('comparison') }}" class="small text-decoration-none fw-semibold">
                    Full Comparison →
                </a>
            </div>

        </div>

    </div>

    <div class="card-body">

        {{-- Country Selector --}}
        <div class="row align-items-center mb-4 g-3">

            <div class="col-md-5">
                <label class="form-label text-muted small fw-semibold mb-1">Country A</label>
                <select class="form-select" id="compare-c1" style="font-size:.9rem;">
                    <option value="">Loading countries...</option>
                </select>
            </div>

            <div class="col-md-2 text-center">
                <i class="fa-solid fa-right-left fs-3 text-primary mt-3 d-block"></i>
            </div>

            <div class="col-md-5">
                <label class="form-label text-muted small fw-semibold mb-1">Country B</label>
                <select class="form-select" id="compare-c2" style="font-size:.9rem;">
                    <option value="">Loading countries...</option>
                </select>
            </div>

        </div>

        <div class="text-center mb-3">
            <button class="btn btn-primary btn-sm px-4" id="compare-btn">
                <i class="fa-solid fa-magnifying-glass me-1"></i> Compare Now
            </button>
        </div>

        {{-- Loading --}}
        <div id="compare-loading" class="text-center py-3 d-none">
            <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
            <span class="ms-2 text-muted small">Fetching live data...</span>
        </div>

        {{-- Comparison Table --}}
        <div id="compare-result" class="table-responsive d-none">
            <table class="table comparison-table align-middle">
                <thead>
                    <tr>
                        <th>Indicator</th>
                        <th id="th-c1">Country A</th>
                        <th id="th-c2">Country B</th>
                    </tr>
                </thead>
                <tbody id="compare-tbody">
                </tbody>
            </table>
        </div>

        {{-- Empty state --}}
        <div id="compare-empty" class="text-center py-4">
            <i class="fa-solid fa-globe-asia text-muted fa-2x mb-2 d-block"></i>
            <p class="text-muted small mb-0">Select two countries and click <strong>Compare Now</strong></p>
        </div>

        {{-- Error state --}}
        <div id="compare-error" class="alert alert-danger small d-none">
            <i class="fa-solid fa-circle-exclamation me-2"></i>
            <span id="compare-error-msg">Failed to load comparison data.</span>
        </div>

    </div>

</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const selectC1    = document.getElementById('compare-c1');
    const selectC2    = document.getElementById('compare-c2');
    const btnCompare  = document.getElementById('compare-btn');
    const loadingEl   = document.getElementById('compare-loading');
    const resultEl    = document.getElementById('compare-result');
    const emptyEl     = document.getElementById('compare-empty');
    const errorEl     = document.getElementById('compare-error');
    const errorMsgEl  = document.getElementById('compare-error-msg');
    const tbodyEl     = document.getElementById('compare-tbody');
    const thC1        = document.getElementById('th-c1');
    const thC2        = document.getElementById('th-c2');

    // Load countries into selects
    fetch('/api/countries-list')
        .then(res => res.json())
        .then(countries => {
            selectC1.innerHTML = '<option value="">— Select Country A —</option>';
            selectC2.innerHTML = '<option value="">— Select Country B —</option>';

            countries.forEach(c => {
                const opt1 = new Option(`${c.name}`, c.code);
                const opt2 = new Option(`${c.name}`, c.code);
                selectC1.add(opt1);
                selectC2.add(opt2);
            });

            // Default selections: Indonesia & Australia
            selectC1.value = 'ID';
            selectC2.value = 'AU';
        })
        .catch(() => {
            selectC1.innerHTML = '<option value="ID">Indonesia</option><option value="AU">Australia</option><option value="US">United States</option><option value="CN">China</option><option value="DE">Germany</option><option value="JP">Japan</option>';
            selectC2.innerHTML = '<option value="AU">Australia</option><option value="ID">Indonesia</option><option value="US">United States</option><option value="CN">China</option><option value="DE">Germany</option><option value="JP">Japan</option>';
        });

    btnCompare.addEventListener('click', function () {
        const c1 = selectC1.value;
        const c2 = selectC2.value;

        if (!c1 || !c2) {
            alert('Please select both countries.');
            return;
        }
        if (c1 === c2) {
            alert('Please select two different countries.');
            return;
        }

        doCompare(c1, c2);
    });

    function doCompare(c1, c2) {
        // Show loading, hide others
        loadingEl.classList.remove('d-none');
        resultEl.classList.add('d-none');
        emptyEl.classList.add('d-none');
        errorEl.classList.add('d-none');

        fetch(`/api/compare?c1=${c1}&c2=${c2}`)
            .then(res => res.json())
            .then(json => {
                loadingEl.classList.add('d-none');

                if (!json.success || !json.data) {
                    showError(json.message || 'No data returned.');
                    return;
                }

                renderResult(json.data);
            })
            .catch(err => {
                loadingEl.classList.add('d-none');
                showError('Network error. Please try again.');
            });
    }

    function renderResult(data) {
        const c1 = data.country1;
        const c2 = data.country2;

        // Update table headers
        thC1.innerHTML = `<img src="${c1.flag}" width="20" class="me-1 rounded-1"> ${c1.name}`;
        thC2.innerHTML = `<img src="${c2.flag}" width="20" class="me-1 rounded-1"> ${c2.name}`;

        // Build risk badge
        const riskBadge = (risk) =>
            `<span class="badge bg-${risk.class}-subtle text-${risk.class}">${risk.label} (${risk.score})</span>`;

        tbodyEl.innerHTML = `
            <tr>
                <td><i class="fa-solid fa-chart-line me-2 text-success"></i>GDP</td>
                <td>${c1.gdp}</td>
                <td>${c2.gdp}</td>
            </tr>
            <tr>
                <td><i class="fa-solid fa-fire me-2 text-warning"></i>Inflation</td>
                <td>${c1.inflation}</td>
                <td>${c2.inflation}</td>
            </tr>
            <tr>
                <td><i class="fa-solid fa-people-group me-2 text-info"></i>Population</td>
                <td>${c1.population}</td>
                <td>${c2.population}</td>
            </tr>
            <tr>
                <td><i class="fa-solid fa-shield-halved me-2 text-danger"></i>Risk Level</td>
                <td>${riskBadge(c1.risk)}</td>
                <td>${riskBadge(c2.risk)}</td>
            </tr>
            <tr>
                <td><i class="fa-solid fa-temperature-half me-2 text-primary"></i>Temperature</td>
                <td>${c1.temperature}</td>
                <td>${c2.temperature}</td>
            </tr>
            <tr>
                <td><i class="fa-solid fa-coins me-2 text-warning"></i>1 USD =</td>
                <td>${c1.currency}</td>
                <td>${c2.currency}</td>
            </tr>
        `;

        resultEl.classList.remove('d-none');
        emptyEl.classList.add('d-none');
    }

    function showError(msg) {
        errorMsgEl.textContent = msg;
        errorEl.classList.remove('d-none');
        emptyEl.classList.remove('d-none');
    }
});
</script>
@endpush