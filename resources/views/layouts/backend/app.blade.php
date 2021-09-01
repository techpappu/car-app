<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/skins/_all-skins.min.css') }}">
  {{-- <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/jvectormap/jquery-jvectormap.css') }}">
  --}}
  {{--  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}"> --}}
  <!-- bootstrap wysihtml5 - text editor -->
  
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  
  </style>
  @stack('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  
<div class="wrapper">

 <!-- Top Bar -->
@include('layouts.backend.partials.topbar')
<!-- #Top Bar -->

  <!-- Left side column. contains the logo and sidebar -->
  <section>
    <!-- Left Sidebar -->
        @include('layouts.backend.partials.sidebar')
    <!-- #END# Left Sidebar -->
  </section>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">      
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('assets/backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
{{-- <!-- jvectormap -->
<script src="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/backend/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
 --}}
{{-- <!-- daterangepicker -->
<script src="{{ asset('assets/backend/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('assets/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script> --}}
<!-- Bootstrap WYSIHTML5 -->

<script src="{{ asset('assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('assets/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/backend/dist/js/demo.js') }}"></script>
@stack('js')
</body>
</html>
