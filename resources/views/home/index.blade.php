@include('layouts.header', ['title' => 'SportRent'])

<body>



    @include('home.layout.navbar')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl col-lg-8">
                    <h1>Penyewaan Sarana Olahraga Tanpa Ribet<span>.</span></h1>
                    <h2>Akses Mudah ke Berbagai Fasilitas Olahraga dengan Harga Terbaik</h2>
                    <div class="mt-4">
                        <a href="#lapangan" class="btn btn-warning fw-semibold btn-lg">Sewa Sekarang</a>
                    </div>
                </div>
            </div>


        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right"
                        data-aos-delay="100">
                        <h3>Platform terpercaya untuk penyewaan sarana olahraga.</h3>
                        <p class="fst-italic">
                            Misi kami adalah untuk memudahkan akses ke fasilitas olahraga berkualitas bagi semua orang,
                            baik individu maupun kelompok, dengan menyediakan layanan penyewaan yang terjangkau, mudah,
                            dan cepat.
                        </p>

                        <p>
                            Kami menawarkan berbagai macam sarana olahraga yang bisa Anda sewa, mulai dari lapangan
                            futsal, basket, badminton hingga studio yoga & senam. Sistem kami dirancang
                            untuk memberikan pengalaman pengguna yang optimal, memungkinkan Anda untuk memeriksa
                            ketersediaan, melakukan reservasi, dan melakukan pembayaran dengan mudah.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->




        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pelayanan</h2>
                    <p>Pelayanan yang kami tawarkan</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-wallet"></i></div>
                            <h4><a href="">Harga Terjangkau</a></h4>
                            <p>Nikmati berbagai sarana olahraga dengan harga yang bersahabat. Kami menawarkan paket
                                penyewaan yang sesuai dengan anggaran Anda tanpa mengorbankan kualitas.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-shipping-fast"></i></div>
                            <h4><a href="">Proses Cepat & Mudah</a></h4>
                            <p>Reservasi sarana olahraga kini lebih mudah dengan sistem kami yang user-friendly. Pesan
                                lapangan atau peralatan olahraga hanya dalam beberapa klik.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">Pelayanan 24/7</a></h4>
                            <p>Tim layanan pelanggan kami siap membantu Anda kapan saja. Hubungi kami melalui telepon,
                                email, untuk mendapatkan bantuan yang cepat dan ramah.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-hand-holding-heart"></i></div>
                            <h4><a href="">Kualitas Terbaik</a></h4>
                            <p>Semua sarana olahraga kami selalu dalam kondisi terbaik. Kami rutin melakukan perawatan
                                dan pengecekan untuk memastikan kenyamanan dan keamanan Anda.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-percent"></i></div>
                            <h4><a href="">Penawaran & Diskon Khusus</a></h4>
                            <p>Dapatkan penawaran menarik dan diskon khusus untuk pelanggan setia dan reservasi jangka
                                panjang. Jangan lewatkan kesempatan untuk berolahraga dengan harga lebih hemat.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-shield-alt"></i></div>
                            <h4><a href="">Keamanan Data</a></h4>
                            <p>Kami berusaha sebaik mungkin menjaga data dan privasi pelanggan kami</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="text-center">
                    <h3>Promo Spesial
                    </h3>
                    <p>Penawaran terbatas! Booking sekarang dan nikmati harga spesial untuk waktu tertentu.</p>
                    <a class="cta-btn" href="#voucher">Cek Diskon & Promosi</a>
                </div>

            </div>
        </section><!-- End Cta Section -->`



        <!-- ======= Fasilitas Section ======= -->
        <section id="lapangan" class="counts">
            <div class="container" data-aos="fade-up">
                @if (session()->has('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('fail') }}
                    </div>
                @endif
                <div class="text-center mb-5 fw-semibold">
                    <h2>Katalog Fasilitas</h2>
                </div>
                @guest
                    <div class="mb-4 text-danger">
                        <h6><a href="{{ route('login') }}" class="text-danger"><i>*Login/Register sebelum melakukan
                                    Booking</i></a></h6>
                    </div>
                @endguest
                <div class="d-flex justify-content-center flex-wrap gap-4">

                    @foreach ($fasilitas as $l)
                        <div class="mb-5">
                            <h4>{{ $l->nama_fasilitas }} - {{ $l->tipe_fasilitas }}</h4>
                            <h5>Harga/jam : {{ number_format($l->harga, '0', ',', '.') }}</h5>
                            <img src="/storage/image-fasilitas/{{ $l->gambar_fasilitas }}" class="img-fluid"
                                style="width: 500px;height:300px" alt="">
                            <div class="mt-2">
                                <a href="{{ route('fasilitas.show', $l->id) }}" class="btn btn-sm btn-info">Info</a>
                                <a href="{{ route('booking.create', 'fasilitas=' . $l->id) }}"
                                    class="btn btn-primary btn-sm">Sewa</a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Fasilitas Section -->


        <!-- ======= VOUCHER Section ======= -->
        <section id="voucher" class="voucher">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Diskon & Promosi</h2>
                    <p>Voucher</p>
                </div>

                <div class="row mx-1 d-flex justify-content-center flex-wrap gap-2">
                    @foreach ($vouchers as $v)
                        <div class="col-md card p-2" data-aos="zoom-in" data-aos-delay="100">
                            <div>
                                <div class="card-header">
                                    <h4>Kode : <kbd>{{ $v->kode_voucher }}</kbd></h4>
                                </div>
                                <div><b>Diskon {{ $v->nilai_diskon }}%</b>. {{ $v->deskripsi }}</div>
                                <div>Untuk {{ $v->batas_penggunaan }} Orang tercepat . Hanya berlaku sampai
                                    {{ $v->tanggal_selesai }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End VOUCHER Section -->




        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak</h2>
                    <p>Hubungi Kami</p>
                </div>

                <div>
                    <div style="height:300px">
                        <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe
                                style="height:100%;width:100%;border:0;" frameborder="0"
                                src="https://www.google.com/maps/embed/v1/directions?origin=universitas+bina+sarana+ciledug&destination=bina+sarana+informatika&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div>
                        <style>
                            #embed-map-canvas img {
                                max-height: none;
                                max-width: none !important;
                                background: none !important;
                            }
                        </style>
                    </div>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>
                                    Lokasi :
                                </h4>
                                <p>Jl. Ciledug Raya, Ciledug, Tangerang 12320</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>sportrent@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telepon:</h4>
                                <p>+62 6752 75912</p>
                            </div>

                        </div>

                    </div>



                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">


        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span class="text-warning">SPORTRENT</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
                Created with ❤️ by Kelompok 65
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>








    <script></script>


    @include('layouts.footer')
