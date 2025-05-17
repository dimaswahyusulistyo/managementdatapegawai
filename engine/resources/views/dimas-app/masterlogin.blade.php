<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @stack('aditional-css')
    @stack('aditional-js')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @yield('preloader')
        @include('dimas-app.login')
        @include('dimas-app.register')
    </div>    
</body>
</html>