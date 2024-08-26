@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kết quả tìm kiếm cho: "{{ $query }}"</h1>

        @if($brands->isEmpty())
            <p>Không tìm thấy kết quả nào.</p>
        @else
            <ul>
                @foreach($products as $product)
                    <li>
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->price }}</p>
                        <p>{{ $product->description }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection

