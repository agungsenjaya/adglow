<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DASHBOARD | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/blue/pace-theme-minimal.min.css" integrity="sha512-4chYZ6A4vvq/i1Aihe1dEkNNLEjy0zuZqTL65CncfJoKxxMPDwrEpD9jB9kJY+Fa35sA8YbAowsdFGHNf5re+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('vendor/snackbar/snackbar.min.css') }}">
    @yield('css')
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 py-1 px-3 fs-6 text-center" href="{{ route('home') }}">
    <img src="{{ asset('img/logo.png') }}" alt="" width="100" class="img-white">
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav me-2 d-none d-md-block">
    <div class="nav-item text-nowrap">
      <a class="px-5 btn btn-light rounded-pill" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi-power me-3"></i>Sign out
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column nav-admin">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="bi-hdd-stack me-3"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#genre" aria-expanded="false">
                  <div>
                    <i class="bi-filter me-3"></i>
                    Genre
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse nav-admin-sub list-group-flush" id="genre">
                  <a href="{{ route('admin.genre') }}" class="list-group-item list-group-item-action">List Genre</a>
                  <a href="{{ route('admin.genre_create') }}" class="list-group-item list-group-item-action">Create Genre</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#movies" aria-expanded="false">
                  <div>
                    <i class="bi-film me-3"></i>
                    Movies
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse nav-admin-sub list-group-flush" id="movies">
                  <a href="{{ route('admin.movies') }}" class="list-group-item list-group-item-action">List Movies</a>
                  <a href="{{ route('admin.movies_create') }}" class="list-group-item list-group-item-action">Create Movies</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#miniseries" aria-expanded="false">
                  <div>
                    <i class="bi-grid me-3"></i>
                    Miniseries
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse nav-admin-sub list-group-flush" id="miniseries">
                  <a href="{{ route('admin.miniseries') }}" class="list-group-item list-group-item-action">List Miniseries</a>
                  <a href="{{ route('admin.miniseries_create') }}" class="list-group-item list-group-item-action">Create Miniseries</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#tvcommercials" aria-expanded="false">
                  <div>
                    <i class="bi-pip me-3"></i>
                    Tv Commercials
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse nav-admin-sub list-group-flush" id="tvcommercials">
                  <a href="{{ route('admin.commercial') }}" class="list-group-item list-group-item-action">List Tv Commercials</a>
                  <a href="{{ route('admin.commercial_create') }}" class="list-group-item list-group-item-action">Create Tv Commercials</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#music" aria-expanded="false">
                  <div>
                    <i class="bi-music-note-beamed me-3"></i>
                    Music
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse nav-admin-sub list-group-flush" id="music">
                  <a href="{{ route('admin.music') }}" class="list-group-item list-group-item-action">List Music</a>
                  <a href="{{ route('admin.music_create') }}" class="list-group-item list-group-item-action">Create Music</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#book" aria-expanded="false">
                  <div>
                    <i class="bi-journal me-3"></i>
                    Book
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse nav-admin-sub list-group-flush" id="book">
                  <a href="{{ route('admin.book') }}" class="list-group-item list-group-item-action">List Book</a>
                  <a href="{{ route('admin.book_create') }}" class="list-group-item list-group-item-action">Create Book</a>
                </div>
              </li>
          <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#documentary" aria-expanded="false">
                  <div>
                    <i class="bi-tv me-3"></i>
                    Doc & Tv Program
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse nav-admin-sub list-group-flush" id="documentary">
                  <a href="{{ route('admin.documentary') }}" class="list-group-item list-group-item-action">List Doc & Tv Program</a>
                  <a href="{{ route('admin.documentary_create') }}" class="list-group-item list-group-item-action">Create Doc & Tv Program</a>
                </div>
              </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white opacity-50 text-uppercase">
          <span>Other Access</span>
        </h6>
        <ul class="nav flex-column mb-2 nav-admin">
        <li class="nav-item">
                <a class="nav-link justify-content-between d-flex" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#news" aria-expanded="false">
                  <div>
                    <i class="bi-newspaper me-3"></i>
                    News
                  </div>
                  <div>
                    <span class="bi-chevron-down"></span>
                  </div>
                </a>
                <div class="list-group collapse nav-admin-sub list-group-flush" id="news">
                  <a href="{{ route('admin.news') }}" class="list-group-item list-group-item-action">List News</a>
                  <a href="{{ route('admin.news_create') }}" class="list-group-item list-group-item-action">Create News</a>
                </div>
              </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.account') }}">
            <i class="bi-gear me-3"></i>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- <script src="{{ asset('js/app.js') }}"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js" integrity="sha512-2cbsQGdowNDPcKuoBd2bCcsJky87Mv0LEtD/nunJUgk6MOYTgVMGihS/xCEghNf04DPhNiJ4DZw5BxDd1uyOdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="{{ asset('vendor/snackbar/snackbar.min.js') }}"></script>
  @yield('js')
  <script>
    @if(Session::has('success'))
      Snackbar.show({
        text: 'Session Success',
        backgroundColor: '#167841',
        showAction: true,
        actionTextColor: '#fff',
        pos: 'bottom-center'
      });
      @elseif(Session::has('failed'))
      Snackbar.show({
        text: 'Session Failed',
        backgroundColor: '#ba2d0b',
        showAction: true,
        actionTextColor: '#fff',
        pos: 'bottom-center'
      });
      @endif
  </script>
</body>
</html>
