@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="container py-4">
        <!-- Welcome Section -->
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="mb-3">Welcome to User Management System</h1>
                <p class="lead">A comprehensive solution for managing users, their profiles, and system access.</p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="mb-2">{{ $totalUsers }}</h3>
                        <p class="mb-0">Total Users</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="mb-2">{{ $totalAdmins }}</h3>
                        <p class="mb-0">Administrators</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="mb-2">{{ $totalRegularUsers }}</h3>
                        <p class="mb-0">Regular Users</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="mb-2">{{ $trashedUsers }}</h3>
                        <p class="mb-0">Trashed Users</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Information -->

    </div>
</div>
@endsection