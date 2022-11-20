@extends('layouts.index')
@section('content')
<section class="space-xl bg-black text-white">
    <div class="container">
        <h3 class="mb-0 fw-bold">Explore Our Miniseries</h3>
        <p class="mb-0">Adglow pictures miniseries list</p>
        <div class="py-3">
          <div class="grad-line"></div>
        </div>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($miniseries->reverse() as $mini)
        <div class="col">
          <a href="{{ route('miniseries_view',['slug' => $mini -> slug]) }}" class="card border-0 text-dark">
            <img src="{{ url('').'/'.$mini->img_clip }}" class="rounded" alt="{{ $mini->slug }}">
            <div class="card-body">
              <h5 class="card-title text-capitalize text-black">{{ $mini->title }}</h5>
            </div>
          </a>
        </div>
  @endforeach
</div>
    </div>
</section>
@endsection