@extends('layouts.backEndMater')

@section('title', 'Edit - Item -')

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
                                    <li class="breadcrumb-item"><a href="{{ route('item.index') }}">Item</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Item</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-5">Item Edit :) Click here for back to full list - <a class="btn btn-success" href="{{ route('item.index') }}">Item</a></h4>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <form method="POST" action="{{ route('item.update', $editItemContents->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            {{--Showing Categories--}}
                                            <div class="form-group row">
                                                <label for="getCategories" class="col-sm-2 col-form-label">Categories</label>
                                                <div class="row form-group col-md-10">
                                                    <select class="form-control @error('getCategories') is-invalid @enderror" name="category" id="getCategories">
                                                        <option>Select Category</option>
                                                        @foreach($editPortfolioCategory as $category)
                                                            <option {{ $category->id == $editItemContents->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('getCategories')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{--Item input fields--}}
                                            <div class="form-group row">
                                                <label for="image" class="col-sm-2 col-form-label">Single Image</label>
                                                <div class="row form-group col-md-3">
                                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">

                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="row form-group col-md-3">
                                                    <img class="ml-3" style="width: 200px; height: 120px;" src="{{ asset('storage/portfolio/items/' . $editItemContents->image) }}" alt="{{ $editItemContents->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                <div class="row form-group col-md-10">
                                                    <input type="text" name="name" placeholder="Category Name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $editItemContents->name }}">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="pd_title" class="col-sm-2 col-form-label">Portfolio Title</label>
                                                <div class="row form-group col-md-10">
                                                    <input type="text" name="pd_title" placeholder="Portfolio long title" class="form-control @error('pd_title') is-invalid @enderror" id="pd_title" value="{{ $editItemContents->pd_title }}">
                                                    @error('pd_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="pd_section" class="col-sm-2 col-form-label">Portfolio Details</label>

                                                <div class="full_div row form-group col-md-10">
                                                    @foreach($pd_section as $key=>$pd_section_row)
                                                        <div class="col-sm-4">
                                                            <input type="text" name="pd_section[]" placeholder="Portfolio details category" class="form-control @error('pd_section') is-invalid @enderror" id="pd_section" value="{{ $pd_section_row }}">
                                                            @error('pd_section')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-sm-7">
                                                            <input type="text" name="pd_s_content[]" placeholder="Portfolio details category Content" class="form-control @error('pd_s_content') is-invalid @enderror" id="pd_s_content" value="{{ $pd_s_content[$key] }}">
                                                            @error('pd_s_content')
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
                                                <label for="pd_link" class="col-sm-2 col-form-label">Client Site Link</label>
                                                <div class="row form-group col-md-5">
                                                    <input type="text" name="pd_link" placeholder="Client website link" class="form-control @error('pd_link') is-invalid @enderror" id="pd_link" value="{{ $editItemContents->pd_link }}">
                                                    @error('pd_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <i data-feather="arrow-right"></i>
                                                <div class="row form-group col-md-5">
                                                    <input type="text" name="pd_link_text" placeholder="Client website text" class="form-control @error('pd_link_text') is-invalid @enderror" id="pd_link_text" value="{{ $editItemContents->pd_link_text }}">
                                                    @error('pd_link_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="pd_description" class="col-sm-2 col-form-label">Portfolio Description</label>
                                                <div class="row form-group col-md-10">
                                                    <textarea name="pd_description" class="form-control @error('pd_description') is-invalid @enderror" placeholder="Portfolio details description" id="pd_description">{{ $editItemContents->pd_description }}</textarea>
                                                    @error('pd_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="pd_images" class="col-sm-2 col-form-label">Portfolio Multiple Image</label>
                                                <div class="row form-group col-md-3">
                                                    <input type="file" name="pd_images[]" multiple class="form-control @error('pd_images') is-invalid @enderror" id="pd_images">

                                                    @error('pd_images')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="row form-group col-md-7">
                                                    @php($images = json_decode($editItemContents->pd_images))
                                                    @foreach($images as $file)
                                                        <img class="ml-1 " style="width: 150px; height: 90px;" src="{{ asset('storage/portfolio/itemsDetails/' . $file) }}" alt="{{ $editItemContents->name }}">
                                                    @endforeach
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
    <script src="https://cdn.tiny.cloud/1/638r1s8j3adyh4boh2v1yg1z0kzee5vnfll0hbby4899vm4p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                            '<input type="text" name="pd_section[]" placeholder="Portfolio details category" class="form-control">' +
                            '</div>'+

                            '<div class="col-sm-7">' +
                            '<input type="text" name="pd_s_content[]" placeholder="Portfolio details category Content" class="form-control">' +
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

    <script>
        tinymce.init({
            selector: 'textarea#pd_description',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar_mode: 'floating',
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            height: 300,
        });
    </script>
@endpush
