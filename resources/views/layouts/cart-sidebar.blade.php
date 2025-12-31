<!-- Shopping Cart Sidebar -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartSidebar" aria-labelledby="cartSidebarLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold" id="cartSidebarLabel">Shopping Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0 d-flex flex-column">
        <!-- Cart Items -->
        <div class="flex-grow-1 overflow-auto">
            <!-- Cart Item 1 -->
            <div class="border-bottom p-3">
                <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                        <img src="https://via.placeholder.com/80x80?text=Product" alt="Product" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">Platinum China Bamboo...</h6>
                        <p class="text-muted small mb-2">Size: L</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-decoration-line-through text-muted small">৳4690</span>
                                <span class="fw-bold text-danger ms-2">৳2345</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-sm btn-outline-secondary" style="width: 30px; height: 30px; padding: 0;">-</button>
                                <span class="fw-bold">1</span>
                                <button class="btn btn-sm btn-outline-secondary" style="width: 30px; height: 30px; padding: 0;">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <button class="btn btn-sm text-danger p-0" style="font-size: 1.2rem;">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Empty Cart Message (Hidden when items exist) -->
            <!-- <div class="text-center py-5">
                <i class="bi bi-cart-x" style="font-size: 3rem; color: #ccc;"></i>
                <p class="text-muted mt-3">Your cart is empty</p>
            </div> -->
        </div>

        <!-- Cart Summary -->
        <div class="border-top p-3 bg-light">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-bold">Subtotal:</span>
                <span class="fw-bold fs-5">৳2345</span>
            </div>
            <button class="btn btn-danger w-100 fw-bold py-2">
                Checkout
            </button>
            <a href="#" class="btn btn-outline-secondary w-100 mt-2 py-2">
                Continue Shopping
            </a>
        </div>
    </div>
</div>

<style>
#cartSidebar.offcanvas {
    width: 400px !important;
    z-index: 1060 !important;
}

@media (max-width: 576px) {
    #cartSidebar.offcanvas {
        width: 100% !important;
    }
}

.offcanvas-header {
    padding: 1.25rem;
}

.offcanvas-body {
    padding: 0 !important;
}

.offcanvas-backdrop {
    z-index: 1055 !important;
}
</style>

