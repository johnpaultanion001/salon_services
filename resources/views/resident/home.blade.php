<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <link  rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}"/>
  <link  rel="icon" href="{{ asset('../assets/img/logo.png') }}"  type="image/png" rel="stylesheet" />
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
  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('../assets/img/logo.png'); background-size: contain; background-repeat: no-repeat;">
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
      <div class="container">
        <div class="title">
            <h2  class="title">Announcements</h2>
        </div>
        @foreach($announcements as $announcement)
          <article class="view postcard light blue" view="{{  $announcement->id ?? '' }}">
              
              <img class="postcard__img"src="{{URL::asset('/assets/img/announcements/'.$announcement->image)}}" alt="Image Title" />

              <div class="postcard__text t-dark">
                <h1 class="postcard__title blue">{{$announcement->title}}</h1>
                <div class="postcard__subtitle small">
                  <time datetime="2020-05-25 12:00:00">
                    <i class="fas fa-calendar-alt mr-2"></i> {{ $announcement->created_at->format('F d,Y h:i A') }} <i class="fas fa-user ml-2 mr-2"></i>{{  $announcement->user->name ?? '' }}
                  </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">  {{\Illuminate\Support\Str::limit($announcement->body,150)}}
                </div>
                <ul class="postcard__tagbox">
                  <button type="button" name="view" id="view" view="{{  $announcement->id ?? '' }}" class="view tag__item"><i class="fas fa-eye fa-lg p-2"></i>View Announcement</button>
                </ul>
            </div>
          </article>
        @endforeach
      </div>
    </div>

    <div class="section section-about" id="about">
      <div class="container tim-container">
        <!--     	        typography -->
        <div id="typography" class="cd-section">
          <div class="title">
            <h3 class=" title">ABOUT {{ trans('panel.site_title') }} </h3>
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
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li> 
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100"   src="../assets/img/brgy/bg1.jpg" alt="1 slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h2 class="text-white font-weight-bold">
                        
                      </h2>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/img/brgy/bg2.jpg" alt="2 slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h2 class="text-white font-weight-bold">
                        BARANGAY HEALTH WORKERS
                      </h2>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100"  src="../assets/img/brgy/bg3.jpg" alt="3 slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h2 class="text-white font-weight-bold">
                        BARANGAY LUPON 
                      </h2>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100"  src="../assets/img/brgy/bg4.jpg" alt="4 slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h2 class="text-white font-weight-bold">
                        SANGGUNIANG BARANGAY MEMBERS 
                      </h2>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100"  src="../assets/img/brgy/bg7.jpg" alt="5 slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h2 class="text-white font-weight-bold">
                        BARANGAY PEACE AND ORDER DEPARTMENT
                      </h2>
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
        <div class="container">
        <div class="row">
          <div class="col-md-6">
              <div class="title">
                  <h3 class="font-weight-bold">Vision:</h3>
              </div>
                <div class="blockquote undefined pt-2">
                  <p>
                    An Independent and progressive barangay advocating principles and practices of good governance that help build and nurture honesty responsibility among its public officials and employee and take appropriate measures to promote transparency in transacting with the public.
                  </p>
                </div>
            
          </div>
          <div class="col-md-6">
            <div class="title">
                <h3 class="font-weight-bold">Mission:</h3>
            </div>
                <div class="blockquote undefined pt-2">
                  <p>
                    To be able to actively carry out the mandates and ensure transparency, honesty and efficiency in the delivery of services in the barangay.
                  </p>
                </div>
            
          </div>
        </div>
      </div>
   
      <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="title">
                      <h3 class="text-center font-weight-bold">BRIEF HISTORY OF BARANGAY SAN ROQUE CAINTA RIZAL</h3>
                  </div>
                    <p>
                    BARANGAY SAN ROQUE was established on 1963 and the barrio lieutenant (Tiniente Del Baryo) was appointed by the Municipal Mayor through the recommendation of Municipal Councilor. This creation was based on RA 3590 and was categorized as URBAN barangay with a land are 66.99 hectares with a total population of 8,342 as of 2009 (4,433-female & 3,909-male) with total households of 2,126 and with a total registered voters of 4,746.
                    <br><br>
                    The barangay basic utilities like power supply is from MERALCO and water were coming from the first level Manila Water. Our way of transportation are mobil/patrol and motorcycle, we provide our communication by way of telephone and mobile. The barangay revenues are coming from Local Source, IRA and other barangay generating income.

                    </p>
                </div>
                <div class="col-md-12">
                  <div class="title">
                      <h5 class="font-weight-bold">BARANGAY SAN ROQUE was composed of the following personnel:</h5>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                          1 Punong Barangay  <br>
                          7 Barangay Kagawads  <br>
                          1 SK-Chairperson  <br>
                          1 Brgy. Treasurer  <br>
                          8 Brgy. Staffs  <br>
                          12 Environmental Crews   <br>
                    </div>
                    <div class="col-md-6">
                            18 Barangay Tanods    <br>
                            23 BHW    <br>
                            1 Daycare Worker    <br>
                            10 Volunteer Barangay Lupon    <br>
                            18 Volunteer Brgy. Tanods    <br>
                            7 SK Kagawads  <br>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-left">
                 
                  <div class="title  text-center">
                      <h5 class="font-weight-bold">LIST OF OFFICIALS</h5>
                  </div>
                  <div class="title">
                      <h5 class="font-weight-bold">FELIX C. TAGUBA III</h5>
                      <h6 class="font-weight-light">Punong Barangay</h6>
                  </div>
                  <hr class="my-2 bg-muted">
                  <div class="title">
                      <h5 class="font-weight-bold">BENJAMIN S. ZAPANTA, JR.</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Kagawad- Committee on:</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">MEMBERS</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Rules, Resolutions and Ordinances</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. June Laranang and Kag. Gregorio C. Cruz, Jr.</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Finance and Appropriations</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. June Laranang and Kag. Gregorio C. Cruz, Jr.</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-muted">
                  <div class="title">
                      <h5 class="font-weight-bold">JERICO J. SANTOS</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Peace & Order and Human Rights</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Benjamin S. Zapanta, Jr., Kag. June Laranang</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Transportation & Communication</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Willy Sta. Maria, Kag. Rodel Costoy</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-muted">
                  <div class="title">
                      <h5 class="font-weight-bold">GREGORIO C. CRUZ, JR.</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Public Works and Infrastracture</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Benjamin S. Zapanta, Jr., Kag. Jericho J. Santos</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-muted">
                  <div class="title">
                      <h5 class="font-weight-bold">WILLY C. STA. MARIA</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Ways and Means</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Jericho J. Santos, Kag. Gregorio C. Cruz, Jr.</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Commerce, Trade & Industries</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Benjamin S. Zapanta, Jr., Kag. Gregorio C. Cruz, Jr</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-muted">
                  <div class="title">
                      <h5 class="font-weight-bold">RODEL M. COSTOY</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Education & Culture</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. June Laranang, Kag. Maria Kaela Cruz</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-muted">
                  <div class="title">
                      <h5 class="font-weight-bold">JUNE L. LARANANG</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Environmental Protection</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Benjamin S. Zapanta Jr., Kag. Jericho J. Santos <br>Kag. Gregorio C. Cruz, Jr.</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">BDRRM</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Benjamin S. Zapanta, Jr.</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-muted">
                  <div class="title">
                      <h5 class="font-weight-bold">MARIA KAELA G. CRUZ</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Health & Social Services</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Jericho J. Santos,Kag. June Laranang</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Women & Family Affairs</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Benjamin S. Zapanta, Jr., Kag. Willy Sta. Maria</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-muted">
                  <div class="title">
                      <h5 class="font-weight-bold">JOHN PAUL C. RICARDO</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">SK Chairman- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light">Youth & Sports Development</h6></div>
                        <div class="col-6"><h6 class="font-weight-light">Kag. Rodel Costoy, Kag. Jerico Santos</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-muted">
                  <div class="row">
                    <div class="col-6">
                      <div class="title">
                          <h5 class="font-weight-bold">RELITA G. BRECIA</h5>
                          <h6 class="font-weight-light">Barangay Secretary</h6>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="title">
                          <h5 class="font-weight-bold">LAURA L. BOLOS</h5>
                          <h6 class="font-weight-light">Barangay Treasurer</h6>
                      </div>
                    </div>
                  </div>
                  <hr class="my-2 bg-muted">
                  <br>
                  <div class="container">
                      <div id="navigation-pills">
                       <div class="row">
                          <div class="col-lg-12">
                              <ul class="nav nav-pills nav-pills-icons" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link  active" href="#list_of_subdivisions_of_brgy_san_roque" rel="tooltip" data-original-title="LIST OF SUBDIVISIONS OF BARANGAY SAN ROQUE"  data-placement="top" role="tab" data-toggle="tab">
                                        <i class="material-icons">list</i>
                                        LIST OF SUBDIVISIONS
                                    </a>
                                  </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#list_of_streets_of_brgy_san_roque" role="tab" data-toggle="tab" rel="tooltip" data-original-title="LIST OF STREETS OF BARANGAY SAN ROQUE"  data-placement="top">
                                      <i class="material-icons">list</i>  
                                      LIST OF STREETS
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#brgy_awards_and_achievements" role="tab" data-toggle="tab" rel="tooltip" data-original-title="BARANGAY AWARDS AND ACHIEVEMENTS"  data-placement="top">
                                    <i class="material-icons">diamond</i>  
                                      AWARDS & ACHIEVEMENTS
                                    </a>
                                  </li> 
                            </ul>
                            <div class="tab-content tab-space">
                             
                              <div class="tab-pane active" id="list_of_subdivisions_of_brgy_san_roque">
                                <hr class="my-1 bg-muted">  
                                  <div class="title text-center">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">DM 2, 9 AND 10 SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">GENESIS ROYALE II SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">MADERA I SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">ROSE ANN SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">ST. CHRISTOPHER SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">SUMMERGREEN SUBDIVISION PHASE II</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">VERDER GRANDE</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">BEATRIZ VILLA</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">NORTH 44 </h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">GREENLAND SUBDIVISION PHASE 7 </h6>
                                        </div>
                                    </div>
                                  </div>
                                <hr class="my-1 bg-muted">
                              </div>
                              
                              <div class="tab-pane" id="list_of_streets_of_brgy_san_roque">
                                  <hr class="my-1 bg-muted">  
                                    <div class="title text-center">
                                      <div class="row">
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">A. BONIFACIO ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">E. GONGORA ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">R. DEL VALLE ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">J. HERNANDEZ ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">PAROLA ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">E. TOLENTINO ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">M. CRUZ ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">A. RODRIGUEZ AVE.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">P. DE GUZMAN ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold">NURSERY ROAD</h6>
                                          </div>
                                      </div>
                                    </div>
                                  <hr class="my-1 bg-muted">
                              </div>

                              <div class="tab-pane" id="brgy_awards_and_achievements">
                                <div class="text-left text-justify">
                                  <p>
                                    Barangay San Roque Barangay Anti-Drug Abuse Council (BADAC) continues its mission to reduce level of drug affectation an ultimately achieve drug-free status.
                                  </p>
                                  <p>
                                    During the regular session of the Sangguniang Barangay on October 15, 2018 the SB members approved the resolution on putting up of “Drug-Free Sticker” to every home that is considered free from the influence of illegal drugs. BADAC members started putting up Drug-Free Stickers on November 2, 2018 with the assistance of the Cainta Police Officers.
                                  </p>
                                  <p>
                                    On October 19, 2018, Barangay San Roque BADAC started its first Simula ng Pag-Asa (SIPAG) program wherein the drug surrenderers undergo 12 days seminar for their reintegration into the society and rebuilding them to become more productive citizens. SIPAG sessions were held at the Barangay San Roque Senior Citizen Hall at DM 2. SPO2 Rodil Demonteverde spearheaded the program since he is an expert in the field, Rev. Michael V. Nabo, CBMM Cainta Church Pastor, assisted him.
                                  </p>
                                  <p>
                                    Of the fifty-eight (58) drug surrenderers listed in the file of the barangay, five (5) were issued non-residency certificate since they are either in the province already or nowhere to be found; two (2) were residents of Barangay San Andres and three (3) were already imprisoned. Barangay San Roque send letter of invitation to all of them for them to attend the SIPAG Program but only seventeen (17) attended the first meeting at the barangay on October 15, 2018. However, not all of those who attended the 12 sessions, only ten (10) really complied and were able to graduate last November 19, 2018.
                                  </p>
                                  <p>
                                    Barangay San Roque Barangay Anti-Drug Abuse Council (BADAC) hold SIPAG Batch 2 starting March 11, 2019 at Barangay San Roque Senior Citizens Social Hall at DM 2. Letters were sent to 31 surrenderers who were not able to attend SIPAG batch 1 of the 31 surrenderers who were sent letters, only 15 surrenderers complied and attended SIPAG Batch 2. Last session was held on March 27, 2019. SPO2 Rodil Demonteverde spearheaded the program since he is an expert in the field, Rev. Michael V. Nabo, CBMM Cainta Church Pastor and Pstr. Teofilo C. Jornales, Jr. assisted him.
                                  </p>
                                  <p>
                                    On April 6, 2019, the graduates of SIPAG Batch 2 were required to attend the Barangay San Roque weekly Manila Bay Clean-Up Drive held at Summergreen Phase 2 as a form of community service.
                                  </p>
                                  <p>
                                    Barangay San Roque prepared all the requirements for Drug-Cleared Barangay with the help of SPO2 Rodil Demonteverde and was able to pass all the requirements and after due deliberation and complete submissions of the requirements compliant to the set of parameters on the barangay drug clearing, the Regional Oversight Committee by way of Regional Committee Resolution No. 321 unanimously confirmed the DRUG CLEARED status of Barangay San Roque, Municipality of Cainta, Province of Rizal.
                                  </p>
                                  <p>
                                    Barangay San Roque also submitted all the requirements and is just waiting for the official certification for establishing “Community Mobilizing Project.”
                                  </p>
                                  <p>
                                    Barangay San Roque received from CADAC Certificate of Appreciation for valuable support and contribution to the ongoing fight against illegal drugs and Certificate of Compliance for being fully compliant with early submission of reports and requirement set forth by the Cainta Anti-Drug Abuse Council for continuous implementation of anti-drug abuse programs and activities in the municipality.
                                  </p>
                                </div>
                             
                                  <div class="title text-left">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">Name of Subdivision</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold">No. of Residents</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">DM 2, 9 and 10 Subdivision</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">318</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">Genesis Royale ii Subdivision</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">114</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">Madera I Subdivision</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">866</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">Rose Ann Subdivision </h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">382</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">St. Christopher Subdivision </h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">185</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">Summergreen Subdivision Phase II</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">60</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">Verde Grande Subdivision</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">115</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">Greenland Subdivision Phase 7</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-light">456</h6>
                                        </div>
                                    </div>
                                      <br>
                                      <div class="title">
                                        <h6 class="font-weight-bold">PROPOSED PROGRAMS/PROJECTS FOR INCLUSION IN THE 2019 ANNUAL INVESTMENTS PROGRAM AND 20% DEVELOPMENT FUND</h6>
                                      </div>
                                    <div class="row">
                                     
                                        <div class="col-4">
                                            <h6 class="font-weight-bold">PROGRAMS/ PROJECT</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-bold">LOCATION</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-bold">BRIEF DESCRIPTION/STATUS/REMARKS</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">Rehabilitation of Canals/Drainages</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">Parola & M. Cruz St. (1st& 2nd Sts.)</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">To stop/prevent the flow of water during rainy seas</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">Cementing of Roads</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">MD 2, 9, 10 Subdivision	</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">to give and provide better service to the people</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">Construction of Multi-Purpose Hall</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">R. Del Valle St.</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">to have a pleasant and comfortable facility for the rest</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">Repair/Improvement of Barangay Hall</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">Amang Rodriguez Avenue</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">to have a comfortable and a safe a sound workplace for both employees and constituents </h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">Improvement of Madera I Multipurpose Hall</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">Madera I Subdivision	</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">to have a pleasant and comfortable facility for the rest</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">CCTV Cameras in Strategic Areas</h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light"></h6>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="font-weight-light">to ensure security of the constituents</h6>
                                        </div>
                                      
                                        <div class="col-4 mt-5">
                                            <h6 class="font-weight-light">Prepared and Submitted By:</h6>
                                            <h6 class="font-weight-light">HON. FELIX C. TAGUBA III</h6>
                                            <h6 class="font-weight-light">Punong Barangay</h6>
                                          </div>
                                    </div>
                                  </div>
                                
                               
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  
                </div>
              </div>
            </div>
        
          
          </div>
        </div>
     
     
        
      </div>
    </div>

    <h3 class="text-center title">BARANGAY ORGANIZATIONAL CHART</h4>
    <a href="../assets/img/brgy/brgy_chart.png">
      <div class="navigation-example" style="background-image: url('../assets/img/brgy/brgy_chart.png');">
      </div>
    </a>

    <div class="section section-contacts" id="contact">
          <div class="container">
              <h3 class="text-center title">Contact Us</h4>
                <div id="navigation-pills">
                  <div class="row">
                    <div class="col-lg-12">
                      <ul class="nav nav-pills nav-pills-icons" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link  active" href="#brgy_directory" role="tab" data-toggle="tab">
                            BARANGAY DIRECTORY
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#brief_narrative_description_of_location" role="tab" data-toggle="tab">
                            BRIEF NARRATIVE DESCRIPTION OF LOCATION
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#landmark_with_brief_description" role="tab" data-toggle="tab">
                            LANDMARK WITH BRIEF DESCRIPTION
                          </a>
                        </li>
                      </ul>
                      <div class="tab-content tab-space">
                        
                        <div class="tab-pane active" id="brgy_directory">
                          <hr class="my-1 bg-muted">  
                            <div class="title text-left">
                              <div class="row">
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">Barangay Hall Address:	</h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">Amang Rodriquez Avenue, Barangay San Roque Cainta. Rizal</h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">Barangay E-mail Address: </h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold"><a href="#send_us_email">barangaysanroque@gmail.com</a> </h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">Barangay Telephone Numbers:</h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold"></h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">Secretary/Treasurer:	</h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">8 420-76-07</h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">Information: </h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">8 281-02-06</h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">Tanod:</h6>
                                  </div>
                                  <div class="col-6">
                                      <h6 class="font-weight-bold">8 281-02-50</h6>
                                  </div>
                              </div>
                            </div>
                          <hr class="my-1 bg-muted">
                        </div>
                        
                        <div class="tab-pane" id="brief_narrative_description_of_location">
                            <hr class="my-1 bg-muted">  
                              <div class="title text-left">
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="font-weight-bold">BARANGAY SAN ROQUE is about two (2) Kilometers away from the center of Cainta. It is surrounded by the following barangays:</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Hilaga (North)	:</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Barangay San Juan</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Timog (South) :</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Barangay Sto. Domingo</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Silangan (East) :</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Barangay San Andres</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Kanluran (West) :</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Barangay Santa Rosa</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Classification of Barangay :</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Urban</h6>
                                    </div>
                                </div>
                              </div>
                            <hr class="my-1 bg-muted">
                        </div>

                        <div class="tab-pane" id="landmark_with_brief_description">
                        <hr class="my-1 bg-muted">  
                          <div class="text-left text-justify">
                                <div class="col-12">
                                    <h6 class="font-weight-bold">Barangay San Roque is near the Diocese of Antipolo Shrine and Parish of Our Lady of Light and Jollibee Parola in Cainta, Rizal.</h6>
                                </div>
                                <div class="col-12">
                                    <h6 class="font-weight-bold">Other landmarks are Savemore, Parola and Cainta Municipal Hospital Maternal and Health Hub “Birthing Home” at Amang Rodriquez Avenue.</h6>
                                </div>
                          </div>
                          <hr class="my-1 bg-muted">  
                        </div>
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <h5 class="text-center title">Send Us A Message</h5>
        <div class="row p-2" id="send_us_email">
          <div class="col-md-8 ml-auto mr-auto ">
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

  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
        <img id="image_ann" style="vertical-align: bottom;"  height="350" width="100%"  data-target="#carouselExample" data-slide-to="0">
        <h4 id="title" class="font-weight-bold"></h4>
        <h5 id="body" class="text-justify"></h5>
          
          <div class="link_website">
            <h4>Click <a id="link_websites" href="/" target="_blank">Here</a>. To More Info.</h4>
          </div>
           
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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

    $(document).on('click', '.view', function(){
      $('#viewModal').modal('show');
      $('.link_website').hide();
      var id = $(this).attr('view');
      
      $.ajax({
        url :"/view/"+id,
        dataType:"json",
        beforeSend:function(){
           $(".modal-title").text('Loading...');
        },
        success:function(data){
            $(".modal-title").text('View Announcement');
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).text(value)
                }
                if(key == 'link_website'){
                  if(value == null){
                    $('.link_website').hide();
                  }else{
                    $('.link_website').show();
                    $('#link_websites').prop('href' , value);
                  }
                }
                if(key == 'image'){
                  $('#image_ann').prop("src", '/assets/img/announcements/'+ value);
                }
            })
        }
    })

    });
  </script>
</body>

</html>