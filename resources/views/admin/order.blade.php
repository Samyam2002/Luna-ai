@extends('admin.index')
@section('title', 'Manage Orders')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Paid</th>
                            <th>Delivery</th>
                            <th>Image</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $order)
                        <tr>
                            <td class="count"></td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td><img src="/product/{{$order->image}}" style="width:50px;height: 50px;"></td>
                            <td><button type="button" class="btn btn-block btn-outline-info">Done</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection('endcontent')