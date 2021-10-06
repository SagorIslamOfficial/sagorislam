@extends('layouts.frontEndMaster')

@section('title', 'Contact -')

@section('content')
    <!-- Start #main -->
    @if($headings != null and $contact != null)
        <main id="main">

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        @if($headings != null)
                            <h2>{{ $headings->contact_heading }}</h2>
                            <p>{{ $headings->contact_sub_text }}</p>
                        @else
                            <h6>There is no <strong>Heading</strong> contents here. Please check it later:) Thanks</h6>
                        @endif
                    </div>

                    <div>
                        @if($contact != null)
                            <iframe width="100%" height="450" frameborder="0" allowfullscreen style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{ $contact->lat_long }}&amp;key=AIzaSyCDYQ7j7nGObZ-1jpGs4onhK3SCUj2ILC8"></iframe>
                        @else
                            <h6>There is no contents here. Please check it later:) Thanks</h6>
                        @endif
                    </div>

                    @if($contact != null)
                        <div class="row mt-5">

                            <div class="col-lg-4">
                                <div class="info">
                                    <div class="address">
                                        <i class="icofont-google-map"></i>
                                        <h4>Location:</h4>
                                        <p>{{ $contact->location }}</p>
                                    </div>

                                    <div class="email">
                                        <i class="icofont-envelope"></i>
                                        <h4>Email:</h4>
                                        <p>{{ $contact->email }}</p>
                                    </div>

                                    <div class="phone">
                                        <i class="icofont-phone"></i>
                                        <h4>Call:</h4>
                                        <p>{{ $contact->phone }}</p>
                                    </div>

                                </div>

                            </div>
                        @else
                            <h6>There is no <strong>contact</strong> info here. Please check it later:) Thanks</h6>
                        @endif

                        <div class="col-lg-8 mt-5 mt-lg-0">
                            @include('backEnd.inc.errors')
                            <form action="{{ route('front-contact-store') }}" method="POST" role="form" class="php-email-form">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name"/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email"/>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject"/>
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" data-rule="required"  placeholder="Message"></textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div>
                            </form>

                        </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->

        </main>
    @else
        <h6>There is no contents here. Please check it later:) Thanks</h6>
    @endif
    <!-- End #main -->
@endsection
