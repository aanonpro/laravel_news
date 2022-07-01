@extends('layouts.master')

@section('title','Admin view-posts')
@section('content')


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('admin/delete-post') }}" method="post" enctype="multipart/form">
            @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="post_delete_id" id="post_id">
            <h5>Are you sure you want to delete this Post?</h5>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>


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

    <div class="table-responsive">
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
                            {{-- <a href="{{ url('admin/delete-post/' . $postitem->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                            <button class="btn btn-danger btn-sm deletePostBtn" type="button" value="{{ $postitem->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
</div>

@endsection

@section('scripts')

   <script>

    $(document).ready(function () {
        // $('.deleteCategoryBtn').click(function (e) {
        $(document).on('click','.deletePostBtn', function (e) {

            e.preventDefault();

            var post_id = $(this).val();
            $('#post_id').val(post_id);
            $('#deleteModal').modal('show');


        });
    });

   </script>

@endsection
