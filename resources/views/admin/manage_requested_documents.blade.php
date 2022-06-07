@extends('../layouts.admin')
@section('sub-title','FINDER RESIDENT')

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
            <h6>MANAGE REQUESTED DOCUMENTS</h6>
          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Request Number</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Payment</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Resident</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Document</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Date Needed</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Requirements</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Claimed Option</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Amount To Pay</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Requested At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($documents as $document)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$document->id}}" class="btn btn-info btn-sm msg" >
                              {{$document->messages()->count()}}  MESSAGE{{$document->messages()->count() == 0 ? '':'S'}} 
                            </button>
                            <button id="{{$document->id}}" class="btn btn-primary btn-sm view" >
                              VIEW/EDIT
                            </button>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm text-primary">{{$document->request_number ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <span class="badge badge-sm {{$document->isPaid == 1 ? 'bg-gradient-success' : 'bg-gradient-danger'}}">
                              {{$document->isPaid == 1 ? 'Paid' : 'Unpaid'}}
                            </span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <span class="badge badge-sm {{$document->status == 'PENDING' ? 'bg-gradient-warning' : ''}}  {{$document->status == 'APPROVED' ? 'bg-gradient-success' : ''}} {{$document->status == 'COMPLETED' ? 'bg-gradient-primary' : ''}} {{$document->status == 'CANCELED' || $document->status == 'DECLINED' ? 'bg-gradient-danger' : ''}}">{{$document->status}}</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$document->resident->first_name ?? ''}} {{$document->resident->last_name ?? ''}}  ({{$document->resident->middle_name ?? 'n/a'}})</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$document->document->name ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$document->date_you_need ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="text-xs font-weight-bold mb-0">
                              @foreach($document->document->requirements()->get() as $requirement)
                                {{$requirement->name}} <br>
                              @endforeach
                            </p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <span class="badge badge-sm bg-gradient-success">{{$document->claiming_option  ?? ''}}</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"></h6>
                            <p class="text-xs font-weight-bold mb-0">
                              ₱ {{$document->amount_to_pay ?? ''}}
                              <a href="" class="link-primary"> <br>
                               View Receipt</a>
                            </p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$document->created_at->format('M j , Y h:i A') ?? ''}}</h6>
                         
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
        <h6 class="text-uppercase">REQUESTED DOCUMENT INFORMATION</h6>
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
                        <label class="control-label text-uppercase" >Payment <span class="text-danger">*</span></label>
                        <select name="payment" id="payment" class="form-control" style="appearance: searchfield;">
                            <option value="1">PAID</option>
                            <option value="0">UNPAID</option>
                        </select>
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
                        <label class="control-label text-uppercase" >Resident</label>
                        <input type="text" name="resident" id="resident" class="form-control" readonly />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label text-uppercase" >Document</label>
                        <input type="text" name="document" id="document" class="form-control" readonly />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label text-uppercase" >Date Needed</label>
                        <input type="text" name="date_needed" id="date_needed" class="form-control" readonly/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label text-uppercase" >Claimed Option</label>
                        <input type="text" name="claimed_option" id="claimed_option" class="form-control" readonly/>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label text-uppercase" >Downloadable File</label>
                              <input type="file" name="downloadable_file" id="downloadable_file" class="form-control"  />
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Current File</label>
                                  <ul class="list-group">
                                    <a href="#" class="text-primary" id="current_file" target="_blank"></a>
                                  </ul>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Requirements</label>
                              <ul class="list-group" id="requirement_list">
                              </ul>
                            
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label text-uppercase" >Uploaded Requirements</label>
                                <ul class="list-group" id="uploaded_requirement">
                                </ul>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label text-uppercase" >Amount To Pay</label>
                              <input type="text" name="amount_to_pay" id="amount_to_pay" class="form-control" readonly/>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Uploaded Receipt</label>
                                  <ul class="list-group">
                                    <a href="#" class="text-primary" id="uploaded_receipt" target="_blank"></a>
                                  </ul>
                            </div>
                        </div>
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
        $('.table').DataTable({
            'columnDefs': [{ 'orderable': false, 'targets': [0] }],
        });
  });

  var id = null;
  $(document).on('click', '.view', function(){
      id = $(this).attr('id');

      $.ajax({
              url :"/admin/requested_documents/"+id,
              dataType:"json",
              method:"get",
              beforeSend:function(){
                $("#action_button").attr("disabled", true);
              },
              success:function(data){
                $("#action_button").attr("disabled", false);

                $('#resident').val(data.resident)
                $('#document').val(data.document)
                $('#date_needed').val(data.date_needed);
                $('#claimed_option').val(data.claimed_option);
                $('#payment').val(data.payment);
                $('#status').val(data.status);

                

                var requirement = '';
                $.each(data.requirement, function(key,value){
                    requirement += '<li class="list-group-item">'+value.name+'</li>';
                });
                $('#requirement_list').empty().append(requirement);

                var uploaded_requirement = '';
                $.each(data.uploaded_requirement, function(key,value){
                    uploaded_requirement += '<a href="/resident/requirements/'+value.name+'" class="text-primary" target="_blank">'+value.name+'</a>';
                });
                $('#uploaded_requirement').empty().append(uploaded_requirement);

                $('#amount_to_pay').val(data.amount_to_pay)
                $('#uploaded_receipt').attr('href','/resident/receipt/'+ data.uploaded_receipt);
                $('#uploaded_receipt').text(data.uploaded_receipt);

                $('#current_file').attr('href','/resident/downloadable_file/'+ data.downloadable);
                $('#current_file').text(data.downloadable);
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
        url: '/admin/requested_documents/'+id,
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

              $('.title_head').text(data.resident +' - '+ data.document)
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
