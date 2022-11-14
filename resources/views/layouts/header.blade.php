<header class="">
<nav class="navbar navbar-expand-lg bg-black navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('img/logo.png') }}" alt="" width="120">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-top">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('movies') }}">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Miniseries</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tv Commercials</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Music</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Documentary & Tv Program</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav-top d-none">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi-facebook me-1 h5"></i>
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi-instagram me-1 h5"></i>
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi-twitter me-1 h5"></i>
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi-youtube me-1 h5"></i>
        </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>