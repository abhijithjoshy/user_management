@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1>Trashed Users</h1>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back to List</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Prefix</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><img src="{{ $user->avatar }}" width="40" class="rounded-circle border" alt="User Photo" /></td>
                    <td>{{ $user->prefixname }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td><span class="badge bg-{{ $user->type == 'admin' ? 'danger' : 'info' }}">{{ ucfirst($user->type) }}</span></td>
                    <td>{{ $user->deleted_at }}</td>
                    <td>
                        <form action="{{ route('users.restore', $user->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                        </form>
                        <form action="{{ route('users.forceDelete', $user->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Permanently delete this user?')">Delete Permanently</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
