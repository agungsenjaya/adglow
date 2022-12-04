@extends('layouts.index')
@section('content')
<section class="space-m">
    <div class="container">
    <div class="row mb-5 justify-content-center d-none">
            <div class="col-md-8">
                <div class="position-relative">
                    <img src="{{ url('').'/'. $data->img_clip }}" alt="" width="100%" class="rounded">
                    <div class="to-center text-center">
                        <a href="javascript:void(0)" class="text-white">
                            <i class="bi-play-fill display-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ url('').'/'. $data->img_clip }}" alt="" width="100%" class="rounded">
                </div>
                <div class="col-md align-self-center">
                <h4 class="text-capitalize fw-bold mb-3 text-black">{{ $data->title }}</h4>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa ullam numquam minima eligendi aspernatur dolore vitae molestias quo officiis similique, deserunt, architecto labore dolorum et quisquam non, ducimus cum veritatis!
                    @if($data->trailer)
                <hr>
                <a href="{{ $data->trailer }}" class="btn btn-dark" target="_blank">
                    <i class="bi-play-fill me-2"></i>Watch Trailer
                </a>
                @endif
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
                                {{ $data->tgl_tayang->format('d / m / Y') }}
                                @else
                                -
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-activity h3 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Category</h5>
                                @if($data->category)
                                {{ $data->category }}
                                @else
                                -
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-star h3 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Artist</h5>
                                @if($data->artist)
                                {{ $data->artist }}
                                @else
                                -
                                @endif
                            </div>
                        </div>
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
    <h4 class="mb-3 text-black fw-bold">More Documentary & Tv Program</h4>
    <div class="swiper swiper-2">
        <div class="swiper-wrapper">
            @foreach($documentary->reverse() as $doc)
            <div class="swiper-slide">
                <a href="{{ route('documentary_view',['slug' => $doc -> slug]) }}" class="text-dark">
                <div class="card border-0">
                    <img src="{{ url('').'/'.$doc->img_clip }}" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <h5 class="my-2 text-capitalize text-black">{{ $doc->title }}</h5>
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