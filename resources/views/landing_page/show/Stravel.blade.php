@extends('landing_page.layouts.main')
@section('template')
    <section>
        <div class="containershow">
            <!-- Left Column / Headphones Image -->
            <div class="left-column">
                <img data-image="red" class="active"
                    src="{{url('assets/img/foto_travel').'/'.$trevel->foto}}"
                    alt="" />
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <!-- Product Description -->
                <div class="product-description">
                    <span>{{ $trevel->name }}</span>
                    <h2>{{ $trevel->judul }}</h2>
                    <h4>Harga : Rp<span style="color: black; font-size: 20px">{{ $trevel->biaya }}</span></h4>
                    <br>
                    <span>Penjelasan</span>
                    <br>
                    <p>
                        {{ $trevel->description }}
                    </p>
                </div>

                <!-- Product Configuration -->
                <div class="product-configuration">
                    <!-- Product Color -->
                    <div class="product-color">
                        <div class="">
                            <a href="#" style="color: cadetblue"> {{ $trevel->created_at }}</a>
                        </div>
                    </div>

                    <!-- Product Pricing -->

                </div>
                <a href="{{ url('/halaman_travel') }}" class="btn btn-outline-success btn-sm">Kembali</a>
            </div>
        </div>
    </section>
    <br>
@endsection
