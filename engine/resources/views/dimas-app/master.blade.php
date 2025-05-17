<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @stack('aditional-css')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @yield('preloader')
        @include('dimas-app.navbar')
        @include('dimas-app.aside')
        @yield('content')
        @include('dimas-app.footer')
    </div>    

    @stack('aditional-js')
</body>
</html>