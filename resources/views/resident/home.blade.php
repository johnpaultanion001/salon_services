@extends('../layouts.resident')
@section('sub-title','HOME')

@section('navbar')
    @include('../partials.resident.navbar')
@endsection

@section('content')
<div class="page-header min-vh-100">
  <div class="container">
    <div class="row">
      <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
        <span class="mask bg-gradient-primary opacity-1"></span>
        Home
      </div>
      <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
        background-size: cover;">
          <span class="mask bg-gradient-primary opacity-6"></span>
          <h4 class="mt-5 text-white font-weight-bolder position-relative">"Lorem ipsum lorem ipsum"</h4>
          <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
        </div>
      </div>
    </div>
  </div>
</div>
 
@endsection


@section('script')
<script> 

</script>
@endsection