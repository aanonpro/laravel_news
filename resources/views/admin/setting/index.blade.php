@extends('layouts.master')

@section('title','Admin Settings')
@section('content')

<div class="card mt-4">

    @if (session('message'))
        <h4 class="alert alert-warning">{{ session('message') }}</h4>
    @endif

    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Website Settings </h1>
    </div>
    <div class="card-body " >

        {{-- @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif --}}

        <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Website Name</label>
                <input type="text" class="form-control" @if($setting) value="{{$setting->website_name}}" @endif required placeholder="Required" name="website_name" >
            </div>
        
            <div class="mb-3">
                <label>Website Logo</label>
                <input type="file" class="form-control"  name="website_logo" >
                @if ($setting)
                    <img src="{{ asset('uploads/settings/'. $setting->logo )}}" alt="logo" width="100px"">                    
                @endif
            </div>
            <div class="mb-3">
                <label>Website Favicon</label>
                <input type="file" class="form-control"  name="website_favicon" >
                @if ($setting)
                <img src="{{ asset('uploads/settings/'. $setting->favicon )}}" alt="logo" width="100px"">                    
            @endif
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3">@if($setting) {{$setting->description}} @endif</textarea>
            </div>
           
            <h6>SEO Meta tags</h6>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" class="form-control" @if($setting) value="{{$setting->meta_title}}" @endif  name="meta_title" >
            </div>
            <div class="mb-3">
                <label>Meta Keyword</label>
                <textarea class="form-control" name="meta_keyword" rows="3">@if($setting) {{$setting->meta_keyword}} @endif</textarea>
            </div>

            <div class="mb-3">
                <label>Meta Description</label>
                <textarea class="form-control"  name="meta_description" rows="3">@if($setting) {{$setting->meta_description}} @endif</textarea>
            </div>
       
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
