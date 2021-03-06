@extends('user/layout/master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/contact.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/contact_responsive.css') }}">
@endsection
@section('content')
<div class="contact">
  <div class="container">
    <div class="row">

      <!-- Get in touch -->
      <div class="col-lg-6">
        <div class="contact_content">
          <div class="contact_title">Get in touch with us</div>
          <div class="contact_text">
            <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.Tempor massa et laoreet. Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.</p>
          </div>
          <div class="contact_list">
            <ul>
              <li>
                <div>address:</div>
                <div>1481 Creekside Lane Avila Beach, CA 931</div>
              </li>
              <li>
                <div>phone:</div>
                <div>+53 345 7953 32453</div>
              </li>
              <li>
                <div>email:</div>
                <div>yourmail@gmail.com</div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-6">
        <div class="contact_form_container">
          <form action="#" id="contact_form" class="contact_form">
            <div style="margin-bottom: 18px"><input type="text" class="contact_input contact_input_name inpt" placeholder="Your Name" required="required"><div class="input_border"></div></div>
            <div class="row">
              <div class="col-lg-6" style="margin-bottom: 18px">
                <div><input type="text" class="contact_input contact_input_email inpt" placeholder="Your E-mail" required="required"><div class="input_border"></div></div>
              </div>
              <div class="col-lg-6" style="margin-bottom: 18px">
                <div><input type="text" class="contact_input contact_input_subject inpt" placeholder="Subject" required="required"><div class="input_border"></div></div>
              </div>
            </div>
            <div><textarea class="contact_textarea contact_input inpt" placeholder="Message" required="required"></textarea><div class="input_border" style="bottom:3px"></div></div>
            <button class="contact_button">send</button>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Google Map -->
      <div class="col">
          <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
            <iframe src="https://maps.google.com/maps?q=malang&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
              style="border:0" allowfullscreen></iframe>
          </div>
      </div>
    </div>

  </div>
</div>


@endsection
@section('js')
<script src="{{ asset('user/js/contact.js') }}"></script>
@endsection
