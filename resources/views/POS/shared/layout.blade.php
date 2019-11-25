<?php
  date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>

<html class="no-js" lang="en" ng-app="myApp">

<head>
  <link rel="apple-touch-icon" sizes="57x57" href="assets/icon-favico/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/icon-favico/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/icon-favico/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/icon-favico/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/icon-favico/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/icon-favico/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/icon-favico/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/icon-favico/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/icon-favico/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/icon-favico/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/icon-favico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/icon-favico/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/icon-favico/favicon-16x16.png">
  <link rel="manifest" href="assets/icon-favico/manifest.json">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token()}}" />
  <meta name="csrf-param" content="_token" />

  <link media="screen" rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('assets/css/pos/salepanel.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/custom.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('fonts/css/font-awesome.css')}}">
  {{-- filter --}}
  <link href="{{url('js/filters/css/default.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{url('js/toast/toastr.css')}}">
  {{-- jquery --}}
  {{-- <script type="text/javascript" src="{{url('js/filters/js/jquery.js')}}"></script> --}}
  <script rel="stylesheet" type="text/javascript" src="{{url('js/jquery-1.9.1.min.js')}}"></script>
  
  <title>POS</title>

</head>

<body>
  
  <div id="waiting_loading"></div>
  {{-- header --}}
  @include('POS.shared.header')
  <div class="body">
    @yield('content')
  </div>
  @include('POS.shared.footer')
  
</body>

</html>

<script type="text/javascript" src="{{url('assets/js/pos/common.js')}}"></script>
<script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/toast/toastr.js')}}"></script>
{{-- filter --}}
<script type="text/javascript" src="{{url('js/filters/js/filters.js')}}"></script>
<script type="text/javascript" src="{{url('js/filters/js/init.js')}}"></script>

