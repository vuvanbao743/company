@extends('adminlte.master')

@section('content')
    <div class="container mt-4">
        <h3>Thêm sản phẩm</h3>

        <form action="{{ route('admins.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">
                @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="image" accept="image/*">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
            <a href="{{ route('admins.product') }}" class="btn btn-secondary">Quay lại danh sách</a>
        </form>
    </div>
@endsection
