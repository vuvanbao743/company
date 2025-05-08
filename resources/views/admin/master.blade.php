<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- <title>{{ $title }}</title> --}}
    @include('admin.blocks.style')
    @yield('css')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.blocks.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.blocks.nav')
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.blocks.footer')
        </div>
    </div>
    @include('admin.blocks.script')
    @yield('js')
</body>

</html>
