<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <!-- THIS DCMS Content Managment System is Dedicated To Deepmala Ranabhat -->
        <!--ajax-request csrf-token-->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('assets/dcms/img/favicon.png') }}">

    @if(isset($_panel))
    <title>{{ $_panel }}</title>
    @else
    <title>DCMS</title>
    @endif

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dcms/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dcms/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/dcms/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/dcms/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/dcms/css/owl.carousel.css') }}" type="text/css"> --}}
    <link href="{{ asset('assets/dcms/assets/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />


    <!--right slidebar-->
    {{-- <link href="{{ asset('assets/dcms/css/slidebars.css') }}" rel="stylesheet"> --}}

    <!--toastr-->
    <link href="{{ asset('assets/dcms/assets/toastr-master/toastr.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->

    <link href="{{ asset('assets/dcms/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/dcms/css/custom.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/dcms/css/style-responsive.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/dcms/assets/chart-jsjs/Chart.min.css') }}" rel="stylesheet" /> --}}

    @yield('css')



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<!-- Paste this code after body tag -->
<div class="se-pre-con"></div>
  <section id="container">

      <!--header start-->
        @include('dcms.includes.header')
      <!--header end-->

      <!--sidebar start-->
      @if(Auth::user()->role == "affiliated")
        @include('dcms.includes.affiliated.sidebar')
      @else
        @include('dcms.includes.sidebar')
      @endif
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            @yield('content')
          </section>
      </section>
      <!--main content end-->

      <!-- Right Slidebar start -->
        {{-- @include('dcms.includes.right_sidebar') --}}
      <!-- Right Slidebar end -->

      <!--footer start-->
        @include('dcms.includes.footer')
      <!--footer end-->
<script>
  window.onload = function() {
    // Wait for CKEditor to fully initialize
    CKEDITOR.on('instanceReady', function() {
        // Give a little time for the notification to appear
        setTimeout(function() {
            var closeButton = document.querySelector('.cke_notification_close');
            if (closeButton) {
                closeButton.click();
            }
        }, 100); 
    });
};
</script>
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
    {{-- <script src="{{ asset('assets/dcms/js/easy-pie-chart.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/dcms/js/count.js') }}"></script> --}}

    {{-- chart js --}}
    <script src="{{ asset('assets/dcms/assets/chart-js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/dcms/assets/chart-js/utils.js') }}"></script>
    
@include('dcms.includes.flash-message')

<script>
    $(window).load(function() {
    // Animate loader off screen
    // $(".se-pre-con").show(0).delay(3000).fadeOut("slow");
    $(".se-pre-con").fadeOut("slow");
	});
</script>
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
</script>
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
</script>
<script src="{{ asset('assets/dcms/dm_js/app.js') }}"></script>
  </body>
  <!-- THIS DCMS Content Managment System is Dedicated To Deepmala Ranabhat -->
</html>
