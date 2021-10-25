@extends('master')

@section('dashboard')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('kumulatif.data-pikcovid')
    @include('kumulatif.data-jdih')
    @include('kumulatif.data-kepegawaian')
</div>
<!-- /.content-wrapper -->
@stop