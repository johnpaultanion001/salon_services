<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>
    @yield('sub-title') | {{ trans('panel.site_title') }}
  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('resident/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('resident/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="{{ asset('resident/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resident/vendor/aos/aos.css" rel="stylesheet') }}">
  <link href="{{ asset('resident/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resident/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('resident/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resident/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resident/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('resident/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('resident/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

 <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />

  @yield('style')

</head>

<body>
    
  @yield('navbar')

  @yield('content')

  @yield('footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!--   JQUERY JS Files   -->
  <script src="{{ asset('/assets_v1/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('/assets_v1/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>


  <!-- Vendor JS Files -->
  <script src="{{ asset('resident/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('resident/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('resident/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('resident/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('resident/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('resident/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('resident/js/main.js') }}"></script>

  <!-- DATE -->
  <script src="{{ asset('resident/vendor/date/moment.min.js') }}"></script>
  <script src="{{ asset('resident/vendor/date/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  @yield('script')

</body>

</html>