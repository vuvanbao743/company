@extends('adminlte::page')

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
        <h1 style="text-align: center">Danh sách tài khoản admin</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @auth
            @if (auth()->user()->role == 1)
                <a href="{{ route('admins.create-account') }}">
                    <button type="button" class="btn btn-success mb-3">Add</button>
                </a>
            @endif
        @endauth
        
        @php
            $packageEnabled = \App\Models\Setting::get('import_export_enabled', true);
        @endphp
        @if ($packageEnabled)
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <a href="{{ route('admins.export') }}" class="btn btn-outline-primary">
                        Export Excel
                    </a>
                </div>

                <form action="{{ route('admins.import') }}" method="POST" enctype="multipart/form-data"
                    class="d-flex gap-2">
                    @csrf
                    <input type="file" name="excel_file" class="form-control" required>
                    <button type="submit" class="btn btn-outline-success">
                        Import Excel
                    </button>
                </form>
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $stt = 1; @endphp
                @foreach ($accounts as $item)
                    <tr>
                        <td>{{ $stt++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->role == 1)
                                <span class="badge bg-primary">Quản trị viên</span>
                            @else
                                <span class="badge bg-success">Nhân viên</span>
                            @endif
                        </td>

                        @auth
                            @if (auth()->user()->role == 1)
                                <td>
                                    <a href="{{ route('admins.detail-account', $item->id) }}">
                                        <button type="button" class="btn btn-warning btn-sm">Show</button>
                                    </a>
                                    <a href="{{ route('admins.edit-account', $item->id) }}">
                                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                    </a>
                                    <form action="{{ route('admins.delete-account', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('You sure you want to delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            @elseif (auth()->user()->role == 2 && $item->role != 1)
                                <td>
                                    <a href="{{ route('admins.detail-account', $item->id) }}">
                                        <button type="button" class="btn btn-warning btn-sm">Show</button>
                                    </a>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endsection
