
@extends('admin.master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD USER ACCOUNT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 style="text-align: center">Thêm tài khoản admin</h1>
<div class="container">
    <form action="{{ route('admins.store-account') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
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
            <label class="form-label">Vai trò</label>
            <select class="form-select" name="role">
                <option selected>Chọn vai trò</option>
                @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                {{-- <option value="3">Khách</option> --}}
                <option value="2">Nhân viên</option>
                <option value="1">Quản trị viên</option>         
            </select>
            @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <br>
    <a href="{{ route('admins.account') }}">
        <button type="button" class="btn btn-primary">Danh sách</button>
    </a>
</div>
</body>

</html>

@endsection