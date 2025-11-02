@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1>User Details</h1>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back to List</a>
    <div class="card shadow-sm">
        <div class="card-body">
            @if($user->photo)
                <img src="{{ asset('storage/'.$user->photo) }}" width="100" class="rounded-circle border mb-3" />
            @endif
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Prefix:</strong> {{ $user->prefixname }}</li>
                <li class="list-group-item"><strong>First Name:</strong> {{ $user->firstname }}</li>
                <li class="list-group-item"><strong>Middle Name:</strong> {{ $user->middlename }}</li>
                <li class="list-group-item"><strong>Last Name:</strong> {{ $user->lastname }}</li>
                <li class="list-group-item"><strong>Suffix:</strong> {{ $user->suffixname }}</li>
                <li class="list-group-item"><strong>Username:</strong> {{ $user->username }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                <li class="list-group-item"><strong>Type:</strong> <span class="badge bg-{{ $user->type == 'admin' ? 'danger' : 'info' }}">{{ ucfirst($user->type) }}</span></li>
            </ul>
        </div>
    </div>
</div>
@endsection
