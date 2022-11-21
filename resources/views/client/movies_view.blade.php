@extends('layouts.index')
@section('content')
<section class="space-m">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-5">
                <img src="{{ url('') .'/'. $data->img_clip }}" alt="" width="100%" class="rounded">
            </div>
            <div class="col-md-5 align-self-center">
            <div class="px-4">
                <h3 class="text-capitalize fw-bold mb-3 text-black">{{ $data->title }}</h3>
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
                            <i class="text-black bi-calendar-event h3 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Release Date</h5>
                                @if($data->tgl_tayang)
                                {{ $data->tgl_tayang }}
                                @else
                                -
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-clock h3 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Duration</h5>
                                @if($data->duration)
                                {{ $data->duration }}
                                @else
                                -
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-share h3 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Share Movies</h5>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#shareModal">>Share link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-link-45deg h3 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Trailer Movies</h5>
                                <a href="javascript:void(0)">Visit link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <!-- <h3 class="mb-3 fw-bold text-black text-center">Trailer Movies</h3> -->
                <div class="position-relative">
                    <img src="https://dummyimage.com/600x400" alt="" width="100%" class="rounded">
                    <div class="to-center text-center">
                        <a href="javascript:void(0)" class="text-white">
                            <i class="bi-play-circle-fill display-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <!-- <h3 class="mb-3 fw-bold text-black">Highlight Movies</h3> -->
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
    <h3 class="mb-3 text-black fw-bold">Recomended Movies</h3>
    <div class="swiper swiper-2">
        <div class="swiper-wrapper">
            @foreach($movies->reverse() as $move)
            <div class="swiper-slide">
                <a href="{{ route('movies_view',['slug' => $move -> slug]) }}" class="text-dark">
                <div class="card border-0">
                    <img src="{{ url('').'/'.$move->img_clip }}" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <h5 class="my-2 text-capitalize text-black">{{ $move->title }}</h5>
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
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="shareModalLabel">Share Movies</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="text-center justify-content-center">
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