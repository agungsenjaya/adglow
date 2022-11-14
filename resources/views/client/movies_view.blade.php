@extends('layouts.index')
@section('content')
<div class="position-relative">
    <img src="https://dummyimage.com/1349x500" alt="" width="100%">
    <div class="to-bottom">
        <div class="container text-center mb-5">
            <a href="#" class="btn btn-light btn-lg">
                <i class="bi-play-fill me-2"></i>Watch Trailer
            </a>
        </div>
    </div>
</div>
<section class="py-3 bg-black">
    <div class="container text-white text-center lead">
        Tanggal tayang {{ $data->tgl_tayang }}
    </div>
</section>
<section class="space-m">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-7">
                <img src="https://dummyimage.com/600x400" alt="" width="100%" class="rounded">
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <img src="{{ url('') .'/'. $data->img }}" alt="" width="100%" class="rounded">
                @if($data->tgl_tayang)
                <p>{{ $data->tg_tayang }}</p>
                @endif
            </div>
            <div class="col-md-5">
            <div class="px-4">
                <h3 class="text-capitalize">{{ $data->title }}</h3>
                <!-- {!! $data->description !!} -->
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor fugiat ipsum sint? Quia, maxime dolorum nulla numquam non facere natus omnis deserunt ex pariatur reiciendis velit consectetur illum minus!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor fugiat ipsum sint? Quia, maxime dolorum nulla numquam non facere natus omnis deserunt ex pariatur reiciendis velit consectetur illum minus!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor fugiat ipsum sint? Quia, maxime dolorum nulla numquam non facere natus omnis deserunt ex pariatur reiciendis velit consectetur illum minus!</p>
                <div class="py-3">
                    <p class="mb-0">Directed By</p>
                    <p class="mb-0 text-capitalize">
                        @if($data->director)
                        {{ $data->director }}
                        @else
                        -
                        @endif
                    </p>
                </div>
                <div class="pb-3">
                    <p class="mb-0">Produced By</p>
                    <p class="mb-0 text-capitalize">
                        @if($data->producer)
                        {{ $data->producer }}
                        @else
                        -
                        @endif
                    </p>
                </div>
                <div class="">
                    <p class="mb-0">Artist</p>
                    <p class="mb-0 text-capitalize">
                        @if($data->artist)
                        {{ $data->artist }}
                        @else
                        -
                        @endif
                    </p>
                </div>

                <!-- <div class="text-center">
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_telegram"></a>
                        <a class="a2a_button_whatsapp"></a>
                    </div>
                </div> -->

            </div>
            </div>
        </div>

        <div class="mb-4">
            <h3 class="mb-3">Highlight</h3>

            <div class="swiper swiper-1">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
        <a href="javascript:void(0)" data-fancybox="{{ $data->title }}" data-src="https://dummyimage.com/1349x600" data-caption="{{ $data->title }}">
            <img src="https://dummyimage.com/1349x600" alt="" width="100%" class="rounded">
        </a>
    </div>
    <div class="swiper-slide">
        <a href="javascript:void(0)" data-fancybox="{{ $data->title }}" data-src="https://dummyimage.com/1349x600" data-caption="{{ $data->title }}">
            <img src="https://dummyimage.com/1349x600" alt="" width="100%" class="rounded">
        </a>
    </div>
    <div class="swiper-slide">
        <a href="javascript:void(0)" data-fancybox="{{ $data->title }}" data-src="https://dummyimage.com/1349x600" data-caption="{{ $data->title }}">
            <img src="https://dummyimage.com/1349x600" alt="" width="100%" class="rounded">
        </a>
    </div>
    <div class="swiper-slide">
        <a href="javascript:void(0)" data-fancybox="{{ $data->title }}" data-src="https://dummyimage.com/1349x600" data-caption="{{ $data->title }}">
            <img src="https://dummyimage.com/1349x600" alt="" width="100%" class="rounded">
        </a>
    </div>
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
    <h3 class="mb-3">Recomended Movies</h3>
    <div class="swiper swiper-2">
        <div class="swiper-wrapper">
            @foreach($movies->reverse()->take(2) as $move)
            <div class="swiper-slide">
                <a href="{{ route('movies_view',['slug' => $move -> slug]) }}" class="text-dark">
                <div class="card border-0">
                    <img src="{{ url('').'/'.$data->img }}" alt="" width="100%" class="rounded-4">
                    <div class="card-body">
                        <h5 class="my-2 text-capitalize">{{ $move->title }}</h5>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/swiper.css') }}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
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
    a2a_config.icon_color = "transparent,#000";
</script>
@endsection