<!-- jQuery -->
<style>
     .nav-link.dropdown-toggle::after {
    display: none !important;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle (JS + Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="site-navbar-top">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                <form action="" class="site-block-top-search">
                    <span class="icon icon-search2"></span>
                    <input type="text" class="form-control border-0" placeholder="Search">
                </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <div class="site-logo">
                    <a href="index.html" class="js-logo-clone">Shoppers</a>
                </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <div class="site-top-icons">
                    <ul>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="icon icon-person"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" style=" .nav-link.dropdown-toggle::after {
    display: none !important;">
                                @if (auth('admin')->check())
                                    <h6 class="dropdown-header">Xin chào {{ auth('admin')->user()->name }}</h6>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Trang Admin</a>
                                    {{-- @php
                                        $packageEnabled = \App\Models\Setting::get('admin_package_enabled', false);
                                    @endphp
                                    @if ($packageEnabled)
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">Xem/Sửa thông
                                            tin</a>
                                    @endif --}}
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Đăng xuất</button>
                                    </form>
                                @elseif (auth('user')->check())
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
                                    <a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a>
                                @endif
                            </div>
                        </li>

                        <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                        <li>
                            <a href="cart.html" class="site-cart">
                                <span class="icon icon-shopping_cart"></span>
                                <span class="count">2</span>
                            </a>
                        </li>
                        <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
