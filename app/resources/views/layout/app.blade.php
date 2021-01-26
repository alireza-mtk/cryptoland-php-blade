<!DOCTYPE html >
<html lang="{{ app()->getLocale() }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- chrome theme color --}}
  <meta name="theme-color" content="#28a745">

  {{-- favicon --}}
  <link rel="icon" href="{{asset("favicon.ico")}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

  <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.min.css") }}" />
  


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}" />
 
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap-multiselect.min.css") }}" />
  <link rel="stylesheet" href="{{ asset("assets/css/all.css") }}" />
  <link rel="stylesheet" href="{{ asset("assets/css/main.min.css") }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/fontawesome.min.css">

 


  @stack('style')


  {{-- our own custom css --}}
  <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}" />




  <title>cryproland</title>
  

</head>

<body  style="direction: ltr">
  <div class="container">
    @include("partials.navbar")
  </div>

 
  @yield('main')
  <div class="container">
  @include("partials.footer")
</div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="{{ asset("assets/js/jquery-2.2.4.min.js")}}"></script>
  <script type="text/javascript" src="{{ asset("assets/js/scripts.min.js")}}"></script>

  <script type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js")}}"></script>
 
  <script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'Catamaran:300,400,600,700', 'Raleway:100,700', 'Roboto:700,900'] }
		};
		(function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + 
			'://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})();
  </script>
  <script type="text/javascript">
		var _html = document.documentElement;
		_html.className = _html.className.replace("no-js","js");
	</script>
  {{-- custom scripts --}}

  @stack('script')

</body>

</html>