@extends('layouts.user-layout')
@section('title', 'Home')
@section('banner')
<section id="slider" class="slider-element dark justify-content-start">

	<!-- Hero Text
	============================================= -->
	<div class="container z-1">
		<div class="row align-items-start justify-content-center justify-content-xl-start py-6">
			<div class="col-xl-6 col-lg-9 col-md-10 mt-xl-4 text-center text-xl-start">
				<p class="op-07 text-white mb-3 text-uppercase ls2 text-smaller">Quality is everyone's Responsibilty</p>
				<h1 class="display-4 mb-5 text-white fw-medium">Find furniture that speaks to your <span class="svg-underline nocolor">style</span></h1>
				<a href="{{url('/shop')}}" class="button button-large button-white button-light h-op-09 color m-0 fw-normal color px-4"><i style="position: relative; top: -2px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--themecolor)" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><rect x="32" y="48" width="192" height="160" rx="8" opacity="0.2"></rect><rect x="32" y="48" width="192" height="160" rx="8" stroke-width="16" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" fill="none"></rect><path d="M168,88a40,40,0,0,1-80,0" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path></svg></i> Shop Now</a>
			</div>
		</div>
	</div>

	<!-- Hero line in Responsive
	============================================= -->
	<div class="line d-block d-xl-none my-0"></div>

	<!-- Hero Image
	============================================= -->
	<div class="hero-image">
		<img src="demos/furniture/images/hero.png" alt="">
	</div>

</section>
@endsection('banner')

