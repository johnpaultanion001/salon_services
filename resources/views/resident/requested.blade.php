  
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

 <section id="pricing" class="pricing" style="min-height: 80vh;">
    <div class="container">

      <div class="section-title" data-aos="zoom-out">
        <h2>Documents</h2>
        <p>Manage Requested Document</p>
      </div>

      <div class="row">
        @foreach($requests as $request)
        <div class=" col-md-6 mt-5">
          <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
            <h3>{{$request->document->name ?? ''}}</h3>
            <ul class="list-group list-group-flush text-uppercase">
              <div class="row mx-auto">
                <div class="col-lg-6">
                  <li class="font-weight-bold">
                    <span class="badge bg-dark" style="font-size: 15px;">{{$request->request_number ?? ''}}</span>
                    <p>Request Number</p>
                  </li>
                </div>
                <div class="col-lg-6">
                   <li class="font-weight-bold">
                    <span class="badge bg-dark" style="font-size: 15px;">{{$request->date_you_need ?? ''}}</span>
                    <p>Date Needed</p>
                  </li> 
                </div>
                <div class="col-lg-6">
                  <li class="font-weight-bold">
                    <span class="badge bg-primary" style="font-size: 15px;">{{$request->claiming_option ?? ''}}</span>
                    <p>Claimed Option</p>
                  </li>
                </div>
                @if($request->downloadable != null)
                  <div class="col-lg-6">
                    <li class="font-weight-bold">
                      <span class="btn-link" style="font-size: 15px;"><a href="/resident/downloadable_file/{{$request->downloadable ?? ''}}" target="_blank">{{$request->downloadable ?? 'test'}}</a></span>
                      <p>Downloadable File</p>
                    </li> 
                  </div>
                @endif
                <div class="col-lg-6">
                  <li class="font-weight-bold">
                    <span class="badge badge-sm {{$request->status == 'PENDING' ? 'bg-warning' : ''}}  {{$request->status == 'APPROVED' ? 'bg-success' : ''}} {{$request->status == 'COMPLETED' ? 'bg-primary' : ''}} {{$request->status == 'CANCELED' || $request->status == 'DECLINED' ? 'bg-danger' : ''}}" style="font-size: 15px;">{{$request->status}}</span>
                    <p>Status</p>
                  </li>
                </div>
              </div>
             
                    
              
              
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
                              <input type="text" class="form-control msg" name="message" placeholder="Enter a message" required>
                              <input type="hidden" class="form-control" name="request_id" value="{{$request->id}}">
                              <div class="input-group-append">
                                  <span class="input-group-text"><button  type="submit" class="btn" style="background-color:transparent" ><i class="fa fa-chevron-right"></i></button></span>
                                  
                              </div>
                          </div>
                      </form>
                      <div id="msg_section{{$request->id}}">
                          @if($request->messages()->count() < 1)
                          <hr>
                                <b> NO MESSAGE FOUND</b>  <br>
                          @else
                            @foreach($request->messages()->get() as $msg)
                            <hr>
                                <b> {{$msg->user->name ?? $msg->user->resident->first_name .' '. $msg->user->resident->last_name}}</b>  <br>
                                <h6>{{$msg->message ?? ''}}</h6> <br>
                                <small class="mb-0">{{$msg->created_at->diffForHumans()}}</small>
                            @endforeach
                          @endif
                      </div>
                  </div>
              </div>
            <div class="btn-wrap">
                @if($request->status == 'PENDING')
                  <a href="#" class="btn btn-primary edit text-uppercase" edit="{{$request->id}}">Edit</a>
                  <a href="#" class="btn btn-danger cancel text-uppercase" cancel="{{$request->id}}">Cancel</a>
                @endif
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
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-uppercase font-weight-bold">REQUESTED DOCUMENT INFORMATION</h5>
            <button type="button" class="btn btn-link text-danger p-0 close_modal">
              <i class="fa fa-close"></i>
            </button>
          </div>
          <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase  h6" >Document</label>
                          <input type="text" name="document" id="document" class="form-control" readonly/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Date you need: <span class="text-danger">*</span></label>
                          <input id="date_you_need" name="date_you_need" type="text" class="form-control date_picker" >
                          <span class="invalid-feedback" role="alert">
                              <strong id="error-date_you_need"></strong>
                          </span>
                      </div> 
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <h5>List of Requirements </h5> 
                        
                    </div>
                    <div id="list_requirements">
                        
                    </div>
                        
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <h5>Claiming options</h5> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="claiming_option" id="claiming_option">
                                <option value="deliver">Deliver (depending on the address, additional fees required)</option>
                                <option value="pickUp">Pick Up (Local Barangay)</option>
                                <option value="downloadable">Downloadable file (Ready to print)</option>
                            </select>
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-claiming_option"></strong>
                            </span>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <h5>For payment</h5> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Amount to pay: <h4 id="amount"> </h4></label>
                            
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Upload receipt: <span class="text-danger">* </span><a href="#">How to pay?</a></label>
                            <input id="receipt" name="receipt" type="file" class="form-control" >
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-receipt"></strong>
                            </span>
                            <label>Uploaded File: <span class="btn-link" style="font-size: 15px;"><a id="receipt_uploaded" href="#" target="_blank"></a></span></label>
                        </div> 
                    </div>
                </div>

                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer bg-white">
                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Close</button>
                <input type="submit" name="action_button" id="action_button" class="text-uppercase btn btn-primary" value="Submit" />
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
$(document).ready(function(){

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
                messages += '<hr>';
                messages += '<b>'+value.name+'</b> <br>';
                messages += '<h6>'+value.msg+'</h6> <br>';
                messages += '<h6>'+value.date_time+'</h6> <br>';
                              
            });
            $('#msg_section'+data.request_id).empty().append(messages);
            $('.msg').val('');
            $('#messages_count'+data.request_id).text(data.msg_count)
        }
    });
});

