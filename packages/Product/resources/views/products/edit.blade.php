@extends('adminlte.master')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('admins.product.update', $product->id) }}" method="POST">
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
                <input type="number" class="form-control" name="quantity" value="{{ old('quantity', $product->quantity) }}">
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
                <label class="form-label">Ảnh sản phẩm</label><br>
                <button type="button" id="upload_widget" class="btn btn-primary mb-2">Tải ảnh mới lên Cloudinary</button>

                {{-- input ẩn chứa URL ảnh --}}
                <input type="hidden" name="image" id="uploaded_image" value="{{ old('image', $product->image) }}">

                {{-- hiển thị ảnh cũ hoặc ảnh mới nếu vừa upload --}}
                <div id="preview_image">
                    @if ($product->image)
                        <img src="{{ $product->image }}" width="150" style="object-fit: cover; border-radius: 8px;">
                    @endif
                </div>

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

@section('scripts')
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            var myWidget = cloudinary.createUploadWidget({
                cloudName: 'deyxfmi2b',
                uploadPreset: 'product_images'
            }, (error, result) => {
                if (!error && result && result.event === "success") {
                    document.getElementById("uploaded_image").value = result.info.secure_url;
                    document.getElementById("preview_image").innerHTML =
                        `<img src="${result.info.secure_url}" width="150" style="object-fit: cover; border-radius: 8px;">`;
                }
            });

            const uploadBtn = document.getElementById("upload_widget");
            if (uploadBtn) {
                uploadBtn.addEventListener("click", function () {
                    myWidget.open();
                });
            }
        });
    </script>
@endsection
