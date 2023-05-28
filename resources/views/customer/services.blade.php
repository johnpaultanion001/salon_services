@extends('../layouts.customer')
@section('sub-title','SERVICES')

@section('navbar')
    @include('../partials.customer.navbar')
@endsection

@section('content')
<main id="main">

  <section id="pricing" class="pricing mt-5" style="min-height: 80vh;">
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
    </section>

</main>

@endsection

@section('footer')
    @include('../partials.customer.footer')
@endsection

@section('script')
<script>

</script>
@endsection
