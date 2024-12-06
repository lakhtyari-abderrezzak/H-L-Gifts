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
							<h1>Contact Us</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>Contact Information</h3>
						<ul>
							{{-- <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li> --}}
							<li class="phone"><a href="tel://1234567920">+353873902819</a></li>
							<li class="email"><a href="mailto:helenKav.22@gmail.com">helenKav.22@gmail.com</a></li>
							{{-- <li class="url"><a href="http://gettemplates.co">gettemplates.co</a></li> --}}
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3>Get In Touch</h3>
					@if (session('success'))
						@session('success')
							<p style="color:green">{{$value}}</p>
						@endsession
					@endif
					<form action="{{route('contact.sendEnquiry')}}" method="POST">
						@csrf
						<div class="row form-group">
							<div class="col-md-6">
								<!-- <label for="fname">First Name</label> -->
								<input type="text" name="firstname" id="fname" class="form-control" placeholder="Your firstname">
							</div>
							<div class="col-md-6">
								<!-- <label for="lname">Last Name</label> -->
								<input type="text" name="lastname" id="lname" class="form-control" placeholder="Your lastname">
							</div>
						</div>
						@error('firstname')
							<p style="color:red">{{$message}}</p>
						@enderror
						@error('lastname')
							<p style="color:red">{{$message}}</p>
						@enderror

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="text" name="email" id="email" class="form-control" placeholder="Your email address">
							</div>
							@error('email')
								<p style="color:red">{{$message}}</p>
							@enderror
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input type="text" name="subject" id="subject" class="form-control" placeholder="Your subject of this message">
							</div>
							@error('subject')
								<p style="color:red">{{$message}}</p>
							@enderror
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
								<textarea name="contentMessage" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
							</div>
							@error('contentMessage')
								<p style="color:red">{{$message}}</p>
							@enderror
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>

    <x-arrow />
@endsection