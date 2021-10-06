@extends('layouts.backEndMater')

@section('title', 'Index - User Profile -')

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
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">User Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">User Profile- <a href="{{ route('user.edit', Auth::user()->id) }}">Click here for Edit</a></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row justify-content-md-center">
                    <div class="col-lg-8 col-xl-8">
                        <div class="card-box text-center">
                            <img src="{{ asset('storage/user/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="rounded-circle avatar-lg img-thumbnail">

                            <h4 class="mb-0">{{ Auth::user()->name }}</h4>

                            <div class="text-center mt-3">
                                <h4 class="font-13 text-uppercase">About Me :</h4>
                                <p class="text-muted font-13 mb-3">{{ $aboutMe->about_me }}</p>
                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">{{ Auth::user()->name }}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">{{ Auth::user()->phone }}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{ Auth::user()->email }}</span></p>

                                <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">{{ $contact->location }}</span></p>
                            </div>

                            <ul class="social-list list-inline mt-3 mb-0">
                                @foreach($icons as $key=>$icon)
                                    <li class="list-inline-item">
                                        <a target="_blank" href="{{ $links[$key] }}" class="social-list-item border-success text-primary"><i class="mdi mdi-{{ $icon }}"></i></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div> <!-- end card-box -->

                    </div> <!-- end col-->

                </div>
                <!-- end row-->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2015 - <script>document.write(new Date().getFullYear())</script>2021 © UBold theme by <a href="">Coderthemes</a>
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
