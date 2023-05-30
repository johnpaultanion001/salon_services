@forelse($appointments as $appointment)
  <div class="col-lg-6">
    <div class="member d-flex align-items-start mt-4">
      <div class="member-info">
        <h4>{{$appointment->service->name ?? ''}}</h4>
        <span>{{$appointment->created_at->diffForHumans()}}</span>
        <div class="row">
          <div class="col-12">
            <table class="table">
              <tbody>
                <tr>
                  <th>Appointment  ID:</th>
                  <td class="text-dark">{{$appointment->id ?? ''}}</td>
                </tr>
                <tr>
                  <th>Status:</th>
                  <td class="{{$appointment->status == 'PENDING' ? 'text-warning' : ''}}  {{$appointment->status == 'APPROVED' ? 'text-success' : ''}} {{$appointment->status == 'COMPLETED' ? 'text-primary' : ''}} {{$appointment->status == 'CANCELLED' || $appointment->status == 'DECLINED' ? 'text-danger' : ''}}">{{$appointment->status}}</td>
                </tr>
                <tr>
                  <th>Appointment Date And Time:</th>
                  <td class="text-uppercase">{{\Carbon\Carbon::createFromFormat('Y-m-d',$appointment->appointment_date)->format('M j , Y')}} at {{$appointment->appointment_time}}</td>
                </tr>

              </tbody>
            </table>
          </div>
          <div class="col-6">
            <p>
              <a id="messages_count{{$appointment->id}}" class="link-primary" data-toggle="collapse" href="#collapseExample{{$appointment->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                {{$appointment->messages()->count()}}  Message{{$appointment->messages()->count() == 0 ? '':'s'}}
              </a>
            </p>
          </div>
          <div class="col-6 text-right">
            @if($appointment->status == 'PENDING')
              <a href="#" class="btn btn-sm btn-primary edit text-uppercase" edit="{{$appointment->id}}">Edit</a>
              <a href="#" class="btn btn-sm btn-danger cancel text-uppercase" cancel="{{$appointment->id}}">Cancel</a>

            @endif
          </div>
          <div class="col-md-12 mt-2">

          @if($appointment->status == 'COMPLETED')
                @php
                    $feedback = App\Models\Feedback::where('appointment_id',$appointment->id)->first();
                    if($feedback == null){
                        $feedback1 = 0;
                    }else{
                        $feedback1 = 1;
                    }
                @endphp
                @if($feedback1 == 0)
                <form method="post" class="myFeedbackForm">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control feedback" name="feedback" placeholder="Send a feedback" required>
                        <input type="hidden" class="form-control" name="appointment_id" value="{{$appointment->id}}">
                        <div class="input-group-append">
                            <span class="input-group-text"><button  type="submit" class="btn text-primary" style="background-color:transparent;" ><i class="ri-send-plane-2-fill"></i></button></span>

                        </div>
                    </div>
                </form>
                @endif
                <div id="feedback_section{{$appointment->id}}">
                    <hr>
                        <b class="text-primary">Your Feedback</b><br>
                          <h6>{{$appointment->feedback->feedback ?? ''}}</h6> <br>
                </div>
            @endif
          </div>
        </div>
        <div class="collapse mt-3" id="collapseExample{{$appointment->id}}">
            <div class="card card-body text-left">
                <form method="post" class="myMsgForm">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control msg" name="message" placeholder="Enter a message" required>
                        <input type="hidden" class="form-control" name="appointment_id" value="{{$appointment->id}}">
                        <div class="input-group-append">
                            <span class="input-group-text"><button  type="submit" class="btn text-primary" style="background-color:transparent;" ><i class="ri-send-plane-2-fill"></i></button></span>

                        </div>
                    </div>
                </form>
                <div id="msg_section{{$appointment->id}}">
                    @if($appointment->messages()->count() < 1)
                    <hr>
                          <b> NO MESSAGE FOUND</b>  <br>
                    @else
                      @foreach($appointment->messages()->get() as $msg)
                      <hr>
                          <b> {{$msg->user->name ?? $msg->user->customer->first_name .' '. $msg->user->customer->last_name}}</b>  <br>
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

    $('.myFeedbackForm').on('submit', function(event){
        event.preventDefault();

        $.ajax({
            url: "/admin/feedback",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function(){

            },
            success:function(data){
                var feedbacks = '';
                $.each(data.feedbacks, function(key,value){
                    feedbacks += '<hr>';
                    feedbacks += '<h6>'+value.feedback+'</h6> <br>';

                });
                $('#feedback_section'+data.appointment_id).empty().append(feedbacks);
                $('.myFeedbackForm').hide();
            }
        });
    });


  });
</script>

