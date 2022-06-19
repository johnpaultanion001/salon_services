
  
@extends('../layouts.resident')
@section('sub-title','HOME')

@section('navbar')
    @include('../partials.resident.navbar')
@endsection

@section('content')
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>{{ trans('panel.site_title') }}</h1>
          <h2>Making document requests easily accessible anywhere, anytime</h2>
          

          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="/register" class="btn-get-started scrollto">Register Now</a>
            
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="resident/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>

  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              E- Barangay Portal serves as an online gateway in serving residents seamlessly by providing a more accessible and hassle-free way of processing and requesting documents online.
            </p>
            <ul>
              <p>Why Use E- Barangay?</p>
              <li><i class="ri-check-double-line"></i>Skip the long lines and waiting time of personally going to Barangay.</li>
              <li><i class="ri-check-double-line"></i>Access your account and keep track of your records online.</li>
              <li><i class="ri-check-double-line"></i>Transact and contact our Barangay Staff online with just one chat away for any questions and concerns you have.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              E-Barangay Portalis an online service portal which aims to ease the processing and issuance of documents needed by local residents in a municipality subdivided into Barangays. E-Barangay Portal serves as a gateway for a hassle free transaction. 
            </p>
           
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3><strong>Frequently Asked Questions</strong></h3>
              
            </div>

            <div class="accordion-list">
              <ul>
                <div class="row">
                      <li>
                        <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> I’m a new user. How do I make a document request?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                          <p>
                          Request document in just 3 easy steps! First, register an account by clicking the ‘Register now’ button found on the top of the homepage. Input the required information and insert a profile picture. (Please make sure your profile picture is really you with no filters and edits with your face fully visible.) Finally, click submit and wait for the staff to verify the information you submitted and you will receive an email notification once your account is already approved. Once approved, you’re all good to go in requesting a document.
                          </p>
                        </div>
                      </li>
                      <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span>  I already have an account. How do I make a document request? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                          <p>
                          Log in to your account by clicking the Login button found on the upper right corner under Accounts. Click the request document on your profile dashboard and there, you will see the documents available for request as well as the price and requirements needed for requesting.
                          </p>
                        </div>
                      </li>
                      <li>
                          <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> What are the payment options and how can I submit a proof of payment? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                          <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                            <p>
                            You can pay your requested documents through GCash or Paymaya. Just click on Pay Bills>Government>E-Barangay and input the amount you need to pay. Download a receipt or take a screenshot of your payment and attach it to the proof of payment section that will appear once you click on the ‘Request Now’ button. Please wait for 24-48 hours for the confirmation of your payment and you will be notified on your account dashboard once your document is ready for claiming.
                            </p>
                          </div>
                      </li>
                      <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>04</span> How long will I wait for my requested document to be claimed?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                          <p>
                          Once payment has been made and verified, please wait for 2-7 business days for claiming your documents as it may vary depending on your preferred claiming option as well as your address and the requirements you have submitted. (See reminders to remember when submitting requirements here.)
                          </p>
                        </div>
                      </li>
                      <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5" class="collapsed"><span>05</span> What are the payment options and how can I submit a proof of payment? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                          <p>
                          If your document request has been declined, it may be because the requirements you have submitted are wrong, incomplete or unclear. Your proof of payment as well may be unverified. Please make sure to note the things you should remember when submitting your requirements as well as your proof of payment. (See reminders to remember when submitting requirements here.)
                          </p>
                        </div>
                      </li>
                      <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-6" class="collapsed"><span>06</span> I forgot my password. Can I make another account?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-6" class="collapse" data-bs-parent=".accordion-list">
                          <p>
                              If you have forgotten your password, you can click on the Login button and there, you will see a “Forgot your password?” button. Just click on it and enter the email address you used in registering and you will receive a reset password link on your email. If problem still persists, feel free to reach out on our email: ebrangayassistance@gmail.com
                          </p>
                        </div>
                      </li>
                      <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-7" class="collapsed"><span>07</span> What is the age requirement for registering an account and requesting a document? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-7" class="collapse" data-bs-parent=".accordion-list">
                          <p>
                          The age requirement should be 18 years old above. For residents 17 years old below, please provide a letter of consent from your parents/guardian and attach the document on the requirements.
                          </p>
                        </div>
                      </li>
                      <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-8" class="collapsed"><span>08</span>Can I make two or more requests at a time?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-8" class="collapse" data-bs-parent=".accordion-list">
                          <p>
                            Yes, there is no limit for document requests. However, please take note that the claiming date may take longer than usual if you have multiple requests to give enough time to process your documents.
                          </p>
                        </div>
                      </li>
                      <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-9" class="collapsed"><span>09</span>I’m an elder woman/man, I don’t know how to navigate through your website and I don’t have anyone with me to assist with my document request. Is there any other way to make a request?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-9" class="collapse" data-bs-parent=".accordion-list">
                          <p>
                            No worries! If you are not able to request documents by our portal, feel free to call us on this number: 123-456-789/09123456789/0987654321 and we’ll set up your account and help you throughout your document requests.
                          </p>
                        </div>
                      </li>
                      <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-10" class="collapsed"><span>10</span>  I mistakenly requested a wrong document and have paid for it already. Will I be able to get a refund?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-10" class="collapse" data-bs-parent=".accordion-list">
                          <p>
                              If you have mistakenly requested a wrong document, you can cancel your request and your payment will be refunded to you via GCash or Paymaya once our team messaged you on your portal, but please take note that once claiming date has already appeared on your portal, we can no longer issue a refund as the document has already been made.
                          </p>
                        </div>
                      </li>
                </div>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Register and Login Account</a></h4>
              <p>With E-Barangay, you are able to create and manage your account online and keep track of your records and transactions.</p>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Hassle-free Online Documents Requesting and Processing</a></h4>
              <p>No more waiting in lines – We’ve got you! With the E-Barangay portal, you can finally request and process documents without the need of going personally to your Barangays!</p>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Easily Accessible Payments</a></h4>
              <p>We provide an easy way of paying your documents through GCash or Paymaya.</p>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Various Claiming Options</a></h4>
              <p>We provide you three claiming options to choose from depending on your preference! You can claim it directly on your Barangay, have it delivered on your own doorstep or just print it readily.</p>
            </div>
          </div>
        

        </div>

      </div>
    </section><!-- End Services Section -->

   

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Available Documents</h2>
          <p>To request a document, click the Request Now button.</p>
        </div>

        <div class="row">
          @foreach($documents as $document)
            <div class="col-lg-3 " data-aos="fade-up" data-aos-delay="200">
              <div class="box featured">
                <h3 class="text-uppercase">{{$document->name ?? ''}}</h3>
                <h4><sup>₱</sup>{{$document->amount ?? ''}}<span>per request</span></h4>
                
                <ul>
                    <span class="text-dark">Requirements</span>
                    @foreach($document->requirements()->get() as $requirement)
                        <li><i class="bx bx-file"></i>{{$requirement->name ?? ''}}</li>
                    @endforeach
                    
                </ul>
                <a href="/resident/request_document/{{$document->id}}" class="buy-btn mx-auto">Request Now</a>
              </div>

                
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Pricing Section -->

    
     <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 mt-2">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100" style="height: 250px;">
              <div class="pic"><img src="resident/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>John Paul Tanion</h4>
                <span>Web Developer</span>
                <p>I am in charge of checking the requested documents and management of residents thoroughly done by the staff as well as maintaining and ensuring the portal’s features are working accordingly.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-2">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100" style="height: 250px;">
              <div class="pic"><img src="resident/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Jaslen Magalong</h4>
                <span>Graphic Designer/Editor/Documentation Writer/Proofreader</span>
                <p>I am responsible for the graphics and design used in the portal as well as doing the documentation of the research, proofreading the submitted documents by my team and assigning the tasks that need to be done.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-2">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100" style="height: 250px;">
              <div class="pic"><img src="resident/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Neil Faustino</h4>
                <span>Documentation Writer</span>
                <p>I am assigned as one of the writers for the research and make sure that I am dependable on the tasks assigned to me.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-2">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100" style="height: 250px;">
              <div class="pic"><img src="resident/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Judito Rosco</h4>
                <span>Documentation Writer</span>
                <p>I take part as one of the writers for our research and plot out the flow of our system assuring that it is well-understood so that our website can work smoothly to the best of my efforts.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-2 mx-auto">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100" style="height: 250px;">
              <div class="pic"><img src="resident/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Emmanuel Balisalisa</h4>
                <span>Documentation Writer</span>
                <p>I assist the team in writing the research by helping with the flow of the system and also do other tasks I am assigned with.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
       
        </div>

      </div>
    </section>
   
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>San Isidro Barangay Hall, Taytay, Rizal</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>ebarangayassistance@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+63 977 666 8820</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.3795336355483!2d121.13165972545121!3d14.577436528287816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c77a9e148b63%3A0xb2e05fb8154ee03!2sSan%20Isidro%20Barangay%20Hall!5e0!3m2!1sen!2sph!4v1655470065200!5m2!1sen!2sph" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="myform">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>
@endsection

@section('footer')
    @include('../partials.resident.footer')
@endsection

@section('script')
<script> 

</script>
@endsection
 