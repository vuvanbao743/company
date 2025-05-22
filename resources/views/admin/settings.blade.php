@extends('adminlte.master')

@section('content')
    <div class="container mt-5">
        {{-- <h2>Quản lý Package</h2> --}}

        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label for="admin_package_enabled" class="form-label">Quản lý giao diện Package theme:</label><br>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admins.settings.update') }}" class="">
                            @csrf
                            <div class="row">


                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="col-sm">
                                            <select name="admin_package_enabled" id="admin_package_enabled"
                                                class="form-control ">
                                                <option value="1" {{ $enabled_theme ? 'selected' : '' }}>Theme 2
                                                </option>
                                                <option value="0" {{ !$enabled_theme ? 'selected' : '' }}>Theme 1
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <button type="submit" class="btn btn-primary ">Cập nhật</button>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="admin_package_enabled" class="form-label">Quản lý Package Import/Export:</label><br>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admins.import_export') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="import_export_enabled" value="{{ $enabled_excel ? '0' : '1' }}">
                            <button type="submit" class="btn {{ $enabled_excel ? 'btn-danger' : 'btn-success' }}">
                                {{ $enabled_excel ? 'Tắt Import/Export' : 'Bật Import/Export' }}
                            </button>
                        </form>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
