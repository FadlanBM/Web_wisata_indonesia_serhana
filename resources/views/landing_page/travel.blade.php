@extends('landing_page.layouts.main')
@section('template')
    <section>
        <div class="section-title">
            <h2>Rekomen Travel</h2>
            <p>Berikut reqomendasi travel TerbaikDi indonesia</p>
        </div>
        @foreach ($travel as $item)
            <div class="container mx-auto mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{url('assets/img/foto_travel').'/'.$item->foto}}" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $item->created_at }}</h6>
                                <p class="card-text">{{ $item->judul }}</p>
                                <h5 class="card-title">Rp {{ $item->biaya }}</h5>
                                <a href="{{ url('/travel/' . $item->id) }}" class="btn mr-2"><i class="fas fa-link"></i>
                                Pelajari Lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $travel->links() }}
            </div>
        @endforeach
    </section>
@endsection
