@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sach san pham
@endsection

@push('styles')
    <style>
        a{
            color: gray;
        }
    </style>
@endpush
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
        @if(session('error'))
            <div id="success-message" class="alert alert-success alert-dismissible fade show " role="alert">
                {{ session('error') }}
{{--                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
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

        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Name_Category</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col" width="150">Images</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listProduct as $key => $value)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{ $value->category ? $value->category->name : 'N/A' }}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->price}}</td>
{{--                    <td>{{$value->description}}</td>--}}
                    <td>
                        <img class="img-product" src="{{ asset($value->images) }}" alt="{{ $value->name }}" style="max-width: 150px; height: auto;">
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $value->id)}}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.products.delete', $value->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Xóa</button>
                        </form>
                            <button class="btn btn-secondary btn-sm" >Chi tiết</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <li> {{ $listProduct->links('admin.products.numeric') }}</li>
@endsection
