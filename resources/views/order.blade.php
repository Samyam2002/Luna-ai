@extends('layouts.user-layout')
@section('title', 'Order')
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

            <div class="row justify-content-center">
                <div class="col-12 col-md-10">

                    <table class="table cart mb-3">
                        <thead>
                            <tr>
                                <th class="cart-product-name">Product</th>
                                <th class="cart-product-thumbnail">Image</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Price</th>
                                <th class="cart-product-quantity">Payment Status</th>
                                <th class="cart-product-quantity">Delivery Status</th>
                                <th class="cart-product-quantity">Cancel Order</th>
                            </tr>
                        </thead>

                        @foreach($order as $order)
                        <tbody>
                            <tr class="cart_item m-0">
                                <td class="cart-product-name">
                                    <a>{{$order->product_title}}</a>
                                </td>
                                
                                <td class="cart-product-thumbnail">
                                    <a><img width="104" height="104" src="/product/{{$order->image}}"></a>
                                </td>

                                <td class="cart-product-quantity">
                                    <span class="quantity">{{$order->quantity}}</span>
                                </td>

                                <td class="cart-product-quantity">
                                    <span class="amount">$ {{$order->price}}</span>
                                </td>

                                <td class="cart-product-quantity">
                                    <span class="amount">{{$order->payment_status}}</span>
                                </td>

                                <td class="cart-product-quantity">
                                    <span class="amount">{{$order->delivery_status}}</span>
                                </td>

                                <td class="cart-product-price">
                                    @if($order->delivery_status == 'Processing')

                                    <span class="amount">
                                        <a href="{{url('/cancel_order', $order->id)}}" type="button" class="btn btn-outline-danger" onclick="return confirm('Are you sure to cancel this order?')">Cancel</a>
                                    </span>
                                    
                                    @else
                                    <span style="color:blue">Not Allowed</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>

            </div>

        </div>
    </div>
</section><!-- #content end -->
@endsection('content')