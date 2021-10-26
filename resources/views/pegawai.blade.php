@extends('master')

@section('dashboard')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('kumulatif.data-pegawai')
{{--        @include('kumulatif.data-jdih')--}}
    </div>
    <!-- /.content-wrapper -->
@stop
