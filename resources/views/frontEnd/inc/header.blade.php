<header id="header" class="fixed-top">
    @if($home != null)
        <div class="container-fluid d-flex justify-content-between align-items-center">

{{--            <h1 class="logo"><a href="{{ route('home') }}">{{ $home->logo }}</a></h1>--}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{ route('home') }}" class="logo"><img src="{{ asset('storage/home/' . $home->logo) }}" alt="logo_of_sagorislam.com" class="img-fluid"></a>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                    <li class="{{ request()->is('resume') ? 'active' : '' }}"><a href="{{ route('resume') }}">Resume</a></li>
                    <li class="{{ request()->is('services') ? 'active' : '' }}"><a href="{{ route('services') }}">Services</a></li>
                    <li class="{{ request()->is('portfolio') ? 'active' : '' }}"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav><!-- .nav-menu -->

            <div class="header-social-links">
                @foreach($icons as $key=>$icon)
                    <a target="_blank" href="{{ $links[$key] }}" class="{{ $icon }}"><i class="icofont-{{ $icon }}"></i></a>
                @endforeach
            </div>
        </div>
    @else
        <h6 class="text-center">There is no contents here. Please check it later:) Thanks</h6>
    @endif
</header>
