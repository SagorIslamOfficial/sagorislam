<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>@yield('title') {{ config("app.name") }}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('storage/home/' . $home->logo) }}" rel="icon">
        <link href="{{ asset('storage/home/' . $home->logo) }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset("frontEnd/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("frontEnd/vendor/icofont/icofont.min.css") }}" rel="stylesheet">
        <link href="{{ asset("frontEnd/vendor/owl.carousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
        <link href="{{ asset("frontEnd/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
        <link href="{{ asset("frontEnd/vendor/venobox/venobox.css") }}" rel="stylesheet">
        <link href="{{ asset("frontEnd/vendor/aos/aos.css") }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset("frontEnd/css/style.css") }}" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Kelly - v2.0.0
        * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
<body>

    <!-- ======= Header ======= -->
    @extends('frontEnd.inc.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @yield('content')
    <!-- End Hero -->

    <!-- ======= Footer ======= -->
    @extends('frontEnd.inc.footer')
    <!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset("frontEnd/vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/jquery.easing/jquery.easing.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/waypoints/jquery.waypoints.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/counterup/counterup.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/owl.carousel/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/venobox/venobox.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/aos/aos.js") }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset("frontEnd/js/main.js") }}"></script>

</body>
</html>
