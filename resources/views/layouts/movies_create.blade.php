@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <h1 class="h5">Movies Create</h1>
      </div>
      <section>
        <div class="card">
          <div class="card-body">
          <form action="{{ route('admin.movies_store') }}" method="POST">
            @csrf
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" required>
            </div>
            <div class="col">
              <label class="form-label">Images</label>
              <input type="file" class="form-control" name="img" required>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Tgl Tayang</label>
              <input type="date" class="form-control" name="tgl_tayang" required>
            </div>
            <div class="col">
              <label class="form-label">Durasi (Optional)</label>
              <input class="form-control" id="settime" type="time" step="1" />
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Producer</label>
              <input type="text" class="form-control" name="producer" required>
            </div>
            <div class="col">
              <label class="form-label">Director</label>
              <input type="text" class="form-control" name="director" required>
            </div>
          </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Trailer</label>
              <input type="text" class="form-control" name="producer" required>
            </div>
            <div class="col">
              <label class="form-label">Online Movie (Optional)</label>
              <input type="text" class="form-control" name="link">
            </div>
          </div>
          <div class="mb-3">
              <label class="form-label">Description (Optional)</label>
              <textarea name="description" id="summernote"></textarea>
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
          // ['view', ['fullscreen', 'codeview', 'help']],
        ],
        fontNames: ['Open Sans']
  });
  // document.getElementById("settime").value = "13:24:00";
</script>
@endsection