@extends('landing_page.layouts.main')
@section('template')
    <section class="dark">
        <div class="container py-4">
            <h1 class="h1 text-center" id="pageHeaderTitle">Berita Terkini</h1>
@foreach ($berita as $item)
            <article class="postcard dark blue">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="https://akcdn.detik.net.id/community/media/visual/2023/01/24/momen-kuat-maruf-bacakan-sendiri-pledoinya-6_169.jpeg?w=700&q=90" alt="Image Title" />
                </a>
                <div class="postcard__text">
                    <h1 class="postcard__title blue"><a href="#">{{$item->nama}}</a></h1>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i>{{$item->created_at}}
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <ul class="postcard__tagbox">
                        <a href="{{ url('/berita/' . $item->id) }}" class="btn btn-outline-success btn-sm">Read More</a>
                    </ul>
                </div>
            </article>
            @endforeach
            {{$berita->links()}}
        </div>
    </section>
@endsection
