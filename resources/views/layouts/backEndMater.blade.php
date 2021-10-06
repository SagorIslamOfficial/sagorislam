<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Personal Portfolio Website for Sagor Islam." name="description"/>
    <meta content="sagorislam" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- Favicons -->
    <link href="{{ asset('storage/home/' . $home->logo) }}" rel="icon">
    <link href="{{ asset('storage/home/' . $home->logo) }}" rel="apple-touch-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App Title -->
    <title>@yield('title') {{ config('app.name') }}</title>

    @extends('auth.login-register.css.css')

    <style>
        td.tdc>p {
            color: #98a6ad !important;
            background-color: #323a46 !important;
        }
    </style>

    @stack('css')

</head>
<body>
    <!-- Start wrapper -->
    <div id="wrapper">

        <!-- Top bar Start -->
        @include('backEnd.inc.menubar')
        <!-- end Top bar -->

        <!-- Left Sidebar Start -->
        @include('backEnd.inc.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start Page Content here -->
        @yield('content')
        <!-- End Page content -->

    </div>
    <!-- END wrapper -->

    @extends('backEnd.inc.footer')

    <!-- Vendor js -->
    <script src="{{ asset('backEnd/js/vendor.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('backEnd/js/app.min.js') }}"></script>

    @stack('js')

</body>
</html>
