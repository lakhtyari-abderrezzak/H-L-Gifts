@extends('layouts.master')

@section('content')
    <x-nav />
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Services</h1>
							<h2>Free html5 templates by <a href="https://themewagon.com/theme_tag/free/" target="_blank">Themewagon</a></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-credit-card"></i>
						</span>
						<h3>Credit Card</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
						<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-wallet"></i>
						</span>
						<h3>Save Money</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
						<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-paper-plane"></i>
						</span>
						<h3>Free Delivery</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
						<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-calendar"></i>
						</span>
						<h3>Lifetime Warranty</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
						<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-clapperboard"></i>
						</span>
						<h3>Branded Model</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
						<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-drive"></i>
						</span>
						<h3>Affordable</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
						<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Newsletter</h2>
					<p>Just stay tune for our latest Product. Now you can subscribe</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection