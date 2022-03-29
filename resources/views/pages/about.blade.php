@extends('app')
@section('about', 'active')

@section('content')
	<section class="header about">
    <div class="header-data about-data">
      <h1 class="h1-bold">ABOUT US</h1>
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li class="active">About</li>
      </ul>
    </div>
  </section>
  <!-- End Upper Section -->

  <!-- Start About Section -->
  <section class="home-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="home-about-data">
            <h5 class="h5-yellow">WELCOME TO ADVOCATE AND CLIENT MANAGEMENT</h5>
            <h2 class="h2-bold">ABOUT US</h2>
            <img src="img/home-about-bottom.png">
            <h6>In The Name Of Allah The Beneficent The Merciful</h6>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About Section -->
@endsection