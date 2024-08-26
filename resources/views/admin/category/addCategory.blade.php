@extends('admin.layouts.default')

@section('title')
    <h1>ADD product</h1>
@endsection

@section('content')
    <style>
        input{
            background-color: #ffc0cb; /* Màu hồng nhạt */
            box-shadow: inset 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    <div class="p-4" style="min-height: 800px;">
        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label>Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name">
            <label  class="fw-bold">Image: </label>
            <input type="file" class="form-control" id="image" name="image">
            <br>
            <button type="submit" class="btn btn-success">Thêm mới</button>
        </form>
    </div>
@endsection
