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
  .fixed-plugin1.show .card {
    right: 0;
  }
  .fixed-plugin1 .card {
    right: -760px;
    width: 760px;
  }
  .fixed-plugin2 .card {
    right: -760px;
    width: 760px;
  }
  .fixed-plugin2.show .card {
    right: 0;
  }


</style>
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
                              <option value="{{$resident->id}}" {{$resident1->id == $resident->id ? 'selected' : ''}}>{{$resident->last_name}},{{$resident->first_name}} ({{$resident->middle_name ?? 'n/a'}})</option>
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
  <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>RESIDENT INFORMATION</h6>
          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">ID IMAGE</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Email</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Contact Number</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Address</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Created At</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$resident1->id}}" class="btn btn-primary btn-sm view" >
                              VIEW/EDIT
                            </button>
                          </div>
                        </div>
                      </td>
                      <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="/resident/img/id/{{$resident1->id_image}}" target="_blank">
                                        <img style="vertical-align: bottom;"  height="100" width="100" src="{{URL::asset('/resident/img/id/'.$resident1->id_image)}}" />
                                    </a>
                                </div>
                            </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$resident1->first_name ?? ''}} {{$resident1->last_name ?? ''}}  ({{$resident1->middle_name ?? 'n/a'}})</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$resident1->user->email ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$resident1->contact_number ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$resident1->address ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td  class="align-middle text-center text-sm">
                          <span class="badge badge-sm {{$resident1->isApprove == 1 ? 'bg-gradient-success' : 'bg-gradient-warning'}}">
                            {{$resident1->isApprove == 1 ? 'Approved' : 'Pending'}}
                          </span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$resident1->created_at->format('M j , Y h:i A') ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>REQUESTED DOCUMENTS</h6>
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
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Tentative Claiming Date</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Requirements</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Claiming Option</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Amount To Pay</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Requested At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($requested_documents as $document)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$document->id}}" class="btn btn-info btn-sm msg" >
                              {{$document->messages()->count()}}  MESSAGE{{$document->messages()->count() == 0 ? '':'S'}} 
                            </button>
                            <button id="{{$document->id}}" class="btn btn-primary btn-sm view_edit" >
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
                            <h6 class="mb-0 text-sm">{{$document->claiming_date ?? 'N/A'}}</h6>
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
        <h6 class="text-uppercase">RESIDENT INFORMATION</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
        <form method="post" id="myForm" class="contact-form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label text-uppercase" >ID Image </label> 
                    <input type="file" name="id_image" id="id_image1" class="form-control" accept="image/*" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-id_image1"></strong>
                    </span>
                    <label class="control-label text-uppercase" >Current Image: <a href="" id="current_image_id" class="text-warning" target="_blank"></a></label>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >First Name <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" id="first_name" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-first_name"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-middle_name"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Last Name <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" id="last_name" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-last_name"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" class="form-control" readonly/>
                   
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Contact Number <span class="text-danger">*</span></label>
                    <input type="number" name="contact_number" id="contact_number" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-contact_number"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Address <span class="text-danger">*</span></label>
                    <input type="text" name="address" id="address" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-address"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control" style="appearance: searchfield;">
                        <option value="0">PENDING</option>
                        <option value="1">APPROVED</option>
                    </select>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" name="action_button" id="action_button" class="text-uppercase btn-wd btn btn-primary" value="Sumbit" />
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
        <h6 class="text-uppercase">REQUESTED DOCUMENT INFORMATION</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
        <form method="post" id="myForm1" class="contact-form">
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
                        <select name="status_requested" id="status_requested" class="form-control" style="appearance: searchfield;">
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
                        <label class="control-label text-uppercase" >Tentative Claiming Date <span class="text-danger">*</span></label>
                        <input type="date" name="claiming_date" id="claiming_date" class="form-control"/>
                        <span class="invalid-feedback" role="alert">
                            <strong id="error-claiming_date"></strong>
                        </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label text-uppercase" >Claiming Option</label>
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
                      <input type="submit" name="action_button" id="action_button" class="text-uppercase btn-wd btn btn-primary" value="Sumbit" />
                  </div>
              </div>
        </form>
    </div>
  </div>
</div>

