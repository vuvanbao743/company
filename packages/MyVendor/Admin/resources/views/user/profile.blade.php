<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('../../admin.blocks.style')
    <style>
          /* body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f8;
            text-align: center;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        } */
    </style>
</head>

<body>
    <h2>Thông tin của bạn</h2>

    {{-- Hiển thị ảnh đại diện nếu có --}}
    @if($user->avatar)
        <p>
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="120" style="border-radius: 8px;">
        </p>
    @endif

    <p>Tên: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Số điện thoại: {{ $user->phone ?? 'Chưa cập nhật' }}</p>
    <p>Địa chỉ: {{ $user->address ?? 'Chưa cập nhật' }}</p>

    <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">Sửa thông tin</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Quay lại trang chủ</a>
</body>


</html>
