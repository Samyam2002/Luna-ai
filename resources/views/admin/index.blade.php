<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.css')}}">
  <style>
    .nav-item.w a:hover {
      color: #fff !important;
    }

    /*for auto increment of ID in tables UI*/
    table {
      counter-reset: section;
    }

    .count:before {
      counter-increment: section;
      content: counter(section);
    }

    a {
      color: #28a745;
    }

    a:hover {
      color: #32514E;
    }

    .dropdown-menu-lg {
      max-width: 300px;
      min-width: 300px !important;
      padding: 0;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/contact" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">
              @if(Auth::user())
              @php
              $count = 0;
              @endphp

              @foreach(auth()->user()->unreadnotifications as $notification)
              @php
              $count++;
              @endphp
              @endforeach

              @if($count > 0)
              <span class="notification-count">{{$count}}</span>
              @endif
              @endif
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            @if(Auth::user())
            @foreach(auth()->user()->unreadnotifications as $notification)
            <!-- <a href="{{url('/order')}}" class="dropdown-item"> -->
            <div class="dropdown-item">
              <i class="fas fa-user mr-2"></i><b>{{ $notification->data['name']}}</b> has placed an order on COD.
              <a href="{{route('markasred', $notification->id)}}"><i class="fas fa-check-circle"></i></a>
            </div>
            <div class="dropdown-divider"></div>
            @endforeach
            @endif

            <!-- <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline" action="{{url('search')}}" method="get">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="text" name="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4" style="background-color: #000;">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
        <img src="assets/logo-white.png" alt="Admin Logo" style="width: 50%">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex">
          <div class="info">
            <a href="#" class="d-block" style="color: #fff"><b>Admin : {{ auth()->user()->name}}</b></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <ul class="nav nav-treeview">
                <li class="nav-header">PAGES</li>
                <li class="nav-item w">
                  <a href="{{url('dashboard')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item w">
                  <a href="{{url('category')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Category</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item w">
              <a href="{{url('/create_product')}}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Add Products</p>
              </a>
            </li>
            <li class="nav-item w">
              <a href="{{url('/manage_product')}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>Manage Products</p>
              </a>
            </li>
            <li class="nav-item w">
              <a href="{{url('/order')}}" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>Manage Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/profile')}}" class="nav-link active" style="background-color: #32514E">
                {{ __('Profile') }}
              </a>
            </li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}" class="mb-0">
                @csrf
                <a style="background-color: #32514E" href="route('logout')" onclick="event.preventDefault();
                                  this.closest('form').submit();" class="nav-link active">
                  {{ __('Log Out') }}
                </a>
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-3">
            <div class="col-12">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                @section('title', 'Dashboard')
                <li class="breadcrumb-item active">@yield('title')</li>
              </ol>
            </div>
          </div><!-- /.row -->

          <!--Alert message if category added successfully-->
          @if(session()->has('message'))
          <div id="hide-box" class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

            {{session()->get('message')}}

          </div>
          @endif

          @yield('content')
          <section class="content">
            <div class="container-fluid">

              <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Products</span>
                      <span class="info-box-number">
                        10
                        <small>%</small>
                      </span>
                    </div>

                  </div>

                </div>

                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Orders</span>
                      <span class="info-box-number">41,410</span>
                    </div>

                  </div>

                </div>


                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Customers</span>
                      <span class="info-box-number">760</span>
                    </div>

                  </div>

                </div>

                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Revenue</span>
                      <span class="info-box-number">2,000</span>
                    </div>

                  </div>

                </div>

                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Order Delivered</span>
                      <span class="info-box-number">2,000</span>
                    </div>

                  </div>

                </div>


                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Order Processing</span>
                      <span class="info-box-number">2,000</span>
                    </div>

                  </div>

                </div>

              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Monthly Recap Report</h5>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <div class="btn-group">
                          <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a href="#" class="dropdown-item">Action</a>
                            <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                            <a class="dropdown-divider"></a>
                            <a href="#" class="dropdown-item">Separated link</a>
                          </div>
                        </div>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-8">
                          <p class="text-center">
                            <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                          </p>
                          <div class="chart">
                            <div class="chartjs-size-monitor">
                              <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                              </div>
                              <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                              </div>
                            </div>

                            <canvas id="salesChart" height="180" style="height: 180px; display: block; width: 680px;" width="680" class="chartjs-render-monitor"></canvas>
                          </div>

                        </div>

                        <div class="col-md-4">
                          <p class="text-center">
                            <strong>Goal Completion</strong>
                          </p>
                          <div class="progress-group">
                            Add Products to Cart
                            <span class="float-right"><b>160</b>/200</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-primary" style="width: 80%"></div>
                            </div>
                          </div>

                          <div class="progress-group">
                            Complete Purchase
                            <span class="float-right"><b>310</b>/400</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-danger" style="width: 75%"></div>
                            </div>
                          </div>

                          <div class="progress-group">
                            <span class="progress-text">Visit Premium Page</span>
                            <span class="float-right"><b>480</b>/800</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-success" style="width: 60%"></div>
                            </div>
                          </div>

                          <div class="progress-group">
                            Send Inquiries
                            <span class="float-right"><b>250</b>/500</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-warning" style="width: 50%"></div>
                            </div>
                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                            <h5 class="description-header">$35,210.43</h5>
                            <span class="description-text">TOTAL REVENUE</span>
                          </div>

                        </div>

                        <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                            <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                            <h5 class="description-header">$10,390.90</h5>
                            <span class="description-text">TOTAL COST</span>
                          </div>

                        </div>

                        <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                            <h5 class="description-header">$24,813.53</h5>
                            <span class="description-text">TOTAL PROFIT</span>
                          </div>

                        </div>

                        <div class="col-sm-3 col-6">
                          <div class="description-block">
                            <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                            <h5 class="description-header">1200</h5>
                            <span class="description-text">GOAL COMPLETIONS</span>
                          </div>

                        </div>
                      </div>

                    </div>

                  </div>

                </div>

              </div>


              <div class="row">
                <div class="col-md-4">

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Recently Added Products</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body p-0">
                      <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                          <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">Samsung TV
                              <span class="badge badge-warning float-right">$1800</span></a>
                            <span class="product-description">
                              Samsung 32" 1080p 60Hz LED Smart HDTV.
                            </span>
                          </div>
                        </li>

                        <li class="item">
                          <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">Bicycle
                              <span class="badge badge-info float-right">$700</span></a>
                            <span class="product-description">
                              26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                            </span>
                          </div>
                        </li>

                        <li class="item">
                          <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">
                              Xbox One <span class="badge badge-danger float-right">
                                $350
                              </span>
                            </a>
                            <span class="product-description">
                              Xbox One Console Bundle with Halo Master Chief Collection.
                            </span>
                          </div>
                        </li>

                        <li class="item">
                          <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">PlayStation 4
                              <span class="badge badge-success float-right">$399</span></a>
                            <span class="product-description">
                              PlayStation 4 500GB Console (PS4)
                            </span>
                          </div>
                        </li>

                      </ul>
                    </div>

                    <div class="card-footer text-center">
                      <a href="javascript:void(0)" class="uppercase">View All Products</a>
                    </div>

                  </div>

                </div>

              </div>

            </div>
          </section>
        </div>
        <!-- /.content-header -->
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- js to hide the alert notification after 5 seconds-->
    <script>
      setTimeout(() => {
        const box = document.getElementById('hide-box');

        // 👇️ removes element from DOM
        box.style.display = 'none';

        // 👇️ hides element (still takes up space on page)
        // box.style.visibility = 'hidden';
      }, 5000); // 👈️ time in milliseconds
    </script>
    <!--jQuery-->
    <script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin_assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin_assets/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin_assets/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('admin_assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin_assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin_assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_assets/dist/js/adminlte.js')}}"></script>
</body>

</html>