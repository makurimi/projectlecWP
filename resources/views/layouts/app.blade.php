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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto Slab">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <style>
       body{
        background-color: #161618;
    }

      .mydrop{
        margin-right: 100px;
      }

      .mynav{
        background-color: #ffffff;
      }
      .mynav a {
        margin-right: 10px;
        color: white !important;
        border-bottom: 2px solid transparent;
      }

      .mynav a:hover {
          border-bottom: 2px solid white;
      }

      .active a {
          border-bottom: 2px solid white;
      }

      .mysearch-input
      {
          background: transparent;
          padding-left: 10px;
          border: 0;
          outline: none;
          font-size: 20px;
          color: #000000;
      }
      ul .mymenu
      {
        background-color: #161618;
      }
      .mymenu a:hover
      {
        color : #161618;
      }
      .mysearch
      {
        color: #198754;
        border-radius: 60px;
      }
      .footer-dark {
  padding:50px 0;
  color:#f0f9ff;
  background-color:#161618;
}

.footer-dark h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-dark ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-dark ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.6;
}

.footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}

.footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}

.footer-dark .copyright {
  text-align:center;
  padding-top:24px;
  opacity:0.3;
  font-size:13px;
  margin-bottom:0;
}
.wrapper{
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    justify-content: space-between;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="wrapper">
  <nav class="navbar navbar-expand-lg shadow mynav" style="background-color: #161618;">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item {{ Request()->is('/') ? 'active' : '' }}">
            <a class="nav-link" aria-current="page" href="/"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEgTfq7a9qR6c5rpD23b6ysIzYmlVdsaP43cx9c0UPfToaKhsIrIBvp9LFLFHC_RCmbsKBtKKmqTtjBpI2JXsWxN6HBuRhVxyWZkbvtOZYDfkBP9KoWTmnfgbpJFRpYjYmcV27b8FGVyaJZtGjbkS3wTY9A1jhtmBfYiySL6gOfJZyJMnetkh7_ZEvZS" style="width:40px" alt=""></a>
          </li>
          <li class="nav-item {{ Request()->is('product') ? 'active' : '' }}">
            <a class="nav-link" href="/product">Show Product</a>
          </li>
        </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->

                @guest
                <ul class="navbar-nav ms-auto mydrop">
                    @if (Route::has('login'))
                        <li class="nav-item {{ Request()->is('login') ? 'active' : '' }}">
                            <a class="nav-link bi bi-box-arrow-in-right" href="{{ route('login') }}">  Login</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item {{ Request()->is('register') ? 'active' : '' }}">
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
                      <li><hr class="dropdown-divider"  ></li>
                      <li><a class="nav-link bi bi-box-arrow-right" href="{{ route('logout') }}">  Log out</a></li>
                    </ul>
                  </li>
                </ul>
                @endif
                @if (Auth::user()->level == 'member')
                <ul class="navbar-nav ms-auto mydrop">
                    <li class="nav-item {{ Request()->is('checkout') ? 'active' : '' }}">
                        <a class="nav-link bi bi-cart2" href="/checkout"> Cart</a>
                      </li>
                      <li class="nav-item {{ Request()->is('history') ? 'active' : '' }}">
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
<div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="https://www.instagram.com/novan_bhakti/"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Jajang Record Vinyl © 2023</p>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
