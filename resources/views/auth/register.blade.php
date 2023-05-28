@extends('../layouts.customer')
@section('sub-title','REGISTER')

@section('navbar')
    @include('../partials.customer.navbar')
@endsection
@section('style')
<style>

</style>
@endsection

@section('content')

<main id="main">
  <section class="contact mt-5 section-bg" style="min-height: 80vh;">
    <div class="container">
        <div class="section-title" data-aos="zoom-out">
          <h2 class="text-white">Register</h2>
          <p class="text-white">Complete all required fields</p>
        </div>

        <div class="row mt-2">
          <div class="col-lg-6 mt-lg-0 mx-auto" data-aos="fade-left">
            <form method="POST" action="{{ route('register') }}" class="myform">
              @csrf
                <div class="card">
                  <div class="text-center px-3 px-md-4 py-0 mt-2">
                        <h2>LOGO</h2>
                      <hr>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="form-group">
                              <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}"  aria-label="Email" autofocus>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password">
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          <div class="form-group">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password" aria-label="Password">
                          </div>
                          <div class="form-group form-check m-2">
                            <input type="checkbox" class="form-check-input show_terms_and_condition @error('terms_and_conditions') is-invalid @enderror" style="cursor: pointer;" name="terms_and_conditions" id="terms_and_conditions">
                            <label class="form-check-label text-uppercase text-primary show_terms_and_condition" style="font-size: 14px; cursor: pointer;">I understand and accept the terms and conditions</label>
                            @error('terms_and_conditions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="mt-2">Submit</button>
                      </div>

                      <p class="text-center mt-3 color-black" style="font-size: 15px; font-weight: 500;">Already have an account? <a href="/login"><b class="color-black" style="font-weight: 700">Log In here</b></a></p>
                  </div>
                </div>
            </form>


          </div>
        </div>

    </div>
  </section>
</main>

<div class="modal fade" id="tacModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">TERMS AND CONDITIONS AGREEMENT</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times text-primary"></i>
            </button>
        </div>
        <div class="modal-body p-3">
            <p>Please read these terms and conditions carefully before using the E-Barangay Portal operated by Barangay San Isidro.</p>
            <b>Conditions of use</b>
            <p>By using this website, you certify that you have read and reviewed this agreement and that you agree to comply with its terms. If you do not want to be bound by these terms, you are advised to leave the website accordingly. E-Barangay only grants use and access of this website, its features and functionalities to those who have accepted its terms.</p>
            <b>Privacy policy</b>
            <p>E-Barangay reserves the right to collect personal information such as name, address, valid ID image, requirements images and files and proof of payments. E-Barangay protects the given information and affirmed to the Data Privacy Act: Republic Act 10173 that seeks to protect all forms of information, be it private, personal, or sensitive. It is meant to cover both natural and juridical persons involved in the processing of personal information.</p>
            <b>Age restriction</b>
            <p>You must be at least 18 (eighteen) years of age before you can use this website. By using this website, you warrant that you are at least 18 years of age and you may legally adhere to this agreement.</p>
            <b>Intellectual property</b>
            <p>You agree that all materials and services on this website are property of E-Barangay portal , its affiliates, officers, employees, administrators and licensors including all copyrights, trademarks, patents and other intellectual property. You also agree that you will not reproduce any information on the website including the downloadable and/or printable documents.
                <br>
                You grant E-Barangay a royalty-free and non-exclusive license to display, use, copy, transmit, and broadcast the content you upload and publish. For issues regarding intellectual property claims, you should contact the company in order to come to an agreement.
            </p>
            <b>User accounts</b>
            <p>As a user of this website, you will be asked to create an account and provide information. You are responsible for ensuring the accuracy of this information, and that you are responsible for maintaining the safety and security of your identifying information. You are also responsible for all activities that occur under your account or password.
                <br>
                If you think there are any possible issues regarding the security of your account on the website, inform us immediately so we may address them accordingly.
                <br>
                We reserve all rights to terminate or deactivate accounts, and edit or remove content.
            </p>
            <b>Applicable law</b>
            <p>By visiting this website, you agree that the laws of the Philippines, without regard to principles of conflict laws, will govern these terms and conditions, or any dispute of any sort that might come between E-Barangay and you, or its business partners and associates.</p>
            <b>Indemnification </b>
            <p>You agree to indemnify E-Barangay and its affiliates and hold E-Barangay harmless against legal claims and demands that may arise from your use or misuse of our services. We reserve the right to select our own legal counsel.</p>
            <b>Limitation on liability </b>
            <p>E-Barangay  is not liable for any damages that may occur to you as a result of your misuse of our website.E-Barangay reserves the right to edit, modify, and change this agreement at any time. We shall let our users know of these changes through electronic mail. This agreement is an understanding between E-Barangay and the user, and this supersedes and replaces all prior agreements regarding the use of this website.</p>
            <div class="text-center">
              <input type="button" id="tacConfirm" class="btn btn-primary text-uppercase" value="All Agreed to the Terms and Conditions"/>
          </div>
        </div>

        </div>
    </div>
</div>


@endsection

@section('footer')
    @include('../partials.customer.footer')
@endsection

@section('script')
<script>

$(document).on('click', '.show_terms_and_condition', function(){
            $('#tacModal').modal('show');
            $('#terms_and_conditions').prop('checked', false);
});

$(document).on('click', '#tacConfirm', function(){
    $('#tacModal').modal('hide');
    $('#terms_and_conditions').prop('checked', true);
});

</script>
@endsection

