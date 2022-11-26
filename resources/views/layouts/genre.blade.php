@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h4 fw-bold">Genre</h1>
      </div>
      <section class="mb-3">
      <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text mb-0">Total Genre</p>
        <h3 class="card-title">{{ counTing(count($genre)) }}</h3>
      </div>
    </div>
  </div>
</div>
      </section>
      <section>
        <div class="card">
          <div class="card-body">
            <table class="table" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th class="col-3">Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($genre->reverse() as $gen)
                <tr>
                  <td>{{ counTing($no++) }}</td>
                  <td class="text-capitalize">{{ $gen->title }}</td>
                  <td>
                    <a class="btn btn-primary w-100" href="{{ route('admin.genre_edit', ['id' => $gen -> id]) }}">Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </section>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script>
  $('#table1').DataTable();
</script>
@endsection
