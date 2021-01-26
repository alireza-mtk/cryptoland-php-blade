<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/img/apple-icon.png")}}">
    <link rel="icon" type="image/png" href="{{asset("assets/img/favicon.png")}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ config('app.name', 'کاسب خوب') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{asset("assets/admin/plugins/fontawesome-free/css/all.min.css")}}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset("assets/user/assets/css/bootstrap.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/user/assets/css/paper-dashboard.css?v=2.0.1")}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset("assets/user/assets/demo/demo.css")}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset("assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <link rel="stylesheet" href="{{asset("../../plugins/dropzone/min/dropzone.min.css")}}">
    <!-- toastr -->
    <link rel="stylesheet" href="{{asset("assets/admin/plugins/toastr/toastr.css")}}">

    <link rel="stylesheet" href="{{asset("assets/css/userDashboard.css")}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset("assets/admin/sweetalert2.min.css")}}">
    <link href="{{asset("assets/user/assets/css/custom.css")}}" rel="stylesheet" />
    @stack('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed d-rtl">
    <div class="wrapper ">
        {{-- MAIN NAVIGATION BAR --}}


        {{-- side BAR --}}
        <div class="rtl__container">

            @include('user.sidebar')

        </div>

        {{-- MAIN CONTENT --}}

        <section class="content">
            <div class="rtl__container">
                @yield('main')
            </div>
        </section>
        {{-- FOOTER --}}
    </div>


    <!--   Core JS Files   -->
    <script src="{{asset("assets/user/assets/js/core/jquery.min.js")}}"></script>
    <script src="{{asset("assets/user/assets/js/core/popper.min.js")}}"></script>
    <script src="{{asset("assets/user/assets/js/core/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/user/assets/js/plugins/perfect-scrollbar.jquery.min.js")}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{asset("assets/user/assets/js/plugins/chartjs.min.js")}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset("assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
    <script src="{{asset("assets/user/assets/js/plugins/bootstrap-notify.js")}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset("assets/user/assets/js/paper-dashboard.min.js?v=2.0.1")}}" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset("assets/user/assets/demo/demo.js")}}"></script>
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
    <script>
        $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
    </script>
    <script>
        function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
  }
    </script>
    <script>
        function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
  }
    </script>


    @yield('scripts')


    <script>
        $sidebarEvents = document.querySelectorAll('.user-dashboard-navbar-a');
        $sidebarEvents.forEach((item) => {
            item.addEventListener('click' , (e)=>{
                theUl = item.parentNode.querySelector('.user-dashboard-navbar-ul')
                 || item.parentNode.parentNode.querySelector('.user-dashboard-navbar-ul');
                theUl.classList.toggle("user-dashboard-navbar-ul-close");

                theIcon = item.parentNode.querySelector('.nc-minimal-left')
                 || item.parentNode.parentNode.querySelector('.nc-minimal-left');

                 theIcon.classList.toggle('user-dashboard-navbar-icon-rotate');


            })
        });

    </script>


    {{-- <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();

            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true,
            });

            $('.carousel.testimonials').carousel({
                indicators: true,
            });

            var city_list =<?php echo json_encode($citylist);?>;
            $('input.autocomplete').autocomplete({
                data: city_list
            });

            $(".dropdown-trigger").dropdown({
                top: '65px'
            });

            $('.tooltipped').tooltip();

        });
    </script> --}}

</body>

</html>