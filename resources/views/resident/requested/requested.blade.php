  
@extends('../layouts.resident')
@section('sub-title','MANAGE DOCUMENTS')

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
  <section id="team" class="team mt-5 section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Documents</h2>
          <p>Manage Requested Document</p>
        </div>
        <div class="row">
          <div class="col-12">
            <ul id="requeted-filters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <div class="row">
                <div class="col">
                  <li filter="all" class="filter filter-active">All</li>
                </div>
                <div class="col">
                  <li filter="pending" class="filter">Pending</li>
                </div>
                <div class="col">
                  <li filter="approved" class="filter">Approved</li>
                </div>
                <div class="col">
                  <li filter="completed" class="filter">Completed</li>
                </div>
                <div class="col">
                  <li filter="canceled" class="filter">Canceled</li>
                </div>
              </div>
              
            </ul>
          </div>
          <div id="requested_data" class="row">
         
          </div>
         
          
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
            <h5 class="modal-title text-uppercase font-weight-bold">REQUESTED DOCUMENT INFORMATION</h5>
            <button type="button" class="btn text-danger p-0 close_modal">
              <i class="ri-close-line"></i>
            </button>
          </div>
          <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label text-uppercase  h6" >Document</label>
                          <input type="text" name="document" id="document" class="form-control" readonly/>
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
                            <select name="claiming_option" id="claiming_option" class="form-control">
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
  var filter = 'all';
  load_data(filter)
});

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

function load_data(filter){
    $.ajax({
        url: "/resident/requested_document/"+filter+"/filter", 
        type: "get",
        dataType: "HTMl",
        beforeSend: function() {
        },
        success: function(response){
            $("#requested_data").html(response);
        }	
      })
}

$(document).on('click', '.filter', function(){
    var filter = $(this).attr('filter');
    $('.filter').removeClass('filter-active')
    $(this).addClass('filter-active')

    load_data(filter)
});





</script>
@endsection
