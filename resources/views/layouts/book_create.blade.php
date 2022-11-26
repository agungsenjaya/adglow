@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
<h1 class="h4 fw-bold">Book Create</h1>
      </div>
      <section>
        <div class="card">
          <div class="card-body">
          @foreach ($errors->all() as $error)
              {{ $error }}<br/>
          @endforeach
          <form action="{{ route('admin.book_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" required>
            </div>
            <div class="col">
              <label class="form-label">Images Poster</label>
              <input type="file" class="form-control" name="img_clip" required>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Tanggal Rilis (Optional)</label>
              <input type="date" class="form-control" name="tgl_tayang">
            </div>
            <div class="col">
              <label class="form-label">Creator (Optional)</label>
              <input type="text" class="form-control" name="creator">
            </div>
          </div>
          <div class="mb-3  ">
              <label class="form-label">Link Pembelian (Optional)</label>
              <input type="text" class="form-control" name="link">
            </div>
          <div class="mb-3">
              <label class="form-label">Description (Optional)</label>
              <div id="editor"></div>
              <input type="hidden" name="description" id="editor_name">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  let quill = new Quill('#editor', {
    theme: 'snow'
  });
  quill.on('text-change', function(delta, oldDelta, source) {
      document.getElementById("editor_name").value = quill.root.innerHTML;
  });

</script>
@endsection