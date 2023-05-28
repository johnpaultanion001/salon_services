@extends('../layouts.admin')
@section('sub-title','MANAGE RESIDENT')

@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('navbar')
    @include('../partials.admin.navbar')
@endsection

@section('content')
<div class="container-fluid py-4">
  <div class="row mt-4">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
                <div class="col-md-10">
                  <h6>MANAGE CUSTOMERS</h6>
                </div>
                <div class="col-md-2">
                    <select id="filter_status" class="form-control" style="appearance: button;">
                         <option value="">FILTER STATUS</option>
                         <option value="PENDING">PENDING</option>
                         <option value="APPROVED">APPROVED</option>
                         <option value="DECLINED">DECLINED</option>
                         <option value="DEACTIVATED">DEACTIVATED</option>
                    </select>
                </div>
                </div>

          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Email</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Contact Number</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Address</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Registered Completed</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Verified Email</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Register At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($customers as $customer)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$customer->id}}" class="btn btn-primary btn-sm view" >
                              VIEW/EDIT
                            </button>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$customer->first_name ?? ''}} {{$customer->last_name ?? ''}}  ({{$customer->middle_name ?? 'n/a'}})</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$customer->user->email ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$customer->contact_number ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$customer->address ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td  class="">
                          <span class="badge badge-sm
                            @if($customer->isRegister == true)
                              bg-success
                            @else
                              bg-warning
                            @endif">
                            @if($customer->isRegister == true)
                                ✓
                            @else
                               x
                            @endif
                          </span>
                      </td>
                      <td  class="">
                          <span class="badge badge-sm
                            @if($customer->user->email_verified_at != null)
                              bg-success
                            @else
                              bg-warning
                            @endif">
                            @if($customer->user->email_verified_at != null)
                            ✓
                            @else
                              x
                            @endif
                          </span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$customer->created_at->format('M j , Y h:i A') ?? ''}}</h6>

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
        <h6 class="text-uppercase">customer INFORMATION</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
        <form method="post" id="myForm" class="contact-form">
            @csrf
            <div class="card-body">

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
                <div class="card-footer text-center">
                    <input type="submit" name="action_button" id="action_button" class="text-uppercase btn-wd btn btn-primary text-uppercase" value="Submit" />
                </div>
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
            'columnDefs': [{ 'orderable': false, 'targets': [0,1] }],
        });
        $('#filter_status').on('change', function () {
            table.columns(6).search( this.value ).draw();
        });
  });

  var id = null;
  $(document).on('click', '.view', function(){
      id = $(this).attr('id');

      $.ajax({
          url :"/admin/customers/"+id+"/edit",
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
              })
              $('#email').val(data.email);
              $('#status').val(data.status);
          }
      })

      var fixedPlugin = document.querySelector('.fixed-plugin');

      if (!fixedPlugin.classList.contains('show')) {
          fixedPlugin.classList.add('show');
      } else {
          fixedPlugin.classList.remove('show');
      }
  });

  $('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')

    $.ajax({
        url: '/admin/customers/'+id,
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
</script>


@endsection
