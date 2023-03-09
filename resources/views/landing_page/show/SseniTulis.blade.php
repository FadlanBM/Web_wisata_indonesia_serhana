@extends('landing_page.layouts.main')
@section('template')
    <section>
        <div class="containershow">
            <!-- Left Column / Headphones Image -->
            <div class="left-column">
                <img data-image="red" class="active"
                    src="{{url('assets/img/foto_seni_tulis').'/'.$senitulis->foto}}"
                    alt="" />
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <!-- Product Description -->
                <div class="product-description">
                    <span>{{ $senitulis->asal }}</span>
                    <h1>{{ $senitulis->name }}</h1>
                    <span>Penjelasan</span>
                    <br>
                    <p>
                        {{ $senitulis->description }}
                    </p>

                    <span>Fasilitas</span>
                    <br>
                    <p>
                        {{ $senitulis->buatan }}
                    </p>
                </div>

                <!-- Product Configuration -->
                <div class="product-configuration">
                    <!-- Product Color -->
                    <div class="product-color">

                        <!-- Cable Configuration -->
                        <div class="cable-config">
                            <a href="#"><span>Rating : </span>{{ $senitulis->rating }}</a>
                        </div>`
                        <div class="">
                            <a href="#" style="color: cadetblue"> {{ $senitulis->created_at }}</a>
                        </div>
                    </div>

                    <!-- Product Pricing -->

                </div>
                <a href="{{ url('/halaman_seni_tulis') }}" class="btn btn-outline-success btn-sm">Kembali</a>
            </div>
    </section>
@endsection
