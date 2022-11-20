@extends('layouts.layout')
@section('content')
@php
$no = 1;
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h4 fw-bold">Music</h1>
      </div>
      <section class="mb-3">
      <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-text mb-0">Total Music</p>
        <h3 class="card-title">{{ counTing(count($music)) }}</h3>
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
                  <th class="col-3">Judul</th>
                  <th class="col-2">Artist</th>
                  <th class="col-2">Creator</th>
                  <th class="col-2">Tgl Rilis</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($music->reverse() as $musi)
                @php
                $link = json_decode($musi->link);
                @endphp
                <tr>
                  <td>{{ counTing($no++) }}</td>
                  <td class="text-capitalize">{{ $musi->title }}</td>
                  <td class="text-capitalize">{{ $musi->artist ? $musi->artist : '-' }}</td>
                  <td class="text-capitalize">{{ $musi->creator ? $musi->creator : '-' }}</td>
                  <td>{{ $musi->tgl_tayang ? $musi->tgl_tayang : '-' }}</td>
                  <td>
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="btn btn-primary w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi-three-dots-vertical me-2"></i>Action
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li><a class="dropdown-item" href="javascript:void(0)" data-fancybox="music" data-src="{{ url('').'/'.$musi->img_clip }}" data-caption="{{ ucwords($musi->title) }}">Image</a></li>
                          @if($musi->trailer)
                          <li><a class="dropdown-item" href="{{ $musi->trailer }}" target="_blank">Youtube</a></li>
                          @endif
                          @if($musi->link)
                          @if($link[0]->spotify)
                          <li><a class="dropdown-item" href="{{ $link[0]->spotify }}" target="_blank">Spotify</a></li>
                          @endif
                          @if($link[0]->joox)
                          <li><a class="dropdown-item" href="{{ $link[0]->joox }}" target="_blank">Joox</a></li>
                          @endif
                          @if($link[0]->apple)
                          <li><a class="dropdown-item" href="{{ $link[0]->apple }}" target="_blank">Apple Music</a></li>
                          @endif
                          @endif
                          <li><a class="dropdown-item" href="{{ route('admin.music_edit', ['id' => $musi -> id]) }}">Edit</a></li>
                        </ul>
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
