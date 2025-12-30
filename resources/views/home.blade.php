@extends('layouts.app')

@section('title', 'Home - Ecomarc Punjabi Shop')

@section('content')
    <!-- Hero Section -->
    <section class="position-relative text-white overflow-hidden" style="background: linear-gradient(to right, #f97316, #ea580c, #16a34a); padding: 100px 0;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-25"></div>
        <div class="container position-relative" style="z-index: 10;">
            <div class="text-center py-5">
                <h1 class="display-3 fw-bold mb-4 animate-fade-in">
                    Welcome to Ecomarc Punjabi Shop
                </h1>
                <p class="lead mb-4" style="color: #fed7aa;">
                    Discover Authentic Punjabi Products - Quality, Tradition, and Excellence
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    <a href="#products" class="btn btn-light btn-lg px-5 py-3 fw-semibold shadow">
                        Shop Now
                    </a>
                    <a href="#about" class="btn btn-outline-light btn-lg px-5 py-3 fw-semibold">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
        <!-- Decorative Pattern -->
        <div class="position-absolute bottom-0 start-0 w-100">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="products" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Featured Products</h2>
                <p class="text-muted">Handpicked selection of our finest Punjabi products</p>
            </div>

            <div class="row g-4">
                <!-- Product Card 1 -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 product-card">
                        <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 250px; background: linear-gradient(135deg, #fed7aa, #fdba74);">
                            <div class="text-center">
                                <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 128px; height: 128px;">
                                    <span class="display-1">👕</span>
                                </div>
                                <p class="text-muted small mb-0">Product Image</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Traditional Punjabi Suit</h5>
                            <p class="card-text text-muted">Elegant and comfortable traditional wear</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h4 fw-bold text-warning mb-0">₹2,499</span>
                                <button class="btn btn-warning text-white">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 product-card">
                        <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 250px; background: linear-gradient(135deg, #bbf7d0, #86efac);">
                            <div class="text-center">
                                <div class="rounded-circle bg-success d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 128px; height: 128px;">
                                    <span class="display-1">👗</span>
                                </div>
                                <p class="text-muted small mb-0">Product Image</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Designer Patiala Suit</h5>
                            <p class="card-text text-muted">Stylish and modern Punjabi attire</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h4 fw-bold text-warning mb-0">₹3,999</span>
                                <button class="btn btn-warning text-white">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 product-card">
                        <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 250px; background: linear-gradient(135deg, #fef3c7, #fde68a);">
                            <div class="text-center">
                                <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 128px; height: 128px;">
                                    <span class="display-1">🧣</span>
                                </div>
                                <p class="text-muted small mb-0">Product Image</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Punjabi Dupatta</h5>
                            <p class="card-text text-muted">Beautiful handcrafted dupatta</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h4 fw-bold text-warning mb-0">₹899</span>
                                <button class="btn btn-warning text-white">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 product-card">
                        <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 250px; background: linear-gradient(135deg, #fecaca, #fca5a5);">
                            <div class="text-center">
                                <div class="rounded-circle bg-danger d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 128px; height: 128px;">
                                    <span class="display-1">👔</span>
                                </div>
                                <p class="text-muted small mb-0">Product Image</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Men's Kurta Pajama</h5>
                            <p class="card-text text-muted">Comfortable traditional menswear</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h4 fw-bold text-warning mb-0">₹1,999</span>
                                <button class="btn btn-warning text-white">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-warning btn-lg px-5 py-3 text-white fw-semibold">
                    View All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Shop by Category</h2>
                <p class="text-muted">Browse our wide range of Punjabi products</p>
            </div>

            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card shadow-sm border-0 h-100 text-center category-card">
                            <div class="card-body p-4">
                                <div class="rounded-circle bg-warning bg-opacity-25 d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                                    <span class="display-4">👕</span>
                                </div>
                                <h5 class="card-title fw-semibold text-dark mb-0">Women's Wear</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card shadow-sm border-0 h-100 text-center category-card">
                            <div class="card-body p-4">
                                <div class="rounded-circle bg-success bg-opacity-25 d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                                    <span class="display-4">👔</span>
                                </div>
                                <h5 class="card-title fw-semibold text-dark mb-0">Men's Wear</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card shadow-sm border-0 h-100 text-center category-card">
                            <div class="card-body p-4">
                                <div class="rounded-circle bg-warning bg-opacity-25 d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                                    <span class="display-4">👶</span>
                                </div>
                                <h5 class="card-title fw-semibold text-dark mb-0">Kids Wear</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card shadow-sm border-0 h-100 text-center category-card">
                            <div class="card-body p-4">
                                <div class="rounded-circle bg-danger bg-opacity-25 d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                                    <span class="display-4">💍</span>
                                </div>
                                <h5 class="card-title fw-semibold text-dark mb-0">Accessories</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-white">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-6">
                    <h2 class="display-5 fw-bold text-dark mb-4">About Ecomarc Punjabi Shop</h2>
                    <p class="text-muted mb-3 fs-5">
                        We are passionate about bringing you the finest Punjabi products that celebrate our rich cultural heritage. 
                        Our collection features authentic, high-quality traditional wear and accessories.
                    </p>
                    <p class="text-muted mb-4 fs-5">
                        With years of experience in the fashion industry, we understand the importance of quality, comfort, and style. 
                        Every product in our store is carefully selected to ensure you get the best value for your money.
                    </p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="h2 fw-bold text-warning mb-2">500+</div>
                            <div class="text-muted">Happy Customers</div>
                        </div>
                        <div class="col-6">
                            <div class="h2 fw-bold text-warning mb-2">1000+</div>
                            <div class="text-muted">Products</div>
                        </div>
                        <div class="col-6">
                            <div class="h2 fw-bold text-warning mb-2">50+</div>
                            <div class="text-muted">Categories</div>
                        </div>
                        <div class="col-6">
                            <div class="h2 fw-bold text-warning mb-2">24/7</div>
                            <div class="text-muted">Support</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rounded p-5 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #fed7aa, #bbf7d0); height: 400px;">
                        <div class="text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4 shadow-lg" style="width: 192px; height: 192px; background: linear-gradient(135deg, #f97316, #16a34a);">
                                <span class="display-1 text-white">🏪</span>
                            </div>
                            <p class="text-dark fs-5 fw-medium mb-0">Your Trusted Punjabi Shop</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Why Choose Us</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100 text-center">
                        <div class="card-body p-4">
                            <div class="rounded-circle bg-warning bg-opacity-25 d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px;">
                                <i class="bi bi-check-circle-fill text-warning fs-3"></i>
                            </div>
                            <h5 class="card-title fw-semibold">Authentic Products</h5>
                            <p class="card-text text-muted">100% authentic Punjabi products sourced directly from trusted manufacturers</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100 text-center">
                        <div class="card-body p-4">
                            <div class="rounded-circle bg-success bg-opacity-25 d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px;">
                                <i class="bi bi-truck text-success fs-3"></i>
                            </div>
                            <h5 class="card-title fw-semibold">Fast Delivery</h5>
                            <p class="card-text text-muted">Quick and secure delivery to your doorstep across India</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100 text-center">
                        <div class="card-body p-4">
                            <div class="rounded-circle bg-warning bg-opacity-25 d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px;">
                                <i class="bi bi-currency-rupee text-warning fs-3"></i>
                            </div>
                            <h5 class="card-title fw-semibold">Best Prices</h5>
                            <p class="card-text text-muted">Competitive prices with regular discounts and special offers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Get in Touch</h2>
                <p class="text-muted">Have questions? We'd love to hear from you!</p>
            </div>

            <div class="row g-5">
                <div class="col-md-6">
                    <h3 class="h2 fw-semibold text-dark mb-4">Contact Information</h3>
                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle bg-warning bg-opacity-25 d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                <i class="bi bi-geo-alt-fill text-warning"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold text-dark mb-1">Address</h5>
                                <p class="text-muted mb-0">123 Punjabi Street, Amritsar, Punjab, India</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle bg-warning bg-opacity-25 d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                <i class="bi bi-telephone-fill text-warning"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold text-dark mb-1">Phone</h5>
                                <p class="text-muted mb-0">+91 123 456 7890</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle bg-warning bg-opacity-25 d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                <i class="bi bi-envelope-fill text-warning"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold text-dark mb-1">Email</h5>
                                <p class="text-muted mb-0">info@ecomarcpunjabi.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="bg-light rounded p-4">
                        <h3 class="h2 fw-semibold text-dark mb-4">Send us a Message</h3>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control form-control-lg" rows="4" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-warning btn-lg w-100 text-white fw-semibold">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .category-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .hover-text-warning:hover {
        color: #f59e0b !important;
    }
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in {
        animation: fade-in 0.8s ease-out;
    }
    html {
        scroll-behavior: smooth;
    }
</style>
@endpush
