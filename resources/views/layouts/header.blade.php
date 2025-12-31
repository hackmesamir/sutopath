<!-- Header -->
<header class="bg-white shadow-sm sticky-top" style="z-index: 1050;">
    <!-- Top Bar -->
    <div class="border-bottom">
        <div class="container">
            <div class="row align-items-center py-2">
                <!-- Logo -->
                <div class="col-lg-2 col-md-3 col-6">
                    <a class="navbar-brand fw-bold text-dark text-decoration-none" href="{{ route('home') }}" style="font-size: 1.5rem; letter-spacing: -1px;">
                        <span class="text-dark">Ecomarc</span> <span class="text-warning">Punjabi</span>
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="col-lg-6 col-md-5 col-12 order-md-0 order-3 mt-2 mt-md-0">
                    <form class="d-flex" role="search">
                        <input class="form-control rounded-0 border-end-0" type="search" placeholder="Search for Products..." aria-label="Search" style="border: 1px solid #dee2e6;">
                        <button class="btn btn-outline-secondary rounded-0 border-start-0" type="submit" style="border: 1px solid #dee2e6;">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Right Side Icons -->
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="d-flex align-items-center justify-content-end gap-4">
                        <!-- User Account -->
                        @auth
                            <a href="{{ route('profile') }}" class="d-flex align-items-center text-decoration-none text-dark">
                                <i class="bi bi-person fs-4 me-1"></i>
                                <div class="d-none d-lg-block">
                                    <div class="small fw-semibold">{{ Auth::user()->name }}</div>
                                    <div class="small text-muted" style="font-size: 0.7rem;">Your Account</div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="d-flex align-items-center text-decoration-none text-dark">
                                <i class="bi bi-person fs-4 me-1"></i>
                                <div class="d-none d-lg-block">
                                    <div class="small fw-semibold">Sign In</div>
                                    <div class="small text-muted" style="font-size: 0.7rem;">Your Account</div>
                                </div>
                            </a>
                        @endauth

                        <!-- Cart -->
                        <a href="#" class="text-dark text-decoration-none position-relative">
                            <i class="bi bi-bag fs-4"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem; padding: 0.2em 0.4em;">1</span>
                        </a>

                        <!-- Hotline -->
                        <div class="d-none d-lg-flex align-items-center text-dark">
                            <i class="bi bi-telephone fs-5 me-2"></i>
                            <div>
                                <div class="small text-muted" style="font-size: 0.7rem;">Hotline:</div>
                                <div class="small fw-semibold">09638090000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-0">
        <div class="container">
            <!-- Mobile Menu Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2" href="#">Shirt</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-3 py-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Panjabi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Traditional Panjabi</a></li>
                            <li><a class="dropdown-item" href="#">Designer Panjabi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2" href="#">T-shirt</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-3 py-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Pant & Trouser
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Jeans</a></li>
                            <li><a class="dropdown-item" href="#">Trousers</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2" href="#">Winter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2" href="#">Sneakers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2" href="#">Polo Shirt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2" href="#">Combo Offers</a>
                    </li>
                </ul>

                <!-- Auth Links -->
                <div class="d-flex align-items-center gap-2">
                    @auth
                        <a href="{{ route('profile') }}" class="btn btn-sm btn-outline-dark">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-dark">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-dark">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-dark">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>

