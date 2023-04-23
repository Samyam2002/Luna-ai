@extends('layouts.user-layout')
@section('title', 'Shop')
@section('content')
<div class="content-wrap">
	<div class="container">

		<div class="row justify-content-between align-items-center">
			<div class="col-12 col-md-8 mb-4">
				<h3 class="fw-medium h1">All <span data-animate="svg-underline-animated" class="svg-underline nocolor"><span>Products</span></span></h3>
			</div>

			<div class="col-12 col-md-4 mb-4 d-flex">
				<div class="dropdown sortbuttons ms-2">
					<a class="button button-border m-0 button-dark border-width-1 border-default nott ls0 fw-normal h-bg-color" href="{{url('sortMintoMax')}}">Price (min to max)</a>
				</div>

				<div class="dropdown sortbuttons ms-2">
					<a class="button button-border m-0 button-dark border-width-1 border-default nott ls0 fw-normal h-bg-color" href="{{url('sortMaxtoMin')}}">Price (max to min)</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div id="shop" class="shop row gutter-30 col-mb-30">
					<!-- Products -->
					@foreach ($product as $products)
					<div class="product col-lg-4 col-md-4 col-sm-6 col-12">
						<div class="grid-inner">
							<div class="product-image">
								<a href="{{url('product', $products->id)}}"><img src="product/{{$products->image}}" alt="{{$products->image}}"></a>
								<div class="bg-overlay">
									<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
										<a href="#" class="btn btn-light me-2"><i class="icon-line-shopping-cart"></i></a>
										<a href="{{url('product', $products->id)}}" class="btn btn-light me-2"><i class="icon-line-more-vertical"></i></a>
									</div>
								</div>
							</div>
							<div class="product-desc">
								<div class="product-title mb-0">
									<h4 class="mb-0"><a class="fw-medium" href="{{url('product', $products->id)}}">{{$products->name}}</a></h4>
								</div>
								<h5 class="product-price fw-normal">${{$products->price}}</h5>
							</div>
						</div>
					</div>
					@endforeach

				</div><!-- #shop end -->
			</div>

			<div class="clear"></div>
			{!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
		</div>

	</div>
	@endsection('content')