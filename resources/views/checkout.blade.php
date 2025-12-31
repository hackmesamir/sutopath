@extends('layouts.app')

@section('title', 'Checkout - Ecomarc Punjabi Shop')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-7">
            

            <form id="checkoutForm" method="POST" action="{{ route('checkout.store') }}">
                @csrf

                <!-- Customer Information -->
                <div class="card mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="fw-bold mb-0">ডেলিভারি ইনফরমেশন</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label fw-bold">আপনার নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" 
                                   value="{{ $user->name ?? '' }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="customer_phone" class="form-label fw-bold">মোবাইল নাম্বার <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="customer_phone" name="customer_phone" 
                                   placeholder="01XXXXXXXXX" required>
                        </div>

                        <div class="mb-3">
                            <label for="district" class="form-label fw-bold">জেলা সিলেক্ট করুন <span class="text-danger">*</span></label>
                            <select class="form-select" id="district" name="district" required>
                                <option value="">-- জেলা নির্বাচন করুন --</option>
                                <option value="Dhaka">ঢাকা</option>
                                <option value="Chittagong">চট্টগ্রাম</option>
                                <option value="Sylhet">সিলেট</option>
                                <option value="Rajshahi">রাজশাহী</option>
                                <option value="Khulna">খুলনা</option>
                                <option value="Barisal">বরিশাল</option>
                                <option value="Rangpur">রংপুর</option>
                                <option value="Mymensingh">ময়মনসিংহ</option>
                                <option value="Comilla">কুমিল্লা</option>
                                <option value="Jessore">যশোর</option>
                                <option value="Gazipur">গাজীপুর</option>
                                <option value="Narayanganj">নারায়ণগঞ্জ</option>
                                <option value="Bogra">বগুড়া</option>
                                <option value="Cox's Bazar">কক্সবাজার</option>
                                <option value="Saidpur">সৈয়দপুর</option>
                                <option value="Tangail">টাঙ্গাইল</option>
                                <option value="Jamalpur">জামালপুর</option>
                                <option value="Pabna">পাবনা</option>
                                <option value="Dinajpur">দিনাজপুর</option>
                                <option value="Faridpur">ফরিদপুর</option>
                                <option value="Feni">ফেনী</option>
                                <option value="Noakhali">নোয়াখালী</option>
                                <option value="Brahmanbaria">ব্রাহ্মণবাড়িয়া</option>
                                <option value="Kushtia">কুষ্টিয়া</option>
                                <option value="Jhenaidah">ঝিনাইদহ</option>
                                <option value="Magura">মাগুরা</option>
                                <option value="Meherpur">মেহেরপুর</option>
                                <option value="Narail">নড়াইল</option>
                                <option value="Chuadanga">চুয়াডাঙা</option>
                                <option value="Satkhira">সাতক্ষীরা</option>
                                <option value="Bagerhat">বাগেরহাট</option>
                                <option value="Pirojpur">পিরোজপুর</option>
                                <option value="Jhalokati">ঝালকাঠি</option>
                                <option value="Patuakhali">পটুয়াখালী</option>
                                <option value="Bhola">ভোলা</option>
                                <option value="Barguna">বরগুনা</option>
                                <option value="Lakshmipur">লক্ষ্মীপুর</option>
                                <option value="Chandpur">চাঁদপুর</option>
                                <option value="Shariatpur">শরীয়তপুর</option>
                                <option value="Madaripur">মাদারীপুর</option>
                                <option value="Gopalganj">গোপালগঞ্জ</option>
                                <option value="Rajbari">রাজবাড়ী</option>
                                <option value="Munshiganj">মুন্সীগঞ্জ</option>
                                <option value="Manikganj">মানিকগঞ্জ</option>
                                <option value="Narsingdi">নরসিংদী</option>
                                <option value="Kishoreganj">কিশোরগঞ্জ</option>
                                <option value="Netrokona">নেত্রকোণা</option>
                                <option value="Sherpur">শেরপুর</option>
                                <option value="Moulvibazar">মৌলভীবাজার</option>
                                <option value="Habiganj">হবিগঞ্জ</option>
                                <option value="Sunamganj">সুনামগঞ্জ</option>
                                <option value="Natore">নাটোর</option>
                                <option value="Naogaon">নওগাঁ</option>
                                <option value="Joypurhat">জয়পুরহাট</option>
                                <option value="Sirajganj">সিরাজগঞ্জ</option>
                                <option value="Gaibandha">গাইবান্ধা</option>
                                <option value="Kurigram">কুড়িগ্রাম</option>
                                <option value="Lalmonirhat">লালমনিরহাট</option>
                                <option value="Nilphamari">নীলফামারী</option>
                                <option value="Panchagarh">পঞ্চগড়</option>
                                <option value="Thakurgaon">ঠাকুরগাঁও</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label fw-bold">সম্পূর্ণ ঠিকানা <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" name="address" rows="4" 
                                      placeholder="গ্রাম/রোড/বাড়ি নম্বর/এলাকা" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Hidden field for payment method (Cash on Delivery only) -->
                <input type="hidden" name="payment_method" value="cash_on_delivery">
            </form>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-5">
            <div class="card sticky-top" style="top: 100px;">
                <div class="card-header bg-white border-bottom">
                    <h5 class="fw-bold mb-0">প্রোডাক্ট ডিটেইল</h5>
                </div>
                <div class="card-body">
                    <!-- Cart Items -->
                    <div class="border-bottom pb-3 mb-3">
                        <div class="d-flex gap-3 mb-3">
                            <img src="https://via.placeholder.com/60x60?text=Product" alt="Product" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-1">Platinum China Bamboo...</h6>
                                <p class="text-muted small mb-1">Size: L</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-danger">৳2345</span>
                                    <span class="text-muted">Qty: 1</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Totals -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>সাব-টোটাল:</span>
                            <span class="fw-bold">৳2345</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>ডেলিভারি চার্জ (ঢাকার বাহইরে ডেলিভারি চার্জ প্রযোজ্য):</span>
                            <span class="fw-bold">৳100</span>
                        </div>
                        
                        
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold fs-5">মোট পরিমাণ:</span>
                        <span class="fw-bold fs-5 text-danger">৳2495</span>
                    </div>

                    <!-- Cash on Delivery Message -->
                    <div class="alert alert-info mb-3" style="background-color: #e7f3ff; border-color: #b3d9ff;">
                        <div class="fw-bold mb-2"><i class="bi bi-circle-fill text-success me-2"></i> Cash On Delivery</div>
                        <div class="small mb-0">ইনশা-আল্লাহ ৩–৫ কর্মদিবসের মধ্যে ডেলিভারি সম্পন্ন করা হবে। এর মধ্যে আমাদের একজন প্রতিনিধি কল দিয়ে অর্ডার কনফার্ম করবেন।</div>
                    </div>

                    <!-- Coupon Code -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control p-2" id="coupon_code" name="coupon_code" 
                                   placeholder="Enter coupon code">
                            <button class="btn text-white p-2 px-5 bg-black btn-lg" type="button" id="applyCouponBtn">
                                Apply
                            </button>
                        </div>
                        <div id="couponMessage" class="mt-2"></div>
                    </div>

                    <button type="submit" form="checkoutForm" class="btn bg-black text-white w-100 fw-bold py-3">
                        Confirm Order Tk. 2495
                    </button>
                 
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Coupon apply functionality
    document.getElementById('applyCouponBtn').addEventListener('click', function() {
        const couponCode = document.getElementById('coupon_code').value.trim();
        const couponMessage = document.getElementById('couponMessage');
        
        if (!couponCode) {
            couponMessage.innerHTML = '<small class="text-danger">Please enter a coupon code</small>';
            return;
        }
        
        // TODO: Implement coupon validation via AJAX
        // For now, just show a message
        couponMessage.innerHTML = '<small class="text-success">Coupon code applied successfully!</small>';
        
        // You can add AJAX call here to validate and apply coupon
        // fetch('/coupon/apply', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json',
        //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //     },
        //     body: JSON.stringify({ coupon_code: couponCode })
        // })
        // .then(response => response.json())
        // .then(data => {
        //     if (data.success) {
        //         couponMessage.innerHTML = '<small class="text-success">' + data.message + '</small>';
        //         // Update totals here
        //     } else {
        //         couponMessage.innerHTML = '<small class="text-danger">' + data.message + '</small>';
        //     }
        // });
    });
</script>
@endpush
@endsection
