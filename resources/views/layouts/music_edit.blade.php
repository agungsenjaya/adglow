@extends('layouts.layout')
@section('content')
@php
$no = 1;
$link = json_decode($data->link);
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
<h1 class="h4 fw-bold">Music Edit</h1>
      </div>
      <section>
        <div class="card">
          <div class="card-body">
          @foreach ($errors->all() as $error)
              {{ $error }}<br/>
          @endforeach
          <form action="{{ route('admin.music_update',['id' => $data -> id]) }}" method="POST" enctype="multipart/form-data">
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
              <label class="form-label">Tanggal Rilis (Optional)</label>
              <input type="date" class="form-control" value="{{ $data->tgl_tayang ? $data->tgl_tayang->format('Y-m-d'): NULL }}" name="tgl_tayang">
            </div>
            <div class="col">
              <label class="form-label">Artist</label>
              <input type="text" class="form-control" name="artist" value="{{ $data->artist ? $data->artist : NULL }}" required>
            </div>
            <div class="col">
              <label class="form-label">Creator (Optional)</label>
              <input type="text" class="form-control" name="creator" value="{{ $data->creator ? $data->creator : NULL }}">
            </div>
          </div>
          <div class="mb-3">
              <label class="form-label">Youtube (Optional)</label>
              <input type="text" class="form-control" name="trailer" value="{{ $data->trailer ? $data->trailer : NULL }}">
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Spotify (Optional)</label>
              <input type="text" class="form-control" name="spotify" value="{{ $link[0]->spotify ? $link[0]->spotify : NULL }}">
            </div>
            <div class="col">
              <label class="form-label">Joox (Optional)</label>
              <input type="text" class="form-control" name="joox" value="{{ $link[0]->joox ? $link[0]->joox : NULL }}">
            </div>
            <div class="col">
              <label class="form-label">Apple Music (Optional)</label>
              <input type="text" class="form-control" name="apple" value="{{ $link[0]->apple ? $link[0]->apple : NULL }}">
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