@extends('../layouts.admin')
@section('sub-title','MANAGE APPOINTMENT')

@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('style')
<style>
  .fixed-plugin.show .card {
    right: 0;
  }
  .fixed-plugin .card {
    right: -760px;
    width: 760px;
  }

  .fixed-plugin1.show .card {
    right: 0;
  }
  .fixed-plugin1 .card {
    right: -760px;
    width: 760px;
  }

</style>
@endsection

@section('content')
<div class="container-fluid py-4">
  <div class="row mt-4">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
                <div class="col-md-10">
                <h6>MANAGE APPOINTMENTS</h6>
                </div>
                <div class="col-md-2">
                    <select id="filter_status" class="form-control" style="appearance: button;">
                         <option value="">FILTER STATUS</option>
                         <option value="PENDING">PENDING</option>
                         <option value="APPROVED">APPROVED</option>
                         <option value="COMPLETED">COMPLETED</option>
                         <option value="DECLINED">DECLINED</option>
                         <option value="CANCELLED">CANCELLED</option>
                    </select>
                </div>
                </div>

          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Appointment ID</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Customer</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Service</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Staff</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Appointment Date And Time</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Note</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Appointment Fee</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($appointments as $appointment)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$appointment->id}}" class="btn btn-info btn-sm msg" >
                              {{$appointment->messages()->count()}}  MESSAGE{{$appointment->messages()->count() == 0 ? '':'S'}}
                            </button>
                            <button id="{{$appointment->id}}" class="btn btn-primary btn-sm view" >
                              VIEW/EDIT
                            </button>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm text-primary">{{$appointment->id ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$appointment->customer->first_name ?? ''}} {{$appointment->customer->last_name ?? ''}}  ({{$appointment->customer->middle_name ?? 'n/a'}})</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$appointment->service->name ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$appointment->staff->name ?? "Any Available"}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                                {{\Carbon\Carbon::createFromFormat('Y-m-d',$appointment->appointment_date)->format('M j , Y')}} at {{$appointment->appointment_time}}
                            </h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$appointment->note ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"></h6>
                            <p class="text-xs font-weight-bold mb-0">
                              ₱ 50
                              <a href="/customer/receipt/{{$appointment->receipt ?? ''}}" target="_blank" class="link-primary"> <br>
                               View Receipt</a>
                            </p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <span class="badge badge-sm {{$appointment->status == 'PENDING' ? 'bg-gradient-warning' : ''}}  {{$appointment->status == 'APPROVED' ? 'bg-gradient-success' : ''}} {{$appointment->status == 'COMPLETED' ? 'bg-gradient-primary' : ''}} {{$appointment->status == 'CANCELLED' || $appointment->status == 'DECLINED' ? 'bg-gradient-danger' : ''}}">{{$appointment->status}}</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$appointment->created_at->format('M j , Y h:i A') ?? ''}}</h6>

                          </div>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>

      @section('footer')
          @include('../partials.admin.footer')
      @endsection
  </div>
@endsection

@section('rightbar')
<div class="fixed-plugin">
  <div class="card shadow-lg">
    <div class="card-header pb-0 pt-3 ">

      <div class="float-end mt-2">
        <button class="btn btn-link text-danger p-0 fixed-plugin-close-button">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <br>
      <div class="float-start">
        <h6 class="text-uppercase">APPOINTMENT INFORMATION</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
        <form method="post" id="myForm" class="contact-form">
              @csrf
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Uploaded Receipt</label>
                                  <ul class="list-group">
                                    <a href="#" class="text-primary" id="uploaded_receipt" target="_blank"></a>
                                  </ul>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control" style="appearance: searchfield;">
                                <option value="PENDING">PENDING</option>
                                <option value="APPROVED">APPROVED</option>
                                <option value="COMPLETED">COMPLETED</option>
                                <option value="DECLINED">DECLINED</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Service</label>
                            <input type="text" name="service" id="service" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Staff</label>
                            <input type="text" name="staff" id="staff" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Appointment Date</label>
                            <input type="text" name="appointment_date" id="appointment_date" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Appointment Time</label>
                            <input type="text" name="appointment_time" id="appointment_time" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Note</label>
                            <input type="text" name="note" id="note" class="form-control" readonly />
                        </div>
                    </div>
                </div>
                <br>
                <h6 class="text-uppercase">CUSTOMER INFORMATION</h6>
                <hr class="horizontal dark my-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Customer</label>
                            <input type="text" name="customer" id="customer" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Email</label>
                            <input type="text" name="email" id="email" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Address</label>
                            <input type="text" name="address" id="address" class="form-control" readonly />
                        </div>
                    </div>
                </div>


                  <div class="card-footer text-center">
                      <input type="submit" name="action_button" id="action_button" class="text-uppercase btn-wd btn btn-primary" value="Submit" />
                  </div>
              </div>
        </form>
    </div>
  </div>
</div>

