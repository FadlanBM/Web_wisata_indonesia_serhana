@extends('landing_page.layouts.main')
@section('template')
    <!-- ======= Hero Section ======= -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('assets') }}/img/vidio/y2mate.com - INDONESIA  Our HomeCinematic Video_1080p.mp4"
                type="">
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h2 class="">
                    <span class="box"></span><span class="kelas">Selamat datang di pesona</span><br><span
                        class="hi">Indonesia</span>
                    <hr><span class="text"></span><span class="multiText"></span>
                </h2>
                <div class="main-button scroll-to-section">
                    <a href="#about" class=" animate__animated animate__fadeInUp scrollto">Pelajari Lebih lanjut</a>
                </div>
            </div>
        </div>
    </div>


    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
                        <img src="{{ asset('assets') }}/img/img-componen/peta_indo.jpg" style="width: 200; height: 200; "
                            class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                        <h2>Apa Itu Negara Indonesia ?</h2>
                        <p class="fst-italic">
                            dikenal dengan nama resmi Republik Indonesia atau lebih lengkapnya Negara Kesatuan Republik
                            Indonesia, adalah negara kepulauan di Asia Tenggara yang dilintasi garis khatulistiwa.Indonesia
                            adalah negara kesatuan dengan bentuk pemerintahan republik berdasarkan konstitusi yang sah,
                            yaitu Undang-Undang Dasar Negara Republik Indonesia Tahun 1945 (UUD 1945).
                            Ibu kota Indonesia saat ini adalah Jakarta.Indonesia terdiri dari berbagai suku bangsa, bahasa,
                            dan agama.
                            Indonesia dikenal akan kesopanan dan keramahannya, Kids. Sehingga hal ini menarik bagi bangsa
                            lain untuk
                            mengunjungi Indonesia dan mengenal budayanya. Indonesia berada di urutan keempat dunia karena
                            jumlah dan potensi penduduk yang besar.
                        </p>
                    </div>

                </div>
        </section><!-- End About Section -->


        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-in">

                <div class="row counters">

                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets') }}/img/clients/logo-Kominfo.png" style="width: 200px;"
                            class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets') }}/img/clients/logo-rpl.png" style="margin-top: 25px;"
                            class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets') }}/img/clients/logo-skansaba.png" style="width:200px; margin-top: 15px"
                            class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets') }}/img/clients/Logo-Tut-Wuri.png" style="margin-top: 15px;"
                            class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets') }}/img/clients/logo-wonderful.png"
                            style="width: 200px; margin-top: 25px;" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets') }}/img/clients/logo-yogyakarta.png" class="img-fluid" alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <h2>Pemimpin Negara</h2>
                    <p>Berikut jajaran pemimpin di Indonesia</p>
                </div>

                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                            <div class="member">
                                <img src="{{url('assets/img/foto_index').'/'.$item->foto}}" alt="">
                                <h4>{{ $item->nama }}</h4>
                                <span>{{ $item->jabatan }}</span>
                                <p>
                                    "{{ $item->description }}"</p>
                                <div class="social">
                                    <a href="{{ $item->twiter }}" target="_blank"><i class="bi bi-twitter"></i></a>
                                    <a href="{{ $item->facebook }}" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $item->youtube }}" target="_blank"><i class="bi bi-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $data->links() }}
                </div>
            </div>
        </section><!-- End Team Section -->


        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">
                <div class="section-title">
                    <h2 style="color: rgb(255, 255, 255);">Informasi Tambahan</h2>
                </div>
                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="273800000" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p style="margin-top: 10px">Jumalah Penduduk</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="38" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p style="margin-top: 10px">Jumlah Provinsi</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="16771" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p style="margin-top: 10px">Pulau</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="2552" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p style="margin-top: 10px">Tempat Wisata</p>
                    </div>

                </div>

            </div>
            </div>
        </section><!-- End Cta Section -->

        <!-- End Services Section -->
    @endsection
