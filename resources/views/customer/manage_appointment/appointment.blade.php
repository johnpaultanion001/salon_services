
@extends('../layouts.customer')
@section('sub-title','MANAGE DOCUMENTS')

@section('navbar')
    @include('../partials.customer.navbar')
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
          <h2 class="text-white">Appointment</h2>
          <p class="text-white">Manage Appointment</p>
        </div>
        <div class="row">
          <div class="col-12">
            <ul id="requeted-filters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <div class="row">
                <div class="col">
                  <li filter="all" class="filter filter-active text-uppercase">All</li>
                </div>
                <div class="col">
                  <li filter="pending" class="filter text-uppercase">Pending</li>
                </div>
                <div class="col">
                  <li filter="approved" class="filter text-uppercase">Approved</li>
                </div>
                <div class="col">
                  <li filter="completed" class="filter text-uppercase">Completed</li>
                </div>
                <div class="col">
                  <li filter="cancelled" class="filter text-uppercase">Cancelled</li>
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
            <h5 class="modal-title text-uppercase font-weight-bold">APPOINTNMENT INFORMATION</h5>
            <button type="button" class="btn text-danger p-0 close_modal">
              <i class="ri-close-line"></i>
            </button>
          </div>
          <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Service: <span class="text-danger">*</span></label>
                                <input id="service" name="service" type="text" class="form-control" readonly value="{{$service->name ?? ''}}">

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h5>Choose a staff to service you</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="staff_id" id="staff_id" class="form-control">
                                    <option value="0">Any Available</option>
                                    @foreach($staffs as $staff)
                                        <option value="{{$staff->id}}">{{$staff->name}}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-staff_id"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h5>Choose date and time</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date </label>
                                <input type="date" id="appointment_date" name="appointment_date" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-appointment_date"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time </label>
                                <input type="time" id="appointment_time" name="appointment_time" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-appointment_time"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Note </label>
                                <input type="text" id="note" name="note" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-note"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <h5>For payment</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Appointment Fee: <h4>₱ 50</h4></label>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload receipt: <span class="text-danger">* </span><a href="#"  id="how_to_pay">How to pay?</a></label>
                                    <input id="receipt" name="receipt" type="file" class="form-control" >
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-receipt"></strong>
                                    </span>
                                    <br>
                                    <label>Uploaded File: <span class="btn-link" style="font-size: 15px;"><a id="receipt_uploaded" href="#" target="_blank"></a></span></label>
                                </div>
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
    @include('../partials.customer.footer')
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
          url: "/customer/message",
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
              $('#msg_section'+data.appointment_id).empty().append(messages);
              $('.msg').val('');
              $('#messages_count'+data.appointment_id).text(data.msg_count)
          }
      });
});

$(document).on('click', '.edit', function(){
    $('#myModal').modal('show')
    var id = $(this).attr('edit')

    $.ajax({
          url :"/customer/manage_appointment/"+id+"/edit",
          dataType:"json",
          beforeSend:function(){
              $("#action_button").attr("disabled", true);
          },
          success:function(data){
              $("#action_button").attr("disabled", false);
              $('#hidden_id').val(id);
              $.each(data.result, function(key,value){
                    console.log(data.result)
                  $('#service').val(value.service)
                  $('#staff_id').val(value.staff)

                  $('#appointment_date').val(value.appointment_date)
                  $('#appointment_time').val(value.appointment_time)
                  $('#note').val(value.note)

                  $('#receipt_uploaded').text(value.receipt_uploaded)
                  $('#receipt_uploaded').attr('href', '/customer/receipt/' + value.receipt_uploaded)
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
          url :"/customer/manage_appointment/"+ $('#hidden_id').val(),
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
      content: 'You really want to cancel this appointment?',
      type: 'red',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              action: function(){
                  return $.ajax({
                      url:"/customer/manage_appointment/"+id+"/cancel",
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
        url: "/customer/manage_appointment/"+filter+"/filter",
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
