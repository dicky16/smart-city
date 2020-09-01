@extends('user/layout/master')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('user/styles/about.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/styles/about_responsive.css') }}">
@endsection
@section('content')
<!-- About -->

<div class="about">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="section_subtitle">simply amazing places</div>
        <div class="section_title"><h2>A few words about us</h2></div>
      </div>
    </div>
    <div class="row about_row">
      <div class="col-lg-6">
        <div class="about_content">
          <div class="text_highlight">Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.Tempor massa et laoreet .Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
          <div class="about_text">
            <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.Tempor massa et laoreet .Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu laoreet ante, sollicitudin volutpat quam. Vestibulum posuere malesuada ultrices. In pulvinar rhoncus lacus at aliquet. Nunc vitae lacus varius, auctor nisi sit amet, consectetur mauris. Curabitur sodales semper est, vel faucibus urna laoreet vel. Ut justo diam, sodales non pulvinar at, vulputate quis neque. Etiam aliquam purus vel ultricies consequat.</p>
          </div>
          <div class="button about_button"><a href="#">read more</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about_image"><img src="{{ asset('user/images/about_1.jpg') }}" alt=""></div>
      </div>
    </div>
  </div>
</div>

<!-- Milestones -->

<div class="milestones">
  <div class="container">
    <div class="row">

      <!-- Milestone -->
      <div class="col-lg-3 milestone_col">
        <div class="milestone text-center">
          <div class="milestone_icon"><img src="{{ asset('user/images/mountain.svg') }}" alt=""></div>
          <div class="milestone_counter" data-end-value="17">0</div>
          <div class="milestone_text">Online Courses</div>
        </div>
      </div>

      <!-- Milestone -->
      <div class="col-lg-3 milestone_col">
        <div class="milestone text-center">
          <div class="milestone_icon"><img src="{{ asset('user/images/island.svg') }}" alt=""></div>
          <div class="milestone_counter" data-end-value="213">0</div>
          <div class="milestone_text">Students</div>
        </div>
      </div>

      <!-- Milestone -->
      <div class="col-lg-3 milestone_col">
        <div class="milestone text-center">
          <div class="milestone_icon"><img src="{{ asset('user/images/camera.svg') }}" alt=""></div>
          <div class="milestone_counter" data-end-value="11923">0</div>
          <div class="milestone_text">Teachers</div>
        </div>
      </div>

      <!-- Milestone -->
      <div class="col-lg-3 milestone_col">
        <div class="milestone text-center">
          <div class="milestone_icon"><img src="{{ asset('user/images/boat.svg') }}" alt=""></div>
          <div class="milestone_counter" data-end-value="15">0</div>
          <div class="milestone_text">Countries</div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Why Choose Us -->

<div class="why">
  <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('user/images/why.jpg') }}" data-speed="0.8"></div>
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="section_subtitle">simply amazing places</div>
        <div class="section_title"><h2>Why choose us?</h2></div>
      </div>
    </div>
    <div class="row why_row">

      <!-- Why item -->
      <div class="col-lg-4 why_col">
        <div class="why_item">
          <div class="why_image">
            <img src="{{ asset('user/images/why_1.jpg') }}" alt="">
            <div class="why_icon d-flex flex-column align-items-center justify-content-center">
              <img src="images/why_1.svg" alt="">
            </div>
          </div>
          <div class="why_content text-center">
            <div class="why_title">Fast Services</div>
            <div class="why_text">
              <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Why item -->
      <div class="col-lg-4 why_col">
        <div class="why_item">
          <div class="why_image">
            <img src="{{ asset('user/images/why_2.jpg') }}" alt="">
            <div class="why_icon d-flex flex-column align-items-center justify-content-center">
              <img src="images/why_2.svg" alt="">
            </div>
          </div>
          <div class="why_content text-center">
            <div class="why_title">Great Team</div>
            <div class="why_text">
              <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Why item -->
      <div class="col-lg-4 why_col">
        <div class="why_item">
          <div class="why_image">
            <img src="{{ asset('user/images/why_3.jpg') }}" alt="">
            <div class="why_icon d-flex flex-column align-items-center justify-content-center">
              <img src="images/why_3.svg" alt="">
            </div>
          </div>
          <div class="why_content text-center">
            <div class="why_title">Best Deals</div>
            <div class="why_text">
              <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Team -->

<div class="team">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="section_subtitle">simply amazing places</div>
        <div class="section_title"><h2>Meet the Team</h2></div>
      </div>
    </div>
    <div class="row team_row">

      <!-- Team Item -->
      <div class="col-xl-3 col-md-6 team_col">
        <div class="team_item d-flex flex-column align-items-center justify-content-start text-center">
          <div class="team_image"><img src="{{ asset('user/images/team_1.jpg') }}" alt=""></div>
          <div class="team_content">
            <div class="team_title"><a href="#">Margaret Smith</a></div>
            <div class="team_text">
              <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Team Item -->
      <div class="col-xl-3 col-md-6 team_col">
        <div class="team_item d-flex flex-column align-items-center justify-content-start text-center">
          <div class="team_image"><img src="{{ asset('user/images/team_2.jpg') }}" alt=""></div>
          <div class="team_content">
            <div class="team_title"><a href="#">James Williams</a></div>
            <div class="team_text">
              <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Team Item -->
      <div class="col-xl-3 col-md-6 team_col">
        <div class="team_item d-flex flex-column align-items-center justify-content-start text-center">
          <div class="team_image"><img src="{{ asset('user/images/team_3.jpg') }}" alt=""></div>
          <div class="team_content">
            <div class="team_title"><a href="#">Michael James</a></div>
            <div class="team_text">
              <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Team Item -->
      <div class="col-xl-3 col-md-6 team_col">
        <div class="team_item d-flex flex-column align-items-center justify-content-start text-center">
          <div class="team_image"><img src="{{ asset('user/images/team_4.jpg') }}" alt=""></div>
          <div class="team_content">
            <div class="team_title"><a href="#">Noah Smith</a></div>
            <div class="team_text">
              <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('user/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('user/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('user/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('user/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('user/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('user/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('user/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('user/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('user/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('user/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('user/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('user/js/about.js') }}"></script>
@endsection
