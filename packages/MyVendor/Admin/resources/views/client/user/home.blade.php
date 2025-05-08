<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    @include('../../admin.blocks.style')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f8;
            display: flex;
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
        }

        h1 {
            margin-bottom: 20px;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.2s;
        }

        a.button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
        @if (auth('admin')->check())
            <h1>Chào mừng {{ auth('admin')->user()->name }} đến với Trang Chủ</h1>
            <a class="button" href="{{ route('admin.dashboard') }}">Quay lại trang Admin</a>
        @elseif (auth('user')->check())
            <h1>Chào mừng {{ auth('user')->user()->name }} đến với Trang Chủ</h1>

            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Đăng xuất</button>
                @php
                    $packageEnabled = \App\Models\Setting::get('admin_package_enabled', false); // <-- sửa namespace đúng
                @endphp
                @if ($packageEnabled) <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm ml-2">Xem/Sửa thông tin</a> @endif
            </form>
        @else
            <h1>Chào mừng bạn đến với Trang Chủ</h1>
            <a class="button" href="{{ route('login') }}">Đăng nhập</a>
        @endif
    </div>
</body>

</html>
