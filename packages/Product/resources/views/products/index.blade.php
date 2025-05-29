@extends('adminlte.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Quản lý sản phẩm</h3>
            <a href="{{ route('admins.product.create') }}" class="ms-auto">
                <button type="button" class="btn btn-success">Thêm sản phẩm</button>
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @php $stt = 1; @endphp
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>       
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="product image" width="100" height="70" style="object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 0, ',', '.') }} ₫</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>
                                <a href="{{ route('admins.product.show', $product->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admins.product.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pen"></i>
                                </a>
                                <form action="{{ route('admins.product.delete', $product->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
