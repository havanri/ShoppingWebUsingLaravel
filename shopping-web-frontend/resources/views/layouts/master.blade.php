<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <!--Css default-->
    @include('components.css_default')
    <!--Css default-->
    <link rel="stylesheet" href="{{ asset('main/main.css') }}">
    @yield('css')
</head>

<body>
    <!-- Navbar -->
    @include('components/header')
    <!-- /.navbar -->

    {{-- <!-- Main Sidebar Container -->
    @include('partials/slider') --}}

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('components/footer')

    <!--Js default-->
    @include('components.js_default') 
    <!--/Js default-->   
    <script src="{{ asset('main/main.js') }}"></script>
    
    @yield('js')
</body>

</html>