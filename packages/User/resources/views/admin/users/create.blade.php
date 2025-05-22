
@extends('adminlte.master')
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
   
<div class="container">
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
            <label class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" name="avatar" accept="image/*">
            @error('avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-success" >Tạo tài khoản</button>
    </form>
    
    <br>
    <a href="{{ route('admins.user') }}">
        <button type="button" class="btn btn-primary">Quay lại danh sách</button>
    </a>
</div>
</body>

</html>

@endsection