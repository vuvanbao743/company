@extends('adminlte::page')

@section('content')
<div class="container mt-5">
    <h2>Quản lý Theme</h2>

    @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

   <form method="POST" action="{{ route('admins.settings.update') }}" class="mt-4">
    @csrf
    <div class="mb-5">
        <label for="admin_package_enabled" class="form-label">Chọn giao diện:</label>
        <select name="admin_package_enabled" id="admin_package_enabled" class="form-control ">
            <option value="1" {{ $enabled ? 'selected' : '' }}>Theme 2 </option>
            <option value="0" {{ !$enabled ? 'selected' : '' }}>Theme 1 </option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
</form>

</div>
@endsection
