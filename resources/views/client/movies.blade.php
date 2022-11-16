@extends('layouts.index')
@section('content')
<section class="space-xl bg-black text-white">
    <div class="container">
        <h3 class="mb-0">Explore Our Movies</h3>
        <p class="mb-0">Adglow pictures movie list</p>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($movies->reverse() as $move)
        <div class="col">
          <a href="{{ route('movies_view',['slug' => $move -> slug]) }}" class="card border-0 text-dark">
            <img src="{{ url('').'/'.$move->img_clip }}" class="rounded" alt="{{ $move->slug }}">
            <div class="card-body">
              <h5 class="card-title text-capitalize text-black">{{ $move->title }}</h5>
            </div>
          </a>
        </div>
  @endforeach
  
</div>
    </div>
</section>
@endsection