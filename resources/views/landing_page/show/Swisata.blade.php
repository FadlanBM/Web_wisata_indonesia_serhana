@extends('landing_page.layouts.main')
@section('template')
    <section>
        <div class="containershow">
            <!-- Left Column / Headphones Image -->
            <div class="left-column">
                <img data-image="red" class="active"
                    src="{{url('assets/img/foto_wisata').'/'.$wisata->foto}}"
                    alt="" />
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <!-- Product Description -->
                <div class="product-description">
                    <span>{{ $wisata->lokasi }}</span>
                    <h1>{{ $wisata->name }}</h1>
                    <span>Penjelasan</span>
                    <br>
                    <p>
                        {{ $wisata->description }}
                    </p>

                    <span>Fasilitas</span>
                    <br>
                    <p>
                        {{ $wisata->fasilitas }}
                    </p>
                </div>

                <!-- Product Configuration -->
                <div class="product-configuration">
                    <!-- Product Color -->
                    <div class="product-color">

                        <!-- Cable Configuration -->
                        <div class="cable-config">
                            <a href="#"><span>Rating : </span>5</a>
                        </div>
                        <div class="">
                            <a href="#" style="color: cadetblue"> {{ $wisata->created_at }}</a>
                        </div>
                    </div>

                    <!-- Product Pricing -->

                </div>
                <a href="{{ url('/halaman_wisata') }}" class="btn btn-outline-success btn-sm">Kembali</a>
            </div>
    </section>
@endsection
