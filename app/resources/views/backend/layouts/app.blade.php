<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>admin dashboard - @yield('title')</title>

   
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/admin/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset("assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset("assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset("assets/admin/plugins/jqvmap/jqvmap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/admin/dist/css/adminlte.min.css")}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset("assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset("assets/admin/plugins/daterangepicker/daterangepicker.css")}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset("assets/admin/plugins/summernote/summernote-bs4.min.css")}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset("../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset("../../plugins/select2/css/select2.min.css")}}">
  <link rel="stylesheet" href="{{asset("../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset("../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css")}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset("../../plugins/bs-stepper/css/bs-stepper.min.css")}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset("../../plugins/dropzone/min/dropzone.min.css")}}">

  <!-- toastr -->
  <link rel="stylesheet" href="{{asset("assets/admin/plugins/toastr/toastr.css")}}">


   <!-- summernote -->
   <link rel="stylesheet" href="{{asset("assets/admin/sweetalert2.min.css")}}">

  {{-- our own custom scss --}}
  <link rel="stylesheet" href="{{asset("assets/admin/custom.css")}}">

  {{-- include our own styles here --}}
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed d-rtl responsive-cus" >


    {{-- MAIN NAVIGATION BAR --}}
    @include('backend.partials.navbar')

    {{-- SIDEBAR LEFT --}}
    <section class="left-sidebar-section">
        @include('backend.partials.sidebar')
    </section>

    {{-- MAIN CONTENT SECTION --}}
    <section class="content">
        <div class="rtl__container">
            @yield('content')
        </div>
    </section>

<!-- jQuery -->
<script src="{{asset("assets/admin/plugins/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("assets/admin/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset("assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- ChartJS -->
<script src="{{asset("assets/admin/plugins/chart.js/Chart.min.js")}}"></script>
<!-- Sparkline -->
<script src="{{asset("assets/admin/plugins/sparklines/sparkline.js")}}"></script>
<!-- JQVMap -->
<script src="{{asset("assets/admin/plugins/jqvmap/jquery.vmap.min.js")}}"></script>
<script src="{{asset("assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js")}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset("assets/admin/plugins/jquery-knob/jquery.knob.min.js")}}"></script>
<!-- daterangepicker -->
<script src="{{asset("assets/admin/plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("assets/admin/plugins/daterangepicker/daterangepicker.js")}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset("assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<!-- Summernote -->
<script src="{{asset("assets/admin/plugins/summernote/summernote-bs4.min.js")}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset("assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("assets/admin/dist/js/adminlte.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("assets/admin/dist/js/demo.js")}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset("assets/admin/dist/js/pages/dashboard.js")}}"></script>


<script src="{{asset("assets/admin/sweetalert2.js")}}"></script>
<script src="{{asset("assets/admin/toastr.min.js")}}"></script>
{!! Toastr::message() !!}

<script>
    @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                    closeButtor: true,
                    progressBar: true 
                });
            @endforeach
    @endif
</script>

<script>function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
  }</script>

@stack("scripts")

</body>

</html>