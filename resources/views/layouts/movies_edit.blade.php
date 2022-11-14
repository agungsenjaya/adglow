@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
<h1 class="h4">Movies Edit</h1>
      </div>
      <section>
        <div class="card">
          <div class="card-body">
          @foreach ($errors->all() as $error)
              {{ $error }}<br/>
          @endforeach
          <form action="{{ route('admin.movies_update',['id' => $data -> id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="{{ $data->title }}" required>
            </div>
            <div class="col">
              <label class="form-label">Images Clip</label>
              <input type="file" class="form-control" name="img_clip">
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Tanggal Tayang</label>
              <input type="date" class="form-control" name="tgl_tayang" value="{{ $data->tgl_tayang }}" required>
            </div>
            <div class="col">
              <label class="form-label">Durasi (Optional)</label>
              <input class="form-control" type="time" name="duration" step="1" value="{{ $data->duration ? $data->duration : NULL }}">
            </div>
            </div>
            <div class="row mb-3">
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
              <input type="text" class="form-control" value="{{ $data->link ? $data->link : NULL }}" name="link">
            </div>
          </div>
          <div class="mb-3">
              <label class="form-label">Description (Optional)</label>
              <div id="editor">
                {!! $data->description ? $data->description : NULL !!}
              </div>
              <input type="hidden" name="description" id="editor_name" value="{{ $data->description ? $data->description : NULL }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
        </div>
      </section>
@endsection
@section('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
  quill.on('text-change', function(delta, oldDelta, source) {
      document.getElementById("editor_name").value = quill.root.innerHTML;
  });
</script>
@endsection