@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Buat Resi Baru</h2>
        <p class="text-muted mb-0">Tambahkan data pelacakan pengiriman baru.</p>
    </div>
    <a href="{{ route('admin.shipments.index') }}" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-2"></i> Kembali
    </a>
</div>

<div class="row">
    <div class="col-xl-8">
        <div class="card dashboard-card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                
                @if ($errors->any())
                    <div class="alert alert-danger rounded-3 pb-0">
                        <ul class="mb-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.shipments.store') }}" method="POST">
                    @csrf
                    
                    <h5 class="fw-bold mb-4">Informasi Dasar</h5>
                    
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tracking Number <span class="text-danger">*</span></label>
                            <input type="text" name="tracking_number" class="form-control" placeholder="e.g. TRK-001" value="{{ old('tracking_number') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Produk/Barang <span class="text-danger">*</span></label>
                            <input type="text" name="product_name" class="form-control" placeholder="e.g. Komponen Elektronik" value="{{ old('product_name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tanggal Estimasi Tiba</label>
                            <input type="date" name="estimated_arrival" class="form-control" value="{{ old('estimated_arrival') }}">
                        </div>
                    </div>

                    <h5 class="fw-bold mb-4">Rute Pengiriman</h5>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-primary"><i class="fa-solid fa-plane-departure me-2"></i>Asal (Origin)</label>
                            <div class="mb-3">
                                <select name="origin_country" id="origin_country" class="form-select" required>
                                    <option value="" disabled selected>Pilih Negara Asal</option>
                                </select>
                            </div>
                            <div>
                                <select name="origin_port" id="origin_port" class="form-select" required>
                                    <option value="" disabled selected>Pilih Pelabuhan Asal</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-success"><i class="fa-solid fa-plane-arrival me-2"></i>Tujuan (Destination)</label>
                            <div class="mb-3">
                                <select name="destination_country" id="destination_country" class="form-select" required>
                                    <option value="" disabled selected>Pilih Negara Tujuan</option>
                                </select>
                            </div>
                            <div>
                                <select name="destination_port" id="destination_port" class="form-select" required>
                                    <option value="" disabled selected>Pilih Pelabuhan Tujuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">Simpan Resi</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    const countryData = {
        'Indonesia': { region: 'SEA', ports: ['Tanjung Priok', 'Tanjung Perak', 'Belawan'] },
        'Singapore': { region: 'SEA', ports: ['Port of Singapore', 'Jurong Port'] },
        'Malaysia': { region: 'SEA', ports: ['Port Klang', 'Tanjung Pelepas'] },
        'China': { region: 'EA', ports: ['Shanghai Port', 'Shenzhen Port', 'Ningbo-Zhoushan'] },
        'Japan': { region: 'EA', ports: ['Port of Tokyo', 'Port of Yokohama'] },
        'USA': { region: 'NA', ports: ['Port of Los Angeles', 'Port of New York', 'Port of Long Beach'] },
        'Germany': { region: 'EU', ports: ['Port of Hamburg', 'Port of Bremen'] },
        'Netherlands': { region: 'EU', ports: ['Port of Rotterdam', 'Port of Amsterdam'] }
    };

    const originCountry = document.getElementById('origin_country');
    const originPort = document.getElementById('origin_port');
    const destCountry = document.getElementById('destination_country');
    const destPort = document.getElementById('destination_port');
    const estArrival = document.querySelector('input[name="estimated_arrival"]');

    // Populate countries
    Object.keys(countryData).forEach(country => {
        originCountry.add(new Option(country, country));
        destCountry.add(new Option(country, country));
    });

    // Populate ports based on country selection
    function updatePorts(countrySelect, portSelect) {
        portSelect.innerHTML = '<option value="" disabled selected>Pilih Pelabuhan</option>';
        const selected = countrySelect.value;
        if (selected && countryData[selected]) {
            countryData[selected].ports.forEach(port => {
                portSelect.add(new Option(port, port));
            });
        }
    }

    originCountry.addEventListener('change', () => {
        updatePorts(originCountry, originPort);
        calculateETA();
    });

    destCountry.addEventListener('change', () => {
        updatePorts(destCountry, destPort);
        calculateETA();
    });

    // Calculate Estimated Arrival Date
    function calculateETA() {
        const origin = originCountry.value;
        const dest = destCountry.value;
        if (!origin || !dest) return;

        const originRegion = countryData[origin].region;
        const destRegion = countryData[dest].region;
        
        let days = 14; // default
        if (originRegion === destRegion) {
            days = 5; // Same region
        } else if ((originRegion === 'SEA' && destRegion === 'EA') || (originRegion === 'EA' && destRegion === 'SEA')) {
            days = 10;
        } else if (originRegion === 'EU' || destRegion === 'EU') {
            days = 30;
        } else if (originRegion === 'NA' || destRegion === 'NA') {
            days = 35;
        }

        const date = new Date();
        date.setDate(date.getDate() + days);
        estArrival.value = date.toISOString().split('T')[0];
    }
</script>
@endsection
