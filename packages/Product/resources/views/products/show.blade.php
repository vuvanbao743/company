@extends('adminlte.master')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">

                <div class="text-center mb-4">
                    @if ($product->image)
                        <img src="{{ $product->image }}" alt="Product Image" width="250" height="250"
                            style="object-fit: cover;">
                    @else
                        <p class="text-muted">Không có hình ảnh sản phẩm</p>
                    @endif

                </div>

                <h4 class="card-title text-center">{{ $product->name }}</h4>

                <p><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VND</p>
                <p><strong>Số lượng:</strong> {{ $product->quantity }}</p>
                <p><strong>Mô tả:</strong> {{ $product->description ?? 'Không có mô tả' }}</p>

                <div class="text-end">
                    <a href="{{ route('admins.product') }}">
                        <button type="button" class="btn btn-primary">Quay lại danh sách</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
