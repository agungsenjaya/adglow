<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DASHBOARD | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    {{--<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>--}}


    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 py-1 px-3 fs-6 text-center" href="#">
    <img src="{{ asset('img/logo.png') }}" alt="" width="100">
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#movies" aria-expanded="false">
                  <div>
                    Movies
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse" id="movies">
                  <a href="#" class="list-group-item list-group-item-action">List Movies</a>
                  <a href="#" class="list-group-item list-group-item-action">Create Movies</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#miniseries" aria-expanded="false">
                  <div>
                    Miniseries
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse" id="miniseries">
                  <a href="#" class="list-group-item list-group-item-action">List Miniseries</a>
                  <a href="#" class="list-group-item list-group-item-action">Create Miniseries</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#tvcommercials" aria-expanded="false">
                  <div>
                    Tv Commercials
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse" id="tvcommercials">
                  <a href="#" class="list-group-item list-group-item-action">List Tv Commercials</a>
                  <a href="#" class="list-group-item list-group-item-action">Create Tv Commercials</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#music" aria-expanded="false">
                  <div>
                    Music
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse" id="music">
                  <a href="#" class="list-group-item list-group-item-action">List Music</a>
                  <a href="#" class="list-group-item list-group-item-action">Create Music</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#book" aria-expanded="false">
                  <div>
                    Book
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse" id="book">
                  <a href="#" class="list-group-item list-group-item-action">List Book</a>
                  <a href="#" class="list-group-item list-group-item-action">Create Book</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#documentary" aria-expanded="false">
                  <div>
                    Documentary & Tv Program
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse" id="documentary">
                  <a href="#" class="list-group-item list-group-item-action">List Documentary & Tv Program</a>
                  <a href="#" class="list-group-item list-group-item-action">Create Documentary & Tv Program</a>
                </div>
              </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Other Access</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              Setting Account
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('content')

    </main>
  </div>
  </div>
</body>
</html>
