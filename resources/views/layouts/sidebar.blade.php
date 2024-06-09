<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="/assets/img/apple-touch-icon.png" style="width: 80%" class="img-fluid" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">SPORTRENT</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman User:</h6>
                <a class="collapse-item" href="{{ route('user.index') }}">User</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('fasilitas.index') }}">
            <i class="fas fa-fw fa-building"></i>
            <span>Data Fasilitas</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('voucher.index') }}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Voucher</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Booking
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('booking.index') }}">
            <i class="fas fa-fw fa-cart-plus"></i>
            <span>Booking</span></a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Transaction Data
    </div>




    <!-- Nav Item - Tables -->

    <li class="nav-item">
        <a class="nav-link" href="{{ route('jadwal.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Jadwal Booking</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('pembayaran.index') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Pembayaran</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Report Data
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-file-alt"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Laporan</h6>
                <a class="collapse-item" href="{{ route('laporan-jadwal') }}">Laporan Jadwal</a>
                <a class="collapse-item" href="{{ route('laporan-pembayaran') }}">Laporan Pembayaran</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
