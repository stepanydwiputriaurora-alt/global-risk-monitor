<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Risk Monitor</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            🌍 Global Risk Monitor
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="/">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Shipments
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Countries
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Weather
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        News
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- Hero -->
<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="display-4 fw-bold text-primary">
            Global Risk Monitor
        </h1>

        <p class="lead text-secondary">
            Real-Time Supply Chain Intelligence
        </p>

    </div>

    <!-- Search -->
    <div class="card shadow-lg border-0 mb-5">

        <div class="card-body p-5">

            <h3 class="text-center mb-4">

                <i class="fa-solid fa-box"></i>

                Track Your Shipment

            </h3>

            <form action="{{ route('tracking.search') }}" method="GET">

                <div class="input-group input-group-lg">

                    <input
                        type="text"
                        name="tracking_number"
                        class="form-control"
                        placeholder="Enter Tracking Number (Example: GRM-2026-000001)"
                        required>

                    <button class="btn btn-primary">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        Search

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Dashboard Cards -->
    <div class="row g-4">

        <div class="col-md-3">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fa-solid fa-box fa-2x text-primary mb-3"></i>

                    <h2>0</h2>

                    <p class="mb-0">
                        Active Shipment
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fa-solid fa-earth-asia fa-2x text-success mb-3"></i>

                    <h2>250+</h2>

                    <p class="mb-0">
                        Countries
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fa-solid fa-triangle-exclamation fa-2x text-danger mb-3"></i>

                    <h2>0</h2>

                    <p class="mb-0">
                        High Risk
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fa-solid fa-newspaper fa-2x text-warning mb-3"></i>

                    <h2>0</h2>

                    <p class="mb-0">
                        News Today
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Recent Shipment -->
    <div class="card shadow border-0 mt-5">

        <div class="card-header bg-primary text-white">

            <i class="fa-solid fa-clock-rotate-left"></i>

            Recent Shipment

        </div>

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                <tr>

                    <th>Tracking Number</th>

                    <th>Product</th>

                    <th>Status</th>

                    <th>Current Location</th>

                </tr>

                </thead>

                <tbody>

                <tr>

                    <td colspan="4" class="text-center text-secondary">

                        No shipment available

                    </td>

                </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>