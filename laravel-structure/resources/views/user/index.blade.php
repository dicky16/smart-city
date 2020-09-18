@extends('user/layout/master')
@section('content')
<div class="intro">
	<div class="intro_background" style="background-image:url(images/intro.png)"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="intro_container">
					<div class="row">

						<!-- Intro Item -->
						<div class="col-lg-4 intro_col">
							<div class="intro_item d-flex flex-row align-items-end justify-content-start">
								<div class="intro_icon"><img src="{{ asset('user/images/beach.svg') }}" alt=""></div>
								<div class="intro_content">
									<div class="intro_title">Top Destinations</div>
									<div class="intro_subtitle"><p>Nulla pretium tincidunt felis, nec.</p></div>
								</div>
							</div>
						</div>

						<!-- Intro Item -->
						<div class="col-lg-4 intro_col">
							<div class="intro_item d-flex flex-row align-items-end justify-content-start">
								<div class="intro_icon"><img src="{{ asset('user/images/wallet.svg') }}" alt=""></div>
								<div class="intro_content">
									<div class="intro_title">The Best Prices</div>
									<div class="intro_subtitle"><p>Sollicitudin mauris lobortis in.</p></div>
								</div>
							</div>
						</div>

						<!-- Intro Item -->
						<div class="col-lg-4 intro_col">
							<div class="intro_item d-flex flex-row align-items-end justify-content-start">
								<div class="intro_icon"><img src="{{ asset('user/images/suitcase.svg') }}" alt=""></div>
								<div class="intro_content">
									<div class="intro_title">Amazing Services</div>
									<div class="intro_subtitle"><p>Nulla pretium tincidunt felis, nec.</p></div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Destinations -->

<div class="destinations" id="destinations">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_subtitle">simply amazing places</div>
				<div class="section_title"><h2>Popular Destinations</h2></div>
			</div>
		</div>
		<div class="row destinations_row">
			<div class="col">
				<div class="destinations_container item_grid">

					<!-- Destination -->
					@foreach($wisata as $w)
					<div class="destination item">
						<div class="destination_image">
							<img src="{{ url($w->gambar) }}" alt="">
							<div class="spec_offer text-center"><a href="#">Special Offer</a></div>
						</div>
						<div class="destination_content">
							<div class="destination_title"><a href="{{ url('wisata/detail/') }}/{{ $w->id }}">{{ $w->nama}}</a></div>
							<div class="destination_subtitle" id="deskripsi">
							</div>
						</div>
					</div>
					<!-- <div class="card" style="width: 18rem;">
					  <img class="card-img-top" src="{{ url($w->gambar) }}" alt="Card image cap">
						<h5 class="card-title">{{ $w->nama }}</h5>
					  <div class="card-body">
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div> -->
					@endforeach


				</div>
				{{ $wisata->links() }}
			</div>
		</div>
	</div>
</div>
<br>

<!-- Testimonials -->



<!-- News -->

<div class="news" id="news">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="news_container" id="akomodasi">
					<h4>Akomodasi</h4>
					<br>
				</div>
			</div>

			<!-- side ke dua artikel -->
			<div class="col">
				<div class="news_container" id="artikel">
					<h4>Artikel</h4>
					<br>
				</div>
			</div>

		</div>
		<br><br><br>
		<div class="row">
			<div class="col-xl-8">
				<div class="news_container" id="kuliner">
					<h4>Kuliner</h4>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script src="{{ asset('user/js/home.js') }}" charset="utf-8"></script>
@endsection
