@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <!-- Welcome Card -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">
                <i class="bi bi-check-circle-fill text-success"></i> Welcome, {{ $admin->name }}!
            </h5>
            <p class="card-text text-muted">
                You have successfully logged into the admin panel.
            </p>
            <p class="mb-0">
                <strong>Email:</strong> {{ $admin->email }}<br>
                <strong>Status:</strong> 
                <span class="badge bg-{{ $admin->status === 'active' ? 'success' : 'danger' }}">
                    {{ ucfirst($admin->status) }}
                </span>
            </p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Total Products</h6>
                    <h3>0</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Total Orders</h6>
                    <h3>0</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Total Customers</h6>
                    <h3>0</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Revenue</h6>
                    <h3>₹0</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
