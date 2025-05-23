<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Login Page v2</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Login Page v2" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    @include('adminlte.partials.css')
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="../index2.html"
                    class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b>Đăng</b>Nhập</h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="form-floating flex-grow-1">
                            <input type="email" name="email" id="loginEmail" class="form-control"
                                placeholder="Email" value="{{ old('email') }}" required autofocus>
                            <label for="loginEmail">Email</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="form-floating flex-grow-1">
                            <input type="password" name="password" id="loginPassword" class="form-control"
                                placeholder="Mật khẩu" required>
                            <label for="loginPassword">Mật khẩu</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-lock"></span></div>
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="/" class="btn btn-primary">Quay về trang chủ</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
    @include('adminlte.partials.js')
</body>

</html>
