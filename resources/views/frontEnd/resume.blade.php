@extends('layouts.frontEndMaster')

@section('title', 'Resume -')

@section('content')
    <!-- Start #main -->
        <main id="main">

            <!-- ======= Resume Section ======= -->
            <section id="resume" class="resume">
                <div class="container" data-aos="fade-up">

                    @if($headings != null)
                        <div class="section-title">
                            <h2>{{ $headings->resume_heading }}</h2>
                            <p>{{ $headings->resume_sub_text }}</p>
                        </div>
                    @else
                        <h6>There is no contents here. Please check it later:) Thanks</h6>
                    @endif

                    @if($resume != null)
                        <div class="row">
                            @foreach($resume as $data)
                                <div class="col-lg-6">
                                    <h3 class="resume-title">{{ $data->heading }}</h3>

                                    @php
                                        $career_position = explode('|', $data->career_position);
                                        $r_time = explode('|', $data->r_time);
                                        $place = explode('|', $data->place);
                                        $r_content = explode('|', $data->r_content);
                                    @endphp

                                    <div class="resume-item">
                                        @foreach(($career_position) as $key => $innerData)
                                            <h4>{{ $career_position[$key] }}</h4>
                                            <h4>{{ $r_time[$key] }}</h4>
                                            <p><em>{{ $place[$key] }}</em></p>
                                            <p>{!! $r_content[$key] !!}</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h6>There is no contents here. Please check it later:) Thanks</h6>
                    @endif

                </div>
            </section><!-- End Resume Section -->

        </main>
    <!-- End #main -->
@endsection
