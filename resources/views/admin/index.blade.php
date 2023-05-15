@extends('admin.dashboard')
@section('title', 'Dashboard')
@section('title-name', 'Luna Dashboard')
@section('content')
<section class="content">
  <div class="container-fluid">

    <div class="row pt-5">
      <div class="col-12 col-sm-6 col-md-4 pr-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Users</span>
            <span class="info-box-number">{{$total_user}}</span>
          </div>

        </div>

      </div>

      <div class="col-12 col-sm-6 col-md-4 px-4">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Products</span>
            <span class="info-box-number">
              {{$total_product}}
            </span>
          </div>

        </div>

      </div>

      <div class="col-12 col-sm-6 col-md-4 pl-4">
        <div class="info-box mb-3">
          <span class="info-box-icon elevation-1" style="background-color:brown"><i class="fas fa-credit-card" style="color:#fff"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Revenue</span>
            <span class="info-box-number">$ {{$total_revenue}}</span>
          </div>

        </div>

      </div>


      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-4 pr-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Orders</span>
            <span class="info-box-number">{{$total_order}}</span>
          </div>

        </div>

      </div>


      <div class="col-12 col-sm-6 col-md-4 px-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cart-plus"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Order Processing</span>
            <span class="info-box-number">{{$total_processing}}</span>
          </div>

        </div>

      </div>


      <div class="col-12 col-sm-6 col-md-4 pl-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-cart-arrow-down"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Order Delivered</span>
            <span class="info-box-number">{{$total_delivered}}</span>
          </div>

        </div>

      </div>

    </div>
  </div>
</section>
@endsection('content')