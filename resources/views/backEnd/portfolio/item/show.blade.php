@extends('layouts.backEndMater')

@section('title', 'Details - Item -')

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
                                    <li class="breadcrumb-item active">Item Details</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Item Details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-5">
                                    Item Details :) Single Data from - <strong class="text-success">{{ $showItemContents->name }}</strong> ||
                                    <a class="btn btn-info" href="{{ route('item.edit', $showItemContents->id) }}">Edit</a> ||
                                    <a class="btn btn-success" href="{{ route('item.index', $showItemContents->id) }}">Full Item List</a>
                                </h4>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Serial No</h4></div>
                                            <div class="col-sm-10"><h4 class="header-title">: &nbsp;&nbsp;&nbsp;{{ $showItemContents->id }}</h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Image</h4></div>
                                            <div class="col-sm-10"><h4>: &nbsp;&nbsp;&nbsp;<img style="width: 150px; height: 80px;" src="{{ asset('storage/portfolio/items/' . $showItemContents->image) }}" alt="{{ $showItemContents->name }}"></h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Name</h4></div>
                                            <div class="col-sm-10"><h4 class="header-title">: &nbsp;&nbsp;&nbsp;{{ $showItemContents->name }}</h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Category</h4></div>
                                            <div class="col-sm-10"><h4 class="header-title">: &nbsp;&nbsp;&nbsp;{{ $showItemContents->category->name }}</h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Portfolio Details Title</h4></div>
                                            <div class="col-sm-10"><h4 class="header-title">: &nbsp;&nbsp;&nbsp;{{ $showItemContents->pd_title }}</h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Portfolio Details Section</h4></div>
                                            <div class="col-sm-10"><h4 class="header-title">: &nbsp;&nbsp;&nbsp;{{ $showItemContents->pd_section }}</h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Portfolio Details Section Content</h4></div>
                                            <div class="col-sm-10"><h4 class="header-title">: &nbsp;&nbsp;&nbsp;{{ $showItemContents->pd_s_content }}</h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Portfolio Details Link</h4></div>
                                            <div class="col-sm-10"><h4 class="header-title">: &nbsp;&nbsp;&nbsp;{{ $showItemContents->pd_link }}</h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Portfolio Details Link Text</h4></div>
                                            <div class="col-sm-10"><h4 class="header-title">: &nbsp;&nbsp;&nbsp;{{ $showItemContents->pd_link_text }}</h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Portfolio Details Section Description</h4></div>
                                            <div class="col-sm-10"><h4 class="header-title">: &nbsp;&nbsp;&nbsp;{!! $showItemContents->pd_description !!}</h4></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"><h4 class="header-title">Portfolio Details Section Images</h4></div>
                                            <div class="col-sm-10">
                                                <h4>: &nbsp;&nbsp;&nbsp;
                                                    @php($images = json_decode($showItemContents->pd_images))
                                                    @foreach($images as $file)
                                                        <img style="width: 100px; height: 70px;" src="{{ asset('storage/portfolio/itemsDetails/' . $file) }}" alt="{{ $showItemContents->name }}">
                                                    @endforeach
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
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