$(document).on('click', '.edit', function(){
    $('#myModal').modal('show')
    var id = $(this).attr('edit')
    
    $.ajax({
          url :"/resident/requested_document/"+id+"/edit",
          dataType:"json",
          beforeSend:function(){
              $("#action_button").attr("disabled", true);
          },
          success:function(data){
              $("#action_button").attr("disabled", false);
              $('#hidden_id').val(id);
              $.each(data.result, function(key,value){
                  $('#document').val(value.document)
                  $('#date_you_need').val(value.date_you_need)
                  var requirements = "";
                  $.each(value.requirements, function(key,value){
                        requirements += '<div class="col-md-12">';
                          requirements += '<div class="form-group">';
                            requirements += '<label>'+value.name+ '<span class="text-danger">*</span></label>';
                              requirements += '<input id="'+value.id+'" name="'+value.id+'" type="file" class="form-control">';
                              requirements += '<label>Uploaded File: <span class="btn-link" style="font-size: 15px;"><a href="/resident/requirements/'+value.uploaded_requirement+'" target="_blank">'+value.uploaded_requirement+'</a></span></label>';
                          requirements += '</div>';
                        requirements += '</div>';
                  });
                  $('#list_requirements').empty().append(requirements);
                  $('#claiming_option').val(value.claiming_option)
                  $('#amount').text('₱ '+ value.amount)
                  $('#receipt_uploaded').text(value.receipt_uploaded)
                  $('#receipt_uploaded').attr('href', '/resident/receipt/' + value.receipt_uploaded)
              });
          }
      })
});
$(document).on('click', '.close_modal', function(){
    $('#myModal').modal('hide')
});

$('#myForm').on('submit', function(event){
    event.preventDefault();
    $.ajax({
          url :"/resident/requested_document/"+ $('#hidden_id').val(),
          method:"post",
          data:  new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          dataType:"json",
          beforeSend:function(){
              $("#action_button").attr("disabled", true);
              $("#action_button").val('Submitting');
          },
          success:function(data){
            $("#action_button").attr("disabled", false);
            $("#action_button").val('Submit');
              if(data.errors){
                  $.each(data.errors, function(key,value){
                      if(key == $('#'+key).attr('id')){
                          $('#'+key).addClass('is-invalid')
                          $('#error-'+key).text(value)
                      }
                  })
              }
              if(data.success){
                $.confirm({
                    title: data.success,
                    content: "",
                    type: 'green',
                    buttons: {
                        confirm: {
                            text: '',
                            btnClass: 'btn-green',
                            keys: ['enter', 'shift'],
                            action: function(){
                                location.reload();
                            }
                        },
                    }
                });
            }
          }
      })
   
});



  var today = new Date();
  var tomorrow = new Date();
  tomorrow.setDate(today.getDate() + 1);
  $('.date_picker').datetimepicker({
      icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-chevron-up",
          down: "fa fa-chevron-down",
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-screenshot',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
      },
      format: 'YYYY-MM-DD',
      locale: 'en',
      minDate: tomorrow,

  });

  $(document).on('click', '.cancel', function(){
    var id = $(this).attr('cancel');
    $.confirm({
        title: 'Confirmation',
        content: 'You really want to cancel this request?',
        type: 'red',
        buttons: {
            confirm: {
                text: 'confirm',
                btnClass: 'btn-blue',
                action: function(){
                    return $.ajax({
                        url:"/resident/requested_document/"+id+"/cancel",
                        method:'DELETE',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        dataType:"json",
                        beforeSend:function(){
                          $(".cancel").attr("disabled", true);
                        },
                        success:function(data){
                          $(".cancel").attr("disabled", false);
                          
                            if(data.success){
                              $.confirm({
                                title: 'Confirmation',
                                content: data.success,
                                type: 'green',
                                buttons: {
                                        confirm: {
                                            text: 'confirm',
                                            btnClass: 'btn-blue',
                                            keys: ['enter', 'shift'],
                                            action: function(){
                                                location.reload();
                                            }
                                        },
                                        
                                    }
                                });
                            }
                        }
                    })
                }
            },
            cancel:  {
                text: 'cancel',
                btnClass: 'btn-red',
                keys: ['enter', 'shift'],
            }
        }
    });
  });
});



</script>
@endsection
