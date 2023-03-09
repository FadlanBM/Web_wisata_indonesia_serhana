@extends('landing_page.layouts.main')
@section('template')
    <section>
        <div class="section-title">
            <h2>Seni Tari</h2>
            <p>Berikut adalah seni tari yang ter populer Indonesia</p>
        </div>
        <div class="container mx-auto mt-4">
            <div class="row">
                @foreach ($seniTari as $item)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{url('assets/img/foto_seni_tari').'/'.$item->foto}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $item->asal }}</h6>
                                <p class="card-text">{{ $item->judul }}</p>
                                <a href="{{ url('/seni_tari/' . $item->id) }}" class="btn mr-2"><i class="fas fa-link"></i>
                                    Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $seniTari->links() }}
            </div>
        </div>
    </section>
@endsection
