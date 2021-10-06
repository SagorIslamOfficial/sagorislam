@extends('layouts.backEndMater')

@section('title', 'Create - Resume -')

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
                                    <li class="breadcrumb-item"><a href="{{ route('resume.index') }}">Resume</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Resume</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-5">Resume Create :) Click here for back to full list - <a class="btn btn-success" href="{{ route('resume.index') }}">List</a></h4>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <form method="POST" action="{{ route('resume.store') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="heading" class="col-sm-2 col-form-label">Heading</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="heading" placeholder="Heading" class="form-control @error('heading') is-invalid @enderror" id="heading">
                                                    @error('heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="full_div">

                                                <div class="form-group row">
                                                    <label for="career_position" class="col-sm-2 col-form-label">Career Position</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="career_position[]" placeholder="Career Position" class="form-control @error('career_position') is-invalid @enderror" id="career_position">
                                                        @error('career_position')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="r_time" class="col-sm-2 col-form-label">Time</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="r_time[]" placeholder="Time (Ex: 2015-Present)" class="form-control @error('r_time') is-invalid @enderror" id="r_time">
                                                        @error('r_time')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="place" class="col-sm-2 col-form-label">Place Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="place[]" placeholder="Place Name" class="form-control @error('place') is-invalid @enderror" id="place">
                                                        @error('place')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="r_content" class="col-sm-2 col-form-label">Resume Content</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="r_content[]" class="form-control @error('r_content') is-invalid @enderror" placeholder="Resume all contents will be here :)" id="r_content"></textarea>
                                                        @error('r_content')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                    <button class="btn btn-success btn-md add_field float-right"><i data-feather="plus"></i></button>
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
    <script src="https://cdn.tiny.cloud/1/638r1s8j3adyh4boh2v1yg1z0kzee5vnfll0hbby4899vm4p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var max_fields = 6;
            var wrapper = $(".full_div");
            var add_button = $(".add_field");

            i=1;
            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                            '<div class="pt-5">'+
                                '<div class="form-group row">' +
                                    '<label for="career_position" class="col-sm-2 col-form-label">Career Position Duplicate</label>' +
                                    '<div class="col-sm-10">' +
                                        '<input type="text" name="career_position[]" placeholder="Career Position" class="form-control" id="career_position">' +
                                    '</div>' +
                                '</div>'+

                                '<div class="form-group row">' +
                                    '<label for="career_position" class="col-sm-2 col-form-label">Time Duplicate</label>' +
                                    '<div class="col-sm-10">' +
                                        '<input type="text" name="r_time[]" placeholder="Time" class="form-control" id="r_time">' +
                                    '</div>' +
                                '</div>'+

                                '<div class="form-group row">' +
                                    '<label for="place" class="col-sm-2 col-form-label">Place Name</label>' +
                                    '<div class="col-sm-10">' +
                                        '<input type="text" name="place[]" placeholder="Place Name" class="form-control" id="place">' +
                                    '</div>' +
                                '</div>'+

                                '<div class="row form-group">' +
                                    '<label for="r_contents" class="col-sm-2 col-form-label">Resume Content Duplicate</label>' +
                                    '<div class="col-sm-10">' +
                                        '<textarea name="r_content[]" class="form-control" placeholder="Resume all contents will be here :)" id="r_contents-'+i+'"></textarea>' +
                                    '</div>'+
                                '</div>'+


                                '<label for="r_contents" class="col-sm-2 col-form-label"></label>' +
                                '<button class="btn btn-danger btn-lg remove-div mb-4"><i class="fa fa-window-close"></i></button>' +

                            '</div>'
                    ); //add input box
                    tinymce.init({
                        selector: 'textarea#r_contents-'+i,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar_mode: 'floating',
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | " +
                                "bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                        height: 350,
                    });
                    i++;
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
    <script>
        tinymce.init({
            selector: 'textarea#r_content',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar_mode: 'floating',
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            height: 350,
        });
    </script>
@endpush
