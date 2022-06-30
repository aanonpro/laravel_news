@extends('layouts.master')

@section('title','Admin view-posts')
@section('content')


<div class="card mt-4">

    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">View Posts <a class="btn btn-primary btn-sm float-end" href="{{ url('admin/add-posts') }}">Add Posts</a></h1>
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
                    <th>Category</th>
                    <th>Title</th>
                    <th>cover</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $postitem)
                    <tr>
                        <td>{{ $postitem->id }}</td>
                        <td>{{ $postitem->category->name }}</td>
                        <td>{{ $postitem->title }}</td>
                        <td>
                            <img src="{{ asset('uploads/post/'.$postitem->image_cover) }}" width="50px" alt="post-image">
                        </td>
                        <td>
                            {{ $postitem->status =='1' ? 'Disabled' : 'Enabled'}}
                        </td>
                        <td>
                            <a href="{{ url('admin/edit-post/' . $postitem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ url('admin/delete-post/' . $postitem->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
