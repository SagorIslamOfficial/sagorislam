@extends('layouts.backEndMater')

@section('title', 'Create - Headings -')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('headings.index') }}">Heading</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Headings</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-5">Headings Create :) Click here for back to full list - <a class="btn btn-success" href="{{ route('headings.index') }}">List</a></h4>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <form method="POST" action="{{ route('headings.store') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="a-heading" class="col-sm-2 col-form-label">A-Heading</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="about_heading" placeholder="About Heading" class="form-control @error('about_heading') is-invalid @enderror" id="a-heading">
                                                    @error('about_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="a-text" class="col-sm-2 col-form-label">A-Text</label>
                                                <div class="col-sm-10">
                                                    <textarea name="about_sub_text" placeholder="About Text" rows="3" class="form-control @error('about_sub_text') is-invalid @enderror" id="a-text"></textarea>
                                                    @error('about_sub_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sk-heading" class="col-sm-2 col-form-label">SK-Heading</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="skill_heading" placeholder="Skill Heading" class="form-control @error('skill_heading') is-invalid @enderror" id="sk-heading">
                                                    @error('skill_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="sk-text" class="col-sm-2 col-form-label">SK-Text</label>
                                                <div class="col-sm-10">
                                                    <textarea name="skill_sub_text" placeholder="Skill Text" rows="3" class="form-control @error('skill_sub_text') is-invalid @enderror" id="sk-text"></textarea>
                                                    @error('skill_sub_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="f-heading" class="col-sm-2 col-form-label">F-Heading</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="fact_heading" placeholder="Fact Heading" class="form-control @error('fact_heading') is-invalid @enderror" id="f-heading">
                                                    @error('fact_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="f-text" class="col-sm-2 col-form-label">F-Text</label>
                                                <div class="col-sm-10">
                                                    <textarea name="fact_sub_text" placeholder="Fact Text" rows="3" class="form-control @error('fact_sub_text') is-invalid @enderror" id="f-text"></textarea>
                                                    @error('fact_sub_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="t-heading" class="col-sm-2 col-form-label">T-Heading</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="testimonial_heading" placeholder="Testimonial Heading" class="form-control @error('testimonial_heading') is-invalid @enderror" id="t-heading">
                                                    @error('testimonial_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="t-text" class="col-sm-2 col-form-label">T-Text</label>
                                                <div class="col-sm-10">
                                                    <textarea name="testimonial_sub_text" placeholder="Testimonial Text" rows="3" class="form-control @error('testimonial_sub_text') is-invalid @enderror" id="t-text"></textarea>
                                                    @error('testimonial_sub_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="r-heading" class="col-sm-2 col-form-label">R-Heading</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="resume_heading" placeholder="Resume Heading" class="form-control @error('resume_heading') is-invalid @enderror" id="r-heading">
                                                    @error('resume_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="r-text" class="col-sm-2 col-form-label">R-Text</label>
                                                <div class="col-sm-10">
                                                    <textarea name="resume_sub_text" placeholder="Resume Text" rows="3" class="form-control @error('resume_sub_text') is-invalid @enderror" id="r-text"></textarea>
                                                    @error('resume_sub_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="s-heading" class="col-sm-2 col-form-label">S-Heading</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="service_heading" placeholder="Service Heading" class="form-control @error('service_heading') is-invalid @enderror" id="s-heading">
                                                    @error('service_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="s-text" class="col-sm-2 col-form-label">S-Text</label>
                                                <div class="col-sm-10">
                                                    <textarea name="service_sub_text" placeholder="Service Text" rows="3" class="form-control @error('service_sub_text') is-invalid @enderror" id="s-text"></textarea>
                                                    @error('service_sub_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="p-heading" class="col-sm-2 col-form-label">P-Heading</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="portfolio_heading" placeholder="Portfolio Heading" class="form-control @error('portfolio_heading') is-invalid @enderror" id="p-heading">
                                                    @error('portfolio_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="p-text" class="col-sm-2 col-form-label">P-Text</label>
                                                <div class="col-sm-10">
                                                    <textarea name="portfolio_sub_text" placeholder="Portfolio Text" rows="3" class="form-control @error('portfolio_sub_text') is-invalid @enderror" id="p-text"></textarea>
                                                    @error('portfolio_sub_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="c-heading" class="col-sm-2 col-form-label">C-Heading</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="contact_heading" placeholder="Contact Heading" class="form-control @error('contact_heading') is-invalid @enderror" id="c-heading">
                                                    @error('contact_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="c-text" class="col-sm-2 col-form-label">C-Text</label>
                                                <div class="col-sm-10">
                                                    <textarea name="contact_sub_text" placeholder="Contact Text" rows="3" class="form-control @error('contact_sub_text') is-invalid @enderror" id="c-text"></textarea>
                                                    @error('contact_sub_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row-->

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div>

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="javascript: void(0)" class="text-black-50">Coderthemes</a> & Developed by <a target="_blank" href="https://hstradinginternational.com/" class="text-black-50">Sagor Islam</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>

@endsection

@push('js')

@endpush
