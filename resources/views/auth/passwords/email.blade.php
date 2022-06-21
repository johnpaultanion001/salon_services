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
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}" class="myform">  
              @csrf
                
                <div class="card">
                  <div class="text-center px-3 px-md-4 py-0 mt-2">
                      <img  src="{{ trans('panel.logo') }}" alt="logo" class="z-depth-2">
                      <hr>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="form-group">
                              <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}"  aria-label="Email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="mt-2">{{ __('Send Password Reset Link') }}</button>
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

