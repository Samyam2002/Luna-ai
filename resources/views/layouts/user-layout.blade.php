<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Zilla+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('assets/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Furniture Demo Specific Theme Stylesheet - #193532 -->
	<link rel="stylesheet" href="{{ asset('assets/css/colors.php?color=193532')}}" type="text/css" />

	<!-- Furniture Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('demos/furniture/furniture.css')}}" type="text/css" /> <!-- Furniture Custom Css -->
	<link rel="stylesheet" href="{{ asset('demos/furniture/css/fonts.css')}}" type="text/css" /> <!-- Furniture Custom Fonts -->
	<!-- / -->

	<!-- Document Title
	============================================= -->
	<title>@yield('title')</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar" class="text-center bg-color-light">
			<div class="container clearfix">
				<div class="d-md-flex justify-content-md-between align-items-md-center">
					<h4 class="mb-2 mb-md-0 h6 fw-normal" id="hide">Free Shipping on every order</h4>

					@if (Route::has('login'))
					@auth
					<h4 class="mb-0 h6 fw-normal d-flex justify-content-center">
						<a href="{{ route('profile.edit') }}" class="button button-border py-1 nott ls0 fw-normal button-dark border-width-1 border-color h-bg-color">{{Auth::user()->name }}</a>
						<!-- Authentication -->
						<form method="POST" action="{{ route('logout') }}" class="mb-0">
							@csrf

							<x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="button button-border py-1 nott ls0 fw-normal button-dark border-width-1 border-color h-bg-color" style="padding: 4px 22px !important">
								{{ __('Log Out') }}
							</x-dropdown-link>
						</form>
					</h4>
					@else
					<h4 class="mb-0 h6 fw-normal">
						<a href="{{ route('login') }}" class="button button-border py-1 nott ls0 fw-normal button-dark border-width-1 border-color h-bg-color">Login</a>
						<a href="{{ route('register') }}" class="button button-border py-1 nott ls0 fw-normal button-dark border-width-1 border-color h-bg-color">Register</a>
					</h4>
					@endauth
					@endif
				</div>
			</div>
		</div><!-- #top-bar end -->
		<!-- Header
		============================================= -->
		<header id="header" class="header-size-sm border-bottom-0">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row justify-content-lg-between">

						<!-- Logo
						============================================= -->
						<div id="logo" class="mx-auto col-auto flex-column order-2">
							<a href="{{url('/')}}" class="standard-logo"><img src="assets/logo.png" alt="Canvas Logo" style="padding:10px"></a>
							<a href="{{url('/')}}" class="retina-logo"><img src="assets/logo.png" alt="Canvas Logo" style="padding:10px"></a>
						</div><!-- #logo end -->

						<div class="header-misc col-auto col-lg-3 order-3 justify-content-lg-end ms-0 ms-sm-3 px-0">

							<!-- Top Search
							============================================= -->
							<div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger">
									<i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--themecolor)" viewBox="0 0 256 256">
											<rect width="256" height="256" fill="none"></rect>
											<circle cx="115.99512" cy="116" r="84" opacity="0.2"></circle>
											<circle cx="115.99512" cy="116" r="84" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
											<line x1="175.38868" y1="175.40039" x2="223.98926" y2="224.00098" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
										</svg></i>
									<i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--themecolor)" viewBox="0 0 256 256">
											<rect width="256" height="256" fill="none"></rect>
											<circle cx="128" cy="128" r="96" opacity="0.2"></circle>
											<circle cx="128" cy="128" r="96" fill="none" stroke="var(--themecolor)" stroke-miterlimit="10" stroke-width="16"></circle>
											<line x1="160" y1="96" x2="96" y2="160" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
											<line x1="160" y1="160" x2="96" y2="96" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
										</svg></i>
								</a>
							</div><!-- #top-search end -->

							<!-- Top Cart
							============================================= -->
							<div class="header-misc-icon">
								<a href="{{url('cart')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--themecolor)" viewBox="0 0 256 256">
										<rect width="256" height="256" fill="none"></rect>
										<path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48Z" opacity="0.2"></path>
										<path d="M184,184H69.81818L41.92162,30.56892A8,8,0,0,0,34.05066,24H16" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
										<circle cx="80" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
										<circle cx="184" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
										<path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
									</svg><span class="top-cart-number">2</span></a>
							</div><!-- #top-cart end -->

						</div>

						<!-- Mobile Menu Icon
						============================================= -->
						<div id="primary-menu-trigger">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
								<defs>
									<style>
										.a,
										.c {
											fill: none;
										}

										.b {
											fill: var(--themecolor);
											opacity: 0.2;
										}

										.c,
										.d {
											stroke: var(--themecolor);
										}

										.c {
											stroke-miterlimit: 10;
											stroke-width: 14px;
										}

										.d {
											stroke-linecap: round;
											stroke-linejoin: round;
											stroke-width: 13px;
										}
									</style>
								</defs>
								<rect class="a" width="24" height="24" />
								<circle class="b" cx="96" cy="96" r="96" transform="translate(32 32)" />
								<circle class="c" cx="96" cy="96" r="96" transform="translate(32 32)" />
								<line class="d" x2="85" transform="translate(86 127)" />
								<line class="d" x2="85" transform="translate(86 97)" />
								<line class="d" x2="85" transform="translate(86 159)" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--themecolor)" viewBox="0 0 256 256">
								<rect width="256" height="256" fill="none"></rect>
								<circle cx="128" cy="128" r="96" opacity="0.2"></circle>
								<circle cx="128" cy="128" r="96" fill="none" stroke="var(--themecolor)" stroke-miterlimit="10" stroke-width="16"></circle>
								<line x1="160" y1="96" x2="96" y2="160" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
								<line x1="160" y1="160" x2="96" y2="96" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
							</svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu with-arrows order-lg-1 order-last px-0">

							<ul class="menu-container">
								<li class="menu-item current">
									<a class="menu-link" href="{{url('/')}}">
										<div>Home</div>
									</a>
								</li>
								<li class="menu-item mega-menu mega-menu-full">
									<a href="/shop" class="menu-link">
										<div>Shop</div>
									</a>
									<!-- Menu DropDown
									============================================= -->
									<div class="mega-menu-content border-bottom-0">
										<div class="container">
											<div class="row">
												@foreach($category as $category)
												<ul class="sub-menu-container mega-menu-column col-lg-auto">
													<li class="menu-item"><a class="menu-link" href="{{url($category->name)}}">{{$category->name}}</a></li>
												</ul>
												@endforeach
												<!-- <ul class="sub-menu-container mega-menu-column col-lg-auto">
													<li class="menu-item">
														<a class="menu-link" href="/shop">
															<div>Lamps</div>
														</a>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-auto">
													<li class="menu-item">
														<a class="menu-link" href="/shop">
															<div>Vases</div>
														</a>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-auto">
													<li class="menu-item">
														<a class="menu-link" href="/shop">
															<div>Chairs</div>
														</a>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-auto">
													<li class="menu-item">
														<a class="menu-link" href="/shop">
															<div>Tables</div>
														</a>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-auto">
													<li class="menu-item">
														<a class="menu-link" href="/shop">
															<div>Sofas</div>
														</a>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-auto">
													<li class="menu-item">
														<a class="menu-link" href="/shop">
															<div>Cupboards</div>
														</a>
													</li>
												</ul> -->
											</div>
										</div>
									</div>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="/about">
										<div>About Us</div>
									</a>
								</li>
								<li class="menu-item"><a class="menu-link" href="/contact">
										<div>Contact</div>
									</a>
								</li>
								@if (Auth::check() && Auth::user()->is_admin)
								<li class="menu-item"><a class="menu-link" href="/dashboard">
										<div>Dashboard</div>
									</a>
								</li>
								@endif
							</ul>

						</nav><!-- #primary-menu end -->

						<!-- Top Search Form
						============================================= -->
						<form class="top-search-form" action="{{url('search')}}" method="get">
							@csrf
							<input type="text" name="search" class="form-control" placeholder="Type &amp; Hit Enter.." autocomplete="off" value="">
						</form>

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

		<!-- Hero Section
		============================================= -->
		@yield('banner')

		<!-- Content
		============================================= -->
		@yield('content')

		<!-- Footer
		============================================= -->
		<footer id="footer" class="border-0 bg-white">
			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap py-lg-6">
					<div class="row col-mb-30">

						<!-- Footer Col 1 -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="widget widget_links widget-li-noicon">

								<h4 class="ls0 nott">Social</h4>

								<ul class="list-unstyled iconlist ms-0">
									<li><a href="https://facebook.com/semicolonweb" target="_blank"><i class="icon-facebook"></i> Facebook</a></li>
									<li><a href="https://instagram.com/semicolonweb" target="_blank"><i class="icon-instagram"></i> Instagram</a></li>
									<li><a href="https://twitter.com/__semicolon" target="_blank"><i class="icon-twitter"></i> Twitter</a></li>
								</ul>

							</div>
						</div>

						<!-- Footer Col 2 -->
						<div class="col-lg-2 col-md-4 col-6">
							<div class="widget widget_links widget-li-noicon">

								<h4 class="ls0 nott">Support</h4>

								<ul class="list-unstyled iconlist ms-0">
									<li><a href="/index">Home</a></li>
									<li><a href="/about">Shop</a></li>
									<li><a href="/contact">Contact</a></li>
								</ul>

							</div>
						</div>

						<!-- Footer Col 4 -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="widget widget_links widget-li-noicon">

								<h4 class="ls0 nott">Get to Know us</h4>

								<ul class="list-unstyled iconlist ms-0">
									<li><a href="intro.html#section-niche">Niche Demos</a></li>
									<li><a href="intro.html#section-multipage">Home Pages</a></li>
									<li><a href="intro.html#section-onepage">One Pages</a></li>
								</ul>

							</div>
						</div>

						<!-- Footer Col 5 -->
						<div class="col-lg-4">
							<div class="widget subscribe-widget clearfix" data-loader="button">
								<h4>Subscribe Us</h4>
								<h5 class="font-body"><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
								<div class="widget-subscribe-form-result"></div>
								<form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
									<div class="input-group">
										<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email Address" style="border-color: #000">
										<button class="btn btn-dark bg-color px-3 input-group-text" style="border-color: #000" type="submit">Subscribe</button>
									</div>
								</form>
							</div>
						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights" class="py-3 bg-color-light">
				<div class="container">

					<div class="d-flex justify-content-center">
						<span>&copy; 2020 All Rights Reserved by Canvas Inc.</span>
					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="bg-color op-07 h-op-1">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" viewBox="0 0 256 256">
			<rect width="256" height="256" fill="none"></rect>
			<polygon points="48 208 128 128 208 208 48 208" opacity="0.2"></polygon>
			<polygon points="48 208 128 128 208 208 48 208" fill="none" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polygon>
			<polyline points="48 128 128 48 208 128" fill="none" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline>
		</svg>
	</div>

	<!-- JavaScripts
	============================================= -->
	<script src="{{ asset('assets/js/jquery.js')}}"></script>
	<script src="{{ asset('assets/js/plugins.min.js')}}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ asset('assets/js/functions.js')}}"></script>

	<!-- js to hide the alert notification after 5 seconds-->
	<script>
		setTimeout(() => {
			const box = document.getElementById('hide-box');

			// 👇️ removes element from DOM
			box.style.display = 'none';

			// 👇️ hides element (still takes up space on page)
			// box.style.visibility = 'hidden';
		}, 5000); // 👈️ time in milliseconds
	</script>

	<!-- font icons-->
	<script src="https://kit.fontawesome.com/a8916ae1c2.js" crossorigin="anonymous"></script>

</body>

</html>