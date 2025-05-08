@extends('admin.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LIST USER
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </head>

    <body>
        <h1 style="text-align: center">Danh sách tài khoản</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admins.create-user') }}">
            <button type="button" class="btn btn-success mb-3">Add</button>
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @php $stt = 1; @endphp
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $stt++ }}</td>

                        <td>
                            @if ($item->avatar)
                                <img src="{{ asset('storage/' . $item->avatar) }}" alt="avatar" width="100px"
                                    height="70px" style="object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>

                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone ?? '-' }}</td>
                        <td>{{ $item->address ?? '-' }}</td>

                        <td>
                            <a href="{{ route('admins.detail-user', $item->id) }}">
                                <button type="button" class="btn btn-warning btn-sm">Show</button>
                            </a>
                            <a href="{{ route('admins.edit-user', $item->id) }}">
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                            </a>
                            <form action="{{ route('admins.delete-user', $item->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>

    </html>
@endsection
