<header>

    <!-- TOP BAR -->
    <div class="bg-dark border-bottom">
        <div class="container">
            <div class="row align-items-center py-3">

                <!-- LOGO -->
                <div class="col-lg-2 col-md-3 col-6">
                    <a href="{{ route('home') }}"
                       class="text-decoration-none d-flex align-items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Ecomarc Punjabi" style="max-width: auto; height:48px;">
                    </a>
                </div>

                <!-- SEARCH -->
                <div class="col-lg-6 col-md-5 col-12 order-md-0 order-3 mt-3 mt-md-0">
                    <form class="d-flex" style="height:48px;">
                        <input class="form-control border-0" style="border-radius: 10px 0 0 10px; height:48px;"
                               type="search"
                               placeholder="Search for Products...">
                        <button class="btn btn-warning px-4" style="border-radius: 0 10px 10px 0; height:48px;"
                                type="submit">
                            <i class="bi bi-search text-dark"></i>
                        </button>
                    </form>
                </div>

                <!-- RIGHT ICONS -->
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="d-flex align-items-center justify-content-end gap-5 text-white">

                        <!-- ACCOUNT -->
                        @auth
                        <a href="{{ route('profile') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-2"></i>
                            <div class="d-none d-lg-block small">
                                {{ Auth::user()->name }}<br>
                                <span class="text-secondary">Your Account</span>
                            </div>
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-person fs-3 me-2"></i>
                            <div class="d-none d-lg-block small">
                                Sign In<br>
                                <span class="text-secondary">Your Account</span>
                            </div>
                        </a>
                        @endauth

                        <!-- CART -->
                        <a href="#" class="position-relative text-white">
                            <i class="bi bi-bag fs-3"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-pill">
                                1
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

<!-- CATEGORY BAR - FIXED (Outside header so it can be positioned independently) -->
<div class="category-bar-fixed bg-white shadow-sm border-bottom">
    <div class="container">
        <div class="row align-items-center py-3">
            <!-- LEFT SIDE - CATEGORIES -->
            <div class="col-lg-10 col-md-8">
                <!-- QUICK LINKS WITH SUB MENU -->
                <nav class="d-none d-lg-flex gap-3 fw-semibold">

                    <!-- New Arrival -->
                    <div class="dropdown">
                        <a class="text-dark text-decoration-none dropdown-toggle p-3"
                           href="#"
                           data-bs-toggle="dropdown">
                            New Arrival
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Panjabi</a></li>
                            <li><a class="dropdown-item" href="#">Shirt</a></li>
                            <li><a class="dropdown-item" href="#">T-Shirt</a></li>
                        </ul>
                    </div>

                    <!-- Best Seller -->
                    <div class="dropdown">
                        <a class="text-dark text-decoration-none dropdown-toggle p-3"
                           href="#"
                           data-bs-toggle="dropdown">
                            Best Seller
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Top Rated</a></li>
                            <li><a class="dropdown-item" href="#">Most Ordered</a></li>
                            <li><a class="dropdown-item" href="#">Trending</a></li>
                        </ul>
                    </div>

                    <!-- Eid Collection -->
                    <div class="dropdown">
                        <a class="text-dark text-decoration-none dropdown-toggle p-3"
                           href="#"
                           data-bs-toggle="dropdown">
                            Eid Collection
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Premium Panjabi</a></li>
                            <li><a class="dropdown-item" href="#">Couple Set</a></li>
                            <li><a class="dropdown-item" href="#">Family Combo</a></li>
                        </ul>
                    </div>

                    <!-- Hot Deals -->
                    <div class="dropdown">
                        <a class="text-danger text-decoration-none dropdown-toggle p-3"
                           href="#"
                           data-bs-toggle="dropdown">
                            Hot Deals
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Under ৳999</a></li>
                            <li><a class="dropdown-item" href="#">Flash Sale</a></li>
                            <li><a class="dropdown-item" href="#">Combo Offer</a></li>
                        </ul>
                    </div>

                </nav>
            </div>

            <!-- RIGHT SIDE - HOTLINE -->
            <div class="col-lg-2 col-md-4 text-end">
                <div class="fw-semibold text-dark d-flex align-items-center justify-content-end">
                    <i class="bi bi-telephone-fill text-danger me-2"></i>
                    <span>Hotline: <span class="text-danger">01518-928266</span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.category-bar-fixed {
    position: sticky !important;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    z-index: 1050;
    background-color: #fff !important;
}


header a:hover {
    opacity: 0.85;
}

.dropdown-menu {
    border-radius: 0;
}

.badge {
    font-size: 0.65rem;
}
</style>