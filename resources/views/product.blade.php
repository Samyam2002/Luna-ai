@extends('layouts.user-layout')
@section('title', 'Product')
@section('content')
<!-- Content 
============================================= -->
<section id="content">
	<div class="content-wrap py-0">

		<div class="section bg-color dark overflow-visible m-0">
			<div class="container">

				<!-- 1. Section
				============================================= -->
				<div class="single-product py-lg-3">

					<!-- Product
					============================================= -->
					<div class="product">

						<div class="row">

							<!-- Product Image
							============================================= -->
							<div class="col-md-7">
								<img src="/product/{{$product->image}}" alt="{{$product->image}}">
							</div>

							<!-- Product Description
							============================================= -->
							<div class="col-md-5 product-desc px-4 py-0 mt-5 mt-md-0 content-sticky">

								<!-- Product Title
								============================================= -->
								<h3 class="mb-3 fw-normal text-white">{{$product->name}}</h3>
								<h4 class="mb-3 fw-normal text-white">Category: {{$product->category->name}}</h4>

								<!-- Product Price
								============================================= -->
								<h3 class="mb-3 fw-medium text-white">$ {{$product->price}}</h3>

								<!-- Product Single - Quantity & Cart Button
								============================================= -->
								<form class="cart mb-0 d-flex align-items-center" method="post" action="{{url('add_cart', $product->id)}}">
									@csrf
									<div class="quantity position-relative mb-3 clearfix">
										<input type="button" value="-" class="minus">
										<input type="number" name="quantity" step="1" min="1" max="{{$product->stock}}" value="1" title="Qty" class="qty" />
										<input type="button" value="+" class="plus">

										<div class="clear"></div>

										@if ($product->stock > 0)
										<span class="stock-in">Only {{$product->stock}} Stocks Available</span>
										@else
										<span class="stock-out">Ooops! There is no more Stock</span>
										@endif
									</div>						
									<button type="submit" class="add-to-cart button button-large fw-medium color button-light bg-white px-lg-4 add-to-cart m-0 mb-3"><i style="position: relative; top: -2px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--themecolor)" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48Z" opacity="0.2"></path><path d="M184,184H69.81818L41.92162,30.56892A8,8,0,0,0,34.05066,24H16" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path><circle cx="80" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><circle cx="184" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path></svg></i> Add to cart</button>
								</form><!-- Product Single - Quantity & Cart Button End -->
					
								<!-- Line
								============================================= -->
								<div class="line my-5"></div>

								<!-- Product Toggle - Overview
								============================================= -->
								<div class="pb-4 qv-toogle">
									<a class="font-primary d-flex align-items-center mb-0 text-white" data-bs-toggle="collapse" data-bs-target="#overview" aria-expanded="true" aria-controls="overview">Overview</a>
									<div class="collapse show" id="">
										<p class="op-06 fw-normal my-2">{{$product->description}}</p>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div><!-- Section End -->

			</div>

		</div>

		<!-- 5. Section Fetured Boxes
		============================================= -->
		<div class="section custom-bg py-6" style="--custom-bg: #fdf3e7; margin: 0px !important;">
			<div class="container py-lg-4">
				<div class="row col-mb-50">
					<h3 class="fw-medium mb-3">You may also like:</h3>
					<div class="row">
						<div class="col-12">
							<div id="shop" class="shop row gutter-30 col-mb-30">

							</div><!-- #shop end -->
						</div>
					</div>
				</div>
			</div>
		</div>
</section><!-- #content end -->
@endsection('content')