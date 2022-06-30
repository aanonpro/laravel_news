@extends('layouts.master')

@section('title','Admin Dashboard')
@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('admin/delete-category') }}" method="post" enctype="multipart/form">
            @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category with it's Post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="category_delete_id" id="category_id">
            <h5>Are you sure you want to delete this Category with all its Post?</h5>
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
                        {{-- <a href="{{ url('admin/delete-category/' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                        <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{ $item->id }}" >Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</div>

@endsection

@section('scripts')

   <script>

    $(document).ready(function () {
        // $('.deleteCategoryBtn').click(function (e) {
        $(document).on('click','.deleteCategoryBtn', function (e) {

            e.preventDefault();

            var category_id = $(this).val();
            $('#category_id').val(category_id);
            $('#deleteModal').modal('show');

            
        });
    });

   </script>

@endsection