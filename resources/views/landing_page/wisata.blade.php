@extends('landing_page.layouts.main')
@section('template')
    <nav class="bg-dark navbar-dark">
        <div class="container">
            <a href="" class="navbar-brand"><i class="fas fa-tree mr-2"></i>Forest</a>
        </div>
    </nav>
    <section id="header21" class="jumbotron text-center">
        <h1 class="display-3">Pesona Indonesia</h1>
    </section>

    <!-- ======Text Hero -->
    <section class="text-hero">
        <div class="area-and-poi-detail aem-GridColumn aem-GridColumn--default--12">

            <div class="area-and-poi-detail" data-social-share-type="none">
                <div class="area-and-poi-detail-attribute" data-currlike="0"
                    data-link360="/content/indtravelrevamp/id/en/video-360.html" data-bannerchoice="No"
                    data-imagebanner="/content/dam/indtravelrevamp/en/BANNER-PACKAGE-MOT_21MAY19_1.jpg"
                    data-currentpagepath="/content/indtravelrevamp/id/id/ide-liburan" data-nowpage="ide-liburan"
                    data-country="/content/indtravelrevamp/id/id" data-experiencewording="Experience Indonesia in 360"
                    data-360show="false" data-lovethiswording="Menyukai Ini"></div>
                <div class="container my-3">
                    <input hidden="" id="published">
                    <h1 class="display-2 fw-bold my-3 text-article-primary" style="color: black;">Beragam ide liburan
                        penuh
                        keseruan ini menanti <br> #DiIndonesiaAja</h1>
                </div>
            </div>

            <div class="text parbase aem-GridColumn aem-GridColumn--default--12">

                <div class="full-width" id="newPaddingTopWhenEmbassies"
                    style="background-color:#F7F7F7;padding-bottom:20px;padding-top:2em">
                    <div class="container">
                        <p>Liburan yang baik itu dimulai dari saat Anda merencanakannya. Jadi, untuk menikmati pesona
                            Indonesia, hal terbaik yang bisa Anda lakukan yaitu mempersiapkan diri untuk situasi baik atau
                            kurang baik selama liburan. Meskipun Anda merasa aman dan sehat untuk menjelajahi keindahan
                            tempat wisata di Indonesia, tidak ada salahnya untuk mengetahui beberapa info &amp; tips ketika
                            Anda mengunjungi tempat-tempat tertentu. Di sini, kami memiliki banyak informasi berguna yang
                            dapat Anda gunakan. Ayo cek sekarang juga!<br>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery">
        <div class="container">
            <div class="row">
                @foreach ($wisata as $item)
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img src="{{url('assets/img/foto_wisata').'/'.$item->foto}}"
                                alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->judul }}</p>
                                <a href="{{url('/wisata/'.$item->id)}}" class="btn btn-outline-success btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $wisata->links() }}
            </div>
        </section>
@endsection
