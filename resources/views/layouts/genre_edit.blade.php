@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
<h1 class="h4 fw-bold">Genre Edit</h1>
      </div>
      <section>
        <div class="card">
          <div class="card-body">
          @foreach ($errors->all() as $error)
              {{ $error }}<br/>
          @endforeach
          <form action="{{ route('admin.genre_update',['id' => $data -> id]) }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="{{ $data->title }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
        </div>
      </section>
@endsection