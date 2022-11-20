@extends('layouts.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4 fw-bold">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0 d-none">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text">Movies</p>
        <h3 class="card-title">{{ counTing($movies) }}</h3>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text">Miniseries</p>
        <h3 class="card-title">{{ counTing($miniseries) }}</h3>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text">Tv Commercials</p>
        <h3 class="card-title">{{ counTing($commercial) }}</h3>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text">Music</p>
        <h3 class="card-title">{{ counTing($music) }}</h3>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text">Books</p>
        <h3 class="card-title">{{ counTing($book) }}</h3>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text">Doc & Tv Program</p>
        <h3 class="card-title">{{ counTing($documentary) }}</h3>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text">News</p>
        <h3 class="card-title">{{ counTing($news) }}</h3>
      </div>
    </div>
  </div>
</div>
@endsection
