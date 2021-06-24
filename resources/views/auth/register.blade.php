@extends('../layouts.site')
@section('sub-title','Register')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <br><br><br>
            
            </div>
          </div>
        </div>
     
      <div class="row">
        <div class="col-lg-6 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
          <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Register</h4>
                <p class="description text-white text-center">All Field Are Required</p>
              </div>
              <br><br>
              <div class="card-body">
              
                <div class="input-group">

                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                  </div>
                  
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name..." value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email..." value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-mobile-alt fa-lg p-1"></i>
                    </span>
                  </div>
                  <input type="number" id="contact_number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" placeholder="Contact Number..." value="{{ old('contact_number') }}" required autocomplete="contact_number">
                    @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker fa-lg p-1"></i>
                    </span>
                  </div>
                  <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address..." value="{{ old('address') }}" required autocomplete="address">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label class="label-control">Date Of Birth</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                     <i class="fas fa-calendar-alt fa-lg p-1"></i>
                    </span>
                  </div>
                  
                  <input type="date" id="date_of_birth" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="Date Of Birth..." value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
                    @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <hr>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password...">
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="Confirm Password...">
                </div>

              </div>
              <br><br><br>
              <div class="footer text-center">
               
                <button type="submit" class="btn btn-primary btn-lg"> Register </button>
              </div>
              <p class="description text-center">Already a member? <a href="/login">Login Now</a> </p>
              <br><br>
            </form>
          </div>
        </div>
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
// script
</script>
@endsection