@extends('adminlte.master')

@section('content')
    <div class="container mt-4">
        <h3>Thêm sản phẩm</h3>

        <form action="{{ route('admins.product.store') }}" method="POST">
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
                <br>
                {{-- Cloudinary Upload Widget --}}
                <x-cloudinary::widget />
                {{-- Input hidden để lưu public_id sau khi upload --}}
                <input type="hidden" name="image" id="cloudinary_image_id">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
            <a href="{{ route('admins.product') }}" class="btn btn-secondary">Quay lại danh sách</a>
        </form>
    </div>

    @push('scripts')
        <script>
            // Cloudinary upload widget callback
            document.addEventListener("cloudinarywidgetsuccess", function(e) {
                const publicId = e.detail.info.public_id;
                document.getElementById('cloudinary_image_id').value = publicId;
            });
        </script>
    @endpush
@endsection
