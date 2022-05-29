@extends('../layouts.admin')
@section('sub-title','FINDER RESIDENT')

@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('navbar')
    @include('../partials.admin.navbar')
@endsection


@section('content')
<div class="container-fluid py-4">
      <div class="row">
          <div class="card">
            <div class="card-body mr-auto">
              <div class="row">
                <div class="col-lg-8">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                          <h6 class="mb-2">Select a resident</h6>
                        </div>
                        <div class="form-group">
                          <select name="select_resident" id="select_resident" class="form-control select2" style="width: 100%;">
                            <option value="">Select resident</option>
                            @foreach($residents as $resident)
                              <option value="{{$resident->id}}" {{$resident->id == $resident->id ? 'selected' : ''}}>{{$resident->last_name}},{{$resident->first_name}} ({{$resident->middle_name}})</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card ">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-2">RESIDENT INFORMATION</h6>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center ">
              <tbody>
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-success shadow text-center">
                        <i class="fa-solid fa-user text-white" style="font-size: 15px;"></i>
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Name:</p>
                        <h6 class="text-sm mb-0">{{$resident->first_name ?? ''}} {{$resident->last_name ?? ''}}  ({{$resident->middle_name ?? ''}})</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">Email:</p>
                    <h6 class="text-sm mb-0">{{$resident->user->email ?? ''}}</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">Address:</p>
                    <h6 class="text-sm mb-0">{{$resident->address ?? ''}}</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">Contact Number:</p>
                    <h6 class="text-sm mb-0">{{$resident->contact_number ?? ''}}</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">Status:</p>
                    <span class="badge {{$resident->isApprove == 1 ? 'bg-primary':'bg-warning'}} cursor-pointer">{{$resident->isApprove == 1 ? 'APPROVED':'PENDING'}}</span>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="d-flex">
                      <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="fa fa-cog  cursor-pointer"></i></button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>REQUESTED DOCUMENTS</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Document</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Claimed Option</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Requirements</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Amount to pay</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Payment</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Status</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($requested_documents as $requested)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$requested->document->name ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td  class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">{{$requested->claiming_option  ?? ''}}</span>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">
                            @foreach($requested->document->requirements()->get() as $requirement)
                              {{$requirement->name}} <br>
                            @endforeach
                          </p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">₱ {{$requested->amount_to_pay ?? ''}}</span>
                      </td>
                      <td  class="align-middle text-center text-sm">
                          <span class="badge badge-sm {{$requested->isPaid == 1 ? 'bg-gradient-success' : 'bg-gradient-danger'}}">
                            {{$requested->isPaid == 1 ? 'Paid' : 'Unpaid'}}
                          </span>
                      </td>
                      <td  class="align-middle text-center text-sm">
                          <span class="badge badge-sm {{$requested->status == 'PENDING' ? 'bg-gradient-warning' : ''}}  {{$requested->status == 'APPROVED' ? 'bg-gradient-success' : ''}} {{$requested->status == 'COMPLETED' ? 'bg-gradient-primary' : ''}} {{$requested->status == 'CANCELED' ? 'bg-gradient-danger' : ''}}">{{$requested->status}}</span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                                <i id="{{$requested->id}}" class="fa fa-cog  cursor-pointer text-primary  view view{{$requested->id}}"></i>
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
        <h6 class="title_document text-uppercase">REQUESTED DOCUMENTS</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Resident:</h6>
        <input type="text" class="form-control text-uppercase font-weight-bold" name="resident" id="resident" readonly/>
       
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Document:</h6>
        <input type="text" class="form-control text-uppercase font-weight-bold" name="document" id="document" readonly/>
     
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Claimed Option:</h6>
        <span class="badge text-uppercase bg-info" id="claimed_option"></span>
     
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Requirements:</h6>
          <ul class="list-group" id="requirement_list">
          </ul>
        <h6 class="mb-0 text-uppercase text-sm">Uploaded Requirements:</h6>
          <ul class="list-group" id="uploaded_requirement">
          </ul>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Amount to pay:</h6>
        <input type="text" class="form-control text-uppercase font-weight-bold" name="amount" id="amount" readonly/>
        <h6 class="mb-0 text-uppercase text-sm">Uploaded Receipt:</h6>
          <ul class="list-group">
            <a href="#" class="text-primary" id="uploaded_receipt" target="_blank"></a>
          </ul>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Payment:</h6>
          <div class="d-flex" id="payment_section">
          
          </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Status:</h6>
        <div id="status_section">
            
        </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Message:</h6>
        <div id="status_section">
            
        </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Message:</h6>
        <div id="status_section">
            
        </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Message:</h6>
        <div id="status_section">
            
        </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Message:</h6>
        <div id="status_section">
            
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 

