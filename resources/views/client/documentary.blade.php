@extends('layouts.index')
@section('content')
<section class="space-xl bg-black text-white">
    <div class="container">
        <h3 class="mb-0 fw-bold">Documentary & Tv Program</h3>
        <p class="mb-0">Documentary & Tv Program list</p>
        <div class="py-3">
          <div class="grad-line"></div>
        </div>
        <ul class="nav nav-pills mb-3 nav-category" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Documentary</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Tv Program</button>
          </li>
        </ul>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($documentary->reverse() as $docu)
        <div class="col">
          <a href="{{ route('documentary_view',['slug' => $docu -> slug]) }}" class="card border-0 text-dark">
            <img src="{{ url('').'/'.$docu->img_clip }}" class="rounded" alt="{{ $docu->slug }}">
            <div class="card-body">
            <div class="badge bg-black text-capitalize mb-2">
                {{ $docu->category }}
            </div>
              <h5 class="card-title text-capitalize text-black">{{ $docu->title }}</h5>
            </div>
          </a>
        </div>
  @endforeach
  
</div>
    </div>
</section>
@endsection