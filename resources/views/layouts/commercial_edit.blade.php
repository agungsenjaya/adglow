@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
<h1 class="h4 fw-bold">Commercial Edit</h1>
      </div>
      <section>
        <div class="card">
          <div class="card-body">
          @foreach ($errors->all() as $error)
              {{ $error }}<br/>
          @endforeach
          <form action="{{ route('admin.commercial_update',['id' => $data -> id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="{{ $data->title }}" required>
            </div>
            <div class="col">
              <label class="form-label">Images Poster</label>
              <input type="file" class="form-control" name="img_clip">
            </div>
            </div>
            <div class="row mb-3">
          <div class="col">
              <label class="form-label">Tanggal Tayang</label>
              <input type="date" class="form-control" name="tgl_tayang" value="{{ $data->tgl_tayang }}" required>
            </div>
          <div class="col">
              <label class="form-label">Brands / Client</label>
              <input type="text" class="form-control" name="artist" value="{{ $data->artist }}" required>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Trailer (Optional)</label>
              <input type="text" class="form-control" value="{{ $data->trailer ? $data->trailer : NULL }}" name="trailer">
            </div>
          </div>
          <div class="mb-3">
              <label class="form-label">Images Highlight</label>
              <input type="file" class="form-control" name="img_highlight[]" multiple="true" id="img_highlight" onchange="previewImage()">
              <div class="row" id="image_preview"></div>
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

  let images = [];
  function previewImage() 
  {
    let total_file = document.getElementById("img_highlight").files.length;
    for(let nim = 0; nim < total_file ; nim++){
      $('#image_preview').append(`<div class="col-md-2 mt-3 image image-${nim}">
        <div class="position-relative">
          <img src="${URL.createObjectURL(event.target.files[nim])}" alt="" width="100%" class="rounded">
          <div class="to-center text-center d-none">
            <a href="javascript:void(0)" onclick="removeImage(${nim})">
              <i class="bi-x-circle-fill h3"></i>
            </a>
          </div>
        </div>
      </div>`);
      let object = {};
      object.id = nim;
      object.url = URL.createObjectURL(event.target.files[nim]);
      images.push(object);
    }
    console.log($('input[name="img_highlight[]"]')[0].files);
    let hasFile = $('input[name="img_highlight[]"]').val();
    if (!hasFile) {
      $('input[name="img_highlight[]"]').val('');
      $('.image').remove();
    }
  }

  function removeImage(e)
  {
    var a = $.map(images, function(value, index) {
      if(value.id != e){
        images = [];
        images.push(value);
      }
    });
    $(`.image-${e}`).remove();
  }
</script>
@endsection