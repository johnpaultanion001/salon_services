@extends('../layouts.resident')
@section('sub-title','Requesting')

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
hr{
   background: #fd9042;
}




</style>
@endsection

@section('content')

<main id="main">

  <section class="contact mt-5">
    <div class="container">
        <div class="section-title" data-aos="zoom-out">
          <h2>Documents</h2>
          <p>Requesting {{$document->name ?? ''}}</p>
        </div>
       
        <div class="row mt-2">
          <div class="col-lg-10 mt-lg-0 mx-auto" data-aos="fade-left">
                <div class="card">
                   
                    <div class="card-body">
                        <form method="post" id="myForm">
                            @csrf
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Document: <span class="text-danger">*</span></label>
                                        <input id="document" name="document" type="text" class="form-control" readonly value="{{$document->name ?? ''}}">
                                        <input id="document_id" type="hidden" value="{{$document->id}}">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date you need: <span class="text-danger">*</span></label>
                                        <input id="date_you_need" name="date_you_need" type="text" class="form-control date_picker" >
                                       
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-date_you_need"></strong>
                                        </span>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <h5>List of Requirements </h5> 
                                   
                                </div>
                                @foreach($document->requirements()->get() as $requirement)
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{$requirement->name ?? ''}} <span class="text-danger">*</span></label>
                                                <input id="requirement{{$requirement->id}}" name="requirement[]" type="file" class="form-control" required>
                                            </div> 
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <h5>Claiming options</h5> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="claiming_option" id="claiming_option">
                                            <option value="deliver">Deliver (depending on the address, additional fees required)</option>
                                            <option value="pickUp">Pick Up (Local Barangay)</option>
                                            <option value="downloadable">Downloadable file (Ready to print)</option>
                                        </select>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-claiming_option"></strong>
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
                                        <label>Amount to pay: <h4>₱ {{$document->amount ?? ''}}</h4></label>
                                       
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Upload receipt: <span class="text-danger">* </span><a href="#">How to pay?</a></label>
                                        <input id="receipt" name="receipt" type="file" class="form-control" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-receipt"></strong>
                                        </span>
                                    </div> 
                                </div>
                            </div>
                            <div class="text-center">
                                <button id="action_button" type="submit" class="mt-5 btn-wd">SUBMIT</button>
                            </div>
                          
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

        $('#myForm').on('submit', function(event){
            event.preventDefault();
            $('.form-control').removeClass('is-invalid')
            var action_url = "/resident/request_document/" + $('#document_id').val();
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

        var today = new Date();
        var tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);
        $('.date_picker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            },
            format: 'YYYY-MM-DD',
            locale: 'en',
            minDate: tomorrow,

        });
});
</script>
@endsection

