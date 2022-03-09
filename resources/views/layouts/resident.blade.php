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
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('/assets_v1/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/assets_v1/css/argon-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
  </head>

  <body class="">
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <!-- Navbar -->
            @yield('navbar')
          <!-- End Navbar -->
        </div>
      </div>
    </div>
    <main class="main-content  mt-0">
      <section>
          @yield('content')
      </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('/assets_v1/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/assets_v1/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets_v1/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets_v1/js/plugins/smooth-scrollbar.min.js') }}"></script>
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