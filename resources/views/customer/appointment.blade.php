@extends('../layouts.customer')
@section('sub-title','Appointing')

@section('navbar')
    @include('../partials.customer.navbar')
@endsection
@section('style')
<style>
.picture-container {
  position: relative;
  cursor: pointer;
}
.picture {
  width: 120px;
  height: 106px;
  background-color: #d8d1c9;
  border: 4px solid transparent;
  color: #FFFFFF;
  margin: 5px auto;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
  object-fit: cover;

}
.picture:hover {
  border-color: #2ca8ff;
}
.picture-src {
  width: 100%;
}
.picture input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}

.cta {
    margin: 5px;
    padding: 10px;
    background-color: #18ce0f !important;
}
hr{
   background: #fd9042;
}




</style>
@endsection

@section('content')

<main id="main" >

  <section class="contact mt-5" >
    <div class="container">
        <div class="section-title" data-aos="zoom-out">
          <h2>Service</h2>
          <p>Appointing {{$service->name ?? ''}}</p>
        </div>

        <div class="row mt-2">
          <div class="col-lg-8 mt-lg-0 mx-auto" data-aos="fade-left">
                <form method="post" id="myForm" class="myform" role="form">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Service: <span class="text-danger">*</span></label>
                                <input id="service" name="service" type="text" class="form-control" readonly value="{{$service->name ?? ''}}">
                                <input id="service_id" type="hidden" value="{{$service->id}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h5>Choose a staff to service you</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="staff_id" id="staff_id" class="form-control">
                                    <option value="0">Any Available</option>
                                    @foreach($service->staffs()->get() as $staff)
                                        <option value="{{$staff->id}}">{{$staff->name}}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-staff_id"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h5>Choose date and time</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date </label>
                                <input type="date" id="appointment_date" name="appointment_date" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-appointment_date"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time </label>
                                <input type="time" id="appointment_time" name="appointment_time" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-appointment_time"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Note </label>
                                <input type="text" id="note" name="note" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-note"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h5>For payment</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Appointment Fee: <h4>₱ 50</h4></label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Upload receipt: <span class="text-danger">* </span><a href="#"  id="how_to_pay">How to pay?</a></label>
                                <input id="receipt" name="receipt" type="file" class="form-control" >
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-receipt"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button id="action_button" type="submit" class="mt-5 btn-wd btn text-uppercase">SUBMIT</button>
                    </div>

                </form>
          </div>
        </div>

    </div>
  </section>
</main>

<div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-uppercase font-weight-bold"></h5>
            <button type="button" class="btn text-danger p-0 close_modal">
              <i class="ri-close-line"></i>
            </button>
          </div>
            <div class="modal-body" id="modal_content">

            </div>

        </div>
      </div>
</div>


@endsection

@section('footer')
    @include('../partials.customer.footer')
@endsection

@section('script')
<script>
$(document).ready(function(){

        $('#myForm').on('submit', function(event){
            event.preventDefault();
            $('.form-control').removeClass('is-invalid')
            var action_url = "/customer/appointment_service/" + $('#service_id').val();
            var type = "POST";

            $.ajax({
                url: action_url,
                method:type,
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData: false,

                dataType:"json",
                beforeSend:function(){
                    $("#action_button").attr("disabled", true);
                    $("#action_button").text("Submitting");
                },
                success:function(data){
                    $("#action_button").attr("disabled", false);
                    $("#action_button").text("Submit");
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
                                        window.location.href = '/customer/manage_appointment';
                                    }
                                },
                            }
                        });
                    }

                }
            });
        });

       $(document).on('click', '#validation_requirements', function(){
            $('.modal-title').text('Validation for requirements');
            var content = "";
                content += '<p>NOTE ON SUBMITTING REQUIREMENTS</p>';
                content += '<ul>';
                    content += '<li>MAKE SURE IMAGE OR SCREENSHOT IS READABLE. AVOID BLURRY IMAGES.</li>';
                    content += '<li>WHEN SUBMITTING A DOCUMENT, CONVERT IT INTO PDF FILE.</li>';
                    content += '<li>ENSURE THAT ALL INFORMATION IN THE IMAGE OR SCREENSHOT IS CLEAR AND ALL VISIBLE.</li>';
                content += '</ul>';

            $('#modal_content').empty().append(content);
            $('#myModal').modal('show');
       });

        $(document).on('click', '.close_modal', function(){
            $('#myModal').modal('hide')
        });
        $(document).on('click', '#how_to_pay', function(){
            $('.modal-title').text('How to pay ?');
            var content = "";
                content += '<p>GCash</p>';
                content += '<ul>';
                    content += '<li>On your GCash app dashboard, click on Pay Bills>Government>E-Barangay and input the amount you need to pay as well as the other information required. (Double check the amount and information you have input to avoid any errors or issues from happening.)</li>';
                    content += '<li>Once you have already paid, download a receipt or take a screenshot for proof of payment.</li>';
                    content += '<li>Attach it to the proof of payment section on the E-Barangay portal that will appear once you click on the ‘Request Now’ button.</li>';
                content += '</ul>';
                content += '<p>Paymaya</p>';
                content += '<ul>';
                    content += '<li>On your Paymaya app dashboard, click on Bills>Government>E-Barangay and input the amount you need to pay as well as the other information required. (Double check the amount and information you have input to avoid any errors or issues from happening.)</li>';
                    content += '<li>Once you have already paid, download a receipt or take a screenshot for proof of payment.</li>';
                    content += '<li>Attach it to the proof of payment section on the E-Barangay portal that will appear once you click on the ‘Request Now’ button.</li>';
                content += '</ul>';
                content += '<br>';
                content += '<p class="text-center text-danger">Please wait for 24-48 hours for the confirmation of your payment and you will be notified on your account dashboard once your document is ready for claiming.</p>';

            $('#modal_content').empty().append(content);
            $('#myModal').modal('show');
        });

});
</script>
@endsection

