@extends('adminlte.master')

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
       
        <div class="container">
            <form action="{{ route('admins.update-account', $account->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $account->name) }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $account->email) }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- {{ old('password', $account->password) }} --}}
                {{-- <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Để trống nếu không đổi mật khẩu">

                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label class="form-label">Vai trò</label>

                    @auth
                        @if (auth()->user()->role == 1)
                            <select class="form-select" name="role">
                                {{-- <option value="3" {{ $account->role == 3 ? 'selected' : '' }}>Khách</option> --}}
                                <option value="2" {{ $account->role == 2 ? 'selected' : '' }}>Nhân viên</option>
                                <option value="1" {{ $account->role == 1 ? 'selected' : '' }}>Quản trị viên</option>         
                            </select>
                        @endif
                    @endauth

                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>

            <br>
            <a href="{{ route('admins.account') }}">
                <button type="button" class="btn btn-primary">Danh sách</button>
            </a>
        </div>
        @endsection
    </body>

    </html> 
