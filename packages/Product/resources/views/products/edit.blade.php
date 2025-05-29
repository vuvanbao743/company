@extends('adminlte.master')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('admins.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="number" class="form-control" name="price" value="{{ old('price', $product->price) }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="number" class="form-control" name="quantity"
                    value="{{ old('quantity', $product->quantity) }}">
                @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea class="form-control" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" name="image" accept="image/*">

                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ $product->image }}" alt="Product Image" width="150"
                            style="object-fit: cover; border-radius: 8px;">
                    </div>
                @endif

                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"
                onclick="return confirm('Bạn chắc chắn muốn cập nhật sản phẩm?')">Cập nhật sản phẩm</button>
        </form>

        <br>
        <a href="{{ route('admins.product') }}">
            <button type="button" class="btn btn-primary">Quay lại danh sách</button>
        </a>
    </div>
@endsection
