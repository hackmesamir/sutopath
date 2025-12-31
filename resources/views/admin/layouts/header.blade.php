<!-- Top Bar / Header -->
<div class="top-bar">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted">
                <i class="bi bi-person-circle"></i> {{ Auth::guard('admin')->user()->name ?? 'Admin' }}
            </span>
            <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>

