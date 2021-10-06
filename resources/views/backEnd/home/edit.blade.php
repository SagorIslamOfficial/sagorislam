@extends('layouts.backEndMater')

@section('title', 'Edit - Home -')

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
                                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Home</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-5">Home Edit :) Click here for back to full list - <a class="btn btn-success" href="{{ route('home.index') }}">Home</a></h4>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <form method="POST" action="{{ route('home.update', $homeEdit->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo">
                                                    @error('logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bg_image" class="col-sm-2 col-form-label">Background Image</label>
                                                <div class="col-sm-3">
                                                    <input type="file" name="bg_image" class="form-control @error('bg_image') is-invalid @enderror" id="bg_image">
                                                    @error('bg_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="big_text" class="col-sm-2 col-form-label">Big Text</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="big_text" placeholder="Your Name" class="form-control @error('big_text') is-invalid @enderror" value="{{ $homeEdit->big_text }}" id="big_text">
                                                    @error('big_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="small_text" class="col-sm-2 col-form-label">Small Text</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="small_text" placeholder="Your Profession Name" class="form-control @error('small_text') is-invalid @enderror" value="{{ $homeEdit->small_text }}" id="small_text">
                                                    @error('small_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="link" class="col-sm-2 col-form-label">Link</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="link" placeholder="Put A Link To Go Another Page" class="form-control @error('link') is-invalid @enderror" value="{{ $homeEdit->link }}" id="link">
                                                    @error('link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="footer_text" class="col-sm-2 col-form-label">Footer Text</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="footer_text" placeholder="Footer Text Info" class="form-control @error('footer_text') is-invalid @enderror" value="{{ $homeEdit->footer_text }}" id="footer_text">
                                                    @error('footer_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="footer_link" class="col-sm-2 col-form-label">Footer Link</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="footer_link" placeholder="Developer Site Link" class="form-control @error('footer_link') is-invalid @enderror" value="{{ $homeEdit->footer_link }}" id="footer_link">
                                                    @error('footer_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="social_icon" class="col-sm-2 col-form-label">Social Account</label>

                                                <div class="full_div row form-group col-md-10">
                                                    @foreach($iconsEdit as $key=>$iconEdit)
                                                        <div class="col-sm-4">
                                                            <input type="text" name="social_icon[]" placeholder="Social Icon(Feather Icons)" class="form-control @error('social_icon') is-invalid @enderror" value="{{ $iconEdit }}" id="social_icon">
                                                            @error('social_icon')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-sm-7">
                                                            <input type="text" name="social_link[]" placeholder="Social Account Link" class="form-control @error('social_link') is-invalid @enderror" value="{{ $linksEdit[$key] }}" id="social_link">
                                                            @error('social_link')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    @endforeach

                                                    <button class="col-md-1 btn btn-success btn-sm add_field"><i data-feather="plus"></i></button>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
            var max_fields = 7;
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
                                                '<input type="text" name="social_icon[]" placeholder="Social Icon(Feather Icons)" class="form-control">' +
                                            '</div>'+

                                            '<div class="col-sm-7">' +
                                                '<input type="text" name="social_link[]" placeholder="Social Account Link" class="form-control">' +
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
