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
                <label class="form-label">Ảnh sản phẩm</label><br>
                <button type="button" id="upload_widget" class="btn btn-primary mb-2">Tải ảnh lên Cloudinary</button>
                <input type="hidden" name="image" id="uploaded_image" value="{{ old('image') }}">
                <div id="preview_image"></div>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
            <a href="{{ route('admins.product') }}" class="btn btn-secondary">Quay lại danh sách</a>
        </form>
    </div>

@endsection

@section('scripts')
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        var myWidget = cloudinary.createUploadWidget({
            cloudName: 'deyxfmi2b',
            uploadPreset: 'product_images' // bạn đã tạo preset này trong Cloudinary chưa?
        }, (error, result) => {
            if (!error && result && result.event === "success") {
                document.getElementById("uploaded_image").value = result.info.secure_url;
                document.getElementById("preview_image").innerHTML =
                    `<img src="${result.info.secure_url}" width="150">`;
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
