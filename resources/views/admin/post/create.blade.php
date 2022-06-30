@extends('layouts.master')

@section('title','Admin add-posts')
@section('content')


<div class="card mt-4">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Add Posts <a class="btn btn-primary btn-sm float-end" href="{{ url('admin/posts') }}">view Posts</a></h1>
    </div>
    <div class="card-body">

        <form action="{{ url('admin/add-posts') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    <option value="0">----Select category----</option>
                    @foreach ($category as $cateitem)
                    <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>image-cover</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label>Post Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label>slug</label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="mb-3">
                <label>Short Detail</label>
                <input type="text" name="short_title" class="form-control">
            </div>
            {{-- <div class="mb-3">
                <label>image-content-1</label>
                <input type="file" name="image_content_1" class="form-control">
            </div> --}}
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" id="mySummernote" class="form-control" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label>Youtube Iframe Link</label>
                <input type="text" name="yt_iframe" class="form-control">
            </div>

            <h4>SEO Tags</h4>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
            </div>
            {{-- <div class="mb-3">
                <label>image-content-2</label>
                <input type="file" name="image_content_2" class="form-control">
            </div> --}}
            <div class="mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label>Meta Keyword</label>
                <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
            </div>

            <h4>Status</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status"  >
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end"> Post</button>
                    </div>
                </div>
            </div>


        </form>

    </div>
</div>

@endsection
