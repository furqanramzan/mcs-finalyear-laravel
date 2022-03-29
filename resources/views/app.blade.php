<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ADVOCATE AND CLIENT MANAGEMENT')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @stack('header')
</head>
<body>
  <!-- Start Upper Section -->
  <div class="header-up">
    <div class="container">
      <div class="header-menu">
        <div class="logo">
          <a href="{{ route('home') }}" style="color: #FFAD00; font-size: 20px; margin-top: 10px;">
            ADVOCATE AND CLIENT MANAGEMENT
          </a>
        </div>
        <div class="contacts">
          <div class="contacts-right">
            <a href="mailto:{{ config()->get('settings.official_email') }} "><span class="fa fa-envelope"></span> {{ config()->get('settings.official_email') }} </a>
            <a href="tel:{{ config()->get('settings.official_phone') }} "><span class="fa fa-phone"></span> {{ config()->get('settings.official_phone') }} </a>
          </div>
        </div>
      </div>
      <div class="navbar navbar-expand-lg navbar-dark">
        <div class="mobile-menu-btn">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link @yield('home')">HOME
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('about') }}" class="nav-link @yield('about')">ABOUT US</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('contact') }}" class="nav-link @yield('contact')">CONTACT US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://127.0.0.1:3000/auth/login">LOGIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://127.0.0.1:3000/auth/register">REGISTER</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Upper Section -->

  @yield('content')

  <!-- Start Footer Section -->
  <section class="footer">
    <div class="footer-upper">
      <div class="container">
        <div class="footer-up">
          <div class="row">
            <div class="col-lg-4">
              <div class="footer-1">
                <a href="{{ route('home') }}" style="color: #FFAD00; font-size: 20px; margin-top: 10px;">
                  ADVOCATE AND CLIENT MANAGEMENT
                </a>
                <p class="p-footer">Lorem ipsum dolor sit amet, consectetur adicing elit, sed do eiusmo sdff lsfjsdf sfdl tempor incididunt ut labore et dolore.</p>
                <ul>
                  <li>
                    <i class="fa fa-map-marker"></i>
                    <p class="p-footer">Dummy Address</p>
                  </li>
                  <li>
                    <i class="fa fa-envelope"></i>
                    <p class="p-footer">support@gmail.com</p>
                  </li>
                  <li>
                    <i class="fa fa-phone"></i>
                    <p class="p-footer">+97878686</p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="footer-2">
                <h2 class="h2-footer">USEFUL LINKS</h2>
                <ul>
                  <li>
                    <a href="{{ route('home') }}">HOME</a>
                  </li>
                  <li>
                    <a href="{{ route('about') }}">ABOUT US</a>
                  </li>
                  <li>
                    <a href="{{ route('contact') }}">CONTACT US</a>
                  </li>
                  <li>
                    <a href="http://127.0.0.1:3000/auth/login">LOGIN</a>
                  </li>
                  <li>
                    <a href="http://127.0.0.1:3000/auth/register">REGISTER</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="footer-3">
                <h2 class="h2-footer">ABOUT</h2>
                <p class="p-footer">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident .</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Footer Section -->

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
  <script type="text/javascript">
    $("img").lazyload({
      placeholder: 'img/download.gif'
    });
  </script>
  @stack('footer')
</body>
</html>