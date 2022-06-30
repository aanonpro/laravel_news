@extends('layouts.master')

@section('title','Admin Dashboard')
@section('content')


<div class="card mt-4">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">View Category <a class="btn btn-primary btn-sm float-end" href="{{ url('admin/add-category') }}">Add Category</a></h1>
    </div>
    <div class="card-body">

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <table id="myDataTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ asset('uploads/category/'.$item->image) }}" width="50px" alt="cate-image">
                    </td>
                    <td>{{ $item->status =='1' ? 'Disabled' : 'Enabled'}}</td>
                    <td>
                        <a href="{{ url('admin/edit-category/' . $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ url('admin/delete-category/' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</div>

@endsection