@section('content')
<section id="content">
	<div class="content-wrap py-0">

		<!-- 1. Section Why Choose Us
		============================================= -->
		<div class="section bg-color-light mt-0 pb-0">
			<div class="container text-center mw-md topmargin bottommargin">

				<h2 class="display-4 fw-normal">Why <span data-animate="svg-underline-animated" class="svg-underline nocolor"><span>Choose</span></span> Us?</h2>

				<div class="clear"></div>

				<!-- Features Area -->
				<div class="row col-mb-50 mb-0 mt-5 justify-content-center">
					<div class="col-sm-6 col-lg-4">
						<div class="feature-box fbox-center fbox-dark fbox-plain">
							<div class="fbox-icon">
								<icon class="fas fa-solid fa-box-open" style="height:60px; width:60px;"></icon>
							</div>
							<div class="fbox-content">
								<h2 class="nott fw-medium h4 mb-4">Swift Delivery</h2>
								<p class="">Luna-ai ensures your furniture arrives promptly and in perfect condition.</p>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-4">
						<div class="feature-box fbox-center fbox-dark fbox-plain">
							<div class="fbox-icon">
								<icon class="fas fa-solid fa-camera" style="height:52px; width:52px;"></icon>
							</div>
							<div class="fbox-content">
								<h2 class="nott fw-medium h4 mb-4">AR lens view</h2>
								<p class="">Immerse yourself in a virtual showroom with Luna-ai's AR lens view.</p>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-4">
						<div class="feature-box fbox-center fbox-dark fbox-plain">
							<div class="fbox-icon">
								<icon class="fas fa-solid fa-smile" style="height:52px; width:52px;"></icon>
							</div>
							<div class="fbox-content">
								<h2 class="nott fw-medium h4 mb-4">Customer Service</h2>
								<p class="">At Luna-ai, we prioritize exceptional customer service from start to finish.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- Section End -->

		<!-- 3. Section new Arrivals
		============================================= -->
		<div class="container-fluid pb-5">
			<div class="container">

				<!-- Shop
				============================================= -->
				<div id="shop" class="shop row gutter-30 col-mb-30 mt-3">

					<!-- Title -->
					<div class="col-xl-4 col-lg-6">
						<h3 class="mb-4 fw-normal h1">Quality <span data-animate="svg-underline-animated" class="svg-underline nocolor"><span>Furnitures</span></span></h3>
						<p class="op-07 mb-4" class="d-flex justify-content">Experience the embodiment of quality and craftsmanship with Luna-ai's exquisite <br> furniture pieces.</p>
						<a href="{{url('shop')}}" class="button button-border py-1 nott ls0 fw-normal button-dark border-width-1 border-color h-bg-color">Shop Now</a>
					</div>

					@foreach ($product as $products)
					<div class="product col-lg-4 col-md-4 col-sm-6 col-12">
						<div class="grid-inner">
							<div class="product-image">
								<a href="{{url('product', $products->id)}}"><img src="product/{{$products->image}}" alt="{{$products->image}}"></a>
								<div class="bg-overlay">
									<div class="bg-overlay-content align-items-end justify-content-end" data-hover-animate="fadeIn" data-hover-speed="400">
										<a href="{{url('product', $products->id)}}" class="btn btn-light me-2"><i class="icon-line-more-vertical"></i></a>
									</div>
								</div>
							</div>
							<div class="product-desc">
								<div class="row">
								<div class="col-6">
									<div class="product-title mb-0">
										<h4 class="mb-0"><a class="fw-medium" href="{{url('product', $products->id)}}">{{$products->name}}</a></h4>
									</div>
									<h5 class="product-price fw-normal">$ {{$products->price}}</h5>
								</div>
								<div class="col-6 d-flex mt-1 atc" style="justify-content:end">
									<form action="{{url('add_cart', $products->id)}}" method="post" class="m-0">
										@csrf
										<button type="submit" name="quantity" value="1" class="add-to-cart button button-medium fw-medium color button-light px-lg-4 add-to-cart m-0" style="border-radius:10px;"><i class="fa-sharp fa-solid fa-cart-shopping"></i></button>	
										
									</form>
									<button class="ar-button" style="margin: 4px 10px;" onclick="window.app.showChair(1);"><i class="fas fa-camera"></i></button>						
								</div>
								</div>

							</div>
						</div>
					</div>
					@endforeach

				</div><!-- #shop end -->

			</div>
		</div><!-- Section End -->

		<!-- 5. Section Fetured Boxes
		============================================= -->
		<div class="section custom-bg mt-lg-0 mb-0 py-6" style="--custom-bg: #fdf3e7;">
			<div class="container py-lg-4">
				<div class="row col-mb-50">

					<!-- feature-box 1 -->
					<div class="col-md-4">
						<div class="feature-box fbox-center fbox-dark fbox-plain">
							<div class="fbox-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="var(--themecolor)" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M54.46089,201.53911c-9.204-9.204-3.09935-28.52745-7.78412-39.85C41.82037,149.95168,24,140.50492,24,127.99963,24,115.4945,41.82047,106.048,46.67683,94.31079c4.68477-11.32253-1.41993-30.6459,7.78406-39.8499s28.52746-3.09935,39.85-7.78412C106.04832,41.82037,115.49508,24,128.00037,24c12.50513,0,21.95163,17.82047,33.68884,22.67683,11.32253,4.68477,30.6459-1.41993,39.8499,7.78406s3.09935,28.52746,7.78412,39.85C214.17963,106.04832,232,115.49508,232,128.00037c0,12.50513-17.82047,21.95163-22.67683,33.68884-4.68477,11.32253,1.41993,30.6459-7.78406,39.8499s-28.52745,3.09935-39.85,7.78412C149.95168,214.17963,140.50492,232,127.99963,232c-12.50513,0-21.95163-17.82047-33.68884-22.67683C82.98826,204.6384,63.66489,210.7431,54.46089,201.53911Z" opacity="0.2"></path><path d="M54.46089,201.53911c-9.204-9.204-3.09935-28.52745-7.78412-39.85C41.82037,149.95168,24,140.50492,24,127.99963,24,115.4945,41.82047,106.048,46.67683,94.31079c4.68477-11.32253-1.41993-30.6459,7.78406-39.8499s28.52746-3.09935,39.85-7.78412C106.04832,41.82037,115.49508,24,128.00037,24c12.50513,0,21.95163,17.82047,33.68884,22.67683,11.32253,4.68477,30.6459-1.41993,39.8499,7.78406s3.09935,28.52746,7.78412,39.85C214.17963,106.04832,232,115.49508,232,128.00037c0,12.50513-17.82047,21.95163-22.67683,33.68884-4.68477,11.32253,1.41993,30.6459-7.78406,39.8499s-28.52745,3.09935-39.85,7.78412C149.95168,214.17963,140.50492,232,127.99963,232c-12.50513,0-21.95163-17.82047-33.68884-22.67683C82.98826,204.6384,63.66489,210.7431,54.46089,201.53911Z" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></path><polyline points="172 104 113.333 160 84 132" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></polyline></svg>
							</div>
							<div class="fbox-content">
								<h2 class="nott fw-medium h4 mb-4">Original & Excellent Quality</h2>
								<p class="op-06">Discover the essence of originality and excellence with Luna-ai's impeccably crafted furniture.</p>
							</div>
						</div>
					</div>

					<!-- feature-box 2 -->
					<div class="col-md-4">
						<div class="feature-box fbox-center fbox-dark fbox-plain">
							<div class="fbox-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="var(--themecolor)" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M176,144H16v40a8,8,0,0,0,8,8H44a24,24,0,0,1,48,0h72a23.99048,23.99048,0,0,1,11.99813-20.78815Z" opacity="0.2"></path><path d="M212,192a24.00631,24.00631,0,0,0-36.00187-20.78815L176,120h64v64a8,8,0,0,1-8,8H212" opacity="0.2"></path><path d="M240,120H176V80h42.58374a8,8,0,0,1,7.42781,5.02887Z" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></path><line x1="16" y1="144" x2="176" y2="144" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></line><circle cx="188" cy="192" r="24" fill="none" stroke="var(--themecolor)" stroke-miterlimit="10" stroke-width="8"></circle><circle cx="68" cy="192" r="24" fill="none" stroke="var(--themecolor)" stroke-miterlimit="10" stroke-width="8"></circle><line x1="164" y1="192" x2="92" y2="192" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></line><path d="M44,192H24a8,8,0,0,1-8-8V72a8,8,0,0,1,8-8H176V171.21508" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></path><path d="M176,171.21508V120h64v64a8,8,0,0,1-8,8H212" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></path></svg>
							</div>
							<div class="fbox-content">
								<h2 class="nott fw-medium h4 mb-4">Fast Shipping at Low Price</h2>
								<p class="op-06">Experience the convenience of free and fast shipping with Luna-ai, ensuring your furniture arrives promptly and hassle-free.</p>
							</div>
						</div>
					</div>

					<!-- feature-box 3 -->
					<div class="col-md-4">
						<div class="feature-box fbox-center fbox-dark fbox-plain">
							<div class="fbox-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="var(--themecolor)" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M40,106.66667V48a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8v58.66667c0,84.01533-71.306,111.85016-85.5438,116.57058a7.54755,7.54755,0,0,1-4.9124,0C111.306,218.51683,40,190.682,40,106.66667Z" opacity="0.2"></path><path d="M40,106.66667V48a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8v58.66667c0,84.01533-71.306,111.85016-85.5438,116.57058a7.54755,7.54755,0,0,1-4.9124,0C111.306,218.51683,40,190.682,40,106.66667Z" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></path><polyline points="172 96 113.333 152 84 124" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></polyline></svg>
							</div>
							<div class="fbox-content">
								<h2 class="nott fw-medium h4 mb-4">Secure Payment</h2>
								<p class="op-06">Luna-ai offers secure payment options through Stripe, ensuring the confidentiality and protection of your personal information.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- Section End -->
		</div><!-- Section End -->

	</div>
</section><!-- #content end -->
@endsection('endcontent')
