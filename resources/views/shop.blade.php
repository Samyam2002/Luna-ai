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
									<h5 class="product-price fw-normal">${{$products->price}}</h5>
								</div>
								<div class="col-6 d-flex mt-1 atc" style="justify-content:end">
									<form action="{{url('add_cart', $products->id)}}" method="post" class="m-0">
										@csrf
										<button type="submit" name="quantity" value="1" class="add-to-cart button button-medium fw-medium color button-light px-lg-4 add-to-cart m-0" style="border-radius:10px;"><i style="position: relative; top: -2px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--themecolor)" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48Z" opacity="0.2"></path><path d="M184,184H69.81818L41.92162,30.56892A8,8,0,0,0,34.05066,24H16" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path><circle cx="80" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><circle cx="184" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path></svg></i></button>
									</form>
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