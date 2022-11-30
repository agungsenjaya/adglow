@extends('layouts.index')
@section('content')
<section>
<div class="swiper swiper-1 position-relative">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
        <img src="https://dummyimage.com/1349x600" alt="" width="100%">
    </div>
    <div class="swiper-slide">
        <img src="https://dummyimage.com/1349x600" alt="" width="100%">
    </div>
    <div class="swiper-slide">
        <img src="https://dummyimage.com/1349x600" alt="" width="100%">
    </div>
    <div class="swiper-slide">
        <img src="https://dummyimage.com/1349x600" alt="" width="100%">
    </div>
  </div>
  <div class="to-top z-index-1">
    <div class="grad-top" style="height:180px"></div>
  </div>
  <div class="swiper-pagination"></div>
</div>
</section>
<section class="space-m">
    <div class="container">
        <h3 class="mb-4 fw-bold">Movies</h3>
        <div class="swiper swiper-2">
        <div class="swiper-wrapper">
            @for($i = 0; $i < 4; $i++)
            @foreach($movies->reverse() as $move)
            <div class="swiper-slide">
                <a href="{{ route('movies_view',['slug' => $move -> slug]) }}" class="text-dark">
                <div class="card border-0 bg-transparent text-white">
                    <!-- <img src="{{ url('').'/'.$move->img_clip }}" alt="" width="100%" class="rounded"> -->
                    <img src="https://dummyimage.com/600x900" alt="" width="100%" class="rounded">
                    <div class="card-body">
                      <div class="badge bg-white text-dark text-capitalize">
                        @php
                        $genre = json_decode($move->genre_id);
                        @endphp
                        @foreach($genre as $gen)
                        @php
                        $ge = App\Genre::find($gen);
                        @endphp
                        {{ $ge->title }}
                        @endforeach
                      </div>
                        <h5 class="my-2 text-capitalize">{{ $move->title }}</h5>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
            @endfor
        </div>
        </div>
    </div>
</section>
<section class="space-m ">
  <div class="container">
    <div class="row">
      <div class="col-md-3 align-self-center">
      <div class="pe-5">
      <h3 class="fw-bold">Upcomming For You</h3>
    <p>Will be live for you soon</p>
    <ul class="nav nav-bottom mt-2">
  <li class="nav-item me-3">
    <a class="nav-link btn-icon bg-white text-center" href="javascript:void(0)">
      <i class="bi-chevron-left text-black"></i>
    </a>
  </li>
  <li class="nav-item me-3">
    <a class="nav-link btn-icon bg-white text-center" href="javascript:void(0)">
      <i class="bi-chevron-right text-black"></i>
    </a>
  </li>
</ul>
      </div>
      </div>
      <div class="col-md-9">

      <div class="swiper swiper-3">
        <div class="swiper-wrapper">
            @for($i = 0; $i < 4; $i++)
            @foreach($movies as $move)
            <div class="swiper-slide">
                <a href="{{ route('movies_view',['slug' => $move -> slug]) }}" class="text-dark">
                <div class="card border-0 bg-transparent text-white">
                    <!-- <img src="{{ url('').'/'.$move->img_clip }}" alt="" width="100%" class="rounded"> -->
                    <img src="https://dummyimage.com/600x900" alt="" width="100%" class="rounded">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                    <div class="badge bg-white text-dark text-capitalize">
                        Miniseries
                      </div>
                      <div>
                        {{ $move->tgl_tayang }}
                      </div>
                      </div>
                        <h5 class="my-2 text-capitalize">{{ $move->title }}</h5>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
            @endfor
        </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
<section class="space-m ">
  <div class="container">
    <h3 class="fw-bold">Latest News</h3>
    <p class="mb-4">Get the latest news about movies and many more</p>

    <div class="swiper swiper-4">
        <div class="swiper-wrapper">
            @for($i = 0; $i < 4; $i++)
            @foreach($news->reverse() as $new)
            <div class="swiper-slide">
                <a href="{{ route('news_view',['slug' => $new -> slug]) }}" class="text-dark">
                <div class="card border-0 bg-transparent text-white">
                    <!-- <img src="{{ url('').'/'.$move->img_clip }}" alt="" width="100%" class="rounded"> -->
                    <img src="https://dummyimage.com/600x400" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <h5 class="my-2 text-capitalize">{{ $new->title }}</h5>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
            @endfor
        </div>
        </div>

  </div>
</section>
<section class="space-m ">
  <div class="container">
  <div class="row">
  <!-- <div class="col-md-10 offset-md-1"> -->
  <div class="col-md-12">
    <h3 class="mb-4 text-center fw-bold">Our Catalog</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
  <div class="col">
    <div class="card bg-transparent">
      <img src="https://dummyimage.com/500" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title fw-light">Movies</h4>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent">
      <img src="https://dummyimage.com/500" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title fw-light">Miniseries</h4>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent">
      <img src="https://dummyimage.com/500" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title fw-light">Tv Commercials</h4>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent">
      <img src="https://dummyimage.com/500" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title fw-light">Music</h4>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent">
      <img src="https://dummyimage.com/500" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title fw-light">Books</h4>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent">
      <img src="https://dummyimage.com/500" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title fw-light">Documentary</h4>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent">
      <img src="https://dummyimage.com/500" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title fw-light">Tv Program</h4>
      </div>
    </div>
  </div>
</div>
  </div>
  </div>
  </div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
<style>
    body {
        background-color: #000 !important;
        color: #fff;
    }
</style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
    const swiper1 = new Swiper('.swiper-1', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
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
        navigation: {
          nextEl: ".next",
          prevEl: ".prev",
        },
    });
    const swiper3 = new Swiper('.swiper-3', {
        slidesPerView: 1,
        spaceBetween: 15,
        breakpoints: {
          640: {
            slidesPerView: 2,
            // spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            // spaceBetween: 40,
          },
          1024: {
            slidesPerView: 3,
            // spaceBetween: 50,
          },
        },
        navigation: {
          nextEl: ".next",
          prevEl: ".prev",
        },
    });
    const swiper4 = new Swiper('.swiper-4', {
        slidesPerView: 1,
        spaceBetween: 15,
        breakpoints: {
          640: {
            slidesPerView: 2,
            // spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            // spaceBetween: 40,
          },
          1024: {
            slidesPerView: 3,
            // spaceBetween: 50,
          },
        },
        navigation: {
          nextEl: ".next",
          prevEl: ".prev",
        },
    });
</script>
@endsection