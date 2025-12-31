<!-- Sidebar -->
<div class="sidebar p-3">
    <h4 class="mb-4">
        <i class="bi bi-shield-lock-fill"></i> Admin Panel
    </h4>
    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a class="nav-link" href="#">
            <i class="bi bi-box"></i> Products
        </a>
        <a class="nav-link" href="#">
            <i class="bi bi-cart"></i> Orders
        </a>
        <a class="nav-link" href="#">
            <i class="bi bi-people"></i> Customers
        </a>
        <a class="nav-link" href="#">
            <i class="bi bi-tags"></i> Categories
        </a>
        <a class="nav-link" href="#">
            <i class="bi bi-megaphone"></i> Campaigns
        </a>
        <a class="nav-link" href="#">
            <i class="bi bi-image"></i> Banners
        </a>
        <a class="nav-link" href="#">
            <i class="bi bi-gear"></i> Settings
        </a>
        <hr class="bg-white my-3">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="bi bi-arrow-left"></i> Back to Website
        </a>
    </nav>
</div>

