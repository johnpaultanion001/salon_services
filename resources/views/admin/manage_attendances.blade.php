@extends('../layouts.admin')
@section('sub-title','MANAGE ATTENDANCE')

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
                    <h6>MANAGE ATTENDANCE</h6>
                </div>
                @can('admin_access')
                  <div class="col-md-2">
                      <button class="btn btn-dark btn-sm" id="create_record">
                          ADD NEW ATTENDANCE RECORD
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
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Title</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Description</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Attended</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Is Active</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Created By</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($attendances as $attendance)
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$attendance->id}}" class="btn btn-primary btn-sm view" >
                              VIEW/EDIT
                            </button>
                            <button id="{{$attendance->id}}" class="btn btn-danger btn-sm remove" >
                              REMOVE
                            </button>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->title ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->description ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            @foreach($attendance->staffs_attendances()->get() as $attended)
                                <h6 class="mb-0 p-2 bg-primary text-white">{{$attended->staff->name ?? ''}} - {{$attended->created_at->format('h:i A') ?? ''}}</h6>
                            @endforeach
                          </div>
                        </div>
                      </td>
                      <td  class="">
                          <span class="badge badge-sm {{$attendance->isActive == '1'  ? 'bg-gradient-success' : 'bg-gradient-danger'}}">
                            {{$attendance->isActive == '1' ? 'YES':'NO'}}
                          </span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->user->name ?? ''}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->created_at->format('M j , Y h:i A') ?? ''}}</h6>
                         
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
        <h6 class="text-uppercase">ATTENDANCE INFORMATION</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
        <form method="post" id="myForm" class="contact-form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label text-uppercase" >Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-title"></strong>
                    </span>
                </div>
               
                <div class="form-group">
                    <label class="control-label text-uppercase" >Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="10" class="form-control"></textarea>
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-description"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Is Active <span class="text-danger">*</span></label>
                    <select name="isActive" id="isActive" class="form-control" style="appearance: searchfield;">
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group" id="div_attended">
                    <label class="control-label text-uppercase" >All Attended <span class="text-danger">*</span></label>
                    <div id="all_attended">

                    </div>
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
        $('#div_attended').hide();

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
      $('#div_attended').show();
      $('#id').val(id);

      $.ajax({
          url :"/admin/attendances/"+id+"/edit",
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
              var all_attended = "";
              $.each(data.attendeds, function(key,value){
                all_attended += "<h6 class='mb-0 p-2 bg-primary text-white'>"+value.name+" - "+value.time+"</h6>";
                
              })
              $('#all_attended').empty().append(all_attended);
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
        var url = "/admin/attendances";
        var method = "POST";

        if($('#action').val() == 'EDIT'){
        var id = $('#id').val();
            url = "/admin/attendances/" + id;
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

    $(document).on('click', '.remove', function(){
        var id = $(this).attr('id');
        $.confirm({
            title: 'Confirmation',
            content: 'You really want to remove this record?',
            type: 'red',
            buttons: {
                confirm: {
                    text: 'confirm',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                        return $.ajax({
                            url:"/admin/attendances/"+id,
                            method:'DELETE',
                            data: {
                                _token: '{!! csrf_token() !!}',
                            },
                            dataType:"json",
                            beforeSend:function(){
                                $(".remove").attr("disabled", true);
                            },
                            success:function(data){
                                $(".remove").attr("disabled", false);
                                
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
