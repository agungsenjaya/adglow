@extends('layouts.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4 fw-bold">Account</h1>
        <div class="btn-toolbar mb-2 mb-md-0 d-none">
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
      <section>
    <div class="">
        <div class="card  mb-4">
        <div class="card-header">
                <a class="btn btn-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout Now</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </div>
            <div class="row card-body">
                <div class="col-md-4 text-center">
                    <!-- <img src="{{ asset('img/user.png') }}" alt="" width="80%"> -->
                    <img src="https://dummyimage.com/200x200" width="80%" alt="" class="align-middle rounded-pill">
                </div>
                <div class="col-md align-self-center">
                    <table class="table line-h-2">
                        <tr>
                            <td class="title-3 ">Nama Lengkap</td>
                            <td>:</td>
                            <td class="text-capitalize">{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td class="title-3 ">Date Reg</td>
                            <td>:</td>
                            <td>
                              {{ Auth::user()->created_at ? Auth::user()->created_at : '-' }}</td>
                        </tr>
                        <tr class="border-transparent">
                            <td class="title-3 ">Email Address</td>
                            <td>:</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
        <div>
        <div class="card card-body ">

        <h5 class="title-2 mb-4">Update Account</h5>

        <form action="{{ route('admin.account_update',['id' => Auth::user()->id ]) }}" method="POST">
      @csrf
      <div class="row">
        <div class="mb-3 col">
          <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" placeholder="Masukan nama" required value="{{ Auth::user()->name }}">
        </div>
        <div class="mb-3 col">
          <label class="form-label">Email Address <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" placeholder="Masukan email" required value="{{ Auth::user()->email }}">
        </div>
      </div>

      <div class="row mb-3">
  <div class="col">
      <label for="password" class="form-label">New {{ __('Password') }}</label>

      <div class="">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="col">
      <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

      <div class="">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
      </div>
  </div>
  </div>

  <button type="submit" class="btn btn-primary">Update Account</button>
</form>

        </div>
        </div>
    </div>
</section>
@endsection
