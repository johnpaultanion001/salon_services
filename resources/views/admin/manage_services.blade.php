@extends('../layouts.admin')
@section('sub-title','MANAGE SERVICES')

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
                    <h6>MANAGE SERVICES</h6>
                </div>
                @can('admin_access')
                  <div class="col-md-2">
                      <button class="btn btn-dark btn-sm" id="create_record">
                          ADD NEW SERVICE
                      </button>
                  </div>
                @endcan
                </div>
           
          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Amount</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Description</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Is Available</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($services as $service)
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$service->id}}" class="btn btn-primary btn-sm view" >
                              VIEW/EDIT
                            </button>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$service->name ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">₱ {{$service->amount ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$service->description ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td  class="">
                          <span class="badge badge-sm {{$service->isAvailable == '1'  ? 'bg-gradient-success' : 'bg-gradient-danger'}}">
                            {{$service->isAvailable == '1' ? 'YES':'NO'}}
                          </span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$service->created_at->format('M j , Y h:i A') ?? ''}}</h6>
                         
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
        <h6 class="text-uppercase">SERVICE INFORMATION</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
        <form method="post" id="myForm" class="contact-form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label text-uppercase" >Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-name"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Amount <span class="text-danger">*</span></label>
                    <input type="number" name="amount" id="amount" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-amount"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Is Available <span class="text-danger">*</span></label>
                    <select name="isAvailable" id="isAvailable" class="form-control" style="appearance: searchfield;">
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-description"></strong>
                    </span>
                </div>
               
                <input type="hidden" name="id" id="id"  />
                <input type="hidden" name="action" id="action" value="ADD"  />

                <div class="card-footer text-center">
                    <input type="submit" name="action_button" id="action_button" class="text-uppercase btn-wd btn btn-primary" value="Submit" />
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
    $('.table').DataTable({
        bDestroy: true,
        "bFilter": true,
        'columnDefs': [{ 'orderable': false, 'targets': [0] }],
       
    });
    

    $(document).on('click', '#create_record', function(){
        $('#name').focus();
        $('#action').val('ADD');
        $('.form-control').removeClass('is-invalid')
        $('#myForm')[0].reset();

        var fixedPlugin1 = document.querySelector('.fixed-plugin1');
        if (!fixedPlugin1.classList.contains('show')) {
            fixedPlugin1.classList.add('show');
        } else {
            fixedPlugin1.classList.remove('show');
        }
     });

     $(document).on('click', '.fixed-plugin-close-button1', function(){
        var fixedPlugin1 = document.querySelector('.fixed-plugin1');
            fixedPlugin1.classList.remove('show');
    });

    
    $(document).on('click', '.view', function(){
      var id = $(this).attr('id');
      $('#action').val('EDIT');
      $('#id').val(id);

      $.ajax({
          url :"/admin/services/"+id+"/edit",
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
          }
      })

      var fixedPlugin1 = document.querySelector('.fixed-plugin1');

      if (!fixedPlugin1.classList.contains('show')) {
          fixedPlugin1.classList.add('show');
      } else {
          fixedPlugin1.classList.remove('show');
      }
    });

    $('#myForm').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')
        var url = "/admin/services";
        var method = "POST";

        if($('#action').val() == 'EDIT'){
        var id = $('#id').val();
            url = "/admin/services/" + id;
            method = "PUT";
        }
        $.ajax({
            url: url,
            method: method,
            data: $(this).serialize(),
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


  });
  
</script>


@endsection
