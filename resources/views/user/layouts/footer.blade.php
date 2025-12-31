<!-- User Footer -->
<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <p class="mb-0">&copy; {{ date('Y') }} Ecomarc Punjabi Shop. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="mb-0">
                    <span class="text-muted">Logged in as:</span> 
                    <strong>{{ Auth::user()->name ?? 'User' }}</strong>
                </p>
            </div>
        </div>
    </div>
</footer>

