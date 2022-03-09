
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets_v1/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/assets_v1/img/favicon.png') }}">
  <title>
    @yield('sub-title') | {{ trans('panel.site_title') }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('/assets_v1/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets_v1/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://use.fontawesome.com/5882f93e19.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets_v1/icons/css/fontawesome.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets_v1/icons/css/solid.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets_v1/icons/css/all.css') }}">

  <link href="{{ asset('/assets_v1/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/assets_v1/css/argon-dashboard.css?v=2.0.0') }}" rel="stylesheet" />

  <!-- JQUERY CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  @yield('sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
        @yield('navbar')
    <!-- End Navbar -->
    @yield('content')
  </main>
  <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>

  @yield('rightbar')
 
  <!--   Core JS Files   -->
  <script src="{{ asset('/assets_v1/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/js/plugins/chartjs.min.js') }}"></script>

  <!--   JQUERY JS Files   -->
  <script src="{{ asset('/assets_v1/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('/assets_v1/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('/assets_v1/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assets_v1/js/argon-dashboard.min.js?v=2.0.0') }}"></script>
  @yield('script') 
</body>

</html>