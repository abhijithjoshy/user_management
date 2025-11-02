@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1>Edit User</h1>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back to List</a>
    <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-4">
                <label for="prefixname" class="form-label">Prefix Name</label>
                <select name="prefixname" id="prefixname" class="form-select">
                    <option value="">--</option>
                    <option value="Mr" @selected(old('prefixname', $user->prefixname) == 'Mr')>Mr</option>
                    <option value="Mrs" @selected(old('prefixname', $user->prefixname) == 'Mrs')>Mrs</option>
                    <option value="Ms" @selected(old('prefixname', $user->prefixname) == 'Ms')>Ms</option>
                </select>
                @error('prefixname')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname', $user->firstname) }}" required>
                @error('firstname')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" name="middlename" id="middlename" class="form-control" value="{{ old('middlename', $user->middlename) }}">
                @error('middlename')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname', $user->lastname) }}" required>
                @error('lastname')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label for="suffixname" class="form-label">Suffix Name</label>
                <input type="text" name="suffixname" id="suffixname" class="form-control" value="{{ old('suffixname', $user->suffixname) }}">
                @error('suffixname')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                @error('username')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label for="password" class="form-label">Password (leave blank to keep current)</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label for="photo" class="form-label">Photo</label>
                <img src="{{ $user->avatar }}" width="60" class="mb-2 rounded-circle border" alt="Current Photo" />
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                @error('photo')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="user" @selected(old('type', $user->type) == 'user')>User</option>
                    <option value="admin" @selected(old('type', $user->type) == 'admin')>Admin</option>
                </select>
                @error('type')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Update</button>
    </form>
</div>
@endsection
