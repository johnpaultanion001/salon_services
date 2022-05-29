  
@extends('../layouts.resident')
@section('sub-title','Documents')

@section('navbar')
    @include('../partials.resident.navbar')
@endsection

@section('content')
<main id="main">
<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->
 <!-- ======= Services Section ======= -->
 <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Documents</h2>
          <p>Requesting a document</p>
        </div>

        <div class="row">
          @foreach($documents as $document)
          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
              <h3>{{$document->name ?? ''}}</h3>
              <h4><sup>₱</sup>{{$document->amount ?? ''}}<span> / request</span></h4>
              <ul>
                <li class="font-weight-bold">Requirements</li>
                  @foreach($document->requirements()->get() as $requirement)
                    <li>{{$requirement->name ?? ''}}</li>
                  @endforeach
              </ul>
              <div class="btn-wrap">
                <a href="/resident/request_document/{{$document->id}}" class="btn-buy">Request Now</a>
              </div>
            </div>
          </div>
          @endforeach
         
          
        </div>

      </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->
@endsection

@section('footer')
    @include('../partials.resident.footer')
@endsection

@section('script')
<script> 

</script>
@endsection
