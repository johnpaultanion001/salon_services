<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <link  rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}"/>
  <link  rel="icon" href="{{ asset('/assets/img/favicon.png') }}"  type="image/png" rel="stylesheet" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  {{ trans('panel.site_title') }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />


  <!-- CSS Files -->
  <link href="{{ asset('/assets/css/material-kit.css?v=2.0.7') }}" type="text/css" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('/assets/demo/demo.css') }}" type="text/css" rel="stylesheet" />

</head>

<body class="index-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/">
        {{ trans('panel.site_title') }} </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">content_paste</i> Request
            </a>
            <div class="dropdown-menu dropdown-with-icons">
            <a href="/resident/brgy_certificate" class="dropdown-item">
                <i class="material-icons">content_paste</i> Barangay Certificate
                </a>
              <a href="/resident/certificate_of_residency" class="dropdown-item">
                <i class="material-icons">content_paste</i> Certificate of Residency
              </a>
              <a href="/resident/business_permit_clearance" class="dropdown-item">
                <i class="material-icons">content_paste</i> Business Permit Clearance
              </a>
              <a href="/resident/barangay_health_certificate" class="dropdown-item">
                  <i class="material-icons">content_paste</i> Barangay Health Certificate
              </a>
              <a href="/resident/barangay_indigency" class="dropdown-item">
                <i class="material-icons">content_paste</i> Barangay Indigency
              </a>
            </div>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Services
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="/resident/appointments" class="dropdown-item">
                <i class="far fa-calendar-plus fa-lg p-2"></i> Appointment
              </a>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToAbout()">
            <i class="fas fa-address-card fa-lg p-2"></i> About Us
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToContact()">
              <i class="far fa-envelope fa-lg p-2"></i> Contact Us
            </a>
          </li>
        
       
          
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="/" target="_blank" data-original-title="Like us on Facebook" rel="nofollow">
              <i class="fab fa-facebook-square fa-2x"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="/" target="_blank" data-original-title="Follow us on Instagram" rel="nofollow">
              <i class="fab fa-instagram fa-2x"></i>
            </a>
          </li>

          
        
        </ul>
      
        <ul class="navbar-nav ml-auto">
            @if (Auth::user())
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fas fa-user fa-lg p-2"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-with-icons">
                    <a href="/" class="dropdown-item">
                        <i class="fas fa-user-edit fa-lg p-2"></i> Update Info.
                    </a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-lg p-2"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form> 
                </div>
            </li>
            @else
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fas fa-users fa-lg p-2"></i> Accounts
                </a>
                <div class="dropdown-menu dropdown-with-icons">
                    <a href="/login" class="dropdown-item">
                        <i class="fas fa-sign-in-alt fa-lg p-2"></i> Login
                    </a>
                    <a href="/register" class="dropdown-item">
                    <i class="fas fa-user-plus fa-lg p-2"></i> Register
                    </a>
                </div>
            </li>
            @endif
        </ul>

      </div>
    </div>
  </nav>
  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('../assets/img/bg2.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <!-- <h1>{{ trans('panel.site_title') }}</h1>
            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi.</h3> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised"> 
    <div class="section">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <h2 class="text-center title">Announcements</h2>
            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore.</h4>
          </div>
        </div>
      </div>
      <div class="container">
        <article class="postcard light blue">
              <a class="postcard__img_link" target="_blank" href="https://covid19.govt.nz/iwi-and-communities/translations/tagalog/the-covid-19-virus-and-symptoms/?fbclid=IwAR2sjUg9kWNDUXEjfTCZFrjK2NQLb5Ml76cscsDfwuR3VTY5_Fy_9f2VArc">
                <img class="postcard__img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrY2alSOWVCk3gd-9ezRbovBZzFytKW3ERISfKRF5D6eaCEpXqBqdhydBc0CmVb7GoIGQ&usqp=CAU" alt="Image Title" />
              </a>
              <div class="postcard__text t-dark">
                <h1 class="postcard__title blue"><a target="_blank" href="https://covid19.govt.nz/iwi-and-communities/translations/tagalog/the-covid-19-virus-and-symptoms/?fbclid=IwAR2sjUg9kWNDUXEjfTCZFrjK2NQLb5Ml76cscsDfwuR3VTY5_Fy_9f2VArc">Ano ang COVID-19</a></h1>
                <div class="postcard__subtitle small">
                  <time datetime="2020-05-25 12:00:00">
                    <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020 <i class="fas fa-user ml-2 mr-2"></i>Admin
                  </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Ang COVID-19 ay isangbagonguri ng coronavirus naumaapektosaiyongbaga at mgadaanan ng hininga. 
                Ang mga coronavirus ay malaki at iba'tibangpamilya ng mga virus nanagigingsanhi ng mgakaramdamanggaya ng karaniwangsipon.
                </div>
                <ul class="postcard__tagbox">
                  <li class="tag__item"><i class="fas fa-eye fa-lg p-2"></i><a target="_blank" href="https://covid19.govt.nz/iwi-and-communities/translations/tagalog/the-covid-19-virus-and-symptoms/?fbclid=IwAR2sjUg9kWNDUXEjfTCZFrjK2NQLb5Ml76cscsDfwuR3VTY5_Fy_9f2VArc">Read More</a></li>
                </ul>
            </div>
          </article>
         
         
         
      </div>
    </div>

    <div class="section section-about" id="about">
      <div class="container tim-container">
        <!--     	        typography -->
        <div id="typography" class="cd-section">
          <div class="title text-center">
            <h2 class="text-center title">About Us</h2>
          </div>
          <div class="row">
          
          <div class="row">
          <div class="col-md-12 mr-auto ml-auto">
            <!-- Carousel Card -->
            <div class="card card-raised card-carousel">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="./assets/img/bg2.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h4>
                        <i class="material-icons">location_on</i>
                        Yellowstone National Park, United States
                      </h4>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/img/bg3.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h4>
                        <i class="material-icons">location_on</i>
                        Somewhere Beyond, United States
                      </h4>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/img/bg.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h4>
                        <i class="material-icons">location_on</i>
                        Yellowstone National Park, United States
                      </h4>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <i class="material-icons">keyboard_arrow_left</i>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <!-- End Carousel Card -->
          </div>
        </div>
         
   
            <div class="tim-typo">
           
            <h4 class="tim-note">The Life of Material Kit</h4>
              <p>
                I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
            </div>
           
           
        
        
          
          </div>
        </div>
     
     
        
      </div>
    </div>

    <div class="section section-contacts" id="contact">
        <div class="row p-2">
          <div class="col-md-8 ml-auto mr-auto ">
            <h2 class="text-center title">Contact Us</h2>
           
            <form class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Your Name</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Your Email</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised">
                    Send Message
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

  </div>

  <!--  End Modal -->
  <footer class="footer" data-background-color="black">
    <div class="container">
      <nav class="float-left">
        <ul>
         
          
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>,  Copyright <strong><span>{{ trans('panel.site_title') }}</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{ asset('/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/assets/js/plugins/moment.min.js') }}" type="text/javascript"></script>

  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('/assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assets/js/material-kit.js?v=2.0.7') }}" type="text/javascript"></script>

  <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToAbout() {
      if ($('.section-about').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-about').offset().top
        }, 1000);
      }
    }

    function scrollToContact() {
      if ($('.section-contacts').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-contacts').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>