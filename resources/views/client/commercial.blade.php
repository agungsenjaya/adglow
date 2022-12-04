@extends('layouts.index')
@section('content')
<section class="space-xl bg-black text-white">
    <div class="container text-center">
        <h3 class="mb-0 fw-bold">Tv Commercials</h3>
        <p class="mb-0">Adglow pictures tv commercials list</p>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($commercial->reverse() as $docu)
        <div class="col">
          <a href="{{ route('commercial_view',['slug' => $docu -> slug]) }}" class="card border-0 text-dark">
            <img src="{{ url('').'/'.$docu->img_clip }}" class="rounded" alt="{{ $docu->slug }}">
            <div class="card-body">
              <h5 class="card-title text-capitalize text-black">{{ $docu->title }}</h5>
            </div>
          </a>
        </div>
  @endforeach
  
</div>
    </div>
</section>
@endsection