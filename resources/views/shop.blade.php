@extends('layouts.user-layout')
@section('title', 'Shop')
@section('content')
<div class="content-wrap pb-0">
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
										@if ($products->stock > 0)
										<button type="submit" name="quantity" value="1" class="add-to-cart button button-medium fw-medium color button-light px-lg-4 add-to-cart m-0" style="border-radius:10px;"><i class="fa-sharp fa-solid fa-cart-shopping"></i></button>	
										@endif
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

			<div class="clear"></div>
			{!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
		</div>

	</div>
	@endsection('content')