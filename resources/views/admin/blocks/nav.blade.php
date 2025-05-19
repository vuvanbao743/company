<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>


    @if (auth('user')->check())
        <h6 class="dropdown-header">Xin chào {{ auth('user')->user()->name }}</h6>
        @php
            $packageEnabled = \App\Models\Setting::get('admin_package_enabled', false);
        @endphp
        @if ($packageEnabled)
            <a class="dropdown-item" href="{{ route('user.profile') }}">Xem/Sửa thông
                tin</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="dropdown-item" type="submit">Đăng xuất</button>
        </form>
    @else
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Đăng xuất</button>
        </form>
    @endif
</nav>
