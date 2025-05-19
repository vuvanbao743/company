{{-- @extends('admin.master')

@section('title')
    {{ $title }}
@endsection --}}

@extends('adminlte::page')

@section('title', 'Trang Quản Trị')

{{-- @section('content_header')
    <h1>Danh sách người dùng</h1>
@endsection --}}

@section('content')
    @if(auth('admin')->check())
        <h1>Xin chào: {{ auth('admin')->user()->name }}</h1>
    @endif
@endsection
