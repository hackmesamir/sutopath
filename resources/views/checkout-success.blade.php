@extends('layouts.app')

@section('title', 'Order Success - Ecomarc Punjabi Shop')

@section('content')
<div class="container-fluid my-5">
    <div class="container">
        <!-- Success Message - Centered -->
        <div class="text-center mb-5">
            <div class="mb-3">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
            </div>
            <h2 class="fw-bold text-success mb-2">অর্ডার সফল হয়েছে!</h2>
            <p class="mb-0">আপনার অর্ডার সফলভাবে গ্রহণ করা হয়েছে। ধন্যবাদ!</p>
        </div>

        <div class="row">
            <!-- Left Side - Order Information -->
            <div class="col-lg-6 mb-4">
                <!-- Order Information Card -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="fw-bold mb-0">অর্ডার তথ্য</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <p class="mb-1"><strong>নাম: </strong>আব্বাস উদ্দিন</p>
                            <p class="mb-1"><strong>অর্ডার তারিখ: </strong>{{ now()->format('d M Y, h:i A') }}</p>
                        </div>
                        <hr>
                        <div class="mb-3 d-flex justify-content-between">
                            <p class="mb-1"><strong>মোবাইল নাম্বার: </strong>01XXXXXXXXX</p>
                            <p class="mb-1"><strong>পেমেন্ট মেথড: </strong>Cash On Delivery</p>
                        </div>
                        <hr>
                        <div class="mb-3 d-flex justify-content-between">
                            <p class="mb-1"><strong>ঠিকানা: </strong>Complete delivery address will be shown here</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Order Details -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="fw-bold mb-0">অর্ডার ডিটেইল</h5>
                    </div>
                    <div class="card-body">
                        <!-- Product -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-bold mb-3">প্রোডাক্ট</h6>
                                <h6 class="fw-bold mb-3">Total</h6>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <p class="mb-0 fw-bold">প্রোডাক্ট নাম</p>
                                    <p class="mb-0 text-muted small">প্রোডাক্ট কোড</p>
                                </div>
                                <div class="text-end">
                                    <p class="mb-0 fw-bold">2452</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <p class="mb-0 fw-bold">ডেলিভারি চার্জ</p>
                                </div>
                                <div class="text-end">
                                    <p class="mb-0 fw-bold">70৳</p>
                                </div>
                            </div>
                            
                        </div>
                        <!-- Total -->
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold fs-5">মোট পরিমাণ</span>
                            <span class="fw-bold fs-5 text-danger">2455.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
