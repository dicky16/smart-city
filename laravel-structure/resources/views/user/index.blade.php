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

<div class="testimonials" id="testimonials">
	<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('user/images/testimonials.jpg') }}" data-speed="0.8"></div>
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_subtitle">simply amazing places</div>
				<div class="section_title"><h2>Testimonials</h2></div>
			</div>
		</div>
		<div class="row testimonials_row">
			<div class="col">

				<!-- Testimonials Slider -->
				<div class="testimonials_slider_container">
					<div class="owl-carousel owl-theme testimonials_slider">

						<!-- Slide -->
						<div class="owl-item text-center">
							<div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. lobortis dolor. Cras placerat lectus a posuere aliquet. Curabitur quis vehicula odio.</div>
							<div class="testimonial_author">
								<div class="testimonial_author_content d-flex flex-row align-items-end justify-content-start">
									<div>john turner,</div>
									<div>client</div>
								</div>
							</div>
						</div>

						<!-- Slide -->
						<div class="owl-item text-center">
							<div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. lobortis dolor. Cras placerat lectus a posuere aliquet. Curabitur quis vehicula odio.</div>
							<div class="testimonial_author">
								<div class="testimonial_author_content d-flex flex-row align-items-end justify-content-start">
									<div>john turner,</div>
									<div>client</div>
								</div>
							</div>
						</div>

						<!-- Slide -->
						<div class="owl-item text-center">
							<div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. lobortis dolor. Cras placerat lectus a posuere aliquet. Curabitur quis vehicula odio.</div>
							<div class="testimonial_author">
								<div class="testimonial_author_content d-flex flex-row align-items-end justify-content-start">
									<div>john turner,</div>
									<div>client</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="test_nav">
		<ul class="d-flex flex-column align-items-end justify-content-end">
			<li><a href="#">City Breaks Clients<span>01</span></a></li>
			<li><a href="#">Cruises Clients<span>02</span></a></li>
			<li><a href="#">All Inclusive Clients<span>03</span></a></li>
		</ul>
	</div>
</div>

<!-- News -->

<div class="news" id="news">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="news_container">
					<h4>Akomodasi</h4>
					<br>
					<!-- News Post -->
					<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">
						<div class="news_post_image"><img src="{{ asset('user/images/news_1.jpg') }}" alt=""></div>
						<div class="news_post_content">
							<div class="news_post_date d-flex flex-row align-items-end justify-content-start">
								<div>02</div>
								<div>june</div>
							</div>
							<div class="news_post_title"><a href="#">Best tips to travel light</a></div>
							<div class="news_post_category">
								<ul>
									<li><a href="#">lifestyle & travel</a></li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.Tempor massa et laoreet.</p>
							</div>
						</div>
					</div>

					<!-- News Post -->
					<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">
						<div class="news_post_image"><img src="{{ asset('user/images/news_2.jpg') }}" alt=""></div>
						<div class="news_post_content">
							<div class="news_post_date d-flex flex-row align-items-end justify-content-start">
								<div>01</div>
								<div>june</div>
							</div>
							<div class="news_post_title"><a href="#">Best tips to travel light</a></div>
							<div class="news_post_category">
								<ul>
									<li><a href="#">lifestyle & travel</a></li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>Tempor massa et laoreet malesuada. Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo.</p>
							</div>
						</div>
					</div>

					<!-- News Post -->
					<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">
						<div class="news_post_image"><img src="{{ asset('user/images/news_3.jpg') }}" alt=""></div>
						<div class="news_post_content">
							<div class="news_post_date d-flex flex-row align-items-end justify-content-start">
								<div>29</div>
								<div>may</div>
							</div>
							<div class="news_post_title"><a href="#">Best tips to travel light</a></div>
							<div class="news_post_category">
								<ul>
									<li><a href="#">lifestyle & travel</a></li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>Vivamus massa.Tempor massa et laoreet malesuada. Aliquam nulla nisl, accumsan sit amet mattis.</p>
							</div>
						</div>
					</div>

				</div>
			</div>

			<!-- side ke dua artikel -->
			<div class="col">
				<div class="news_container">
					<h4>Artikel</h4>
					<br>
					<!-- News Post -->
					<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">
						<div class="news_post_image"><img src="{{ asset('user/images/news_1.jpg') }}" alt=""></div>
						<div class="news_post_content">
							<div class="news_post_date d-flex flex-row align-items-end justify-content-start">
								<div>02</div>
								<div>june</div>
							</div>
							<div class="news_post_title"><a href="#">Best tips to travel light</a></div>
							<div class="news_post_category">
								<ul>
									<li><a href="#">lifestyle & travel</a></li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.Tempor massa et laoreet.</p>
							</div>
						</div>
					</div>

					<!-- News Post -->
					<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">
						<div class="news_post_image"><img src="{{ asset('user/images/news_2.jpg') }}" alt=""></div>
						<div class="news_post_content">
							<div class="news_post_date d-flex flex-row align-items-end justify-content-start">
								<div>01</div>
								<div>june</div>
							</div>
							<div class="news_post_title"><a href="#">Best tips to travel light</a></div>
							<div class="news_post_category">
								<ul>
									<li><a href="#">lifestyle & travel</a></li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>Tempor massa et laoreet malesuada. Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo.</p>
							</div>
						</div>
					</div>

					<!-- News Post -->
					<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">
						<div class="news_post_image"><img src="{{ asset('user/images/news_3.jpg') }}" alt=""></div>
						<div class="news_post_content">
							<div class="news_post_date d-flex flex-row align-items-end justify-content-start">
								<div>29</div>
								<div>may</div>
							</div>
							<div class="news_post_title"><a href="#">Best tips to travel light</a></div>
							<div class="news_post_category">
								<ul>
									<li><a href="#">lifestyle & travel</a></li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>Vivamus massa.Tempor massa et laoreet malesuada. Aliquam nulla nisl, accumsan sit amet mattis.</p>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
@endsection
