@extends('landing_page.layouts.main')
@section('template')
    <section>
        <div class="containershow">
            <!-- Left Column / Headphones Image -->
            <div class="left-column">
                <img data-image="red" class="active"
                    src="{{url('assets/img/foto_seni_tari').'/'.$senitari->foto}}"
                    alt="" />
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <!-- Product Description -->
                <div class="product-description">
                    <span>{{ $senitari->asal }}</span>
                    <h1>{{ $senitari->name }}</h1>
                    <span>Penjelasan</span>
                    <br>
                    <p>
                        {{ $senitari->description }}
                    </p>

                    <span>Asal</span>
                    <br>
                    <p>
                        {{ $senitari->buatan }}
                    </p>
                </div>

                <!-- Product Configuration -->
                <div class="product-configuration">
                    <!-- Product Color -->
                    <div class="product-color">

                        <!-- Cable Configuration -->
                        <div class="cable-config">
                            <a href="#"><span>Rating : </span>{{ $senitari->rating }}</a>
                        </div>`
                        <div class="">
                            <a href="#" style="color: cadetblue"> {{ $senitari->created_at }}</a>
                        </div>
                    </div>

                    <!-- Product Pricing -->

                </div>
                <a href="{{ url('/halaman_seni_tari') }}" class="btn btn-outline-success btn-sm">Kembali</a>
            </div>
    </section>
@endsection
