@extends('layouts.index')
@section('content')
<section class="space-m">
    <div class="container text-black text-center">
        <h3 class="mb-0 fw-bold">Explore Our Book</h3>
        <p class="mb-0">Adglow pictures music list</p>
        <!-- <div class="py-3">
          <div class="grad-line"></div>
        </div> -->
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      @for($i = 0; $i < 10; $i++)
        @foreach($book->reverse() as $boo)
        <div class="col">
          <a href="{{ route('book_view',['slug' => $boo -> slug]) }}" class="card border-0 text-dark">
            <img src="{{ url('').'/'.$boo->img_clip }}" class="rounded" alt="{{ $boo->slug }}">
            <div class="card-body">
              <h5 class="card-title text-capitalize text-black">{{ $boo->title }}</h5>
            </div>
          </a>
        </div>
  @endforeach
  @endfor
</div>
    </div>
</section>
@endsection