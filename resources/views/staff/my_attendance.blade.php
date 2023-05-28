@extends('../layouts.admin')
@section('sub-title','MY ATTENDANCE')

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
                    <h6>MANAGE MY ATTENDANCE</h6>
                </div>
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
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Created By</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($attendances as $attendance)
                    @php
                        $attendance1 = App\Models\StaffAttendance::where('staff_id', auth()->user()->id)->where('attendance_id', $attendance->id)->first();
                        if($attendance1 == null){
                            $attend = 0;
                        }else{
                            $attend = 1;
                        }
                    @endphp
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            @if($attend == 1)
                            <button id="{{$attendance->id}}" class="btn btn-secondary btn-sm" >
                              Attended
                            </button>
                            @else
                            <button id="{{$attendance->id}}" class="btn btn-success btn-sm attend" >
                              Attend
                            </button>
                            @endif
                           
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
    


    $(document).on('click', '.attend', function(){
        var id = $(this).attr('id');
        $.confirm({
            title: 'Confirmation',
            content: 'You really want to save this record?',
            type: 'green',
            buttons: {
                confirm: {
                    text: 'confirm',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                        return $.ajax({
                            url:"/admin/attendances/"+id+"/attend",
                            method:'POST',
                            data: {
                                _token: '{!! csrf_token() !!}',
                            },
                            dataType:"json",
                            beforeSend:function(){
                                $(".attend").attr("disabled", true);
                            },
                            success:function(data){
                                $(".attend").attr("disabled", false);
                                
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
