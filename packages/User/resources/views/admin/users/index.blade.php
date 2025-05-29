@extends('adminlte.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LIST USER
        </title>
    </head>

    <body>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header justify-content-between d-flex">
                <h3 class="card-title">Quản lý tài khoản User</h3>
                @auth
                    @if (auth()->user()->role == 1)
                        <a href="{{ route('admins.create-user') }}" class="ms-auto">
                            <button type="button" class="btn btn-success ">Thêm</button>
                        </a>
                    @endif
                @endauth
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
                                        <img src="{{ route('user.image', ['filename' => basename($item->avatar)]) }}" alt="product image" width="100">
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
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admins.edit-user', $item->id) }}">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                    <form action="{{ route('admins.delete-user', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger"
                                            style="border: none; background: none;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">SĐT</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </body>

    </html>
@endsection
