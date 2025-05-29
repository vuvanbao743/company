@extends('adminlte.master')
@section('content')
<div class="container mt-4">
    <h3>Thêm tài khoản</h3>

    <form action="{{ route('admins.store-user') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nơi ở</label>
            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ảnh đại diện</label><br>
            <button type="button" id="upload_widget" class="btn btn-primary mb-2">Tải ảnh lên Cloudinary</button>
            <input type="hidden" name="avatar" id="uploaded_image" value="{{ old('avatar') }}">
            <div id="preview_image">
                @if(old('avatar'))
                    <img src="{{ old('avatar') }}" width="150">
                @endif
            </div>
            @error('avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Tạo tài khoản</button>
        <a href="{{ route('admins.user') }}" class="btn btn-secondary">Quay lại danh sách</a>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        var myWidget = cloudinary.createUploadWidget({
            cloudName: 'deyxfmi2b',
            uploadPreset: 'users_images' // bạn đã tạo preset này trong Cloudinary chưa?
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