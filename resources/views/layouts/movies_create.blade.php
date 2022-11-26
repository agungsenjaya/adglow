@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
<h1 class="h4 fw-bold">Movies Create</h1>
      </div>
      <section>
        <div class="card">
          <div class="card-body">
          @foreach ($errors->all() as $error)
              {{ $error }}<br/>
          @endforeach
          <form action="{{ route('admin.movies_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Genre</label>
              <select name="genre_id[]" id="select-genre" class="w-100" multiple required>
                <option value="">Select Option</option>
                @foreach($genre as $gen)
                <option value="{{ $gen->id }}">{{ $gen->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Images Logo</label>
              <input type="file" class="form-control" name="img_logo" required>
            </div>
            <div class="col">
              <label class="form-label">Images Background</label>
              <input type="file" class="form-control" name="img_background" required>
            </div>
            <div class="col">
              <label class="form-label">Images Poster</label>
              <input type="file" class="form-control" name="img_clip" required>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Tanggal Tayang (Optional)</label>
              <input type="date" class="form-control" name="tgl_tayang">
            </div>
            <div class="col">
              <label class="form-label">Durasi (Optional)</label>
              <input class="form-control" type="time" name="duration">
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
          <div class="mb-3">
              <label class="form-label">Artist (Optional)</label>
              <input type="text" class="form-control" name="artist">
            </div>
            <div class="mb-3">
              <label class="form-label">Trailer (Optional)</label>
              <input type="text" class="form-control" name="trailer">
          </div>
          <div class="mb-3">
              <label class="form-label">Images Highlight</label>
              <input type="file" class="form-control" name="img_highlight[]" multiple="true" id="img_highlight" onchange="previewImage()" required>
              <div class="row" id="image_preview"></div>
          </div>
          <div class="mb-3">
            <input type="hidden" class="form-control" name="link">
            <button type="button" class="btn btn-primary w-100" onClick="addLink()"><i class="bi-plus-circle-fill me-2"></i>Add Link (Optional)</button>
            <ul class="list-group list-group-flush mt-3 d-none" id="link">
            </ul>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection
@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  let quill = new Quill('#editor', {
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

  $( '#select-genre' ).select2( {
    theme: 'bootstrap-5'
  });



  let link_no = 0;
  let link = [];
  
  function addLink(){
    let a = $('#link').find('d-none');
    if (a) {
      $('#link').removeClass('d-none');
    }
    link_no += 1;
    $('#link').append(`
    <li class="list-group-item px-0 link link-${link_no}" data-id="${link_no}">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" name="new_name" placeholder="Enter name" required>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="new_link" placeholder="Enter link" required>
        </div>
        <div class="col-1">
          <button type="button" class="btn btn-outline-dark w-100" onClick="removeLink(${link_no})">
            <i class="bi-x"></i>
          </button>
        </div>
      </div>
    </li>`);
  }

  function removeLink(e){
    link_no -= 1;
    if (link_no <= 0) {
      $('#link').addClass('d-none');
    }
    $(`.link-${e}`).remove();
  }

  $('form').submit(function () { 
    $( ".link" ).each(function(index) {
      let input_name = $(this).find('input[name="new_name"]').val();
      let input_link = $(this).find('input[name="new_link"]').val();
      let obj = {};
      obj.id = $(this).attr('data-id');
      obj.name = input_name;
      obj.link = input_link;
      link.push(obj);
    });

    if (link.length) {
      $('input[name="link"]').val(JSON.stringify(link));
    }
  });
</script>
@endsection