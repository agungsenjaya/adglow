@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
<h1 class="h4 fw-bold">Miniseries Create</h1>
      </div>
      <section>
        <div class="card">
          <div class="card-body">
          @foreach ($errors->all() as $error)
              {{ $error }}<br/>
          @endforeach
          <form action="{{ route('admin.miniseries_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" required>
            </div>
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Season (Optional)</label>
              <input class="form-control number" name="season">
            </div>
            <div class="col">
              <label class="form-label">Jumlah Episode (Optional)</label>
              <input class="form-control number" name="episode">
            </div>
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
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Trailer (Optional)</label>
              <input type="text" class="form-control" name="trailer">
            </div>
            <div class="col">
              <label class="form-label">Link (Optional)</label>
              <input type="text" class="form-control" name="link">
            </div>
          </div>
          <div class="mb-3">
              <label class="form-label">Images Highlight</label>
              <input type="file" class="form-control" name="img_highlight[]" multiple="true" id="img_highlight" onchange="previewImage()" required>
              <div class="row" id="image_preview"></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.4.3/imask.min.js" integrity="sha512-yJ3vm1HmQtcgeMtbUYCp7PuTLyjU+ffCnVNTuE1Uccv1BmkoaJIXt1EjBVGnscjCILc62hTJJJ2rJJBTcw8RjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

  var mask = document.getElementsByClassName('number');
  Array.prototype.forEach.call(mask, function(element) {
      var phoneMask = new IMask(element, {
        mask: /^[1-9]\d{0,5}$/
      });
  });
</script>
@endsection