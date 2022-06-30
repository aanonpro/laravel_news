@extends('layouts.master')

@section('title','Admin Edit-posts')
@section('content')


<div class="card mt-4">

    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Edit Posts <a class="btn btn-danger btn-sm float-end" href="{{ url('admin/posts') }}">Back</a></h1>
    </div>
    <div class="card-body">

        @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

        <form action="{{ url('admin/update-post/'.$post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" required class="form-control">
                    <option value="">----Select category----</option>
                    @foreach ($category as $cateitem)
                        <option value="{{ $cateitem->id }}" {{ $post->category_id == $cateitem->id ? 'selected' : '' }}>
                            {{ $cateitem->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <img src="{{ asset('uploads/post/'.$post->image_cover) }}" width="50px" alt="post-image">
            </div>
            <div class="mb-3">
                <label>image-cover</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label>Post Name</label>
                <input type="text" name="name" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>slug</label>
                <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Short Detail</label>
                <input type="text" name="short_title" value="{{ $post->short_title }}" class="form-control">
            </div>
            
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" id="mySummernote" class="form-control" rows="4">{!! $post->Description !!}</textarea>
            </div>
            <div class="mb-3">
                <label>Youtube Iframe Link</label>
                <input type="text" name="yt_iframe" value="{{ $post->yt_iframe }}" class="form-control">
            </div>

            <h4>SEO Tags</h4>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
            </div>
           
            <div class="mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3">{!! $post->meta_description !!}</textarea>
            </div>
            <div class="mb-3">
                <label>Meta Keyword</label>
                <textarea name="meta_keyword" class="form-control" rows="3">{!! $post->meta_keyword !!}</textarea>
            </div>

            <h4>Status</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked' :''}} >
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update Post</button>
                    </div>
                </div>
            </div>


        </form>

    </div>
</div>

@endsection