@section('script')

<script type="text/javascript">
  $(document).ready(function () {
    $('.select2').select2()

    $(document).on('click', '.view', function(){
        var id = $(this).attr('id');

        $.ajax({
              url :"/admin/requested_document/"+id,
              dataType:"json",
              method:"get",
              beforeSend:function(){

              },
              success:function(data){
                $('#resident').val(data.resident)
                $('#document').val(data.document)
                $('#claimed_option').html(data.claimed_option);

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

                $('#uploaded_receipt').attr('href','/resident/receipt/'+ data.uploaded_receipt);
                $('#uploaded_receipt').text(data.uploaded_receipt);
                
                
              


                $('#amount').val(data.amount_to_pay)
                $('.title_document').text('REQUESTED DOCUMENTS - '+data.document );
                //Payment
                var payment = '';
                payment += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm payment_status '+data.payment_unpaid+'" id="'+data.requested_id+'" payment_value="0">UNPAID</button>';
                payment += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm payment_status '+data.payment_paid+'" id="'+data.requested_id+'" payment_value="1">PAID</button>';
                $("#payment_section").empty().append(payment);

                  //Status
                  var status = '';
                  status += '<div class="d-flex">';
                    status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_pending+'" id="'+data.requested_id+'" status_value="PENDING">PENDING</button>';
                    status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_approved+'" id="'+data.requested_id+'" status_value="APPROVED">APPROVED</button>';
                  status += '</div>';
                  status += '<div class="d-flex">';
                    status += '<button class="btn  w-100 px-3 mb-2 me-2 btn-sm status '+data.status_completed+'" id="'+data.requested_id+'" status_value="COMPLETED">COMPLETED</button>';
                    status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_canceled+'" id="'+data.requested_id+'" status_value="CANCELED">CANCELED</button>';
                  status += '</div>';
                  $("#status_section").empty().append(status);
              }
        });

        var fixedPlugin = document.querySelector('.fixed-plugin');

        if (!fixedPlugin.classList.contains('show')) {
            fixedPlugin.classList.add('show');
        } else {
            fixedPlugin.classList.remove('show');
        }
    });

    $(document).on('click', '.payment_status', function(){
      var id = $(this).attr('id');
      var payment_value = $(this).attr('payment_value');

      $.ajax({
        url :"/admin/requested_document/payment_status/payment_status",
        dataType:"json",
        method:"get",
        data: {id:id,payment_value:payment_value,_token:'{!! csrf_token() !!}'},
        beforeSend:function(){
          $('.payment_status').attr('disabled', true);
        },
        success:function(data){
          $('.payment_status').attr('disabled', false);
           //Payment
           var payment = '';
           payment += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm payment_status '+data.payment_unpaid+'" id="'+data.requested_id+'" payment_value="0">UNPAID</button>';
           payment += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm payment_status '+data.payment_paid+'" id="'+data.requested_id+'" payment_value="1">PAID</button>';
           $("#payment_section").empty().append(payment);
           pending_documents(qr_code);
        }
      })
    
    });

    $(document).on('click', '.status', function(){
        var id = $(this).attr('id');
        var status_value = $(this).attr('status_value');

        $.ajax({
          url :"/admin/requested_document/status/status",
          dataType:"json",
          method:"get",
          data: {id:id,status_value:status_value,_token:'{!! csrf_token() !!}'},
          beforeSend:function(){
              $('.status').attr('disabled', true);
          },
          success:function(data){
            //Status
            $('.status').attr('disabled', false);
            var status = '';
              status += '<div class="d-flex">';
                status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_pending+'" id="'+data.requested_id+'" status_value="PENDING">PENDING</button>';
                status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_approved+'" id="'+data.requested_id+'" status_value="APPROVED">APPROVED</button>';
              status += '</div>';
              status += '<div class="d-flex">';
                status += '<button class="btn  w-100 px-3 mb-2 me-2 btn-sm status '+data.status_completed+'" id="'+data.requested_id+'" status_value="COMPLETED">COMPLETED</button>';
                status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_canceled+'" id="'+data.requested_id+'" status_value="CANCELED">CANCELED</button>';
              status += '</div>';
              $("#status_section").empty().append(status);
              pending_documents(qr_code);
          }
      })
    });

    $('#select_resident').on("change", function(event){
        var resident = $(this).val();
        window.location.href = '/admin/finder_resident/'+resident;
    });
  })
</script>


@endsection
