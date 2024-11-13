<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <!--ajax-request csrf-token-->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('assets/dcms/img/favicon.png') }}">

    @if(isset($_panel))
    <title>{{ $_panel }} | TU CDC</title>
    @else
    <title>TU CDC</title>
    @endif

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dcms/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dcms/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/dcms/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dcms/assets/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />




    <!--toastr-->
    <link href="{{ asset('assets/dcms/assets/toastr-master/toastr.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->

    <link href="{{ asset('assets/dcms/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dcms/css/style-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dcms/assets/chart-js/Chart.min.css') }}" rel="stylesheet" />

    @yield('css')

  </head>

  <body style="overflow-x: hidden; ">
  <section id="container">

      <!--header start-->
        @include('auth.includes.header')
      <!--header end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            @yield('content')
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
        @include('auth.includes.footer')
      <!--footer end-->

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/dcms/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/dcms/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('assets/dcms/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/dcms/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/dcms/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('assets/dcms/js/jquery.scrollTo.min.js') }}"></script>

    <script src="{{ asset('assets/dcms/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/dcms/js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/dcms/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/dcms/js/owl.carousel.js') }}" ></script>
    <script src="{{ asset('assets/dcms/js/jquery.customSelect.min.js') }}" ></script>
    <script src="{{ asset('assets/dcms/js/respond.min.js') }}" ></script>
    <script src="{{ asset('assets/dcms/assets/bootstrap-inputmask/bootstrap-inputmask.min.js') }}" ></script>

    <!--right slidebar-->
    <script src="{{ asset('assets/dcms/js/slidebars.min.js') }}"></script>
   <!--toastr-->
   <script src="{{ asset('assets/dcms/assets/toastr-master/toastr.js') }}"></script>
    <!--common script for all pages-->
    <script src="{{ asset('assets/dcms/js/common-scripts.js') }}"></script>
    <!--script for this page-->
    <script src="{{ asset('assets/dcms/js/sparkline-chart.js') }}"></script>

    {{-- chart js --}}
    <script src="{{ asset('assets/dcms/assets/chart-js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/dcms/assets/chart-js/utils.js') }}"></script>

    @include('dcms.includes.flash-message')

    @yield('js')

    @show
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

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });

</script>
<script src="{{ asset('assets/dcms/dm_js/app.js') }}"></script>
  </body>
</html>
