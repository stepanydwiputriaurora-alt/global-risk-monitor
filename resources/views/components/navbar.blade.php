<nav class="navbar navbar-expand-lg bg-white shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold text-primary" href="/">

            🌍 Global Risk Monitor

        </a>

        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Tracking</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Countries</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Weather</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Currency</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>

                <li class="nav-item">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="fa-solid fa-user-shield"></i>
                                Admin Dashboard
                            </a>
                        @else
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link bg-transparent border-0">
                                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                                </button>
                            </form>
                        @endif
                    @else
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa-solid fa-user-shield"></i>
                            Login
                        </a>
                    @endauth
                </li>

            </ul>

        </div>

    </div>

</nav>