@extends('landing_page.layouts.main')
@section('template')
<section>
    <!--End Text-hero-->
     <div class="section-title">
            <h2>Seni Tulis</h2>
            <p>Berikut adalah seni tulis yang terpopuler Indonesia</p>
        </div>
    <div class="cards-1 section-gray">
        <div class="container">
            <div class="row">
                @foreach ($seniTulis as $item)
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="#"> <img class="img"
                                        src="{{url('assets/img/foto_seni_tulis').'/'.$item->foto}}"> </a>
                                <div class="ripple-cont"></div>
                            </div>
                            <div class="table">
                                <h6 class="category text-success"><i class="fa fa-university"></i> {{ $item->buatan }}</h6>
                                <h4 class="card-caption">
                                    <a href="#">{{ $item->name }}</a>
                                </h4>
                                <p class="card-description" style="color: #F7F7F7">{{ $item->judul }}</p>
                                <a href="{{ url('/seni_tulis/' . $item->id) }}" class="btn btn-outline-success btn-sm">Read
                                    More</a>

                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $seniTulis->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
