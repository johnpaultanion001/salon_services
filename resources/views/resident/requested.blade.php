  
@extends('../layouts.resident')
@section('sub-title','Documents')

@section('navbar')
    @include('../partials.resident.navbar')
@endsection

@section('style')
<style>
    .pricing .box {
        text-align: left;
    }
    .pricing .btn-wrap {
        text-align: right;
    }
</style>
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

  </section>

 <section id="pricing" class="pricing">
    <div class="container">

      <div class="section-title" data-aos="zoom-out">
        <h2>Documents</h2>
        <p>Manage Requested Document</p>
      </div>

      <div class="row">
        @foreach($requests as $request)
        <div class="col-lg-4 col-md-6 mt-5">
          <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
            <h3>{{$request->document->name ?? ''}}</h3>
            <ul>
              <li class="font-weight-bold text-warning">Status: {{$request->status}}</li>
              <li class="font-weight-bold">Date Needed: {{$request->date_you_need}}</li>
            </ul>
              <p>
                  <a id="messages_count{{$request->id}}" class="link-primary" data-toggle="collapse" href="#collapseExample{{$request->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                    {{$request->messages()->count()}}  Message{{$request->messages()->count() == 0 ? '':'s'}} 
                  </a>
              </p>
              <div class="collapse" id="collapseExample{{$request->id}}">
                  <div class="card card-body text-left">
                      <form method="post" class="myMsgForm">
                          @csrf
                          <div class="input-group">
                              <input type="text" class="form-control msg" name="message" required>
                              <input type="hidden" class="form-control" name="request_id" value="{{$request->id}}">
                              <div class="input-group-append">
                                  <span class="input-group-text"><button  type="submit" class="btn" style="background-color:transparent" ><i class="fa fa-chevron-right"></i></button></span>
                                  
                              </div>
                          </div>
                      </form>
                      <div id="msg_section{{$request->id}}">
                          @foreach($request->messages()->get() as $msg)
                          <hr>
                              <b> {{$msg->user->name ?? $msg->user->resident->first_name .' '. $msg->user->resident->last_name}}</b>  <br>{{$msg->message ?? ''}} <br>
                          @endforeach
                      </div>
                  </div>
              </div>
            <div class="btn-wrap">
              <a href="#" class="btn btn-primary edit" edit="{{$request->id}}">Edit</a>
              <a href="#" class="btn btn-danger cancel" cancel="{{$request->id}}">Cancel</a>
            </div>
          </div>
          
          
        </div>
        @endforeach
      </div>

    </div>
  </section>

</main><!-- End #main -->
<form method="post" id="myForm" class="contact-form">
    @csrf
    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-uppercase font-weight-bold">Doctor Form</h5>
            <button type="button" class="close" data-dismiss="modal" style="background-color:transparent" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">

                <div class="form-group">
                    <label class="control-label text-uppercase  h6" >Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-name"></strong>
                    </span>
                </div>
               




               
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer bg-white">
                <button type="button" class="btn btn-white text-uppercase" data-dismiss="modal">Close</button>
                <input type="submit" name="action_button" id="action_button" class="text-uppercase btn btn-primary" value="Sumbit" />
            </div>
        </div>
      </div>
    </div>
  </form>
@endsection

@section('footer')
    @include('../partials.resident.footer')
@endsection

@section('script')
<script> 
$('.myMsgForm').on('submit', function(event){
    event.preventDefault();

    $.ajax({
        url: "/resident/message",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){

        },
        success:function(data){
            var messages = '';
            $.each(data.messages, function(key,value){
                messages += '<hr> <b>'+value.name+'</b>  <br>'+value.msg+' <br>';
            });
            $('#msg_section'+data.request_id).empty().append(messages);
            $('.msg').val('');
            $('#messages_count'+data.request_id).text(data.msg_count)
        }
    });
});

$(document).on('click', '.edit', function(){
    $('#myModal').modal('show');
   
});

</script>
@endsection