<div class="fixed-plugin1">
  <div class="card shadow-lg">
    <div class="card-header pb-0 pt-3 ">

      <div class="float-end mt-2">
        <button class="btn btn-link text-danger p-0 fixed-plugin-close-button1">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <br>
      <div class="float-start">
        <h6 class="text-uppercase title_head"></h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
        <div class="overflow-auto">
            <form method="post" id="myMsgForm" class="contact-form">
                @csrf

                  <div class="form-group">
                    <input type="text" class="form-control" id="message" name="message" placeholder="Enter a message" required>
                    <small class="text-primary" id="warning_text"></small>
                  </div>
                  <div class="form-group">
                    <ul class="list-group" id="msg_section">

                    </ul>
                  </div>
            </form>
        </div>
    </div>
  </div>

@endsection

@section('script')

<script>
  $(document).ready(function () {
        var table = $('.table').DataTable({
            'columnDefs': [{ 'orderable': false, 'targets': [0] }],
        });

        $('#filter_status').on('change', function () {
            table.columns(8).search( this.value ).draw();
        });
  });

  var id = null;
  $(document).on('click', '.view', function(){
      id = $(this).attr('id');

      $.ajax({
              url :"/admin/manage_appointments/"+id,
              dataType:"json",
              method:"get",
              beforeSend:function(){
                $("#action_button").attr("disabled", true);
              },
              success:function(data){
                $("#action_button").attr("disabled", false);
                $('#status').val(data.status);
                $('#uploaded_receipt').attr('href','/customer/receipt/'+ data.uploaded_receipt);
                $('#uploaded_receipt').text(data.uploaded_receipt);
                $('#service').val(data.service)
                $('#staff').val(data.staff)
                $('#appointment_date').val(data.appointment_date)
                $('#appointment_time').val(data.appointment_time)
                $('#note').val(data.note)
                $('#customer').val(data.customer)
                $('#email').val(data.email)
                $('#contact_number').val(data.contact_number)
                $('#address').val(data.address)

              }
      });

      var fixedPlugin = document.querySelector('.fixed-plugin');
      var fixedPlugin1 = document.querySelector('.fixed-plugin1');

      if (!fixedPlugin.classList.contains('show')) {
          fixedPlugin.classList.add('show');
          fixedPlugin1.classList.remove('show');
      } else {
          fixedPlugin.classList.remove('show');
      }
  });

  $('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')

    $.ajax({
        url: '/admin/manage_appointments/'+id,
        method:'POST',
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,

        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
            $("#action_button").val("Submitting");
        },
        success:function(data){
            $("#action_button").attr("disabled", false);
            $("#action_button").val("Submit");

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
    });
  });


  var request_id = null;
  $(document).on('click', '.msg', function(){
        var fixedPlugin = document.querySelector('.fixed-plugin1');
        var fixedPlugin1 = document.querySelector('.fixed-plugin');

        if (!fixedPlugin.classList.contains('show')) {
            fixedPlugin.classList.add('show');
            fixedPlugin1.classList.remove('show');
        } else {
            fixedPlugin.classList.remove('show');
        }

      request_id = $(this).attr('id');
      $('#warning_text').text('')
      messages(request_id);
  });

  function messages(request_id){
    $.ajax({
            url :"/admin/message/"+request_id,
            dataType:"json",
            method:"get",
            beforeSend:function(){

            },
            success:function(data){
              if(data.no_msg){
                var messages = '';
                    messages += '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">';
                      messages += '<div class="d-flex align-items-center">'
                        messages += '<div class="d-flex flex-column">'
                          messages += '<h6 class="mb-1 text-dark text-sm">'+data.no_msg+'</h6>'
                        messages += '</div>'
                      messages += '</div>'
                    messages += '</li>'
                    messages += '<hr>'
                $('#msg_section').empty().append(messages);
              }
              if(data.messages){
                var messages = '';
                $.each(data.messages, function(key,value){
                    messages += '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">';
                      messages += '<div class="d-flex align-items-center">'
                        messages += '<div class="d-flex flex-column">'
                          messages += '<h6 class="mb-1 text-dark text-sm">'+value.name+'</h6>'
                          messages += '<p class="text-xs">'+value.msg+'</p>'
                          messages += '<small class="text-xs">'+value.date_time+'</small>'
                        messages += '</div>'
                      messages += '</div>'
                    messages += '</li>'
                    messages += '<hr>'
                });
                $('#msg_section').empty().append(messages);
              }

              $('.title_head').text(data.customer +' - '+ data.service)
            }
    });
  }

  $('#myMsgForm').on('submit', function(event){
    event.preventDefault();

    $.ajax({
        url :"/admin/message/"+request_id,
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#warning_text').text('SENDING..')
        },
        success:function(data){
          if(data.success){
            $('#warning_text').text('SENT')
            $('#message').val('');
            messages(request_id)
          }
        }
    });
  });

$(document).on('click', '.btn-close', function(){
      $('#myMsgModal').modal('hide');
  });

  $(document).on('click', '.fixed-plugin-close-button1', function(){
        var fixedPlugin = document.querySelector('.fixed-plugin1');
            fixedPlugin.classList.remove('show');
    });

</script>


@endsection
