
@extends('../layouts.resident')
@section('sub-title','Verify Email')

@section('navbar')
    @include('../partials.resident.navbar')
@endsection
@section('style')
<style>
.cta {
    margin-top: 100px;
}

</style>
@endsection
@section('content')

<main id="main">
   <!-- ======= Cta Section ======= -->
   <section id="cta" class="cta">
      <div class="container">
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <div class="row" data-aos="zoom-out">
                <div class="col-lg-9 text-center text-lg-start mx-auto">
                  <h3>Verify Your Email Address</h3>
                    @if (session('resent'))
                        <p class="text-warning">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </p>
                    @endif
                    <button type="submit" class="cta-btn align-middle">click here to request another</button>
                </div>
              </div>
              
             
          </form>
      </div>
    </section><!-- End Cta Section -->

</main>

@endsection


@section('script')
<script> 

</script>
@endsection


