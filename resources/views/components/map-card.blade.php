<div class="card border-0 shadow rounded-4 h-100">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="mb-0">

                🌍 Global Risk Map

            </h5>

            <select class="form-select w-auto">

                <option>Peta Risiko</option>

            </select>

        </div>

    </div>

    <div class="card-body p-0">

        <div id="worldMap"
             style="height:520px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;">
        </div>

    </div>

</div>

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    var map = L.map('worldMap').setView([20, 0], 2);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

        attribution: '&copy; OpenStreetMap'

    }).addTo(map);

});

</script>

@endpush