@extends('layouts.master')

@section('title','Admin view Users')
@section('content')


<div class="card mt-4">

    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Edit User <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">Back</a> </h1>
    </div>
    <div class="card-body">

            <div class="mb-3">
                <label>Full Name</label>
                <p class="form-control">{{ $user->name }}</p>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <p class="form-control">{{ $user->email }}</p>
            </div>
            <div class="mb-3">
                <label>Created At</label>
                <p class="form-control">{{ $user->created_at->format('d/m/y') }}</p>
            </div>

        <form action="{{ url('admin/update-users/'.$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Role as</label>
                <select name="role_as" class="form-control">
                    <option value="1" {{ $user->role_as =='1' ? 'selected':'' }}>Admin</option>
                    <option value="0" {{ $user->role_as =='0' ? 'selected':'' }}>User</option>
                    <option value="2" {{ $user->role_as =='2' ? 'selected':'' }}>Blogger</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update User Role</button>
            </div>
        </form>

    </div>
</div>

@endsection
