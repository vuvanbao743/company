@extends('adminlte::page')
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

    @section('content')
        <div class="container mt-4">
            <h2 class="text-center mb-4">Thông tin tài khoản admin</h2>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $account['name'] }}</h4>

                    <p><strong>Email:</strong> {{ $account['email'] }}</p>
                    <p><strong>Vai trò:</strong>
                        @if ($account['role'] == 1)
                            <span class="badge bg-primary">Quản trị viên</span>
                        @elseif($account['role'] == 2)
                            <span class="badge bg-success">Nhân viên</span>
                        @else
                            <span class="badge bg-danger">Khách</span>
                        @endif
                    </p>

                    <a href="{{ route('admins.account') }}">
                        <button type="button" class="btn btn-primary">Danh sách</button>
                    </a>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
