@extends('app')
@section('contact', 'active')

@section('content')
  <section class="header about">
    <div class="header-data about-data">
      <h1 class="h1-bold">CONTACT US</h1>
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li class="active">Contact Us</li>
      </ul>
    </div>
  </section>
  <!-- End Upper Section -->

  <!-- Start Data Section -->
  <section class="contact">
    <div class="container">
      <div class="row">        
        <div class="col-lg-4">
          <div class="contact-left">
              <h3>CONTACT INFORMATION:</h3>
              <div class="contact-icon">
                <img src="img/icon-map.png">
              </div>
              <div class="contact-data">
                <p>Dummy Address</p>
              </div>

              <div class="contact-icon">
                <img src="img/icon-phone.png" class="mt-1">
              </div>
              <div class="contact-data">
                <p>+987989798678 </p>
                <p>+080988890808 </p>
              </div>
              <div class="contact-icon">
                <img src="img/icon-mail.png">
              </div>
              <div class="contact-data">
                <p class="mt-1">support@gmail.com </p>
              </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="contact-form">
            <h3>Get Contact us</h3>            
            @if(session()->has('success'))
              <div class="icon-single">
                <div class="alert alert-success">
                  {{ session()->get('success') }} 
                </div>
              </div>
            @endif
            <form method="post" action="{{ route('postContact') }}" class="icon-single">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <input required="" type="text" name="name" placeholder="Name">
                </div>
                <div class="col-md-6">
                  <input required="" name="email" type="email" placeholder="Email">
                </div>
                <div class="col-md-6">
                  <input required="" type="text" name="phone" placeholder="Phone No">
                </div>
                <div class="col-md-6">
                  <input required="" type="text" name="subject" placeholder="Subject">
                </div>
                <div class="col-md-12">
                  <textarea name="message" required="" placeholder="Message"></textarea>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="a-btn">GET CONTACT</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection