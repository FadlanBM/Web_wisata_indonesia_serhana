  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex align-items-center justify-content-between">

          <div class="logo">
              <h1><a href="{{url('/halaman_utama')}}"><span>IndoKu</span></a></h1>
              <!-- Uncomment below if you prefer to use an image logo -->
              <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
          </div>

          <nav id="navbar" class="navbar">
              <ul>
                  <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }}"
                          href="{{ url('/') }}">Home</a></li>
                  <li><a class="nav-link scrollto {{ Request::is('halaman_wisata') ? 'active' : '' }}"
                          href="{{ url('/halaman_wisata') }}">Wisata</a></li>
                  <li class="dropdown"><a class="{{ Request::is('halaman_seni_tulis', 'halaman_seni_tari') ? 'active' : '' }}"
                          href="#"><span>Kearifan</span><i class="bi bi-chevron-down"></i></a>
                      <ul>
                          <li><a class="{{ Request::is('halaman_seni_tulis') ? 'active' : '' }}"
                                  href="{{ url('/halaman_seni_tulis') }}">Seni Tulis</a></li>
                          <li><a class="{{ Request::is('halaman_seni_tari') ? 'active' : '' }}"
                                  href="{{ url('/halaman_seni_tari') }}">Seni Tari</a></li>
                      </ul>
                  </li>
                  <li><a class="nav-link scrollto {{ Request::is('halaman_berita') ? 'active' : '' }}"
                          href="{{ url('/halaman_berita') }}">Berita</a></li>
                  <li><a class="nav-link scrollto {{ Request::is('halaman_travel') ? 'active' : '' }}"
                          href="{{ url('/halaman_travel') }}">Travel</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
