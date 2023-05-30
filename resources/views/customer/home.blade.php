

@extends('../layouts.customer')
@section('sub-title','HOME')

@section('navbar')
    @include('../partials.customer.navbar')
@endsection

@section('content')
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12s" data-aos="fade-up" data-aos-delay="200">
          <h1  class="text-dark">{{ trans('panel.site_title') }}</h1>
          <h2  class="text-dark">Making document requests easily accessible anywhere, anytime</h2>


            <a href="/customer/appointment_service/" class="btn-get-started scrollto">Appointment Now</a>

        </div>
      </div>
    </div>

  </section>

  <main id="main">

   <!-- ======= Pricing Section ======= -->
   <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>SERVICES APPOINTMENT</h2>
          <p>To appoint a services, click the Appointment button.</p>
        </div>

        <div class="row">
          @foreach($services as $service)
            <div class="col-lg-3 mt-2" data-aos="fade-up" data-aos-delay="200">
              <div class="box featured">
                <h3 class="text-uppercase">{{$service->name ?? ''}}</h3>
                <h4><sup>₱</sup>{{$service->amount ?? ''}}<span>per service</span></h4>

                <ul style="min-height: 170px;">
                    <span class="text-dark">{{$service->description ?? ''}}</span>
                </ul>
                <div class="text-center mb-0">
                  <a href="/customer/appointment_service/{{$service->id}}" class="buy-btn mx-auto">Appointment</a>
                </div>


              </div>


            </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Pricing Section -->
 <!-- ======= Services Section ======= -->
 <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2  class="text-white">Feedback</h2>
        </div>

        <div class="row">
            @foreach($feedbacks as $feedback)
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                    <p>{{$feedback->feedback ?? ''}}</p>
                    </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
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

                </div>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->






     <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class="text-white">Our Top Employee</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 mt-2">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100" style="height: 250px;">

              <div class="member-info">
              <h4>Test test</h4>
                <span>Lorem Ipsum</span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-2">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100" style="height: 250px;">
              <div class="member-info">
              <h4>Test test</h4>
                <span>Lorem Ipsum</span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-2">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100" style="height: 250px;">
              <div class="member-info">
              <h4>Test test</h4>
                <span>Lorem Ipsum</span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-2">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100" style="height: 250px;">
              <div class="member-info">
                <h4>Test test</h4>
                <span>Lorem Ipsum</span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
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
                <p>test test, Antipolo, Rizal</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>test@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+63 977 666 3213</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247029.41995957808!2d120.9338512564153!3d14.665321226720014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397bf0c8d8310c5%3A0x34dc8e5a7fbf80a3!2sAntipolo%2C%20Rizal!5e0!3m2!1sen!2sph!4v1684656967928!5m2!1sen!2sph" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>

            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form method="post" id="myForm" class="myform">
              @csrf
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name<span class="text-danger"> * </span></label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email<span class="text-danger"> * </span></label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject">
              </div>
              <div class="form-group">
                <label for="name">Message<span class="text-danger"> * </span></label>
                <textarea class="form-control" name="message" style="height: 180px;" required></textarea>
              </div>
              <div class="my-3">
                <div class="sent-message sent">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center">
              <button type="submit" id="btn-action">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>
@endsection

@section('footer')
    @include('../partials.customer.footer')
@endsection

@section('script')
<script>
$('#myForm').on('submit', function(event){
    event.preventDefault();
    $.ajax({
          url: "/send_msg",
          method:"POST",
          data:$(this).serialize(),
          dataType:"json",
          beforeSend:function(){
            $('#btn-action').text('Sending..')
            $('#btn-action').attr('disabled', true)
          },
          success:function(data){
              $('#btn-action').text('Send Message')
              $('#btn-action').attr('disabled', false)
              $('.sent-message').removeClass('sent');
              $('#myForm')[0].reset();
          }
      });

});
</script>
@endsection
