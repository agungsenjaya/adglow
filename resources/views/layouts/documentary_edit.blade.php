@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
<h1 class="h4">Doc & Tv Program Edit</h1>
      </div>
      <section>
        <div class="card">
          <div class="card-body">
          @foreach ($errors->all() as $error)
              {{ $error }}<br/>
          @endforeach
          <form action="{{ route('admin.documentary_update',['id' => $data -> id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="{{ $data->title }}" required>
            </div>
            <div class="col">
              <label class="form-label">Images</label>
              <input type="file" class="form-control" name="img">
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Tanggal Tayang (Optional)</label>
              <input type="date" class="form-control" name="tgl_tayang" value="{{ $data->tgl_tayang ? $data->tgl_tayang : NULL }}">
            </div>
            <div class="col">
              <label class="form-label">Producer</label>
              <input type="text" class="form-control" name="producer" value="{{ $data->producer }}" required>
            </div>
            <div class="col">
              <label class="form-label">Director</label>
              <input type="text" class="form-control" name="director" value="{{ $data->director }}" required>
            </div>
          </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Trailer (Optional)</label>
              <input type="text" class="form-control" name="trailer" value="{{ $data->trailer ? $data->trailer : NULL }}">
            </div>
            <div class="col">
              <label class="form-label">Link (Optional)</label>
              <input type="text" class="form-control" name="link" value="{{ $data->link ? $data->link : NULL }}">
            </div>
          </div>
          <div class="mb-3">
              <label class="form-label">Description (Optional)</label>
              <textarea name="description" id="summernote">{{ $data->description ? $data->description : NULL }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
        </div>
      </section>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
  $('#summernote').summernote({
    tabsize: 2,
    height: 400,
    toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['color', ['color']],
          ['insert', ['link', 'video']],
        ],
        fontNames: ['Kanit']
  });
</script>
@endsection