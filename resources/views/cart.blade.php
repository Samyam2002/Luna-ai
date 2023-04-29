@extends('layouts.user-layout')
@section('title', 'Cart')
@section('content')
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">
            <!--Alert message if category added successfully-->
            @if(session()->has('message'))
            <div id="hide-box" class="alert alert-success">
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>

                {{session()->get('message')}}

            </div>
            @endif

            <div class="row gx-5">
                <div class="col-12 col-md-7">

                    <table class="table cart mb-3">
                        <thead>
                            <tr>
                                <th class="cart-product-remove">&nbsp;</th>
                                <th class="cart-product-thumbnail">&nbsp;</th>
                                <th class="cart-product-name">Product</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Total Price</th>
                            </tr>
                        </thead>

                        <?php $totalprice = 0; ?>
                        @foreach($cart as $cart)
                        <tbody>
                            <tr class="cart_item m-0">
                                <td class="cart-product-remove">
                                    <a href="{{url('/remove_cart', $cart->id)}}" onclick="return confirm('Are you sure to remove this item from your cart?')" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                                </td>

                                <td class="cart-product-thumbnail">
                                    <a><img width="64" height="64" src="/product/{{$cart->image}}" alt="Pink Printed Dress"></a>
                                </td>

                                <td class="cart-product-name">
                                    <a>{{$cart->product_title}}</a>
                                </td>

                                <td class="cart-product-quantity">
                                    <span class="quantity">{{$cart->quantity}}</span>
                                </td>

                                <td class="cart-product-price">
                                    <span class="amount">$ {{$cart->price}}</span>
                                </td>
                            </tr>
                        </tbody>
                        <?php $totalprice = $totalprice + $cart->price ?>
                        @endforeach
                    </table>
                    <a href="{{url('cash_order')}}" class="button button-small button-3d m-0">Cash On Delivery</a>
                    <a href="{{url('checkout', $totalprice)}}" class="button button-small button-3d m-0">Pay Using Card</a>
                </div>

                <div class="col-12 col-md-5 mt-5">
                    <h3>Cart Totals</h3>

                    <div class="table-responsive">
                        <table class="table cart cart-totals">
                            <tbody>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Cart Subtotal</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount">{{$totalprice}}</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Shipping</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount">+ 100</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Total</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount color lead"><strong>$ {{$totalprice + 100}}</strong></span>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- #content end -->
@endsection('content')