<aside class="sidebar">

    <!-- Header -->
    <div class="sidebar-header">

        <a href="{{ route('dashboard') }}" class="logo">

            <div class="logo-icon">
                <i class="fa-solid fa-globe"></i>
            </div>

            <div>
                <h4>GRM</h4>
                <small>Global Risk Monitor</small>
            </div>

        </a>

    </div>

    <!-- Menu (scrollable) -->
    <nav class="sidebar-menu">

            <a href="{{ route('dashboard') }}"
                class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('tracking') }}"
                class="menu-item {{ request()->routeIs('tracking') ? 'active' : '' }}">
                <i class="fa-solid fa-box"></i>
                <span>Tracking Shipment</span>
            </a>

            <a href="{{ route('countries') }}"
                class="menu-item {{ request()->routeIs('countries') ? 'active' : '' }}">
                <i class="fa-solid fa-earth-asia"></i>
                <span>Countries</span>
            </a>

            <a href="{{ route('weather') }}"
                class="menu-item {{ request()->routeIs('weather') ? 'active' : '' }}">
                <i class="fa-solid fa-cloud-sun"></i>
                <span>Weather</span>
            </a>

            <a href="{{ route('currency') }}"
                class="menu-item {{ request()->routeIs('currency') ? 'active' : '' }}">
                <i class="fa-solid fa-money-bill-wave"></i>
                <span>Currency</span>
            </a>

            <a href="{{ route('news') }}"
                class="menu-item {{ request()->routeIs('news') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper"></i>
                <span>News</span>
            </a>

            <a href="{{ route('ports') }}"
                class="menu-item {{ request()->routeIs('ports') ? 'active' : '' }}">
                <i class="fa-solid fa-anchor"></i>
                <span>Port Dashboard</span>
            </a>

            <a href="{{ route('analytics') }}"
                class="menu-item {{ request()->routeIs('analytics') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-column"></i>
                <span>Analytics</span>
            </a>

            <a href="{{ route('comparison') }}"
                class="menu-item {{ request()->routeIs('comparison') ? 'active' : '' }}">
                <i class="fa-solid fa-scale-balanced"></i>
                <span>Comparison</span>
            </a>

            <a href="{{ route('favorites') }}"
                class="menu-item {{ request()->routeIs('favorites') ? 'active' : '' }}">
                <i class="fa-solid fa-star"></i>
                <span>Favorites</span>
            </a>


    </nav>

    <!-- Footer -->
    <div class="sidebar-footer">

        <div class="api-status mb-3">
            <span class="dot"></span>
            API Connected
        </div>

        @if(auth()->check() && auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary w-100 mb-2 btn-sm text-start">
                <i class="fa-solid fa-gauge me-2"></i> Admin Dashboard
            </a>
        @endif

        <form action="{{ route('logout') }}" method="POST" class="d-block w-100">
            @csrf
            <button type="submit" class="btn btn-danger w-100 btn-sm text-start">
                <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
            </button>
        </form>

    </div>

</aside>