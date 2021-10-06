@extends('layouts.backEndMater')

@section('title', 'Index - Resume -')

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
                                    <li class="breadcrumb-item active">Resume</li>
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
                                <h4 class="header-title mb-5">
                                    Resume Index :) Click here for Create New -
                                    <a class="{{ $indexResume->count() < 5 ? 'btn btn-success' : "text-danger btn disabled" }}" href="{{ route('resume.create') }}">{{ $indexResume->count() < 5 ? 'Create' : "You have permission to create a ITEM" }}</a>
                                </h4>
                                <br>
                                @include('backEnd.inc.errors')

                                <div class="table-responsive">
                                    <table class="table table-dark mb-0">
                                        <thead>
                                        <tr>
                                            <th>Heading</th>
                                            <th>C-Position</th>
                                            <th>Date</th>
                                            <th>Place</th>
                                            <th>Content</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($indexResume as $data)
                                            <tr>
                                                <td>{{ $data->heading }}</td>
                                                <td>{{ str_limit($data->career_position, 50) }}</td>
                                                <td>{{ $data->r_time }}</td>
                                                <td>{{ str_limit($data->place, 50) }}</td>
                                                <td class="tdc">{!! str_limit($data->r_content, '500') !!}</td>
                                                <td>
                                                    <a href="{{ $data->editPath() }}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ $data->showPath() }}" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i></a>
                                                    <form action="{{ route('resume.destroy', $data->id) }}" method="post">
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