@extends('layouts.backEndMater')

@section('title', 'Create - About Us -')

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
                                    <li class="breadcrumb-item"><a href="{{ route('about-us.index') }}">About Us</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ol>
                            </div>
                            <h4 class="page-title">About Us</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-5">About Us Create :) Click here for back to full list - <a class="btn btn-success" href="{{ route('about-us.index') }}">List</a></h4>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <form method="POST" action="{{ route('about-us.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-3">
                                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="dignity" class="col-sm-2 col-form-label">Dignity</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="dignity" placeholder="Dignity" class="form-control @error('dignity') is-invalid @enderror" id="dignity">
                                                    @error('dignity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sub_text" class="col-sm-2 col-form-label">Sub Text</label>
                                                <div class="col-sm-10">
                                                    <textarea name="sub_text" placeholder="Sub Text" rows="3" class="form-control @error('sub_text') is-invalid @enderror" id="sub_text">{{ old('sub_text') }}</textarea>
                                                    @error('sub_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Personal Info</label>


                                                <div class="full_div row form-group col-md-10">
                                                    <div class="col-sm-4">
                                                        <input type="text" name="name[]" placeholder="Name" class="form-control @error('name') is-invalid @enderror" id="name">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-sm-7">
                                                        <input type="text" name="about_content[]" placeholder="About Content" class="form-control @error('about_content') is-invalid @enderror" id="about_content">
                                                        @error('about_content')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <button class="col-md-1 btn btn-success btn-sm add_field"><i data-feather="plus"></i></button>
                                                    <span class="col">Ex(Name): Birthday, Website, Phone, City, Age, Degree, Email, Freelance</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="about_me" class="col-sm-2 col-form-label">About Me</label>
                                                <div class="col-sm-10">
                                                    <textarea name="about_me" placeholder="About Me" rows="5" class="form-control @error('about_me') is-invalid @enderror" id="about_me">{{ old('about_me') }}</textarea>
                                                    @error('about_me')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var max_fields = 12;
            var wrapper = $(".full_div");
            var add_button = $(".add_field");

            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                            '<div class="row form-group col-sm-12 pt-2">' +
                            '<div class="col-sm-4">' +
                            '<input type="text" name="name[]" placeholder="Name" class="form-control">' +
                            '</div>'+

                            '<div class="col-sm-7">' +
                            '<input type="text" name="about_content[]" placeholder="About Content" class="form-control">' +
                            '</div>'+

                            '<button class="col-md-1 btn-danger btn-sm remove-div"><i class="fa fa-window-close"></i></button>' +
                            '</div>'
                    ); //add input box
                } else {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click", ".remove-div", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
@endpush
