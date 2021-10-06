@extends('layouts.backEndMater')

@section('title', 'Index - About Us -')

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
                                    <li class="breadcrumb-item active">About Us</li>
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
                                <h4 class="header-title mb-5">
                                    About Us Index :) Click here for Create New -
                                    <a class="{{ $indexAbout->count() < 1 ? 'btn btn-success' : "text-danger btn disabled" }}" href="{{ route('about-us.create') }}">{{ $indexAbout->count() < 1 ? 'Create' : "You have permission to create a ITEM" }}</a>
                                </h4>

                                @include('backEnd.inc.errors')

                                <div class="table-responsive">
                                    <table class="table table-dark mb-0">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Dignity</th>
                                            <th>Sub Text</th>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>AboutMe</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($indexAbout as $data)
                                            <tr>
                                                <td><img style="width: 90px; height: 50px;" src="{{ asset('storage/about-us/' . $data->image) }}" alt="{{ $data->dignity }}"></td>
                                                <td>{{ $data->dignity }}</td>
                                                <td>{{ str_limit($data->sub_text, 20) }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->about_content }}</td>
                                                <td>{{ str_limit($data->about_me, 20) }}</td>
                                                <td>
                                                    <a href="{{ $data->editPath() }}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('about-us.destroy', $data->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger btn-sm" type="submit"><i class="fas fa-window-close"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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