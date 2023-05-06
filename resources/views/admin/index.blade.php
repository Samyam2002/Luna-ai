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
            <span class="badge badge-warning navbar-badge">15</span>
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
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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
        </div><!-- /.container-fluid -->
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