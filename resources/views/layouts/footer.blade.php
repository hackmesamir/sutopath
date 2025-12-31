<!-- Footer -->
<footer class="text-white mt-5" style="background-color: #000000;">
    <div class="container py-4">
        <div class="row g-4">
            <!-- Left Side Columns -->
            <div class="col-lg-4">
                <div class="row g-4">
                    <!-- About -->
                    <div class="col-md-12 px-5">
                        <img src="{{ asset('images/logo.png') }}" alt="Ecomarc Punjabi" class="mb-3" style="margin:auto; max-width: auto; height:70px;">
                        <p class="text-white mb-4" style="color: #ffffff !important; font-weight: 500 !important; font-size: 1.2rem !important;">ইসলামিক আদর্শে অনুপ্রাণিত বাংলাদেশের অন্যতম বৃহৎ লাইফস্টাইল ব্র্যান্ড।</p>
                        
                        <!-- Follow Us -->
                        <div>
                            <div class="d-flex gap-3">
                                <a href="https://www.facebook.com/sutopath" class="text-white text-decoration-none footer-social-link" style="color: #ffffff !important;">
                                    <i class="bi bi-facebook fs-4"></i>
                                </a>
                                <a href="https://www.youtube.com/@sutopath" class="text-white text-decoration-none footer-social-link" style="color: #ffffff !important;">
                                    <i class="bi bi-youtube fs-4"></i>
                                </a>
                                
                            </div>
                        </div>
                    </div>

                  
                </div>
            </div>

            <!-- Right Side Column - Talk to Us -->
            <div class="col-lg-8">
                <div class="row">
                     <!-- Quick Links -->
                     <div class="col-md-4">
                        <h5 class="mb-3 text-white" style="font-weight: 800 !important; text-decoration: underline !important; text-decoration-width: 2px !important; text-decoration-thickness: 2px !important; text-underline-offset: 4px !important;">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('home') }}" class="text-white text-decoration-none footer-link" style="color: #ffffff !important; font-weight: 700 !important;">Home</a>
                            </li>
                            <li class="mb-2">
                                <a href="#products" class="text-white text-decoration-none footer-link" style="color: #ffffff !important; font-weight: 700 !important;">Products</a>
                            </li>
                            <li class="mb-2">
                                <a href="#categories" class="text-white text-decoration-none footer-link" style="color: #ffffff !important; font-weight: 700 !important;">Categories</a>
                            </li>
                            <li class="mb-2">
                                <a href="#about" class="text-white text-decoration-none footer-link" style="color: #ffffff !important; font-weight: 700 !important;">About Us</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Customer Service -->
                    <div class="col-md-4">
                        <h5 class="mb-3 text-white" style="font-weight: 800 !important; text-decoration: underline !important; text-decoration-width: 2px !important; text-decoration-thickness: 2px !important; text-underline-offset: 4px !important;">Customer Service</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="" class="text-white text-decoration-none footer-link" style="color: #ffffff !important; font-weight: 700 !important;">Contact Us</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-white text-decoration-none footer-link" style="color: #ffffff !important; font-weight: 700 !important;">Shipping Info</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-white text-decoration-none footer-link" style="color: #ffffff !important; font-weight: 700 !important;">Returns</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-white text-decoration-none footer-link" style="color: #ffffff !important; font-weight: 700 !important;">FAQ</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                    <h5 class="mb-2 text-white" style="font-weight: 800 !important; text-decoration: underline !important; text-decoration-width: 2px !important; text-decoration-thickness: 2px !important; text-underline-offset: 4px !important;">Talk to Us</h5>
                <p class="text-white mb-1" style="color: #ffffff !important; font-size: 1.1rem;">Got Question? Call Us: </p>
                <p class="text-white mb-3" style="color: #ffffff !important; font-size: 2rem; font-weight: 900 !important;">0 1518-928266</p>
                
                <div>
                   
                 

                    <!-- Email -->
                    <div class="d-flex align-items-start mb-2">
                        <div ">
                            <i class="bi bi-envelope-fill text-warning fs-5"></i>
                            <p class="text-white mb-0 inline-block px-3" style="color: #ffffff !important; font-weight: 700 !important;">sutopath@gmail.com</p>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="d-flex align-items-start">
                        <div >
                            <i class="bi bi-geo-alt-fill text-warning fs-5"></i>
                            <p class="text-white mb-0 inline-block px-3" style="width: 90% !important; color: #ffffff !important;  font-weight: 700 !important;">CheragAli. Tongi, Gazipur, Bangladesh</p>
                        </div>
                    </div>
                    </div>
                </div>

                


              
                </div>
            </div>
        </div>

        <hr class="my-3" style="border-color: #555; opacity: 1;">

        <div class="text-center text-white" style="color: #ffffff !important;">
            <p class="mb-0">&copy; {{ date('Y') }} Ecomarc SutoPath. All rights reserved.</p>
        </div>
    </div>
</footer>

@push('styles')
<style>
    footer {
        background-color: #000000 !important;
    }
    footer h5 {
        color: #ffffff !important;
    }
    footer p {
        color: #ffffff !important;
    }
    .footer-link {
        color: #ffffff !important;
        transition: color 0.3s ease;
    }
    .footer-link:hover {
        color: #fbbf24 !important;
    }
    .footer-social-link {
        color: #ffffff !important;
        transition: color 0.3s ease, transform 0.3s ease;
    }
    .footer-social-link:hover {
        color: #fbbf24 !important;
        transform: translateY(-3px);
    }
    footer .text-warning {
        color: #fbbf24 !important;
    }
</style>
@endpush
