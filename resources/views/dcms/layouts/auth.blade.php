<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <!-- THIS DCMS Content Managment System is Dedicated To Deepmala Ranabhat -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>मानसरोवर नेपाल</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dcms/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dcms/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/dcms/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!--toastr-->
    <link href="{{ asset('assets/dcms/assets/toastr-master/toastr.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/dcms/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dcms/css/style-responsive.css') }}" rel="stylesheet" />

    @yield('css')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

        @yield('content')

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/dcms/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/dcms/js/bootstrap.min.js') }}"></script>
    <!--toastr-->
   <script src="{{ asset('assets/dcms/assets/toastr-master/toastr.js') }}"></script>
    <!--common script for all pages-->
    <script src="{{ asset('assets/dcms/js/common-scripts.js') }}"></script>
   @yield('js')

{{-- script-lochna-custom-js  --}}
    <script type="text/javascript">

      toastr.options = {
    "closeButton": true,
    "debug": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
    </script>
  </body>
<!-- THIS DCMS Content Managment System is Dedicated To Deepmala Ranabhat -->
</html>
