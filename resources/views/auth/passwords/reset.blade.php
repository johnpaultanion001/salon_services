@extends('../layouts.resident')
@section('sub-title','FORGOT PASSWORD')

@section('navbar')
    @include('../partials.resident.navbar')
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
          <h2>{{ __('Reset Password') }}</h2>
        </div>
        <div class="row mt-2">
          <div class="col-lg-6 mt-lg-0 mx-auto" data-aos="fade-left">
            <form method="POST" action="{{ route('password.update') }}" class="myform">  
              @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="card">
                  <div class="text-center px-3 px-md-4 py-0 mt-2">
                      <img  src="{{ trans('panel.logo') }}" alt="logo" width="100" height="100" class="z-depth-2">
                      <hr>
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                          <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                          <div class="form-group">
                            <input id="password-confirm" type="password" placeholder="Password Confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="mt-2">{{ __('Reset Password') }}</button>
                      </div>
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


