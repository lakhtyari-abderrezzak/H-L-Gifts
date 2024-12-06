@extends('layouts.master')

@section('content')
    <div class="fh5co-loader"></div>
    <x-nav></x-nav>
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url(images/categories/cat-bg.jpeg);">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">Illuminate Their World:</span>
                                    <h2>Elegant Candles for Every Moment</h2>
                                    <p>
                                        A candle is more than just a source of light—it’s an experience. Our hand-poured
                                        candles come in a variety of soothing scents and elegant designs, perfect for
                                        creating a warm, inviting atmosphere. Whether it’s for relaxation, a celebration, or
                                        a thoughtful gift, each candle is crafted to make moments feel more special. Choose
                                        from our luxurious collection and give the gift of light, warmth, and a delightful
                                        fragrance.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/categories/cat-bg-1.jpeg);">
                    <div class="container">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">Illuminate Their World:</span>
                                    <h2>Elegant Candles for Every Moment</h2>
                                    <p>
                                        A candle is more than just a source of light—it’s an experience. Our hand-poured
                                        candles come in a variety of soothing scents and elegant designs, perfect for
                                        creating a warm, inviting atmosphere. Whether it’s for relaxation, a celebration, or
                                        a thoughtful gift, each candle is crafted to make moments feel more special. Choose
                                        from our luxurious collection and give the gift of light, warmth, and a delightful
                                        fragrance.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/categories/cat-bg-2.jpeg);">
                    <div class="container">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">A Breath of Fresh Air:</span>
                                    <h2>Essential Oils & Diffusers for Mindful Living</h2>
                                    <p>
                                        Elevate any space with the calming power of essential oils and stylish diffusers.
                                        Our premium oils are crafted from the finest botanicals, offering soothing scents
                                        that promote relaxation, focus, and well-being. Paired with sleek, elegant
                                        diffusers, these natural blends transform any room into a peaceful sanctuary.
                                        Perfect for anyone who deserves a moment of tranquility, our oils and diffusers make
                                        a thoughtful gift for self-care, relaxation, or just to bring a little serenity into
                                        everyday life.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/categories/cat-bg-3.jpeg);">
                    <div class="container">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">Gifts of Comfort & Style:</span>
                                    <h2>Premium Rugs for Every Occasion</h2>
                                    <p>
                                        Looking for a thoughtful and unique gift? Our collection of beautifully crafted rugs
                                        adds warmth, color, and charm to any space. From cozy handwoven designs to elegant
                                        modern patterns, there's a perfect rug for every home. Whether it's for a
                                        housewarming, anniversary, or simply to show you care, a rug is a gift that brings
                                        lasting beauty and comfort. Explore our selection and give the gift of timeless
                                        style.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Discover Our Unique Collections</span>
                    <h2>Categories.</h2>
                    <p>Welcome to our Categories page! Explore our carefully curated selection of products designed to bring
                        comfort, style, and serenity into your life. From luxurious carpets that transform your space, to
                        soothing candles and incense that create the perfect ambiance, we have something for every mood and
                        occasion.</p>
                </div>
            </div>
            <div class="cards">
                @foreach ($categories as $category)
                    <div class="card">
                        <a href="{{ route('categories.cat_product', $category) }}" class="icon">
                            <img src="{{ asset('storage/' . $category->img_path) }}" alt="">
                        </a>
                        <div class="desc">
                            <h3><a href="{{ route('categories.cat_product', $category) }}">{{ $category->name }}</a></h3>
                            <span class="price">{{ $category->description }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $categories->links() }}
        </div>
    </div>
    <div id="fh5co-services" class="fh5co-bg-section">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">

                <h2>Services Designed to Delight</h2>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="fa-solid fa-gift"></i>
                        </span>
                        <h3>Gift Basket Services for Every Occasion</h3>
                        <p>Allow customers to create their own personalized gift baskets by selecting a range of your
                            products, such as candles, oils, bath bombs, and more. Customers can choose the theme or
                            specific products they want included, and you can offer optional upgrades like premium packaging
                            and personalized messages.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="fa-solid fa-list-check"></i>
                        </span>
                        <h3>Product Care & Maintenance Guides</h3>
                        <p> Provide tips and guides on how to properly care for and maintain the longevity of products like
                            candles, diffusers, and rugs. This could be part of your blog or included with the purchase.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="fa-solid fa-leaf"></i>
                        </span>
                        <h3>Sustainable & Eco-Friendly Product Options</h3>
                        <p>Highlight eco-friendly and sustainable products, such as soy candles, biodegradable bath bombs,
                            or organic oils. This could be a service that reflects your brand’s commitment to the
                            environment.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="fh5co-testimonial" class="fh5co-bg-section" style="background-color: #fefefe !important">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Testimony</span>
					<h2>Happy Clients</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
                            @foreach ($contacts as $contact)
                                <div class="item">
                                    <div class="testimony-slide active text-center">
                                        <figure>
                                            <img src="images/person1.jpg" alt="user">
                                        </figure>
                                        <span>{{$contact->firstname . " " . $contact->lastname}}, via <a href="#" class="twitter">Email</a></span>
                                        <blockquote>
                                            <p>&ldquo; {{$contact->contentMessage}} &rdquo;</p>
                                        </blockquote>
                                    </div>
                                </div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
