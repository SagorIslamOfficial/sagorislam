@extends('layouts.frontEndMaster')

@section('title', 'About -')

@section('content')
    <!-- Start #main -->
        <main id="main">

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        @if($headings != null)
                            <h2>{{ $headings->about_heading }}</h2>
                            <p>{{ $headings->about_sub_text }}</p>
                        @else
                            <h6 class="text-center">There is no <strong>about heading</strong> contents here. Please check it later:) Thanks</h6>
                        @endif
                    </div>

                    <div class="row">
                        @if($aboutUs != null)
                            <div class="col-lg-4">
                                <img src="{{ asset('storage/about-us/' . $aboutUs->image) }}" alt="{{ $aboutUs->dignity }}" class="img-fluid">
                            </div>
                            <div class="col-lg-8 pt-4 pt-lg-0 content">
                                <h3>{{ $aboutUs->dignity }}</h3>
                                <p class="font-italic">{{ $aboutUs->sub_text }}</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul>
                                            @foreach($about_us_name as $key => $nameData)
                                                <li><i class="icofont-rounded-right"></i> <strong>{{ $nameData }}:</strong> {{ $about_content[$key] }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <p>{{ $aboutUs->about_me }}</p>
                            </div>
                        @else
                            <h6 class="text-center">There is no <strong>about heading</strong> contents here. Please check it later:) Thanks</h6>
                        @endif
                    </div>

                </div>
            </section>
            <!-- End About Section -->

            <!-- ======= Skills Section ======= -->
            <section id="skills" class="skills">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        @if($headings != null)
                            <h2>{{ $headings->skill_heading }}</h2>
                            <p>{{ $headings->skill_sub_text }}</p>
                        @else
                            <h6 class="text-center">There is no <strong>skill heading</strong> contents here. Please check it later:) Thanks</h6>
                        @endif
                    </div>

                    <div class="row skills-content justify-content-md-center">

                        <div class="col col-lg-8">

                            @if($skills != null)
                                @foreach($skills as $data)
                                    <div class="progress">
                                        <span class="skill">{{ $data->name }} <i class="val">{{ $data->progress }}%</i></span>
                                        <div class="progress-bar-wrap">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $data->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h6 class="text-center">There is no <strong>skills</strong> contents here. Please check it later:) Thanks</h6>
                            @endif

                        </div>

                    </div>

                </div>
            </section>
            <!-- End Skills Section -->

            <!-- ======= Facts Section ======= -->
            <section id="facts" class="facts">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        @if($headings != null)
                            <h2>{{ $headings->fact_heading }}</h2>
                            <p>{{ $headings->fact_sub_text }}</p>
                        @else
                            <h6 class="text-center">There is no <strong>fact heading</strong> contents here. Please check it later:) Thanks</h6>
                        @endif
                    </div>

                    <div class="row counters">

                        @if($total != null)
                            @foreach($total as $key=>$data)
                                <div class="col-lg-3 col-6 text-center">
                                    <span data-toggle="counter-up">{{ $data }}</span>
                                    <p>{{ $name[$key] }}</p>
                                </div>
                            @endforeach
                        @else
                            <h6 class="text-center">There is no <strong>fact</strong> contents here. Please check it later:) Thanks</h6>
                        @endif

                    </div>

                </div>
            </section>
            <!-- End Facts Section -->

            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials" class="testimonials">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        @if($headings != null)
                            <h2>{{ $headings->testimonial_heading }}</h2>
                            <p>{{ $headings->testimonial_sub_text }}
                        @else
                            <h6 class="text-center">There is no <strong>feedback heading</strong> contents here. Please check it later:) Thanks</h6>
                        @endif
                    </div>

                    <div class="owl-carousel testimonials-carousel">

                        @if($feedback != null)
                            @foreach($feedback as $data)
                                <div class="testimonial-item">
                                <img src="{{ asset('storage/feedback/' . $data->image) }}" class="testimonial-img" alt="{{ $data->name }}">
                                <h3>{{ $data->name }}</h3>
                                <h4>{{ $data->dignity }}</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    {{ $data->message }}
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                            @endforeach
                        @else
                            <h6 class="text-center">There is no <strong>feedback</strong> contents here. Please check it later:) Thanks</h6>
                        @endif

                    </div>

                </div>
            </section>
            <!-- End Testimonials Section -->

        </main>
    <!-- End #main -->
@endsection
