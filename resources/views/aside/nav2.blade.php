    <!--================Header Area =================-->
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('assets2/image/1_.png') }}"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link " href="{{ route('root.stays') }}">Stays</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('root.fights') }}">Flights</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('root.carrentals') }}">Car rentals</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('root.attractions') }}">Attractions</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('root.airports') }}">Airport Traxis</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('root.services') }}">Services</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('root.about') }}">About Us</a></li>
                        
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-success " data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="blog-single.html">Blog Details</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->


    {{-- <!-- ======= Top Bar ======= -->
    <div id="topbar"
        class="fixed-top d-flex align-items-center page-container @if (request()->routeIs('root.services') || request()->routeIs('root.about')) topbar-inner-pages @else topbar-inner-pages @endif ">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill"></i><a href="mailto:info@abcatravel.com">info@abcatravel.com</a>
                <i class="bi bi-phone-fill phone-icon"></i> +265 992 734 108
            </div>
            <div class="d-none d-md-block">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-light">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ms-4 btn btn-outline-light">Register</a>
                            @endif
                    @endif
                </div>
                @endif
            </div>
        </div>
        </div>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center  header-inner-pages page-container ">
            <div class="container d-flex align-items-center justify-content-between">

                <h1 class="logo"><a href="{{ route('root.index') }}">BCA Travels</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link " href="{{ route('root.stays') }}">Stays</a></li>
                        <li><a class="nav-link " href="{{ route('root.fights') }}">Flights</a></li>
                        <li><a class="nav-link " href="{{ route('root.carrentals') }}">Car rentals</a></li>
                        <li><a class="nav-link " href="{{ route('root.attractions') }}">Attractions</a></li>
                        <li><a class="nav-link " href="{{ route('root.airports') }}">Airport Traxis</a></li>
                        <li><a class="nav-link " href="{{ route('root.services') }}">Services</a></li>
                        <li><a class="nav-link " href="{{ route('root.about') }}">About Us</a></li>
                        @if (Route::has('login'))

                            @auth
                                <li><a class="nav-link d-lg-none " href="{{ route('dashboard') }}">Dashboard</a></li>
                            @else
                                <li><a class="nav-link d-lg-none " href="{{ route('login') }}">Sign-In</a></li>
                                @if (Route::has('register'))
                                    <li><a class="nav-link d-lg-none " href="{{ route('register') }}">Register</a></li>
                                @endif

                            @endif

                            @endif



                            <!-- <li><a href="blog.html">Blog</a></li> -->
                            <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                                                                                                <ul>
                                                                                                    <li><a href="#">Drop Down 1</a></li>
                                                                                                    <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                                                                                                class="bi bi-chevron-right"></i></a>
                                                                                                        <ul>
                                                                                                            <li><a href="#">Deep Drop Down 1</a></li>
                                                                                                            <li><a href="#">Deep Drop Down 2</a></li>
                                                                                                            <li><a href="#">Deep Drop Down 3</a></li>
                                                                                                            <li><a href="#">Deep Drop Down 4</a></li>
                                                                                                            <li><a href="#">Deep Drop Down 5</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">Drop Down 2</a></li>
                                                                                                    <li><a href="#">Drop Down 3</a></li>
                                                                                                    <li><a href="#">Drop Down 4</a></li>
                                                                                                </ul>
                                                                                            </li> -->
                            <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav><!-- .navbar -->

                </div>
            </header><!-- End Header --> --}}
