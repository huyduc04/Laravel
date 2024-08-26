@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách Category
@endsection

@push('styles')
    <style>
        a {
            color: gray;
        }
    </style>
@endpush

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Danh sách Category</h4>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
        @if (session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div id="success-message" class="alert alert-success alert-dismissible fade show " role="alert">
                {{ session('error') }}
                {{--                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
            </div>
        @endif
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var successMessage = document.getElementById('success-message');
                    if (successMessage) {
                        // Để hiển thị thông báo một thời gian trước khi bắt đầu fade out
                        setTimeout(function() {
                            successMessage.classList.add('hide');
                        }, 1000); // Thời gian trước khi bắt đầu fade out (3 giây)
                    }
                });
            </script>
        @endpush

        @push('styles')
            <style>
                .hide {
                    opacity: 1;
                    transition: opacity 1s ease-out;
                }

                .hide {
                    opacity: 0;
                }
            </style>
        @endpush


        <!-- Filter Form  Lọc sản phẩm-->
        <form action="{{ route('admin.category.listCategory') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="query">Filter ID</label>
                        <input type="text" name="query" id="query" class="form-control" style="box-shadow: inset 0 4px 8px rgba(0, 0, 0, 0.2); " value="{{ request()->input('query') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Filter Name</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">
                                Please choose
                            </option>
                            @foreach($listCategory as $key => $value)
                                <option name="cate" value="{{ $value->id }}" {{ request()->input('category') == $value->id ? 'selected' : '' }}>
                                {{ $value->name }}
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="btn">Filter</button>
                </div>

        </form>
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col" width="150">Images</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listCategory as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{$value->id}}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        <img class="img-category" src="{{ asset($value->images) }}" alt="{{ $value->name }}" style="max-width: 150px; height: auto;">
                    </td>
                    <td>
                        <a href="{{ route('admin.category.edit', $value->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.category.delete', $value->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa category này không?');">Xóa</button>

                        </form>
                        <button class="btn btn-secondary btn-sm">Chi tiết</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <li>{{ $listCategory->links('admin.category.numeric') }}</li>
@endsection
