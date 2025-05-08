@extends('admin.master')

@section('content')
<div class="container mt-5">
    <h2>Quản lý Package User</h2>

    @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admins.settings.update') }}" class="mt-4">
        @csrf
        <input type="hidden" name="admin_package_enabled" value="{{ $enabled ? '0' : '1' }}">
        <button type="submit" class="btn {{ $enabled ? 'btn-danger' : 'btn-success' }}">
            {{ $enabled ? 'Tắt Package User' : 'Bật Package User' }}
        </button>

    </form>
</div>
@endsection
