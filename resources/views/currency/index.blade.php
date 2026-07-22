@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Currency Exchange</h2>
        <p class="text-muted mb-0">Live exchange rates and currency monitoring.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-6 col-lg-6">
        @include('components.currency-card')
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">Currency Converter</h5>
                <small class="text-muted">Calculate latest rates</small>
            </div>
            <div class="card-body p-4">
                <div class="mb-3">
                    <label class="form-label">From</label>
                    <select id="from-currency" class="form-select form-select-lg">
                        <option value="USD">USD - US Dollar</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="IDR">IDR - Indonesian Rupiah</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">To</label>
                    <select id="to-currency" class="form-select form-select-lg">
                        <option value="IDR">IDR - Indonesian Rupiah</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="USD">USD - US Dollar</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label">Amount</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text fw-bold text-secondary" id="currency-symbol">$</span>
                        <input type="number" id="convert-amount" class="form-control" placeholder="Enter amount" value="100">
                    </div>
                </div>
                <button id="btn-convert" class="btn btn-primary w-100 btn-lg">Convert</button>

                <!-- Result Box (Hidden by default) -->
                <div id="conversion-result-box" class="mt-4 p-3 bg-primary-subtle rounded-3 text-center d-none">
                    <small class="text-muted fw-semibold" id="conversion-text">100 USD =</small>
                    <h3 class="fw-bold text-primary mb-0 mt-1" id="conversion-result">1,500,000 IDR</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', async function() {
    const fromSelect = document.getElementById('from-currency');
    const toSelect = document.getElementById('to-currency');
    const amountInput = document.getElementById('convert-amount');
    const symbolSpan = document.getElementById('currency-symbol');
    const btnConvert = document.getElementById('btn-convert');
    const resultBox = document.getElementById('conversion-result-box');
    const conversionText = document.getElementById('conversion-text');
    const conversionResult = document.getElementById('conversion-result');

    btnConvert.innerText = "Loading rates...";
    btnConvert.disabled = true;

    let rates = {};
    let currencyNames = null;
    try {
        currencyNames = new Intl.DisplayNames(['en'], { type: 'currency' });
    } catch(e) {
        // Fallback if browser doesn't support it
    }

    // Helper: Get symbol (e.g. $ for USD, Rp for IDR)
    function getCurrencySymbol(code) {
        try {
            const parts = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: code
            }).formatToParts(0);
            const symbolPart = parts.find(part => part.type === 'currency');
            return symbolPart ? symbolPart.value.trim() : code;
        } catch(e) {
            return code;
        }
    }

    // Helper: Get full name (e.g. Indonesian Rupiah)
    function getCurrencyName(code) {
        if (currencyNames) {
            try {
                return currencyNames.of(code);
            } catch(e) {}
        }
        return code;
    }

    function updateSymbol() {
        symbolSpan.innerText = getCurrencySymbol(fromSelect.value);
    }

    try {
        const response = await fetch('https://open.er-api.com/v6/latest/USD');
        if (!response.ok) throw new Error("API error");
        const data = await response.json();
        
        if (data && data.rates) {
            rates = data.rates;
            
            // Populate selects
            let optionsHTML = '';
            for (const currencyCode in rates) {
                const fullName = getCurrencyName(currencyCode);
                const display = fullName !== currencyCode ? `${currencyCode} - ${fullName}` : currencyCode;
                optionsHTML += `<option value="${currencyCode}">${display}</option>`;
            }
            fromSelect.innerHTML = optionsHTML;
            toSelect.innerHTML = optionsHTML;

            // Set defaults
            fromSelect.value = 'USD';
            toSelect.value = 'IDR';
            
            updateSymbol();

            btnConvert.innerText = "Convert";
            btnConvert.disabled = false;
        } else {
            throw new Error("Invalid format");
        }
    } catch (error) {
        console.error("Failed to fetch rates", error);
        btnConvert.innerText = "Error Loading API";
    }

    // Update symbol on 'From' change
    fromSelect.addEventListener('change', function() {
        updateSymbol();
        resultBox.classList.add('d-none'); // hide result on change
    });

    toSelect.addEventListener('change', function() {
        resultBox.classList.add('d-none');
    });
    
    amountInput.addEventListener('input', function() {
        resultBox.classList.add('d-none');
    });

    // Handle convert
    btnConvert.addEventListener('click', function() {
        if (Object.keys(rates).length === 0) return;

        const from = fromSelect.value;
        const to = toSelect.value;
        const amount = parseFloat(amountInput.value);

        if (isNaN(amount) || amount <= 0) return;

        // Convert to USD first (base), then to target
        const amountInUSD = amount / rates[from];
        const converted = amountInUSD * rates[to];

        // Format numbers
        const formatOptions = { maximumFractionDigits: 2, minimumFractionDigits: 0 };
        const formattedAmount = amount.toLocaleString('en-US', formatOptions);
        const formattedResult = converted.toLocaleString('en-US', formatOptions);
        
        const symFrom = getCurrencySymbol(from);
        const symTo = getCurrencySymbol(to);

        conversionText.innerText = `${symFrom} ${formattedAmount} ${from} =`;
        conversionResult.innerText = `${symTo} ${formattedResult} ${to}`;
        
        // Show result box
        resultBox.classList.remove('d-none');
    });
});
</script>
@endsection
