@extends('layouts.master')

@section('title','Admin view Users')
@section('content')


<div class="card mt-4">

    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">View User </h1>
    </div>
    <div class="card-body">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <div class="table-responsive">
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->role_as =='1' ? 'Admin' : 'User'}}
                            </td>
                            <td>
                                <a href="{{ url('admin/users/' . $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
