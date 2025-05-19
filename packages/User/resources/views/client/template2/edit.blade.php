<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('../../admin.blocks.style')

</head>

<body>
    <h2>Sửa thông tin</h2>

    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Tên</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required><br>

        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required><br>

        <label>Hình ảnh</label>
        <input type="file" name="avatar" class="form-control"><br>

        @if ($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="100"><br>
        @endif

        <label>Mật khẩu mới (nếu muốn thay đổi)</label>
        <input type="password" name="password" class="form-control"><br>

        <label>Số điện thoại</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}"><br>

        <label>Địa chỉ</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}"><br>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('user.profile') }}" class="btn btn-secondary">Quay lại</a>
    </form>

</body>

</html>