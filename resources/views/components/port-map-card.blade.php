<div class="card shadow-sm border-0 rounded-4">

    <div class="card-header bg-white border-0">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="fa-solid fa-anchor text-primary me-2"></i>

                Port Location Map

            </h5>

            <a href="#" class="small text-decoration-none">

                View All

            </a>

        </div>

    </div>

    <div class="card-body">

        <div class="input-group mb-3">

            <span class="input-group-text">

                <i class="fa-solid fa-magnifying-glass"></i>

            </span>

            <input
                type="text"
                class="form-control"
                placeholder="Search Port...">

        </div>

        <div id="portMap"
             style="height:260px;border-radius:15px;">
        </div>

        <div class="d-flex justify-content-center gap-4 mt-3 flex-wrap">

            <small>

                <span class="badge bg-success me-2">&nbsp;</span>

                Operational

            </small>

            <small>

                <span class="badge bg-warning text-dark me-2">&nbsp;</span>

                Congested

            </small>

            <small>

                <span class="badge bg-danger me-2">&nbsp;</span>

                Delayed

            </small>

        </div>

    </div>

</div>

@push('scripts')

<script>

document.addEventListener("DOMContentLoaded", function () {

    let portMap = L.map('portMap').setView([18, 105], 3);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

        attribution: '&copy; OpenStreetMap'

    }).addTo(portMap);

    const ports = [

        {
            name: "⚓ Tanjung Priok",
            status: "🟢 Operational",
            lat: -6.1049,
            lng: 106.8860
        },

        {
            name: "⚓ Port of Singapore",
            status: "🟢 Operational",
            lat: 1.2644,
            lng: 103.8406
        },

        {
            name: "⚓ Port of Shanghai",
            status: "🟡 Congested",
            lat: 31.2304,
            lng: 121.4737
        },

        {
            name: "⚓ Port of Rotterdam",
            status: "🔴 Delayed",
            lat: 51.9244,
            lng: 4.4777
        }

    ];

    ports.forEach(function(port){

        L.marker([port.lat, port.lng])

            .addTo(portMap)

            .bindPopup(`

                <div style="min-width:170px">

                    <strong>${port.name}</strong>

                    <br>

                    ${port.status}

                </div>

            `);

    });

    setTimeout(function(){

        portMap.invalidateSize();

    },500);

});

</script>

@endpush