@extends('layouts.index')
@section('content')
<section class="space-m">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ url('').'/'. $data->img_clip }}" alt="" width="100%" class="rounded">
                <!-- @if($data->link)
                <div class="text-center mt-3">
                    <a href="{{ $data->link }}" class="btn btn-dark" target="_blank">
                        Link Details
                    </a>
                </div>
                @endif -->
            </div>
            <div class="col-md">
                <h4 class="text-capitalize fw-bold mb-3 text-black">{{ $data->title }}</h4>
                <!-- <div class="badge bg-black mb-3"> <i class="bi-calendar-event me-2"></i>{{ $data->created_at->format('d / m / Y') }}</div> -->
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, consequuntur iste hic ipsa non numquam culpa deserunt quas odit quisquam, dolorem perferendis laudantium tempore corrupti esse alias nobis laborum officiis.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, consequuntur iste hic ipsa non numquam culpa deserunt quas odit quisquam, dolorem perferendis laudantium tempore corrupti esse alias nobis laborum officiis.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, consequuntur iste hic ipsa non numquam culpa deserunt quas odit quisquam, dolorem perferendis laudantium tempore corrupti esse alias nobis laborum officiis.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, consequuntur iste hic ipsa non numquam culpa deserunt quas odit quisquam, dolorem perferendis laudantium tempore corrupti esse alias nobis laborum officiis.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, consequuntur iste hic ipsa non numquam culpa deserunt quas odit quisquam, dolorem perferendis laudantium tempore corrupti esse alias nobis laborum officiis.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, consequuntur iste hic ipsa non numquam culpa deserunt quas odit quisquam, dolorem perferendis laudantium tempore corrupti esse alias nobis laborum officiis.</p>
                <hr>
                <div class="row">
                <div class="col-md-4">
                        <div class="media">
                            <i class="text-black bi-pen h4 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Writter</h5>
                                <span class="text-capitalize">{{ $data->creator }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-calendar-event h4 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Release</h5>
                                @if($data->tgl_tayang)
                                {{ $data->tgl_tayang->format('d / m / Y') }}
                                @else
                                -
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border-start ps-4">
                        <div class="media">
                            <i class="text-black bi-share h4 me-3"></i>
                            <div class="media-body">
                                <h5 class="fw-bold text-black">Share</h5>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#shareModal">Share link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <h4 class="mb-3 text-black fw-bold">Recomended Book</h4>
    <div class="swiper swiper-2">
        <div class="swiper-wrapper">
            @foreach($book->reverse() as $boo)
            <div class="swiper-slide">
                <a href="{{ route('book_view',['slug' => $boo -> slug]) }}" class="text-dark">
                <div class="card border-0">
                    <!-- <img src="https://dummyimage.com/600x400" alt="" width="100%" class="rounded"> -->
                    <img src="{{ url('').'/'.$boo->img_clip }}" alt="" width="100%" class="rounded">
                    <div class="card-body">
                        <h5 class="my-2 text-capitalize text-black">{{ $boo->title }}</h5>
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