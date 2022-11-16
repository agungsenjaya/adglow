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
    <div class="grad-hero" style="height:180px"></div>
  </div>
  <div class="swiper-pagination"></div>
</div>
</section>
<section class="space-m">
    <div class="container">
        <div class="d-flex">
            <h3 class="mb-4 me-3">Upcomming</h3>
        </div>
        <div class="swiper swiper-2">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card bg-transparent">
                    <img src="https://dummyimage.com/400x600" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <div class="d-none badge bg-primary text-uppercase text-white">Movies</div>
                        <h5 class="my-2">Jangan Sendirian</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card bg-transparent">
                    <img src="https://dummyimage.com/400x600" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <div class="d-none badge bg-primary text-uppercase text-white">Movies</div>
                        <h5 class="my-2">Jangan Sendirian</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card bg-transparent">
                    <img src="https://dummyimage.com/400x600" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <div class="d-none badge bg-primary text-uppercase text-white">Movies</div>
                        <h5 class="my-2">Jangan Sendirian</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card bg-transparent">
                    <img src="https://dummyimage.com/400x600" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <div class="d-none badge bg-primary text-uppercase text-white">Movies</div>
                        <h5 class="my-2">Jangan Sendirian</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card bg-transparent">
                    <img src="https://dummyimage.com/400x600" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <div class="d-none badge bg-primary text-uppercase text-white">Movies</div>
                        <h5 class="my-2">Jangan Sendirian</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card bg-transparent">
                    <img src="https://dummyimage.com/400x600" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <div class="d-none badge bg-primary text-uppercase text-white">Movies</div>
                        <h5 class="my-2">Jangan Sendirian</h5>
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
</script>
@endsection