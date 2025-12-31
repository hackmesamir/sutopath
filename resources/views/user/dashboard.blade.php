@extends('user.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <!-- Welcome Card -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">
                <i class="bi bi-check-circle-fill text-success"></i> Welcome, {{ $user->name }}!
            </h5>
            <p class="card-text text-muted">
                Manage your account, orders, and preferences from here.
            </p>
            <p class="mb-0">
                <strong>Email:</strong> {{ $user->email }}<br>
                @if($user->phone)
                    <strong>Phone:</strong> {{ $user->phone }}<br>
                @endif
                @if($user->address)
                    <strong>Address:</strong> {{ $user->address }}
                @endif
            </p>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-bag-check text-primary" style="font-size: 2rem;"></i>
                    <h6 class="text-muted mt-2">Total Orders</h6>
                    <h3>{{ $user->orders()->count() ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-clock-history text-warning" style="font-size: 2rem;"></i>
                    <h6 class="text-muted mt-2">Pending Orders</h6>
                    <h3>{{ $user->orders()->where('order_status', 'pending')->count() ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle text-success" style="font-size: 2rem;"></i>
                    <h6 class="text-muted mt-2">Delivered Orders</h6>
                    <h3>{{ $user->orders()->where('order_status', 'delivered')->count() ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-bag"></i> My Orders
                    </h5>
                    <p class="card-text text-muted">View and track your orders</p>
                    <a href="#" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-geo-alt"></i> My Addresses
                    </h5>
                    <p class="card-text text-muted">Manage your shipping addresses</p>
                    <a href="#" class="btn btn-primary">Manage Addresses</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-person"></i> My Profile
                    </h5>
                    <p class="card-text text-muted">Update your personal information</p>
                    <a href="#" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-heart"></i> Wishlist
                    </h5>
                    <p class="card-text text-muted">View your saved items</p>
                    <a href="#" class="btn btn-primary">View Wishlist</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

