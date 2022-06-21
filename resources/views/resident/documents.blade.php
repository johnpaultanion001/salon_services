@extends('../layouts.resident')
@section('sub-title','DOCUMENTS')

@section('navbar')
    @include('../partials.resident.navbar')
@endsection

@section('content')
<main id="main">
 <section id="pricing" class="pricing mt-5 section-bg" style="min-height: 80vh;">
      <div class="container" data-aos="fade-up"> 

        <div class="section-title" data-aos="zoom-out">
          <h2>Documents</h2>
          <p>Requesting a document</p>
        </div>

        <div class="row">
          @foreach($documents as $document)
          <div class="col-lg-3 mt-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3 class="text-uppercase">{{$document->name ?? ''}}</h3>
              <h4><sup>₱</sup>{{$document->amount ?? ''}}<span>per request</span></h4>
              
              <ul style="min-height: 170px;">
                  <span class="text-dark">Requirements</span>
                  @foreach($document->requirements()->get() as $requirement)
                      <li><i class="bx bx-file"></i>{{$requirement->name ?? ''}}</li>
                  @endforeach
                  
              </ul>
              <div class="text-center">
                <a href="/resident/request_document/{{$document->id}}" class="buy-btn">Request Now</a>
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
    @include('../partials.resident.footer')
@endsection

@section('script')
<script> 

</script>
@endsection