<div class="fixed-plugin2">
  <div class="card shadow-lg">
    <div class="card-header pb-0 pt-3 ">
      
      <div class="float-end mt-2">
        <button class="btn btn-link text-danger p-0 fixed-plugin-close-button2">
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
<script type="text/javascript">
    $(document).ready(function () {
      $('.select2').select2()

      var id = null;
      $(document).on('click', '.view', function(){
          id = $(this).attr('id');

          $.ajax({
              url :"/admin/residents/"+id+"/edit",
              dataType:"json",
              beforeSend:function(){
                  $("#action_button").attr("disabled", true);
              },
              success:function(data){
                  $("#action_button").attr("disabled", false);

                  $.each(data.result, function(key,value){
                      if(key == $('#'+key).attr('id')){
                          $('#'+key).val(value)
                      }
                      if(key == 'id_image'){
                        $('#current_image_id').attr('href','/resident/img/id/'+value)
                        $('#current_image_id').text(value)
                      }
                  })
                  $('#email').val(data.email);
                  $('#status').val(data.status);
              }
          })

          var fixedPlugin = document.querySelector('.fixed-plugin');
          var fixedPlugin1 = document.querySelector('.fixed-plugin1');
          var fixedPlugin2 = document.querySelector('.fixed-plugin2');

          if (!fixedPlugin.classList.contains('show')) {
              fixedPlugin.classList.add('show');
              fixedPlugin1.classList.remove('show');
              fixedPlugin2.classList.remove('show');
          } else {
              fixedPlugin.classList.remove('show');
          }
      });

      $('#myForm').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')

        $.ajax({
            url: '/admin/residents/'+id,
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
                        if(key == 'id_image'){
                            $('#id_image1').addClass('is-invalid')
                            $('#error-id_image1').text(value)
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


      var id1 = null;
      $(document).on('click', '.view_edit', function(){
          id1 = $(this).attr('id');

          $.ajax({
                  url :"/admin/requested_documents/"+id1,
                  dataType:"json",
                  method:"get",
                  beforeSend:function(){
                    $("#action_button").attr("disabled", true);
                  },
                  success:function(data){
                    $("#action_button").attr("disabled", false);

                    $('#resident').val(data.resident)
                    $('#document').val(data.document)
                    $('#claiming_date').val(data.claiming_date);
                    $('#claimed_option').val(data.claimed_option);
                    $('#payment').val(data.payment);
                    $('#status_requested').val(data.status);

                    

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

          var fixedPlugin = document.querySelector('.fixed-plugin1');
          var fixedPlugin1 = document.querySelector('.fixed-plugin');
          var fixedPlugin2 = document.querySelector('.fixed-plugin2');

          if (!fixedPlugin.classList.contains('show')) {
              fixedPlugin.classList.add('show');
              fixedPlugin1.classList.remove('show');
              fixedPlugin2.classList.remove('show');
          } else {
              fixedPlugin.classList.remove('show');
          }

      });

      $('#myForm1').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')

        $.ajax({
            url: '/admin/requested_documents/'+id1,
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

      $('#select_resident').on("change", function(event){
        var resident = $(this).val();
        window.location.href = '/admin/finder_resident/'+resident;
      });

      $(document).on('click', '.fixed-plugin-close-button1', function(){
          var fixedPlugin = document.querySelector('.fixed-plugin1');
              fixedPlugin.classList.remove('show');
      });

      $(document).on('click', '.fixed-plugin-close-button2', function(){
          var fixedPlugin = document.querySelector('.fixed-plugin2');
              fixedPlugin.classList.remove('show');
      });
      

      var request_id = null;
      $(document).on('click', '.msg', function(){
            var fixedPlugin = document.querySelector('.fixed-plugin1');
            var fixedPlugin1 = document.querySelector('.fixed-plugin');
            var fixedPlugin2 = document.querySelector('.fixed-plugin2');

            if (!fixedPlugin2.classList.contains('show')) {
                fixedPlugin2.classList.add('show');
                fixedPlugin1.classList.remove('show');
                fixedPlugin.classList.remove('show');
            } else {
              fixedPlugin2.classList.remove('show');
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
  })
</script>


@endsection
