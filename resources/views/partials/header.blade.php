<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ url('template/admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ url('template/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ url('template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ url('template/admin/plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ url('template/admin/dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ url('template/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ url('template/admin/plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ url('template/admin/plugins/summernote/summernote-bs4.min.css') }}">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<style>
    #map-prokes{
        width: 100%;
        height: 400px;
    }
    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        /* background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px; */
    }
    
    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }
    
    .legend {
        text-align: left;
        line-height: 20px;
        color: #555;
    }
    
    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }

    .datepicker td, .datepicker th {
        width: 2.5rem;
        height: 2.5rem;
        font-size: 0.85rem;
    }

    .datepicker {
        margin-bottom: 3rem;
    }

    /*
    *
    * ==========================================
    * FOR DEMO PURPOSES
    * ==========================================
    *
    */

    .input-group {
        border-radius: 30rem;
    }

    input.form-control {
        border-radius: 30rem 0 0 30rem;
        border: none;
    }

    input.form-control:focus {
        box-shadow: none;
    }

    input.form-control::placeholder {
        font-style: italic;
    }

    .input-group-text {
        border-radius: 0 30rem 30rem 0;
        border: none;
    }

    .datepicker-dropdown {
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"/>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ url('template/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{ url('template/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ url('template/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
        </div>

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        {{ menu('dashboard', 'menu/menu'); }}
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
