<aside class="sidebar admin-sidebar bg-dark text-light">

    <!-- Header -->
    <div>

        <div class="sidebar-header border-bottom border-secondary mb-3 pb-3">

            <a href="{{ route('admin.dashboard') }}" class="logo text-light text-decoration-none d-flex align-items-center gap-3">

                <div class="logo-icon bg-primary text-white rounded p-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>

                <div>
                    <h5 class="mb-0 fw-bold">Admin Panel</h5>
                    <small class="text-secondary" style="font-size: 0.75rem;">Global Risk Monitor</small>
                </div>

            </a>

        </div>

        <!-- Menu -->
        <nav class="sidebar-menu">

            <a href="{{ route('admin.dashboard') }}"
                class="menu-item text-light {{ request()->routeIs('admin.dashboard') ? 'active bg-primary text-white rounded' : '' }} d-flex align-items-center gap-3 p-2 mb-2 text-decoration-none">
                <i class="fa-solid fa-gauge" style="width: 20px;"></i>
                <span>Admin Dashboard</span>
            </a>

            <a href="{{ route('admin.shipments.index') }}"
                class="menu-item text-light {{ request()->routeIs('admin.shipments.*') ? 'active bg-primary text-white rounded' : '' }} d-flex align-items-center gap-3 p-2 mb-2 text-decoration-none">
                <i class="fa-solid fa-box-open" style="width: 20px;"></i>
                <span>Kelola Resi Tracking</span>
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="menu-item text-light {{ request()->routeIs('admin.users.*') ? 'active bg-primary text-white rounded' : '' }} d-flex align-items-center gap-3 p-2 mb-2 text-decoration-none">
                <i class="fa-solid fa-users" style="width: 20px;"></i>
                <span>Kelola User</span>
            </a>
            
            <a href="{{ route('admin.ports.index') }}"
                class="menu-item text-light {{ request()->routeIs('admin.ports.*') ? 'active bg-primary text-white rounded' : '' }} d-flex align-items-center gap-3 p-2 mb-2 text-decoration-none">
                <i class="fa-solid fa-anchor" style="width: 20px;"></i>
                <span>Dataset Pelabuhan</span>
            </a>

            <a href="{{ route('admin.countries.index') }}"
                class="menu-item text-light {{ request()->routeIs('admin.countries.*') ? 'active bg-primary text-white rounded' : '' }} d-flex align-items-center gap-3 p-2 mb-2 text-decoration-none">
                <i class="fa-solid fa-earth-asia" style="width: 20px;"></i>
                <span>Dataset Negara</span>
            </a>

            <a href="{{ route('admin.articles.index') }}"
                class="menu-item text-light {{ request()->routeIs('admin.articles.*') ? 'active bg-primary text-white rounded' : '' }} d-flex align-items-center gap-3 p-2 mb-2 text-decoration-none">
                <i class="fa-solid fa-newspaper" style="width: 20px;"></i>
                <span>Artikel Analisis</span>
            </a>

        </nav>

    </div>

    <!-- Footer -->
    <div class="sidebar-footer border-top border-secondary pt-3 mt-auto">

        <a href="{{ route('dashboard') }}" class="btn btn-outline-light w-100 mb-2 btn-sm text-start">
            <i class="fa-solid fa-desktop me-2"></i> Mode User (Web)
        </a>

        <form action="{{ route('logout') }}" method="POST" class="d-block w-100">
            @csrf
            <button type="submit" class="btn btn-danger w-100 btn-sm text-start">
                <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
            </button>
        </form>

    </div>

</aside>

<style>
    .admin-sidebar {
        width: 260px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1.5rem;
        z-index: 1000;
        background-color: #1e1e2d !important;
    }
    .admin-sidebar .menu-item:hover {
        background-color: rgba(255,255,255,0.1);
        border-radius: 0.25rem;
    }
    .admin-sidebar .menu-item.active {
        background-color: #0d6efd !important;
    }
</style>
