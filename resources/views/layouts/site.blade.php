<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('/assets/img/logo.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 
    <title>@yield('sub-title') | {{ trans('panel.site_title') }}</title>
 
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('/assets/css/material-kit.css?v=2.0.7') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('/assets/demo/demo.css') }}" rel="stylesheet" />

  <style>
    .form-control[readonly] {
      background-color: white;
    }
    .counter.counter-lg {
      top: 1px !important;
      font-weight: bold;
      position: absolute;
    }

  </style>
</head>

<body class="profile-page sidebar-collapse">
  @yield('navbar')
 
  @yield('content')

  @yield('footer')
  
  

  <!--   Core JS Files   -->
  <script src="{{ asset('/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/assets/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/assets/js/plugins/nouislider.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assets/js/material-kit.js?v=2.0.7') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

  <script>
    $(document).on('click', '#click_notif', function(){
        var id = $(this).attr('click_notif');
        $.ajax({
                url:"notification/"+id,
                method:'PUT',
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                dataType:"json",
                beforeSend:function(){
                },
                
                success:function(data){
                  location.href = data.success;
                }
            })

    });
  </script>

  @yield('script')
</body>

</html>