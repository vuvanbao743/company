<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('client.template1.layouts.partials.css')
</head>
<body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            @include('client.template1.layouts.partials.header-top')
            @include('client.template1.layouts.partials.header-nav')
        </header>

        @yield('content')

        <footer class="site-footer border-top">
            @include('client.template1.layouts.partials.footer')
        </footer>
    </div>

    @include('client.template1.layouts.partials.js')
    @yield('scripts')
</body>
</html>
