@extends('layouts.index')
@section('content')
<section class="space-m">
    <div class="container text-black text-center">
        <h3 class="mb-0 fw-bold">Explore Our News</h3>
        <p class="mb-0">Adglow pictures news list</p>
        <!-- <div class="py-3">
          <div class="grad-line"></div>
        </div> -->
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @for($i = 0; $i < 10; $i++)
        @foreach($news->reverse() as $new)
        <div class="col">
          <a href="{{ route('news_view',['slug' => $new -> slug]) }}" class="card border-0 text-dark">
            <img src="{{ url('').'/'.$new->img_clip }}" class="rounded" alt="{{ $new->slug }}">
            <div class="card-body">
              <h5 class="card-title text-capitalize text-black">{{ $new->title }}</h5>
            </div>
            <div class="card-footer small bg-transparent">
                <i class="bi-calendar-event me-2"></i>{{ $new->created_at->format('d / m / Y') }}
            </div>
          </a>
        </div>
  @endforeach
  @endfor
</div>
    </div>
</section>
@endsection