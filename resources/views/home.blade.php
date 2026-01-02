@extends('layouts.app')

@section('title', 'Home - Ecomarc Punjabi Shop')
@@
@section('content')
    <!-- Hero Banner Slider -->
    <section class="hero-slider py-3">
        <div class="container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner rounded overflow-hidden">
                    <!-- Slide 1 -->
                    <div class="carousel-item active position-relative">
                        <div class="hero-slide rounded" style="background: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=1600') center/cover; min-height: 600px;"></div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item position-relative">
                        <div class="hero-slide rounded" style="background: url('https://images.unsplash.com/photo-1445205170230-053b83016050?w=1600') center/cover; min-height: 600px;"></div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item position-relative">
                        <div class="hero-slide rounded" style="background: url('https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=1600') center/cover; min-height: 600px;"></div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
@endsection

@push('styles')

<style>
    /* Hero Slider Styles */
    .hero-slider {
        margin-top: 0;
    }
    .hero-slide {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
    }
    .hero-slider .carousel-inner {
        border-radius: 10px;
        overflow: hidden;
    }
    .hero-slider .carousel-item {
        transition: transform 1s ease-in-out;
    }
    .hero-slider .carousel-control-prev,
    .hero-slider .carousel-control-next {
        width: 50px;
        height: 50px;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        opacity: 0.8;
    }
    .hero-slider .carousel-control-prev {
        left: 30px;
    }
    .hero-slider .carousel-control-next {
        right: 30px;
    }
    .hero-slider .carousel-control-prev:hover,
    .hero-slider .carousel-control-next:hover {
        opacity: 1;
        background-color: rgba(255, 255, 255, 0.5);
    }
    .hero-slider .carousel-indicators {
        bottom: 30px;
    }
    .hero-slider .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
        margin: 0 5px;
    }
    .hero-slider .carousel-indicators button.active {
        background-color: white;
    }

    /* Product Card Styles */
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

    /* Header Styles */
    .navbar-nav .nav-link {
        font-weight: 500;
        transition: color 0.3s ease;
    }
    .navbar-nav .nav-link:hover {
        color: #000 !important;
    }
</style>
@endpush
