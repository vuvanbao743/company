@extends('adminlte.master')

@section('content')
<div class="container mt-4">
    <form action="{{ route('admins.update-user', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nơi ở</label>
            <input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ảnh đại diện</label><br>
            <button type="button" id="upload_widget" class="btn btn-primary mb-2">Tải ảnh mới lên Cloudinary</button>

            {{-- Input ẩn chứa URL ảnh --}}
            <input type="hidden" name="avatar" id="uploaded_image" value="{{ old('avatar', $user->avatar) }}">

            {{-- Hiển thị ảnh cũ hoặc ảnh mới --}}
            <div id="preview_image">
                @if ($user->avatar)
                    <img src="{{ $user->avatar }}" width="120" style="border-radius: 8px; object-fit: cover;">
                @endif
            </div>

            @error('avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"
            onclick="return confirm('Bạn chắc chắn muốn thay đổi thông tin tài khoản?')">Thay đổi thông tin tài khoản</button>
    </form>

    <br>
    <a href="{{ route('admins.user') }}">
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
                uploadPreset: 'users_images' // dùng preset cho user
            }, (error, result) => {
                if (!error && result && result.event === "success") {
                    document.getElementById("uploaded_image").value = result.info.secure_url;
                    document.getElementById("preview_image").innerHTML =
                        `<img src="${result.info.secure_url}" width="120" style="object-fit: cover; border-radius: 8px;">`;
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
