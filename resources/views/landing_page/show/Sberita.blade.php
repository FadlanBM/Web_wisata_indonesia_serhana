@extends('landing_page.layouts.main')
@section('template')
    <section>
        <div class="containershow">
            <!-- Left Column / Headphones Image -->
            <div class="left-column">
                <img data-image="red" class="active"
                    src="https://akcdn.detik.net.id/community/media/visual/2023/01/24/momen-kuat-maruf-bacakan-sendiri-pledoinya-6_169.jpeg?w=700&q=90"
                    alt="" />
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <!-- Product Description -->
                <div class="product-description">
                    <span>{{ $berita->pembuat }}</span>
                    <h1>{{ $berita->nama }}</h1>
                    <span>Penjelasan</span>
                    <br>
                    <p >
                        {{ $berita->isi }}
                    </p>
                </div>

                <!-- Product Configuration -->
                <div class="product-configuration">
                    <!-- Product Color -->
                    <div class="product-color">
                        <div class="">
                            <a href="#" style="color: cadetblue"> {{ $berita->created_at }}</a>
                        </div>
                    </div>

                    <!-- Product Pricing -->

                </div>
                <a href="{{ url('/halaman_berita') }}" class="btn btn-outline-success btn-sm">Kembali</a>
            </div>
        </div>
    </section>
    <br>
@endsection
