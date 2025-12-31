<!-- Admin Footer -->
<footer class="bg-dark text-white mt-5" style="margin-left: 250px;">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <p class="mb-0">&copy; {{ date('Y') }} Ecomarc Punjabi Shop - Admin Panel. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="mb-0">
                    <span class="text-muted">Logged in as:</span> 
                    <strong>{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</strong>
                </p>
            </div>
        </div>
    </div>
</footer>

