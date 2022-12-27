<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <style>
      .mydrop{
        margin-right: 100px;
      }

      .mynav{
        background-color: #38444d;
      }
      .mynav a {
        margin-right: 10px;
        color: white !important;
        border-bottom: 2px solid transparent;
      }

      .mynav a:hover {
          border-bottom: 2px solid #198754;
      }

      .active a {
          border-bottom: 2px solid #198754;
      }

      .mysearch-input
      {
          background: transparent;
          padding-left: 10px;
          border: 0;
          outline: none;
          font-size: 20px;
          color: #00000;
      }
      ul .mymenu
      {
        background-color: #38444d;
      }
      .mymenu a:hover
      {
        color : #38444d;
      }
      .mysearch
      {
        color: #198754;
        border-radius: 60px;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg mynav">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/product">Show Product</a>
          </li>
        </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->

                @guest
                <ul class="navbar-nav ms-auto mydrop">
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link bi bi-box-arrow-in-right" href="{{ route('login') }}">  Login</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item ">
                            <a class="nav-link bi-person-plus" href="{{ route('register') }}">   Register</a>
                        </li>
                    @endif
                </ul>
                @endguest
                @auth
                @if (Auth::user()->level == 'admin')
                <ul class="navbar-nav ms-auto mydrop">
                <li class="nav-item dropdown mr-4">
                    <a class="nav-link dropdown-toggle mr-4 bi bi-box-seam" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Item
                    </a>
                    <ul class="dropdown-menu mymenu" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link bi bi-bookmark" href="/item">  View Item</a></li>
                      <li><a class="nav-link bi bi-bookmark-plus" href="/additem">  Add Item</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown mr-4">
                    <a class="nav-link dropdown-toggle mr-4 bi bi-person" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Profile
                    </a>
                    <ul class="dropdown-menu mymenu" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link" href="#">{{ Auth::User()->name}}</a></li>
                      <li><a class="nav-link bi bi-person-gear" href="{{ url('profile') }}">  Edit Profile</a></li>
                      <li><a class="nav-link bi bi-person-lock" href="{{ route('password') }}">  Password</a></li>
                      <li><hr class="dropdown-divider bg-white"></li>
                      <li><a class="nav-link bi bi-box-arrow-right" href="{{ route('logout') }}">  Log out</a></li>
                    </ul>
                  </li>
                </ul>
                @endif
                @if (Auth::user()->level == 'member')
                <ul class="navbar-nav ms-auto mydrop">
                    <li class="nav-item">
                        <a class="nav-link bi bi-cart2" href="/checkout"> Cart</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link bi bi-clock-history" href="/history"> History</a>
                      </li>
                  <li class="nav-item dropdown mr-4">
                    <a class="nav-link dropdown-toggle mr-4 bi bi-person" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Profile
                    </a>
                    <ul class="dropdown-menu mymenu" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link" href="#">{{ Auth::User()->name}}</a></li>
                      <li><a class="nav-link bi bi-person-gear" href="{{ url('profile') }}">  Edit Profile</a></li>
                      <li><a class="nav-link bi bi-person-lock" href="{{ route('password') }}">  Password</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="nav-link bi bi-box-arrow-right" href="{{ route('logout') }}">  Log out</a></li>
                    </ul>
                  </li>
                </ul>
                @endif
                @endauth
            </ul>
      </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

