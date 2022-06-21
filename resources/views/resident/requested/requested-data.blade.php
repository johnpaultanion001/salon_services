@forelse($requests as $request)
  <div class="col-lg-6">
    <div class="member d-flex align-items-start mt-4">
      <div class="member-info">
        <h4>{{$request->document->name ?? ''}}</h4>
        <span>{{$request->created_at->diffForHumans()}}</span>
        <div class="row">
          <div class="col-12">
            <table class="table">
              <tbody>
                <tr>
                  <th>Request Tracking Number:</th>
                  <td class="text-dark">{{$request->request_number ?? ''}}</td>
                </tr>
                <tr>
                  <th>Status:</th>
                  <td class="{{$request->status == 'PENDING' ? 'text-warning' : ''}}  {{$request->status == 'APPROVED' ? 'text-success' : ''}} {{$request->status == 'COMPLETED' ? 'text-primary' : ''}} {{$request->status == 'CANCELLED' || $request->status == 'DECLINED' ? 'text-danger' : ''}}">{{$request->status}}</td>
                </tr>
                <tr>
                  <th>Claiming Option:</th>
                  <td class="text-uppercase">{{$request->claiming_option ?? ''}}</td>
                </tr>
                <tr>
                  <th>Tentative Claiming Date:</th>
                  <td>
                    @if($request->claiming_date != '')
                      {{\Carbon\Carbon::createFromFormat('Y-m-d',$request->claiming_date)->format('M j , Y')}}
                    @else
                      N/A
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Downloadable File:</th>
                  <td>
                    @if($request->downloadable != '')
                      <a href="/resident/downloadable_file/{{$request->downloadable}}">{{$request->downloadable}}</a>
                    @else
                      N/A
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-6">
            <p>
              <a id="messages_count{{$request->id}}" class="link-primary" data-toggle="collapse" href="#collapseExample{{$request->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                {{$request->messages()->count()}}  Message{{$request->messages()->count() == 0 ? '':'s'}} 
              </a>
            </p>
          </div>
          <div class="col-6 text-right">
            @if($request->status == 'PENDING')
              <a href="#" class="btn btn-sm btn-primary edit text-uppercase" edit="{{$request->id}}">Edit</a>
              <a href="#" class="btn btn-sm btn-danger cancel text-uppercase" cancel="{{$request->id}}">Cancel</a>
            @endif
          </div>
        </div>
        <div class="collapse mt-3" id="collapseExample{{$request->id}}">
            <div class="card card-body text-left">
                <form method="post" class="myMsgForm">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control msg" name="message" placeholder="Enter a message" required>
                        <input type="hidden" class="form-control" name="request_id" value="{{$request->id}}">
                        <div class="input-group-append">
                            <span class="input-group-text"><button  type="submit" class="btn text-primary" style="background-color:transparent;" ><i class="ri-send-plane-2-fill"></i></button></span>
                            
                        </div>
                    </div>
                </form>
                <div id="msg_section{{$request->id}}">
                    @if($request->messages()->count() < 1)
                    <hr>
                          <b> NO MESSAGE FOUND</b>  <br>
                    @else
                      @foreach($request->messages()->get() as $msg)
                      <hr>
                          <b> {{$msg->user->name ?? $msg->user->resident->first_name .' '. $msg->user->resident->last_name}}</b>  <br>
                          <h6>{{$msg->message ?? ''}}</h6> <br>
                          <small class="mb-0">{{$msg->created_at->diffForHumans()}}</small>
                      @endforeach
                    @endif
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
@empty
  <div class="col-lg-6 mx-auto">
    <div class="member d-flex align-items-start mt-4" >
      <div class="member-info">
        <h4>No data available</h4>
      </div>
    </div>
  </div>
@endforelse


<script> 
  $(document).ready(function(){
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
  });
</script> 
   
