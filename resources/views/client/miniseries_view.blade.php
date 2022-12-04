@extends('layouts.index')
@section('content')
<div class="position-relative">
    <img src="{{ url('').'/'. $data->img_background }}" alt="" width="100%">
    <div class="to-bottom px-3 pb-5 text-center">
        <div>
            <div>
                <img src="{{ url('').'/'. $data->img_logo }}" alt="" width="30%">
            </div>
            <!-- <h5 class="text-uppercase font-noto fw-semibold text-white">IN CINEMAS NOW</h5> -->
            <button class="btn btn-light"><i class="bi-play-fill me-2"></i>Watch Trailer</button>
            <!-- @if($data->link)
            <a href="{{ $data->link }}" target="_blank" class="btn btn-light ms-2">Watch Now</a href="{{ $data->link }}">
            @endif -->
        </div>
    </div>
</div>
@if($data->link)
<section class="py-4 bg-black text-white">
    <div class="container">
        <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <p class="text-center text-capitalize">Watch the movie now via the link below</p>
            <a href="{{ $data->link }}" class="btn btn-outline-light" target="_blank">Watch Now</a>
        </div>
        </div>
    </div>
</section>
@endif
<section class="space-m">
    <div class="container">
    <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <div class="position-relative">
                    <img src="https://dummyimage.com/600x400" alt="" width="100%" class="rounded">
                    <div class="to-center text-center">
                        <a href="javascript:void(0)" class="text-white">
                            <i class="bi-play-fill display-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-5">
                <img src="{{ url('').'/'. $data->img_clip }}" alt="" width="100%" class="rounded">
            </div>
            <div class="col-md-5 align-self-center">
            <div class="px-4">
                <h4 class="text-capitalize fw-bold mb-3 text-black">{{ $data->title }}</h4>
                {!! $data->description !!}
                <div class="pb-3">
                    <p class="text-black">Directed By</p>
                    <p class="text-capitalize">
                        @if($data->director)
                        {{ $data->director }}
                        @else
                        -
                        @endif
                    </p>
                </div>
                <div class="pb-3">
                    <p class="text-black">Produced By</p>
                    <p class="text-capitalize">
                        @if($data->producer)
                        {{ $data->producer }}
                        @else
                        -
                        @endif
                    </p>
                </div>
                <div class="pb-3">
                    <p class="text-black">Artist</p>
                    <p class="text-capitalize">
                        @if($data->artist)
                        {{ $data->artist }}
                        @else
                        -
                        @endif
                    </p>
                </div>
            </div>
            </div>
        </div>

        <div class="mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="media">
                            <i class="text-black bi-calendar-event h4 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Release Date</h5>
                                @if($data->tgl_tayang)
                                {{ $data->tgl_tayang->format('d / m / Y') }}
                                @else
                                -
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-layers h4 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Episode</h5>
                                @if($data->episode)
                                {{ $data->episode }}
                                @else
                                -
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-star h4 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Season</h5>
                                @if($data->season)
                                {{ $data->season }}
                                @else
                                -
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-start ps-4 d-none">
                        <div class="media">
                            <i class="text-black bi-share h4 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Share</h5>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#shareModal">Share link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-activity h4 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Genre</h5>
                                <p class="text-capitalize">
                                @php
                        $genre = json_decode($data->genre_id);
                        @endphp
                        @foreach($genre as $gen)
                        @php
                        $ge = App\Genre::find($gen);
                        @endphp
                        {{ $ge->title }}
                        @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <!-- <h4 class="mb-3 fw-bold text-black">Highlight miniseries</h4> -->
            <div class="swiper swiper-1">
  <div class="swiper-wrapper">
    @php
    $hight = json_decode($data->img_highlight);
    @endphp
    @foreach($hight as $hi)
    <div class="swiper-slide">
        <a href="javascript:void(0)" data-fancybox="{{ $data->title }}" data-src="{{ url('').'/'.$hi }}" data-caption="{{ ucwords($data->title) }}">
            <img src="{{ url('').'/'.$hi }}" alt="" width="100%" class="rounded">
        </a>
    </div>
    @endforeach
    
  </div>
  <div class="swiper-button-next next">
    <div class="btn-icon bg-light text-center text-dark">
        <i class="bi-chevron-right"></i>
    </div>
  </div>
  <div class="swiper-button-prev prev">
    <div class="btn-icon bg-light text-center text-dark">
        <i class="bi-chevron-left"></i>
    </div>
  </div>
</div>
        </div>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <h4 class="mb-3 text-black fw-bold">Recomended Miniseries</h4>
    <div class="swiper swiper-2">
        <div class="swiper-wrapper">
            @foreach($miniseries->reverse() as $mini)
            <div class="swiper-slide">
                <a href="{{ route('miniseries_view',['slug' => $mini -> slug]) }}" class="text-dark">
                <div class="card border-0">
                    <img src="{{ url('').'/'.$mini->img_clip }}" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <h5 class="my-2 text-capitalize text-black">{{ $mini->title }}</h5>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</section>

<div class="modal" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 ms-auto" id="shareModalLabel">Share Now</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="text-center d-flex justify-content-center">
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_telegram"></a>
                <a class="a2a_button_whatsapp"></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/swiper.css') }}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
<link rel="stylesheet" href="http://vjs.zencdn.net/4.1.0/video-js.css">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="http://vjs.zencdn.net/4.1.0/video.js"></script>
<script src="https://rawgit.com/eXon/videojs-youtube/fffc6be504e6b791c1eef2076b97c43298753be6/src/media.youtube.js"></script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<script>
    const swiper1 = new Swiper('.swiper-1', {
        loop: false,
        navigation: {
          nextEl: ".next",
          prevEl: ".prev",
        },
    });
    const swiper2 = new Swiper('.swiper-2', {
        slidesPerView: 1,
        spaceBetween: 15,
        breakpoints: {
          640: {
            slidesPerView: 2,
            // spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            // spaceBetween: 40,
          },
          1024: {
            slidesPerView: 4,
            // spaceBetween: 50,
          },
        },
    });

    var a2a_config = a2a_config || {};
    a2a_config.icon_color = "#000,#fff";
</script>
@endsection