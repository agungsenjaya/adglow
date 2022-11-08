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
              <input type="text" class="form-control" name="durasi">
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
              <!-- <textarea name="description" id="summernote"></textarea> -->
              <div id="summernote" name="description"></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
        </div>
      </section>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('#summernote').summernote({
    tabsize: 2,
    height: 100
  });
  // $('.datepicker').datepicker();
</script>
@endsection