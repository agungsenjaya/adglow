@extends('layouts.index')
@section('content')
<section class="space-m">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="mb-3">
                    <h4 class="text-capitalize fw-bold text-black">{{ $data->title }}</h4>
                    <div class="badge bg-black">
                        <i class="bi-calendar-event me-2"></i>{{ $data->created_at->format('d / m / Y') }}
                    </div>
                </div>
            <img src="{{ url('').'/'. $data->img_clip }}" alt="" width="100%" class="rounded">
                <!-- <div class="badge bg-black mb-3"> <i class="bi-calendar-event me-2"></i>{{ $data->created_at->format('d / m / Y') }}</div> -->
                <br>
                <br>
                <div>
                    {!! $data->description !!}
                </div>
                <hr>
                <div class="text-center d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold text-black">Share</h5>
                    </div>
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
</section>
<section class="space-m">
    <div class="container">
    <h4 class="mb-3 text-black fw-bold">Recomended News</h4>
    <div class="swiper swiper-2">
        <div class="swiper-wrapper">
            @foreach($news->reverse() as $new)
            <div class="swiper-slide">
                <a href="{{ route('news_view',['slug' => $new -> slug]) }}" class="text-dark">
                <div class="card border-0">
                    <!-- <img src="https://dummyimage.com/600x400" alt="" width="100%" class="rounded"> -->
                    <img src="{{ url('').'/'.$new->img_clip }}" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <h5 class="my-2 text-capitalize text-black">{{ $new->title }}</h5>
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
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="http://vjs.zencdn.net/4.1.0/video.js"></script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<script>
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