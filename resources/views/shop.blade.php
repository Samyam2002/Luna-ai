@extends('layouts.user-layout')
@section('title', 'Shop')
@section('content')
<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">

		<div class="container">

			<div class="row justify-content-between align-items-center">
				<div class="col-auto mb-4">
					<h3 class="fw-medium h1">All <span data-animate="svg-underline-animated" class="svg-underline nocolor"><span>Products</span></span></h3>
				</div>

				<div class="col-auto mb-4 d-flex">

					<div class="dropdown sortbuttons">
						<button class="button button-border m-0 button-dark border-width-1 border-default nott ls0 fw-normal h-bg-color dropdown-toggle" type="button" id="catButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose Category</button>
						<div class="dropdown-menu py-0 border-default rounded-0" aria-labelledby="catButton">
							<a class="dropdown-item" href="#">Sofa Full Set</a>
							<a class="dropdown-item" href="#">Single Seater</a>
							<a class="dropdown-item" href="#">Recliner</a>
							<a class="dropdown-item" href="#">Sofa Cum Bed</a>
							<a class="dropdown-item" href="#">BeanBag</a>
						</div>
					</div>

					<div class="dropdown sortbuttons ms-2">
						<button class="button button-border m-0 button-dark border-width-1 border-default nott ls0 fw-normal h-bg-color dropdown-toggle" type="button" id="sortButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by default</button>
						<div class="dropdown-menu py-0 border-default rounded-0" aria-labelledby="sortButton">
							<a class="dropdown-item" href="#">Featured</a>
							<a class="dropdown-item" href="#">Popular</a>
							<a class="dropdown-item" href="#">Price: Low to High</a>
							<a class="dropdown-item" href="#">Price: High to Low</a>
							<a class="dropdown-item" href="#">Oldest to Newest</a>
							<a class="dropdown-item" href="#">Newest to Oldest</a>
							<a class="dropdown-item" href="#">A-Z</a>
							<a class="dropdown-item" href="#">Z-A</a>
						</div>
					</div>

				</div>
			</div>

			<!-- Shop
			============================================= -->
			<div id="shop" class="shop row gutter-30 col-mb-30 mt-3">

				<!-- Product 1 -->
				<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="product-image">
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/2.jpg" alt="Light Grey Sofa"></a>
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/2-1.jpg" alt="Light Grey Sofa"></a>
							<div class="bg-overlay">
								<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
									<a href="#" class="btn btn-light me-2"><i class="icon-line-shopping-cart"></i></a>
									<a href="demos/furniture/ajax/quick-view.html" class="btn btn-light" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
								</div>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title mb-0"><h4 class="mb-0"><a class="fw-medium" href="demo-furniture-single.html">Light Grey Sofa</a></h4></div>
							<h5 class="product-price fw-normal">$799.99</h5>
						</div>
					</div>
				</div>

				<!-- Product 2 -->
				<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="product-image">
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/3.jpg" alt="Celling Lights"></a>
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/3-1.jpg" alt="Celling Lights"></a>
							<div class="bg-overlay">
								<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
									<a href="#" class="btn btn-light me-2"><i class="icon-line-shopping-cart"></i></a>
									<a href="demos/furniture/ajax/quick-view.html" class="btn btn-light" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
								</div>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title mb-0"><h4 class="mb-0"><a class="fw-medium" href="demo-furniture-single.html">Celling Lights</a></h4></div>
							<h5 class="product-price fw-normal">$39.49</h5>
						</div>
					</div>
				</div>

				<!-- Product 3 -->
				<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="product-image">
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/4-1.jpg" alt="High Stand Chair"></a>
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/4.jpg" alt="High Stand Chair"></a>
							<div class="bg-overlay">
								<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
									<a href="#" class="btn btn-light me-2"><i class="icon-line-shopping-cart"></i></a>
									<a href="demos/furniture/ajax/quick-view.html" class="btn btn-light" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
								</div>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title mb-0"><h4 class="mb-0"><a class="fw-medium" href="demo-furniture-single.html">High Stand Chair</a></h4></div>
							<h5 class="product-price fw-normal">$24.99</h5>
						</div>
					</div>
				</div>

				<!-- Product 4 -->
				<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="product-image">
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/5.jpg" alt="Dining Sofa with Tea-table"></a>
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/5-1.jpg" alt="Dining Sofa with Tea-table"></a>
							<div class="bg-overlay">
								<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
									<a href="#" class="btn btn-light me-2"><i class="icon-line-shopping-cart"></i></a>
									<a href="demos/furniture/ajax/quick-view.html" class="btn btn-light" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
								</div>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title mb-0"><h4 class="mb-0"><a class="fw-medium" href="demo-furniture-single.html">Dining Sofa with Tea-table</a></h4></div>
							<h5 class="product-price fw-normal">$99.99</h5>
						</div>
					</div>
				</div>

				<!-- Product 5 -->
				<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="product-image">
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/6.jpg" alt="Bathroom Cloths Shelves"></a>
							<div class="bg-overlay">
								<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
									<a href="#" class="btn btn-light me-2"><i class="icon-line-shopping-cart"></i></a>
									<a href="demos/furniture/ajax/quick-view.html" class="btn btn-light" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
								</div>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title mb-0"><h4 class="mb-0"><a class="fw-medium" href="demo-furniture-single.html">Bathroom Cloths Shelves</a></h4></div>
							<h5 class="product-price fw-normal">$23</h5>
						</div>
					</div>
				</div>

				<!-- Product 6 -->
				<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="product-image">
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/7.jpg" alt="Golden Lamp for Room"></a>
							<div class="bg-overlay">
								<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
									<a href="#" class="btn btn-light me-2"><i class="icon-line-shopping-cart"></i></a>
									<a href="demos/furniture/ajax/quick-view.html" class="btn btn-light" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
								</div>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title mb-0"><h4 class="mb-0"><a class="fw-medium" href="demo-furniture-single.html">Golden Lamp for Room</a></h4></div>
							<h5 class="product-price fw-normal">$12.99</h5>
						</div>
					</div>
				</div>

				<!-- Product 7 -->
				<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="product-image">
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/8.jpg" alt="White Cuddle Chair with Cusions"></a><a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/8-1.jpg" alt="White Cuddle Chair with Cusions"></a>
							<div class="bg-overlay">
								<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
									<a href="#" class="btn btn-light me-2"><i class="icon-line-shopping-cart"></i></a>
									<a href="demos/furniture/ajax/quick-view.html" class="btn btn-light" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
								</div>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title mb-0"><h4 class="mb-0"><a class="fw-medium" href="demo-furniture-single.html">White Cuddle Chair with Cusions</a></h4></div>
							<h5 class="product-price fw-normal">$29.99</h5>
						</div>
					</div>
				</div>

				<!-- Product 8 -->
				<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="product-image">
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/9.jpg" alt="Golden Lamp for Room"></a>
							<a href="demo-furniture-single.html"><img src="demos/furniture/images/shop/9-1.jpg" alt="Golden Lamp for Room"></a>
							<div class="bg-overlay">
								<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
									<a href="#" class="btn btn-light me-2"><i class="icon-line-shopping-cart"></i></a>
									<a href="demos/furniture/ajax/quick-view.html" class="btn btn-light" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
								</div>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title mb-0"><h4 class="mb-0"><a class="fw-medium" href="demo-furniture-single.html">Golden Lamp for Room</a></h4></div>
							<h5 class="product-price fw-normal">$12.99</h5>
						</div>
					</div>
				</div>

			</div><!-- #shop end -->

			<div class="clear"></div>

			<nav aria-label="Page navigation">
				<ul class="pagination justify-content-center mt-4">
					<li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			</nav>

		</div>

	</div>
</section><!-- #content end -->
@endsection('content')