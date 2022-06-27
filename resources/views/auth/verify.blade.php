
@extends('../layouts.resident')
@section('sub-title','Verify Email')

@section('navbar')
    @include('../partials.resident.navbar')
@endsection

@section('content')

<main id="main">
  <section class="contact mt-5 section-bg" style="min-height: 80vh;">
    <div class="container">
        <div class="row mt-2">
          <div class="col-lg-6 mt-lg-0 mx-auto" data-aos="fade-left">
            
            <form class="myform" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <div class="card">
                    <div class="text-center mt-2">
                        <img  src="{{ trans('panel.logo') }}" alt="logo"  class="z-depth-2">
                        <hr>
                    </div>
                    
                    <div class="section-title" data-aos="zoom-out">
                        <h2>Verify your email address</h2>
                        @if (session('resent'))
                            <p class="text-success">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </p>
                        @endif
                        <p class="p-3">
                            we've sent an email to <b>{{auth()->user()->email}}</b> to verify your email address and activate your account. The link in the email will expire in 60 minutes.
                           <button type="submit" class="text-primary" style="padding: 0; background-color:transparent; text-transformation: none;">Click here</button> if you did not receive an email
                        </p>
                    </div>
              </div>
            
            </form>
          </div>
        </div>
    </div>
  </section>
</main>


@endsection


@section('footer')
    @include('../partials.resident.footer')
@endsection

@section('script')
<script> 

</script>
@endsection


