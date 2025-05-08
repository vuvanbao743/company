@extends('admin.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @if(auth('admin')->check())
        <h1>Xin chào: {{ auth('admin')->user()->name }}</h1>
    @endif
@endsection
