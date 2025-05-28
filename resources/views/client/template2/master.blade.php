<!DOCTYPE html>
<html lang="en">

<head>
    <title>Stylish - Shoes Online Store HTML Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="TemplatesJungle">
    <meta name="keywords" content="Online Store">
    <meta name="description" content="Stylish - Shoes Online Store HTML Template">
    @include('client.template2.layouts.partials.css')
</head>

<body>
    @include('client.template2.layouts.partials.header-top')
   
      <header id="header" class="site-header text-black">
            @include('client.template2.layouts.partials.header-top-tag-header')
            @include('client.template2.layouts.partials.header-nav')
        </header>

        @yield('content')

        <footer id="footer" class="py-5 border-top">
            @include('client.template2.layouts.partials.footer')
        </footer>


    @include('client.template2.layouts.partials.js')
    @yield('scripts')
</body>

</html>
