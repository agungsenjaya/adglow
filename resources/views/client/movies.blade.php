@extends('layouts.index')
@section('content')
<section class="space-m bg-primary text-white">
    <div class="container">
        <h2 class="mb-0">Movies</h2>
        <p class="lead">Adglow pictures movies list</p>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($movies->reverse() as $move)
        <div class="col">
          <a href="{{ route('movies_view',['slug' => $move -> slug]) }}" class="card border-0 text-dark">
            <img src="{{ $move->img }}" class="card-img-top" alt="{{ $move->slug }}">
            <div class="card-body">
              <h5 class="card-title text-capitalize">{{ $move->title }}</h5>
            </div>
          </a>
        </div>
  @endforeach
  
</div>
    </div>
</section>
@endsection