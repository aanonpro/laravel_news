@extends('layouts.master')

@section('title','Admin create-category')
@section('content')

<div class="card mt-4">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Edit Category <a class="btn btn-danger btn-sm float-end" href="{{ url('admin/category') }}">Back</a> </h1>
    </div>
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Category Name</label>
                <input type="text" class="form-control" value="{{ $category->name }}" name="name" >
            </div>
            <div class="mb-3">
                <label>slug</label>
                <input type="text" class="form-control" value="{{ $category->slug }}" name="slug" >
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea class="form-control" id="mySummernote" name="description" rows="5">{{ $category->description }}</textarea>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control" name="image" >
            </div>
            <h6>SEO tags</h6>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" class="form-control" value="{{ $category->meta_title }}" name="meta_title" >
            </div>
            <div class="mb-3">
                <label>Meta Description</label>
                <textarea class="form-control" name="meta_description" rows="3">{{ $category->meta_description }}</textarea>
            </div>
            <div class="mb-3">
                <label>Meta Keyword</label>
                <textarea class="form-control" name="meta_keyword" rows="3">{{ $category->meta_keywords }}</textarea>
            </div>

            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Navbar Status</label>
                    <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1' ? 'checked' :''}}>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' :''}}>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
 
@endsection