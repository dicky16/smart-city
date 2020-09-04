@extends('user/layout/master')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('user/styles/cuaca.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/styles/about.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/styles/about_responsive.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/styles/googlemaps.css') }}">
@endsection
@section('content')
<!-- <div class="milestones"> -->
  <div class="container">
    <div class="row mb-3 mt-3">
      <div class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('user/images/mountain.svg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Jatim Park 1</h5>
            <p class="card-text">Jatim Park 1 adalah sebuah theme park dengan berbagai wahana permainan yang seru dan asyik banget, sobat tiket. Jatim Park 1 adalah theme park yang memadukan konsep edukasi serta hiburan.</p>
          </div>
        </div>
      </div>

      <!-- Milestone -->
      <div class="col-3">
        <div class="milestone text-center">
          <div class="milestone_icon"><img src="{{ asset('user/images/mountain.svg') }}" alt=""></div>
          <div class="milestone_counter" data-end-value="110">0</div>
          <div class="milestone_text">Jumlah Parkir Tersedia</div>
        </div>
      </div>

      <!-- Milestone -->
      <div class="col-3">
        <div class="milestone text-center">
          <div class="milestone_icon"><img src="{{ asset('user/images/mountain.svg') }}" alt=""></div>
          <div class="milestone_counter" data-end-value="110">0</div>
          <div class="milestone_text">Total Pengunjung Hari Ini</div>
        </div>
      </div>
      <div class="col-3">
        <div class="card-cuaca">
                <h2 class="nama-wisata">Jatim Park 1</h2>
                <h3 class="header-cuaca">Cloudy<span>Wind 10km/h <span class="dot">•</span> Precip 0%</span></h3>
                <h1 class="suhu"></h1>
                <img class="sky" src="http://openweathermap.org/img/w/10d.png">
                <table class="table-cuaca">
                    <tr>
                        <td>TUE</td>
                        <td>WED</td>
                        <td>THU</td>
                        <td>FRI</td>
                        <td>SAT</td>
                    </tr>
                    <tr>
                        <td>30°</td>
                        <td>34°</td>
                        <td>36°</td>
                        <td>34°</td>
                        <td>37°</td>
                    </tr>
                    <tr>
                        <td>17°</td>
                        <td>22°</td>
                        <td>19°</td>
                        <td>23°</td>
                        <td>19°</td>
                    </tr>
                </table>
          </div>
      </div>
    </div>

    <div class="row mb-2">
      <div class="col">
        <!--Google map-->
        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
          <iframe src="https://maps.google.com/maps?q=Jatim Park I, Jl. Dewi Sartika Atas, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
            style="border:0" allowfullscreen></iframe>
        </div>

        <!--Google Maps-->
      </div>
    </div>
  </div>
<!-- </div> -->


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
<script src="{{ asset('user/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script> -->
<script src="{{ asset('user/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('user/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('user/js/about.js') }}"></script>
<!-- ajax -->
<script src="{{ asset('user/js/detail.js') }}"></script>
@endsection
