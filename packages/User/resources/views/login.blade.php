@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Đăng nhập')
@section('auth_body')
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <x-adminlte-input name="email" label="Email" type="email" placeholder="Email" value="{{ old('email') }}" required autofocus />
        <x-adminlte-input name="password" label="Mật khẩu" type="password" placeholder="Mật khẩu" required />

        <x-adminlte-button label="Đăng nhập" type="submit" theme="primary" class="btn-block"/>
    </form>
@endsection

{{-- @section('auth_footer')
    <p class="my-0">
        <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
    </p>
    <p class="my-0">
        <a href="{{ route('register') }}">Đăng ký tài khoản</a>
    </p>
@endsection --}}
