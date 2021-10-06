@extends('layouts.frontEndMaster')

@section('title', 'Portfolio -')

@section('content')
    <!-- Start #main -->
    <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    @if($headings != null and $items != null and $categories != null)
                        <h2>{{ $headings->portfolio_heading }}</h2>
                        <p>{{ $headings->portfolio_sub_text }}</p>
                    @else
                        <h6>There is no <strong>Heading</strong> contents here. Please check it later:) Thanks</h6>
                    @endif
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            @if($items != null)
                                <li data-filter="*" class="filter-active">All &nbsp;<span class="badge badge-success">{{ $items->count() }}</span></li>
                            @else
                                <h5>There is no <strong>Item</strong> contents here. Please check it later:) Thanks</h5>
                            @endif

                            @if($categories != null)
                                @foreach($categories as $category)
                                    <li data-filter="#{{ $category->slug }}">{{ $category->name }}&nbsp;<span class="badge badge-success">{{ $category->items->count() }}</span></li>
                                @endforeach
                            @else
                                <h6>There is no <strong>Category</strong> contents here. Please check it later:) Thanks</h6>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    @if($items != null)
                        @foreach($items as $item)
                            <div class="col-lg-4 col-md-6 portfolio-item" id="{{ $item->category->slug }}">
                                <div class="portfolio-wrap">
                                    <img src="{{ asset('storage/portfolio/items/' . $item->image) }}" alt="{{ $item->name }}" class="img-fluid">
                                    <div class="portfolio-info">
                                        <h4>{{ $item->name }}</h4>
                                        <p>{{ $item->category->name }}</p>
                                        <div class="portfolio-links">
                                            <a href="{{ asset('storage/portfolio/items/' . $item->image) }}" data-gall="portfolioGallery" class="venobox" title="{{ $item->pd_title }}"><i class="bx bx-plus"></i></a>
                                            <a href="{{ route('portfolio-details', $item->slug) }}" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Details of - {{ $item->pd_title }}"><i class="bx bx-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h5>There is no <strong>Portfolio</strong> contents here. Please check it later:) Thanks</h5>
                    @endif
                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main>
    <!-- End #main -->
@endsection
