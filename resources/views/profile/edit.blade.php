@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="text-center mb-4" style="justify-items: center">
            <img src="{{ $user->avatar }}" alt="Avatar" class="image_logo mb-3">
            <h3 class="font-semibold text-lg">{{ $user->name }}</h3>
            <p class="text-muted">{{ $user->email }}</p>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
        