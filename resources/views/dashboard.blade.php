@extends('master')

@section('dashboard')
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('kumulatif.data-pegawai')
    @include('kumulatif.data-jdih')
    @include('kumulatif.data-pikcovid')
    @include('kumulatif.data-prokes')
<!-- /.content-wrapper -->
@stop

@section('onpage-js')
@stop