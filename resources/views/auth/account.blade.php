@extends('../layouts.resident')
@section('sub-title','Account')

@section('navbar')
    @include('../partials.resident.navbar')
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

</style>
@endsection

@section('content')

<main id="main">

  <section class="contact mt-5">
    <div class="container">
        <div class="section-title" data-aos="zoom-out">
          <h2>Account</h2>
          <p>Complete all required fields</p>
        </div>
       
        <div class="row mt-2">
          <div class="col-lg-10 mt-lg-0 mx-auto" data-aos="fade-left">
                <div class="card">
                    @if(auth()->user()->resident->isRegister == 0)
                    
                    @else
                        @if(auth()->user()->resident->isApprove == 0)
                            <div class="cta">
                                <div class="container">
                                    <div class="row" data-aos="zoom-out">
                                        <div class="col-lg-9 text-center text-lg-start ">
                                            <h6 class="text-white">Wait for the administrator's response to verify your account</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif
                  
                    
                    <div class="card-body">
                        <form method="post" id="myForm">
                            @csrf
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email: <span class="text-danger">*</span></label>
                                        <input id="email" name="email" type="text" class="form-control" readonly value="{{Auth()->user()->email ?? ''}}">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="picture-container">
                                        <div class="form-group">
                                            <label>Upload ID Here: <span class="text-danger">*</span></label>
                                            <div class="picture">
                                                <img src="@if(Auth()->user()->resident->id_image != '') /resident/img/id/{{Auth()->user()->resident->id_image}} @else {{ asset('/resident/img/id.jpg') }}  @endif " class="picture-src" id="wizardPicturePreview" title="" />
                                                <input type="file" id="wizard-picture" name="id_image" accept="image/*" >
                                                
                                            </div>
                                            <span >
                                                <strong style="font-size: .875em; color: #dc3545;" id="error-wizard-picture"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>First Name: <span class="text-danger">*</span></label>
                                        <input id="first_name" name="first_name" type="text" class="form-control" value="{{Auth()->user()->resident->first_name ?? ''}}" autofocus>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-first_name"></strong>
                                        </span>
                                    </div> 
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Middle Name:</label>
                                        <input id="middle_name" name="middle_name" type="text" class="form-control" value="{{Auth()->user()->resident->middle_name ?? ''}}">
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-middle_name"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Last Name: <span class="text-danger">*</span></label>
                                        <input id="last_name" name="last_name" type="text" class="form-control" value="{{Auth()->user()->resident->last_name ?? ''}}">
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-last_name"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address: <span class="text-danger">*</span></label>
                                        <input id="address" name="address" type="text" class="form-control" value="{{Auth()->user()->resident->address ?? ''}}">
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-address"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Number: <span class="text-danger">*</span></label>
                                        <input id="contact_number" name="contact_number" type="text" class="form-control" value="{{Auth()->user()->resident->contact_number ?? ''}}">
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-contact_number"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="action_button" class="mt-5 btn-wd">SUBMIT</button>
                            </div>
                            <p  class="text-center mt-3 color-black" style="font-size: 15px; font-weight: 500;" ><a href="/password/reset">Change your password?</a></p>
                        </form>
                        
                    </div>
                  
                                        
                </div>
            
            
          </div>
        </div>
        
    </div>
  </section>
</main>



@endsection

@section('footer')
    @include('../partials.resident.footer')
@endsection

@section('script')
<script> 
// Prepare the preview for profile picture
$(document).ready(function(){
    $("#wizard-picture").change(function(){
        readURL(this);
    });

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#myForm').on('submit', function(event){
            event.preventDefault();
            $('.form-control').removeClass('is-invalid')
            var action_url = "/resident/account";
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
                                $('#wizard-picture').addClass('is-invalid')
                                $('#error-wizard-picture').text(value)
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

