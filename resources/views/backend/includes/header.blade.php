<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon">

  <title>{{ (getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel") }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('public/backend/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/backend/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('public/backend/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ url('public/backend/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ url('public/backend/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ url('public/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ url('public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- toastr -->
  <link rel="stylesheet" href="{{ url('public/backend/css/toastr.min.css') }}">
  <!-- datatable -->
  <link rel="stylesheet" href="{{ url('public/backend/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/backend/css/jquery.dataTables.min.css') }}">
  <!-- Lightbox -->
  <link href="{{ url('public/backend/lightbox2-master/dist/css/lightbox.css') }}" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <link href="{{ url('public/backend/css/developer.css') }}" rel="stylesheet">

</head>
<body class="hold-transition skin-blue sidebar-mini">

  <!-- Loader Work Start -->
  <div class="loader_container">
    <div class="loader-wrapper">
      <img src="{{ url('public/uploads/loader.svg') }}" height="300" />
    </div>
  </div>
  <style type="text/css">
     .loader_container { display: none; justify-content: center; align-items: center; position: fixed; top: 0; bottom: 0; left: 0; right: 0; background-color: rgba(0,0,0,0.5); z-index: 99999; }
     .loader-wrapper{ display: flex; justify-content: center; top: 0; bottom: 0; left: 0; right: 0; padding-top: 10%; }
  </style>
  <!-- Loader Work End -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <?php
        $app_name   = (getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel");
      ?>
      <span class="logo-mini"><b>{{ implode('', array_map(function($v) { return $v[0]; }, explode(' ', $app_name))) }}</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ $app_name }}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(!empty(Auth::guard('admins')->user()->image))
                <img src="{{ url('public/uploads/user_images/').'/'.Auth::guard('admins')->user()->image }}" class="user-image" alt="User Image">
              @else
                <img src="{{ url('public/uploads/dummy_user.png') }}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{ Auth::guard('admins')->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(!empty(Auth::guard('admins')->user()->image))
                  <img src="{{ url('public/uploads/user_images/').'/'.Auth::guard('admins')->user()->image }}" class="img-circle" alt="User Image" style="height:100px;width:100px;">
                @else
                  <img src="{{ url('public/uploads/dummy_user.png') }}" class="img-circle" alt="User Image" style="height:100px;width:100px;">
                @endif
                <p>
                  {{ Auth::guard('admins')->user()->name }}
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('admin/profile_update') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('admin/logout') }}" onclick="return confirm('Are you sure you want to log out ?')" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>