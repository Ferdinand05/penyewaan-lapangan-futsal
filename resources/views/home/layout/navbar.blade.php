    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="index.html">SportRent<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            {{-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" --}}
            {{-- class="img-fluid"></a> --}}

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#services">Pelayanan</a></li>
                    <li><a class="nav-link scrollto" href="#lapangan">Sewa Fasilitas</a></li>
                    <li><a class="nav-link scrollto" href="#voucher">Diskon & Promosi</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
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
                <a href="{{ route('login') }}" class="get-started-btn scrollto">Masuk/Daftar</a>
            @endguest


        </div>
    </header><!-- End Header -->
