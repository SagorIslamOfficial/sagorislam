@extends('layouts.frontEndMaster')

@section('title', 'Services -')

@section('content')
    <!-- Start #main -->
    @if($headings != null and $service != null)
        <main id="main">

            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>{{ $headings->service_heading }}</h2>
                        <p>{{ $headings->service_sub_text }}</p>
                    </div>

                    <div class="row">
                        @foreach($service as $data)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-3" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box iconbox-blue">
                                    <div class="icon">
                                        <i class="icofont-{{ $data->icon }}"></i>
                                    </div>
                                    <h4><a class="text-success" href="{{ $data->link }}">{{ $data->name }}</a></h4>
                                    <p>{!! $data->description !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </section><!-- End Services Section -->

        </main>
    @else
        <h3>There is no contents here. Please check it later:) Thanks</h3>
    @endif
    <!-- End #main -->
@endsection
