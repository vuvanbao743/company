@extends('adminlte.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD USER user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>

    @section('content')
        <div class="container mt-4">
          

            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        @if ($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="150" height="150"
                                style=" object-fit: cover;">
                        @else
                            <p class="text-muted">Không có ảnh đại diện</p>
                        @endif
                    </div>

                    <h4 class="card-title text-center">{{ $user->name }}</h4>

                    <p><strong>Email:</strong> {{ $user->email }}</p>

                    <p><strong>Số điện thoại:</strong> {{ $user->phone ?? '-' }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $user->address ?? '-' }}</p>

                    <div class="text-end">
                        <a href="{{ route('admins.user') }}">
                            <button type="button" class="btn btn-primary">Quay lại danh sách</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
