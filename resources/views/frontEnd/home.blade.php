@extends('layouts.frontEndMaster')

@section('title', 'Home -')

@push('css')
@endpush

@section('content')
    @if($home != null)
        <section id="hero" class="hero d-flex align-items-center">
            <img id="hero-img" class="hero-img" src="{{ asset('storage/home/' . $home->bg_image) }}" alt="{{ $home->big_text }}">

            <div class="hero-con container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
                <h1>{{ $home->big_text }}</h1>
                <h2>{{ $home->small_text }}</h2>
                <a href="{{ $home->link }}" class="btn-about">About Me</a>
            </div>
        </section>
    @else
        <h3>There is no contents here. Please check it later:) Thanks</h3>
    @endif
@endsection
