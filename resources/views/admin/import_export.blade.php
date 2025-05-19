@extends('adminlte::page')

@section('content')
<div class="container mt-5">
    <h2>Quản lý Import/Export</h2>

    @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admins.import_export') }}" class="mt-4">
        @csrf
        <input type="hidden" name="import_export_enabled" value="{{ $enabled ? '0' : '1' }}">
        <button type="submit" class="btn {{ $enabled ? 'btn-danger' : 'btn-success' }}">
            {{ $enabled ? 'Tắt Import/Export' : 'Bật Import/Export' }}
        </button>
    </form>
</div>
@endsection
