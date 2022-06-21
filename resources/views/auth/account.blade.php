@extends('../layouts.resident')
@section('sub-title','ACCOUNT')

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

  <section class="contact mt-5 section-bg">
    <div class="container">
        <div class="section-title" data-aos="zoom-out">
          <h2>Account</h2>
          <p>Complete all required fields</p>
        </div>
       
        <div class="row mt-2">
          <div class="col-lg-10 mt-lg-0 mx-auto" data-aos="fade-left">
                    @if(auth()->user()->resident->isRegister == 0)
                    
                    @else
                        @if(auth()->user()->resident->status == 'PENDING')
                            <div class="container bg-success p-2">
                                <div class="row" data-aos="zoom-out">
                                    <div class="col-lg-9 text-center text-lg-start ">
                                        <h6 class="text-white">Wait for the administrator's response to verify your account</h6>
                                    </div>
                                </div>
                            </div>
                        @elseif(auth()->user()->resident->status == 'DECLINED')
                            <div class="container bg-warning p-2">
                                <div class="row" data-aos="zoom-out">
                                    <div class="col-lg-9 text-center text-lg-start ">
                                        <h6 class="text-white">After carefully verifying the information you have submitted, your account application has been declined. Please check the information you have submitted.</h6>
                                    </div>
                                </div>

                            </div>
                        @elseif(auth()->user()->resident->status == 'DEACTIVATED')
                            <div class="container bg-danger p-2">
                                <div class="row" data-aos="zoom-out">
                                    <div class="col-lg-9 text-center text-lg-start ">
                                        <h6 class="text-white">We’ve checked your account and it seems that there are suspicious activities on it. With this, we have deactivated your account to prevent any illegal activities from happening.</h6>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endif
                    <form method="post" id="myForm" class="myform">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email: <span class="text-danger">*</span></label>
                                    <input id="email" name="email" type="text" class="form-control" readonly value="{{Auth()->user()->email ?? ''}}">
                                </div> 
                            </div>
                            <div class="col-md-6">
                            <label>Upload ID Here: <span class="text-danger">*</span> <a href="#"  id="list_ids">Acceptable Valid IDs</a></label>
                                <div class="picture-container">
                                    <div class="form-group">
                                        
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
                            <button type="submit" id="action_button" class="mt-5 btn-wd btn text-uppercase">SUBMIT</button>
                        </div>
                        <p  class="text-center mt-3 color-black" style="font-size: 15px; font-weight: 500;" ><a href="#" id="change_password">Change your password?</a></p>
                    </form>
            
          </div>
        </div>
        
    </div>
  </section>
</main>


<form method="post" id="cpForm" class="">
    @csrf
    <div class="modal fade" id="cpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase font-weight-bold">CHANGE PASSWORD</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times text-primary"></i>
                 </button>
    
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <label class="control-label" >Current Password<span class="text-danger">*</span></label>
                    <input type="password" name="current_password" id="current_password" class="form-control"/>
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-current_password"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label" >New Password<span class="text-danger">*</span></label>
                    <input type="password" name="new_password" id="new_password" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-new_password"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label" >Confirm Password<span class="text-danger">*</span></label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-confirm_password"></strong>
                    </span>
                </div>       

                <input type="hidden" name="hidden_id" id="hidden_id" value="{{Auth::user()->id}}" />
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                    <input type="submit" name="cp_action_button" id="cp_action_button" class="btn  btn-primary" value="UPDATE"/>
                </div>
            </div>
        </div>
    </div>
</form>

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
                    $("#action_button").text('Submitting');
                },
                success:function(data){
                    $("#action_button").attr("disabled", false);
                    $("#action_button").text('Submit');

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

        $(document).on('click', '#change_password', function(){
            $('#cpModal').modal('show');
            $('#cpForm')[0].reset();
            $('.form-control').removeClass('is-invalid');
        });

        $('#cpForm').on('submit', function(event){
            event.preventDefault();
            $('.form-control').removeClass('is-invalid')
            var id = $('#hidden_id').val();
            var action_url = "/resident/account/change_password/" + id;
            var type = "PUT";

            $.ajax({
                url: action_url,
                method:type,
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $("#cp_action_button").attr("disabled", true);
                },
                success:function(data){
                    $("#cp_action_button").attr("disabled", false);
                    if(data.errors){
                        $.each(data.errors, function(key,value){
                        if(key == $('#'+key).attr('id')){
                            $('#'+key).addClass('is-invalid')
                            $('#error-'+key).text(value)
                        }
                        })
                    }
                    if(data.success){
                        $('.form-control').removeClass('is-invalid');
                        $.confirm({
                            title: 'Confirmation',
                            content: data.success,
                            type: 'green',
                            buttons: {
                                    confirm: {
                                        text: 'STAY LOGGED IN',
                                        btnClass: 'btn-blue',
                                        keys: ['enter', 'shift'],
                                        action: function(){
                                            location.reload();
                                        }
                                    },
                                    cancel:  {
                                        text: 'LOGOUT',
                                        btnClass: 'btn-red',
                                        action: function(){
                                            document.getElementById('logout-form').submit();
                                        }
                                    }
                                }
                            });
                    }
                
                }
            });
        });
        
        $(document).on('click', '#list_ids', function(){
            $('.modal-title').text('Acceptable Valid IDs');
            var content = "";
                content += '<ul>';
                    content += '<li>Passport</li>';
                    content += '<li>Driver’s License</li>';
                    content += '<li>PhilSys ID</li>';
                    content += '<li>UMID</li>';
                    content += '<li>Voter’s ID</li>';
                    content += '<li>PRC ID</li>';
                    content += '<li>Postal ID (Digital)</li>';
                    content += '<li>SSS Card</li>';
                    content += '<li>OWWA E-Card</li>';
                    content += '<li>Pag-Ibig ID</li>';
                    content += '<li>Philhealth ID</li>';
                    content += '<li>TIN ID</li>';
                    content += '<li>School ID (for students)</li>';
                content += '</ul>';
               
                content += '<p class="text-center text-danger">Please make sure to submit an image file of your Valid ID (.jpg or .png)</p>';

            $('#modal_content').empty().append(content);
            $('#myModal').modal('show');
        });
        $(document).on('click', '.close_modal', function(){
            $('#myModal').modal('hide')
        });

});
</script>
@endsection

