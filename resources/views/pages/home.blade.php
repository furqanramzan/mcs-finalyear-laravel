@extends('app')
@section('home', 'active')

@section('content')
	<section class="header">
		<div class="header-data">
		  <div class="durod">
		    <h1 class="h1-bold mt-5">ADVOCATE AND CLIENT MANAGEMENT</span></h1>
		    <h3 style="width: 80%; margin: auto; margin-top: 50px;">Advocate and Client Management is a software for advocates which can help you maintain your daily case diary, client and fees details. Legal Diary has everything you need to maintain and access your legal case diary online in no time! It is easy to update, view today's, tomorrow's and date awaited cases, generate reports and fully customizable!</h3>
		    {{-- <a href="{{ route('enroll') }}" class="a-btn">ENROLL FOR A COURSE</a> --}}
		  </div>
		</div>
	</section>
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

  <!-- Start Vision Section -->
  <section class="vision">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="vision-heading">
            <h5 class="h5-yellow">INTRODUCTION</h5>
            <h2 class="h2-bold">OUR FEATURES</h2>
            <img src="img/text-center.png">
            <p class="p-white">All the premium features you would expect! No Account Expiry & Nothing</p>
          </div>
        </div>
          <div class="col-lg-4 col-md-6">
            <div class="vision-single">
              <i class="fa fa-gavel" style="font-size: 70px; color: #FFAD00;"></i>
              <h3>Unlimited Cases</h3>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="vision-single">
              <i class="fa fa-users" style="font-size: 70px; color: #FFAD00;"></i>
              <h3>Unlimited Clients</h3>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="vision-single">
              <i class="fa fa-money" style="font-size: 70px; color: #FFAD00;"></i>
              <h3>Unlimited Payments</h3>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="vision-single">
              <i class="fa fa-file" style="font-size: 70px; color: #FFAD00;"></i>
              <h3>Unlimited Documents</h3>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="vision-single">
              <i class="fa fa-gavel" style="font-size: 70px; color: #FFAD00;"></i>
              <h3>Unlimited Hearings</h3>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="vision-single">
              <i class="fa fa-calendar" style="font-size: 70px; color: #FFAD00;"></i>
              <h3>Unlimited Appointments</h3>
            </div>
          </div>
        {{-- @foreach($visions as $vision)
        @endforeach --}}
      </div>
    </div>
  </section>
  <!-- End Vision Section -->
@endsection