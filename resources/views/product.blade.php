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
									<button type="submit" class="add-to-cart button button-large fw-medium color button-light bg-white px-lg-4 add-to-cart m-0 mb-3"><i style="position: relative; top: -2px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--themecolor)" viewBox="0 0 256 256">
												<rect width="256" height="256" fill="none"></rect>
												<path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48Z" opacity="0.2"></path>
												<path d="M184,184H69.81818L41.92162,30.56892A8,8,0,0,0,34.05066,24H16" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
												<circle cx="80" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
												<circle cx="184" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
												<path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
											</svg></i> Add to cart</button>
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
		<div class="section custom-bg" style="--custom-bg: #fdf3e7; margin: 0px !important; padding-top:0; padding-bottom:0;">
			<div class="container py-lg-4">
				<div class="row col-mb-50">
					<div class="col-12 mt-5">
						<div class="mb-0">
							<ul class="nav canvas-tabs tabs nav-tabs mb-3" id="tab-1" role="tablist" style="--bs-nav-link-font-weight: 500;">
								<li class="nav-item" role="presentation">
									<button class="nav-link container-modules-loaded active" id="canvas-tabs-3-tab" data-bs-toggle="pill" data-bs-target="#tabs-3" type="button" role="tab" aria-controls="canvas-tabs-3" aria-selected="true"><i class="me-1 bi-star-fill"></i><span class="d-none d-md-inline-block"> Reviews (2)</span></button>
								</li>
							</ul>
							<div id="canvas-tab-alt-content" class="tab-content">
								<!--to add comments-->
								<form action="{{url('add_comment')}}" method="POST">
									@csrf
									<div class="row">
										<div class="col-md-12">
											<textarea class="form-control" name="comment" rows="3"></textarea>
										</div>
									</div>

									<div class="text-end pt-2">
										<!-- <a href="#" data-bs-toggle="modal" class="button button-3d m-0">Add a Review</a> -->
										<input type="submit" value="Add a Review" class="button button-3d" />
									</div>
								</form>


								<div class="tab-pane fade active show" id="tabs-3" role="tabpanel" aria-labelledby="canvas-tabs-3-tab" tabindex="0">
									<div id="reviews">
										<ol class="commentlist">
											@foreach ($comment as $comment)
											<li class="comment even thread-even depth-1" id="li-comment-1"  style="margin-left:0px !important;">
												<div id="comment-1" class="comment-wrap" style="padding-left:0px !important;">
													<div class="comment-content">
														<div class="comment-author">{{$comment->name}}<span><a href="#">{{$comment->created_at}}</a></span></div>
														<p>{{$comment->comment}}</p>
														<i class="comment-author"><span><a href="javascript::void(0);" onClick="reply(this)" data-Commentid="{{$comment->id}}" style="color: #50a060;">Reply to this comment</a></span></i>
														
														@foreach ($reply as $rep)
														@if ($rep->comment_id == $comment->id)
														<div class="comment-author" style="padding-left: 3%; padding-top: 10px;">{{$rep->name}}<span><a href="#">{{$rep->created_at}}</a></span></div>
														<p style="padding-left: 3%">{{$rep->reply}}</p>
														<i class="comment-author"><span style="padding-left: 3%"><a href="javascript::void(0);" onClick="reply(this)" data-Commentid="{{$comment->id}}" style="color: #50a060;">Reply to this comment</a></span></i>
														@endif
														@endforeach
													</div>
													<div class="clear"></div>
												</div>
											</li>
											@endforeach
											
											<!-- reply textbox-->

												<div class="row replyDiv" style="display:none;">
												<form action="{{url('add_reply')}}" method="POST">
												@csrf
													<div class="col-md-12">
														<input type="text" id="commentId" name="commentId" hidden=""> 
														<textarea class="form-control" name="reply" rows="3"></textarea>
													</div>
													<div class="text-end mt-3">
												<!--javascript::void(0); makes sure it remains on this particular div after the page relaods-->
														<button type="submit" href="javascript::void(0);" value="Reply" class="button button-3d m-0" style="color:#fff; font-style:initial;">Reply</button>
														<a href="javascript::void(0);" class="button button-3d button-red m-0" style="color:#fff; font-style:initial;" onClick="reply_close(this)"><b>Close</b></a>
													</div>
													</form>
											
												</div>
												

											

										</ol>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section><!-- #content end -->
@endsection('content')