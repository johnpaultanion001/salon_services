@extends('../layouts.site')
@section('sub-title','HOME')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised"> 

    <div class="section">
      <div class="container">
        <div class="title">
            <h2  class="title text-white">Announcements</h2>
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
            <h3 class=" title text-white">ABOUT {{ trans('panel.site_title') }} </h3>
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
                  <h3 class="font-weight-bold text-white">Vision:</h3>
              </div>
                <div class="blockquote undefined text-white pt-2">
                  <p>
                    An Independent and progressive barangay advocating principles and practices of good governance that help build and nurture honesty responsibility among its public officials and employee and take appropriate measures to promote transparency in transacting with the public.
                  </p>
                </div>
            
          </div>
          <div class="col-md-6">
            <div class="title">
                <h3 class="font-weight-bold text-white">Mission:</h3>
            </div>
                <div class="blockquote undefined text-white pt-2">
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
                      <h3 class="text-center font-weight-bold text-white">BRIEF HISTORY OF BARANGAY SAN ROQUE CAINTA RIZAL</h3>
                  </div>
                    <p class="text-white">
                    BARANGAY SAN ROQUE was established on 1963 and the barrio lieutenant (Tiniente Del Baryo) was appointed by the Municipal Mayor through the recommendation of Municipal Councilor. This creation was based on RA 3590 and was categorized as URBAN barangay with a land are 66.99 hectares with a total population of 8,342 as of 2009 (4,433-female & 3,909-male) with total households of 2,126 and with a total registered voters of 4,746.
                    <br><br>
                    The barangay basic utilities like power supply is from MERALCO and water were coming from the first level Manila Water. Our way of transportation are mobil/patrol and motorcycle, we provide our communication by way of telephone and mobile. The barangay revenues are coming from Local Source, IRA and other barangay generating income.

                    </p>
                </div>
                <div class="col-md-12">
                  <div class="title">
                      <h5 class="font-weight-bold text-white">BARANGAY SAN ROQUE was composed of the following personnel:</h5>
                  </div>
                  <div class="row">
                    <div class="col-md-6 text-white">
                          1 Punong Barangay  <br>
                          7 Barangay Kagawads  <br>
                          1 SK-Chairperson  <br>
                          1 Brgy. Treasurer  <br>
                          8 Brgy. Staffs  <br>
                          12 Environmental Crews   <br>
                    </div>
                    <div class="col-md-6 text-white">
                            18 Barangay Tanods    <br>
                            23 BHW    <br>
                            1 Daycare Worker    <br>
                            10 Volunteer Barangay Lupon    <br>
                            18 Volunteer Brgy. Tanods    <br>
                            7 SK Kagawads  <br>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-left ">
                 
                  <div class="title text-white  text-center">
                      <h5 class="font-weight-bold">LIST OF OFFICIALS</h5>
                  </div>
                  <div class="title text-white">
                      <h5 class="font-weight-bold">FELIX C. TAGUBA III</h5>
                      <h6 class="font-weight-light">Punong Barangay</h6>
                  </div>
                  <hr class="my-2 bg-white">
                  <div class="title text-white">
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
                  <hr class="my-2 bg-white">
                  <div class="title">
                      <h5 class="font-weight-bold text-white">JERICO J. SANTOS</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Peace & Order and Human Rights</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Benjamin S. Zapanta, Jr., Kag. June Laranang</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Transportation & Communication</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Willy Sta. Maria, Kag. Rodel Costoy</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-white">
                  <div class="title">
                      <h5 class="font-weight-bold text-white">GREGORIO C. CRUZ, JR.</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Public Works and Infrastracture</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Benjamin S. Zapanta, Jr., Kag. Jericho J. Santos</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-white">
                  <div class="title">
                      <h5 class="font-weight-bold text-white">WILLY C. STA. MARIA</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Ways and Means</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Jericho J. Santos, Kag. Gregorio C. Cruz, Jr.</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Commerce, Trade & Industries</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Benjamin S. Zapanta, Jr., Kag. Gregorio C. Cruz, Jr</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-white">
                  <div class="title">
                      <h5 class="font-weight-bold text-white">RODEL M. COSTOY</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Education & Culture</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. June Laranang, Kag. Maria Kaela Cruz</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-white">
                  <div class="title">
                      <h5 class="font-weight-bold text-white">JUNE L. LARANANG</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Environmental Protection</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Benjamin S. Zapanta Jr., Kag. Jericho J. Santos <br>Kag. Gregorio C. Cruz, Jr.</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">BDRRM</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Benjamin S. Zapanta, Jr.</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-white">
                  <div class="title">
                      <h5 class="font-weight-bold text-white">MARIA KAELA G. CRUZ</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Kagawad- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Health & Social Services</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Jericho J. Santos,Kag. June Laranang</h6></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Women & Family Affairs</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Benjamin S. Zapanta, Jr., Kag. Willy Sta. Maria</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-white">
                  <div class="title">
                      <h5 class="font-weight-bold text-white">JOHN PAUL C. RICARDO</h5>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">SK Chairman- Committee on:</h6></div>
                        <div class="col-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-6"><h6 class="font-weight-light text-white">Youth & Sports Development</h6></div>
                        <div class="col-6"><h6 class="font-weight-light text-white">Kag. Rodel Costoy, Kag. Jerico Santos</h6></div>
                      </div>
                  </div>
                  <hr class="my-2 bg-white">
                  <div class="row">
                    <div class="col-6">
                      <div class="title">
                          <h5 class="font-weight-bold text-white">RELITA G. BRECIA</h5>
                          <h6 class="font-weight-light text-white">Barangay Secretary</h6>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="title">
                          <h5 class="font-weight-bold text-white">LAURA L. BOLOS</h5>
                          <h6 class="font-weight-light text-white">Barangay Treasurer</h6>
                      </div>
                    </div>
                  </div>
                  <hr class="my-2 bg-white">
                  <br>
                  <div class="container">
                      <div id="navigation-pills">
                       <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                             
                              <div class="col text-right">
                                <ul class="nav nav-pills nav-pills-icons " role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link  active " href="#list_of_subdivisions_of_brgy_san_roque" rel="tooltip" data-original-title="LIST OF SUBDIVISIONS OF BARANGAY SAN ROQUE"  data-placement="top" role="tab" data-toggle="tab">
                                          <i class="material-icons text-white">list</i>
                                          <h6 class="text-white" >LIST OF <br> SUBDIVISIONS</h6>
                                          
                                      </a>
                                    </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#list_of_streets_of_brgy_san_roque" role="tab" data-toggle="tab" rel="tooltip" data-original-title="LIST OF STREETS OF BARANGAY SAN ROQUE"  data-placement="top">
                                        <i class="material-icons text-white">list</i>  
                                        <h6 class="text-white">LIST OF <br> STREETS</h6>
                                        
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="#brgy_awards_and_achievements" role="tab" data-toggle="tab" rel="tooltip" data-original-title="BARANGAY AWARDS AND ACHIEVEMENTS"  data-placement="top">
                                      <i class="material-icons text-white">diamond</i>  
                                      <h6 class="text-white">AWARDS & <br> ACHIEVEMENTS</h6>
                                        
                                      </a>
                                    </li> 
                                </ul>
                              </div>
                              
                             
                            </div>
                              
                            <div class="tab-content tab-space">
                             
                              <div class="tab-pane active" id="list_of_subdivisions_of_brgy_san_roque">
                                <hr class="my-1 bg-white">  
                                  <div class="title text-center">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">DM 2, 9 AND 10 SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">GENESIS ROYALE II SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">MADERA I SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">ROSE ANN SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">ST. CHRISTOPHER SUBDIVISION</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">SUMMERGREEN SUBDIVISION PHASE II</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">VERDER GRANDE</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">BEATRIZ VILLA</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">NORTH 44 </h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold text-white">GREENLAND SUBDIVISION PHASE 7 </h6>
                                        </div>
                                    </div>
                                  </div>
                                <hr class="my-1 bg-white">
                              </div>
                              
                              <div class="tab-pane" id="list_of_streets_of_brgy_san_roque">
                                  <hr class="my-1 bg-white">  
                                    <div class="title text-center">
                                      <div class="row">
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">A. BONIFACIO ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">E. GONGORA ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">R. DEL VALLE ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">J. HERNANDEZ ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">PAROLA ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">E. TOLENTINO ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">M. CRUZ ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">A. RODRIGUEZ AVE.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">P. DE GUZMAN ST.</h6>
                                          </div>
                                          <div class="col-6">
                                              <h6 class="font-weight-bold text-white">NURSERY ROAD</h6>
                                          </div>
                                      </div>
                                    </div>
                                  <hr class="my-1 bg-white">
                              </div>

                              <div class="tab-pane" id="brgy_awards_and_achievements">
                                <div class="text-left text-justify text-white">
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
                             
                                <div class="title text-left text-white">
                                    <div class="row">
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-bold">Name of Subdivision</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-bold">No. of Residents</h6>
                                        </div>
                                       
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">DM 2, 9 and 10 Subdivision</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">318</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">Genesis Royale ii Subdivision</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">114</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">Madera I Subdivision</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">866</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">Rose Ann Subdivision </h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">382</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">St. Christopher Subdivision </h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">185</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">Summergreen Subdivision Phase II</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">60</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">Verde Grande Subdivision</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">115</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
                                            <h6 class="font-weight-light">Greenland Subdivision Phase 7</h6>
                                        </div>
                                        <div class="col-6" style="border: 1px solid #fff">
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
<div class="container">
<h3 class="text-center title text-white">BARANGAY ORGANIZATIONAL CHART</h4>
    <a href="../assets/img/brgy/brgy_chart.png">
      <div class="card border-0 brgy_chart">
          <img src="../assets/img/brgy/brgy_chart.png" alt="BARANGAY ORGANIZATIONAL CHART">
      </div>
    </a>
