<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>@yield('title') {{ config("app.name") }}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- CSS -->
        <!-- Favicons -->
        <link href="{{ asset("frontEnd/img/logo.png") }}" rel="icon">
        <link href="{{ asset("frontEnd/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset("frontEnd/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("frontEnd/vendor/icofont/icofont.min.css") }}" rel="stylesheet">
        <link href="{{ asset("frontEnd/vendor/owl.carousel/assets/owl.carousel.min.css") }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset("frontEnd/css/style.css") }}" rel="stylesheet">
    </head>

<body>

    <main id="main">
        @if($item != null)

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row">

                    <div class="col-lg-8">
                        <h2 class="portfolio-title">{{ $item->pd_title }}</h2>
                        <div class="owl-carousel portfolio-details-carousel">
                            @php($images = json_decode($item->pd_images))
                            @foreach($images as $file)
                                <img src="{{ asset('storage/portfolio/itemsDetails/' . $file) }}" alt="{{ $item->name }}" class="img-fluid">
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4 portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li class="mb-2 text-capitalize"><strong>Category</strong> : {{ $item->category->name }}</li>
                            @foreach($pd_section as $key => $pd_s)
                                <ul>
                                    <li class="mb-2">
                                        @foreach((array) $pd_s as $pd_ss)
                                            <strong>{{ $pd_ss }}</strong> : {{ $pd_s_content[$key] }}
                                        @endforeach
                                    </li>
                                </ul>
                            @endforeach
                            <li><strong>Project URL</strong> : <a target="_blank" title="Click here for see this website" href="{{ $item->pd_link }}">{{ $item->pd_link_text }}</a></li>
                        </ul>
                        <p class="">{!! $item->pd_description !!}</p>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main>
    @else
        <h6>There is no contents here. Please check it later:) Thanks</h6>
    @endif
    <!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset("frontEnd/vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/waypoints/jquery.waypoints.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/counterup/counterup.min.js") }}"></script>
    <script src="{{ asset("frontEnd/vendor/owl.carousel/owl.carousel.min.js") }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset("frontEnd/js/main.js") }}"></script>

</body>
</html>
