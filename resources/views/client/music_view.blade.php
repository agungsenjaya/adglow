@extends('layouts.index')
@section('content')
<section class="space-m">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-5">
                <img src="https://dummyimage.com/600x500" alt="" width="100%" class="rounded mb-3">
                <!-- <img src="{{ url('').'/'.$data->img_clip }}" alt="" width="100%"> -->
            </div>
            <div class="col-md align-self-center">
                <h4 class="text-capitalize fw-bold mb-3 text-black">{{ $data->title }}</h4>
                <hr>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, consequuntur iste hic ipsa non numquam culpa deserunt quas odit quisquam, dolorem perferendis laudantium tempore corrupti esse alias nobis laborum officiis.</p>
                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <div class="media">
                        <i class="text-black bi-star h4 me-3"></i>    
                        <div class="media-body">
                                <h5 class="fw-bold text-black">Artist</h5>
                                <span class="text-capitalize">Arsy Basudara</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border-start ps-4">
                        <div class="media">
                        <i class="text-black bi-music-note-beamed h4 me-3"></i>    
                        <div class="media-body">
                                <h5 class="fw-bold text-black">Creator</h5>
                                <span class="text-capitalize">
                                @if($data->creator)
                                {{ $data->creator }}
                                @else
                                -
                                @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border-start ps-4">
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
                    
                </div>
                @if($data->trailer)
                <hr>
                <a href="{{ $data->trailer }}" class="btn btn-dark" target="_blank">
                    <i class="bi-play-fill me-2"></i>Listen Now
                </a>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
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
    </div>
</section>
<section class="space-m bg-light">
    <div class="container">
    @if($data->link)
                @php
                $link = json_decode($data->link);
                @endphp
                <div class="text-center">
                <h4 class="fw-bold text-black">Available On</h4>
                <ul class="nav justify-content-center">
                    @if(isset($link[0]->spotify))
                <li class="nav-item align-self-end">
                    <a class="nav-link text-dark" target="_blank" href="{{ $link[0]->spotify }}">
                        <div>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="40" height="40"
                    viewBox="0 0 50 50">
                        <path d="M25.009,1.982C12.322,1.982,2,12.304,2,24.991S12.322,48,25.009,48s23.009-10.321,23.009-23.009S37.696,1.982,25.009,1.982z M34.748,35.333c-0.289,0.434-0.765,0.668-1.25,0.668c-0.286,0-0.575-0.081-0.831-0.252C30.194,34.1,26,33,22.5,33.001 c-3.714,0.002-6.498,0.914-6.526,0.923c-0.784,0.266-1.635-0.162-1.897-0.948s0.163-1.636,0.949-1.897 c0.132-0.044,3.279-1.075,7.474-1.077C26,30,30.868,30.944,34.332,33.253C35.022,33.713,35.208,34.644,34.748,35.333z M37.74,29.193 c-0.325,0.522-0.886,0.809-1.459,0.809c-0.31,0-0.624-0.083-0.906-0.26c-4.484-2.794-9.092-3.385-13.062-3.35 c-4.482,0.04-8.066,0.895-8.127,0.913c-0.907,0.258-1.861-0.272-2.12-1.183c-0.259-0.913,0.272-1.862,1.184-2.12 c0.277-0.079,3.854-0.959,8.751-1c4.465-0.037,10.029,0.61,15.191,3.826C37.995,27.328,38.242,28.388,37.74,29.193z M40.725,22.013 C40.352,22.647,39.684,23,38.998,23c-0.344,0-0.692-0.089-1.011-0.275c-5.226-3.068-11.58-3.719-15.99-3.725 c-0.021,0-0.042,0-0.063,0c-5.333,0-9.44,0.938-9.481,0.948c-1.078,0.247-2.151-0.419-2.401-1.495 c-0.25-1.075,0.417-2.149,1.492-2.4C11.729,16.01,16.117,15,21.934,15c0.023,0,0.046,0,0.069,0 c4.905,0.007,12.011,0.753,18.01,4.275C40.965,19.835,41.284,21.061,40.725,22.013z"></path>
                    </svg>
                    </div>
                    <p class="font-10 my-2">Spotify</p>
                    </a>
                </li>
                @endif
                @if(isset($link[0]->apple))
                <li class="nav-item align-self-end">
                    <a class="nav-link text-dark" target="_blank" href="{{ $link[0]->apple }}">
                        <div>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="45" height="45"
