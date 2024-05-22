    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="index.html">Sekawan Futsal<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            {{-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" --}}
            {{-- class="img-fluid"></a> --}}

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="nav-link scrollto" href="#lapangan">Book Lapangan</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            @guest
                <a href="{{ route('login') }}" class="get-started-btn scrollto">Login/Register</a>
            @endguest
            @auth
                <a href="" class="get-started-btn fw-semibold">{{ Auth::user()->username }}</a>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
            @endauth

        </div>
    </header><!-- End Header -->