</div>
   


    <div class="section section-contacts" id="contact">
          <div class="container">
              <h3 class="text-center title text-white">Contact Us</h4>
                <div id="navigation-pills">
                  <div class="row">
                    <div class="col-lg-12">
                      <ul class="nav nav-pills nav-pills-icons" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link text-white  active" href="#brgy_directory" role="tab" data-toggle="tab">
                            BARANGAY <br> DIRECTORY
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="#brief_narrative_description_of_location" role="tab" data-toggle="tab">
                            DESCRIPTION <br> OF LOCATION
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="#landmark_with_brief_description" role="tab" data-toggle="tab">
                            LANDMARK WITH <br> BRIEF DESCRIPTION
                          </a>
                        </li>
                      </ul>
                      <div class="tab-content tab-space">
                        
                        <div class="tab-pane active" id="brgy_directory">
                          <hr class="my-1 bg-white">  
                            <div class="title text-left">
                              <div class="row">
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Barangay Hall Address:	</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Amang Rodriquez Avenue, Barangay San Roque Cainta. Rizal</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Barangay E-mail Address: </h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white"><a href="#send_us_email" class="text-white">barangaysanroque@gmail.com</a> </h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Barangay Telephone Numbers:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white"></h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Secretary/Treasurer:	</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">8 420-76-07</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Information: </h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">8 281-02-06</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Tanod:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">8 281-02-50</h6>
                                  </div>
                              </div>
                            </div>
                          <hr class="my-1 bg-white">
                        </div>
                        
                        <div class="tab-pane" id="brief_narrative_description_of_location">
                            <hr class="my-1 bg-white">  
                              <div class="title text-left">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="font-weight-bold text-white">BARANGAY SAN ROQUE is about two (2) Kilometers away from the center of Cainta. It is surrounded by the following barangays:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Hilaga (North)	:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Barangay San Juan</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Timog (South) :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Barangay Sto. Domingo</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Silangan (East) :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Barangay San Andres</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Kanluran (West) :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Barangay Santa Rosa</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Classification of Barangay :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-white">Urban</h6>
                                    </div>
                                </div>
                              </div>
                            <hr class="my-1 bg-white">
                        </div>

                        <div class="tab-pane" id="landmark_with_brief_description">
                        <hr class="my-1 bg-white">  
                          <div class="text-left text-justify">
                                <div class="col-md-12">
                                    <h6 class="font-weight-bold text-white">Barangay San Roque is near the Diocese of Antipolo Shrine and Parish of Our Lady of Light and Jollibee Parola in Cainta, Rizal.</h6>
                                </div>
                                <div class="col-md-12">
                                    <h6 class="font-weight-bold text-white">Other landmarks are Savemore, Parola and Cainta Municipal Hospital Maternal and Health Hub “Birthing Home” at Amang Rodriquez Avenue.</h6>
                                </div>
                          </div>
                          <hr class="my-1 bg-white">  
                        </div>
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <h5 class="text-center title text-white">Send Us A Message</h5>
        <div class="row p-2" id="send_us_email">
          <div class="col-md-8 ml-auto mr-auto ">
            <form class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating text-white">Your Name</label>
                    <input type="email" class="form-control text-white">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating text-white">Your Email</label>
                    <input type="email" class="form-control text-white">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating text-white">Your Message</label>
                <textarea type="email" class="form-control text-white" rows="4" id="exampleMessage"></textarea>
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
@endsection


@section('footer')
    @include('../partials.site.footer')
@endsection


@section('script')
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
@endsection