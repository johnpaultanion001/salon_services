
@extends('../layouts.resident')
@section('sub-title','Verify Email')

@section('navbar')
    @include('../partials.resident.navbar')
@endsection
@section('style')
<style>
.cta {
    margin-top: 120px;
}

</style>
@endsection
@section('content')

<main id="main" class="section-bg"  style="min-height: 70vh;">
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
                    {{Auth()->user()->email}}
                    <button type="submit" class="btn-primary btn align-middle">Click here to request another</button>
                </div>
              </div>
              
             
          </form>
      </div>
    </section><!-- End Cta Section -->

</main>

@endsection


@section('footer')
    @include('../partials.resident.footer')
@endsection

@section('script')
<script> 

</script>
@endsection


