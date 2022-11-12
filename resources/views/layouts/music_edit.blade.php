@extends('layouts.layout')
@section('content')
@php
$no = 1;
$spotify;
$joox;
$apple;
$link = json_decode($data->link);
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
<h1 class="h4">Music Edit</h1>
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
              <input type="date" class="form-control" value="{{ $data->tgl_tayang ? $data->tgl_tayang : NULL }}" name="tgl_tayang">
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