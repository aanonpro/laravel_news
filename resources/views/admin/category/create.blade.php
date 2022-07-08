@extends('layouts.master')

@section('title','Admin create-category')
@section('content')

<div class="card mt-4">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Add Category </h1>
    </div>
    <div class="card-body " >

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Category Name</label>
                <input type="text" class="form-control" placeholder="Required" name="name" >
            </div>
            <div class="mb-3">
                <label>slug</label>
                <input type="text" class="form-control" placeholder="Required" name="slug" >
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea class="form-control" id="mySummernote" name="description" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control"  name="image" >
            </div>
            <h6>SEO tags</h6>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" class="form-control"  name="meta_title" >
            </div>
            <div class="mb-3">
                <label>Meta Description</label>
                <textarea class="form-control"  name="meta_description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label>Meta Keyword</label>
                <textarea class="form-control"  name="meta_keyword" rows="3"></textarea>
            </div>

            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Navbar Status</label>
                    <input type="checkbox" name="navbar_status">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
