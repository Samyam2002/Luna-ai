@extends('admin.dashboard')
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
                            <!-- <th>Email</th> -->
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Paid</th>
                            <th>Delivery</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Pdf</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order as $order)
                        <tr>
                            <td class="count"></td>
                            <td>{{$order->name}}</td>
                            <!-- <td>{{$order->email}}</td> -->
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td><img src="/product/{{$order->image}}" style="width:50px;height: 50px;"></td>
                            <td>
                                @if($order->delivery_status == 'Processing')
                                <a href="{{url('delivered', $order->id)}}" onClick="return confirm('Are you sure this product is delivered?')">
                                    <button type="button" class="btn btn-block btn-outline-info">Done</button>
                                </a>
                                @else
                                <p style="color:#28a745">Delivered</p>
                                @endif

                            </td>
                            <td>
                                <a href="{{url('print_pdf', $order->id)}}">
                                    <button type="button" class="btn btn-block btn-outline-info">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="{{url('send_email', $order->id)}}">
                                    <button type="button" class="btn btn-block btn-outline-info">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="16" style="color:red; font-style:italic;" >No data found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection('endcontent')