viewBox="0 0 50 50">
<path d="M 44.527344 34.75 C 43.449219 37.144531 42.929688 38.214844 41.542969 40.328125 C 39.601563 43.28125 36.863281 46.96875 33.480469 46.992188 C 30.46875 47.019531 29.691406 45.027344 25.601563 45.0625 C 21.515625 45.082031 20.664063 47.03125 17.648438 47 C 14.261719 46.96875 11.671875 43.648438 9.730469 40.699219 C 4.300781 32.429688 3.726563 22.734375 7.082031 17.578125 C 9.457031 13.921875 13.210938 11.773438 16.738281 11.773438 C 20.332031 11.773438 22.589844 13.746094 25.558594 13.746094 C 28.441406 13.746094 30.195313 11.769531 34.351563 11.769531 C 37.492188 11.769531 40.8125 13.480469 43.1875 16.433594 C 35.421875 20.691406 36.683594 31.78125 44.527344 34.75 Z M 31.195313 8.46875 C 32.707031 6.527344 33.855469 3.789063 33.4375 1 C 30.972656 1.167969 28.089844 2.742188 26.40625 4.78125 C 24.878906 6.640625 23.613281 9.398438 24.105469 12.066406 C 26.796875 12.152344 29.582031 10.546875 31.195313 8.46875 Z"></path>
</svg>
</div>
<p class="font-10 my-2">Apple Music</p>
                    </a>
                </li>
                @endif
                @if(isset($link[0]->joox))
                <li class="nav-item align-self-end">
                    <a class="nav-link text-dark" target="_blank" href="{{ $link[0]->joox }}">
                        <div>
                        <svg width="40" height="40" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.78319 0.575853C10.0829 0.178042 11.4496 -0.020255 12.8115 0.00163466C13.6287 0.0147687 14.4442 0.107611 15.2431 0.283861C18.3576 0.937862 21.1633 2.8237 22.9228 5.4157C24.3873 7.5657 25.1024 10.1987 24.9824 12.7897C24.8559 15.2832 23.9436 17.7357 22.3701 19.7087C22.2971 19.7987 22.2081 19.9109 22.2471 20.0319C22.336 20.6275 22.4334 21.2219 22.5309 21.8164C22.5802 22.1173 22.6295 22.4183 22.6777 22.7194C21.9524 22.7262 21.2259 22.7033 20.5009 22.6803C20.0594 22.6663 19.6185 22.6524 19.1787 22.6452C18.9965 22.6743 18.8383 22.7719 18.6815 22.8687C18.6011 22.9183 18.5211 22.9677 18.4385 23.0075C16.654 23.968 14.6238 24.4899 12.5918 24.5124C10.1338 24.5544 7.67479 23.8537 5.63279 22.5387C3.80029 21.3757 2.28784 19.7223 1.31834 17.8053C0.0983411 15.4203 -0.301549 12.6201 0.230451 9.98308C0.648951 7.85358 1.66053 5.84312 3.12303 4.21062C4.62503 2.52312 6.60219 1.24835 8.78319 0.575853ZM14.3056 6.34734C13.7436 6.18309 13.1609 6.10028 12.5771 6.09734C11.9934 6.0944 11.4092 6.17185 10.8447 6.32585C9.78021 6.61385 8.78022 7.18434 8.01072 7.97234C7.01972 8.96184 6.38462 10.2864 6.24412 11.6579C6.10762 12.9309 6.38697 14.2452 7.04197 15.3522C7.65797 16.3977 8.58439 17.2554 9.69139 17.7819C10.8664 18.3659 12.2295 18.5482 13.5195 18.3317C14.857 18.1072 16.1143 17.4463 17.0498 16.4753C18.1218 15.3848 18.7468 13.8764 18.7773 12.3659C18.8028 11.1304 18.4578 9.88567 17.7568 8.85417C16.9603 7.65267 15.7141 6.74734 14.3056 6.34734ZM11.8457 10.8171C12.0562 10.7211 12.2905 10.6673 12.5234 10.6647C12.7563 10.6622 12.9878 10.7107 13.1943 10.82C13.7363 11.0815 14.0724 11.688 14.0039 12.278C13.9459 12.919 13.4137 13.4903 12.7607 13.5798C12.1837 13.6968 11.5601 13.4236 11.2471 12.9421C10.9886 12.5566 10.9299 12.0459 11.1064 11.6139C11.2429 11.2719 11.5142 10.9851 11.8457 10.8171Z" fill="black"/>
</svg>

</div>
<p class="font-10 my-2">Joox</p>

                    </a>
                </li>
                @endif
                </ul>
                </div>
                @endif
    </div>
</section>
<section class="space-m">
    <div class="container">
    <h4 class="mb-3 text-black fw-bold">Recomended Music</h4>
    <div class="swiper swiper-2">
        <div class="swiper-wrapper">
            @foreach($music->reverse() as $musi)
            <div class="swiper-slide">
                <a href="{{ route('music_view',['slug' => $musi -> slug]) }}" class="text-dark">
                <div class="card border-0">
                    <img src="https://dummyimage.com/600x400" alt="" width="100%" class="rounded">
                    <!-- <img src="{{ url('').'/'.$musi->img_clip }}" alt="" width="100%" class="rounded"> -->
                    <div class="card-body">
                        <h5 class="my-2 text-capitalize text-black">{{ $musi->title }}</h5>
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
</script>
@endsection