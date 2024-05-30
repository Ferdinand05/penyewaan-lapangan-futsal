    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="index.html">SportRent<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            {{-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" --}}
            {{-- class="img-fluid"></a> --}}

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#lapangan">Booking</a></li>
                    <li><a class="nav-link scrollto" href="#voucher">Diskon & Promosi</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li>

                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            @auth
                <div class="dropdown">
                    <a class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->username }}
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}">Profile</a>
                        @role('admin')
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard Admin</a>
                        @endrole
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="get-started-btn scrollto">Login/Register</a>
            @endguest


        </div>
    </header><!-- End Header -->
