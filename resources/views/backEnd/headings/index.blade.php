@extends('layouts.backEndMater')

@section('title', 'Index - Headings -')

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
                                    <li class="breadcrumb-item active">Heading</li>
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
                                <h4 class="header-title mb-5">
                                    Headings Index :) Click here for Create New -
                                    <a class="{{ $indexHeading->count() < 1 ? 'btn btn-success' : "text-danger btn disabled" }}" href="{{ route('headings.create') }}">{{ $indexHeading->count() < 1 ? 'Create' : "You have permission to create a ITEM" }}</a>
                                </h4>
                                <br>
                                @include('backEnd.inc.errors')

                                <div class="table-responsive">
                                    <table class="table table-dark mb-0">
                                        <thead>
                                            <tr>
                                                <th>A-Heading</th>
                                                <th>A-Text</th>
                                                <th>SK-Heading</th>
                                                <th>SK-Text</th>
                                                <th>F-Heading</th>
                                                <th>F-Text</th>
                                                <th>T-Heading</th>
                                                <th>T-Text</th>
                                                <th>R-Heading</th>
                                                <th>R-Text</th>
                                                <th>S-Heading</th>
                                                <th>S-Text</th>
                                                <th>P-Heading</th>
                                                <th>P-Text</th>
                                                <th>C-Heading</th>
                                                <th>C-Text</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($indexHeading as $data)
                                                <tr>
                                                    <td>{{ $data->about_heading }}</td>
                                                    <td>{{ str_limit($data->about_sub_text, 15 ) }}</td>
                                                    <td>{{ $data->skill_heading }}</td>
                                                    <td>{{ str_limit($data->skill_sub_text, 15 ) }}</td>
                                                    <td>{{ $data->fact_heading }}</td>
                                                    <td>{{ str_limit($data->fact_sub_text, 15 ) }}</td>
                                                    <td>{{ $data->testimonial_heading }}</td>
                                                    <td>{{ str_limit($data->testimonial_sub_text, 15 ) }}</td>
                                                    <td>{{ $data->resume_heading }}</td>
                                                    <td>{{ str_limit($data->resume_sub_text, 15 ) }}</td>
                                                    <td>{{ $data->service_heading }}</td>
                                                    <td>{{ str_limit($data->service_sub_text, 15 ) }}</td>
                                                    <td>{{ $data->portfolio_heading }}</td>
                                                    <td>{{ str_limit($data->portfolio_sub_text, 15 ) }}</td>
                                                    <td>{{ $data->contact_heading }}</td>
                                                    <td>{{ str_limit($data->contact_sub_text, 15 ) }}</td>
                                                    <td>
                                                        <a href="{{ route('headings.edit', $data->id) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                                        <form action="{{ route('headings.destroy', $data->id) }}" method="post">
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
