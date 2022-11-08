@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Movies</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>
      <section class="mb-3">
      <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text">Total Movies</p>
        <h5 class="card-title">{{ counTing(count($movie)) }}</h5>
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
                  <th class="col-4">Judul</th>
                  <th>Tgl Tayang</th>
                  <th class="col-2">Director</th>
                  <th class="col-2">Producer</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($movie->reverse() as $move)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $move->title }}</td>
                  <td>{{ $move->tgl_tayang }}</td>
                  <td>{{ $move->director }}</td>
                  <td>{{ $move->producer }}</td>
                  <td>
                    <div class="d-flex">
                      <a href="#" class="btn btn-primary btn-sm w-100">Edit</a>
                      <a href="#" class="btn btn-primary btn-sm w-100">Edit</a>
                    </div>
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
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
  $('#table1').DataTable();
</script>
@endsection
