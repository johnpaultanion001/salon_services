@extends('../layouts.admin')
@section('sub-title','FINDER RESIDENT')

@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('navbar')
    @include('../partials.admin.navbar')
@endsection


@section('content')
<div class="container-fluid py-4">
      <div class="row">
          <div class="card">
            <div class="card-body mx-auto">
              <div class="row">
                <div class="col-lg-8">
                    <div style="width: 400px;" id="reader"></div>
                </div>
              </div>
            </div>
          </div>
      </div>
      
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card ">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-2">RESIDENT INFORMATION</h6>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center ">
              <tbody id="tbody_resident">
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                         No data available
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card ">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-2">REQUESTED DOCUMENTS</h6>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center ">
              <tbody id="tbody_pending_documents">
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                         No data available
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
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
        <h6 class="title_document text-uppercase">REQUESTED DOCUMENTS</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Resident:</h6>
        <input type="text" class="form-control text-uppercase font-weight-bold" name="resident" id="resident" value="KIM"/>
        <span class="invalid-feedback" role="alert">
            <strong id="error-resident"></strong>
        </span>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Document:</h6>
        <input type="text" class="form-control text-uppercase font-weight-bold" name="document" id="document" value="KIM"/>
        <span class="invalid-feedback" role="alert">
            <strong id="error-document"></strong>
        </span>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Requirements:</h6>
        <input type="text" class="form-control text-uppercase font-weight-bold" name="requirement" id="requirement" value="KIM"/>
        <span class="invalid-feedback" role="alert">
            <strong id="error-requirement"></strong>
        </span>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Amount:</h6>
        <input type="text" class="form-control text-uppercase font-weight-bold" name="amount" id="amount" value="KIM"/>
        <span class="invalid-feedback" role="alert">
            <strong id="error-amount"></strong>
        </span>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Payment:</h6>
          <div class="d-flex" id="payment_section">
          
          </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="form-group">
        <h6 class="mb-0 text-uppercase">Status:</h6>
        <div id="status_section">
            
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 

@section('script')
<script src="{{ asset('/js/qr_code_scanner.js') }}"></script>
<script type="text/javascript">
    var qr_code = null;
    $(function () {
      $('#btn_requesting').click();
    });

    function onScanSuccess(qrCodeMessage) {
      $('#qr_result').val(qrCodeMessage)
      qr_code = qrCodeMessage;
      $.ajax({
        url :"/admin/finder_resident/"+qr_code,
        dataType:"json",
        beforeSend:function(){

        },
        success:function(data){
          if(data.no_data){
            var nodata = '';
              nodata += '<tr>';
                nodata += '<td class="w-30">';
                  nodata += '<div class="d-flex px-2 py-1 align-items-center">No data available</div>';
                nodata += '</td>';
              nodata += '</tr>';
            $("#tbody_resident").empty().append(nodata);
            var nodata1 = '';
              nodata1 += '<tr>';
                nodata1 += '<td class="w-30">';
                  nodata1 += '<div class="d-flex px-2 py-1 align-items-center">No data available</div>';
                nodata1 += '</td>';
              nodata1 += '</tr>';
            $("#tbody_pending_documents").empty().append(nodata1);
          }
          if(data.result){
            var resident = '';
            $.each(data.result, function(key,value){
              resident += '<tr>';
                resident += '<td class="w-30">';
                  resident += '<div class="d-flex px-2 py-1 align-items-center">';
                    resident += '<div class="icon icon-shape icon-sm me-3 bg-success shadow text-center">';
                      resident += '<i class="fa-solid fa-user text-white" style="font-size: 15px;"></i>';
                    resident += '</div>';
                    resident += '<div class="ms-4">';
                      resident += '<p class="text-xs font-weight-bold mb-0">Name:</p>';
                      resident += '<h6 class="text-sm mb-0 text-uppercase">'+value.name+'</h6>';
                    resident += '</div>';
                  resident += '</div>';
                resident += '</td>'
                resident += '<td>';
                  resident += '<p class="text-xs font-weight-bold mb-0">Email:</p>';
                  resident += '<h6 class="text-sm mb-0 text-uppercase">'+value.email+'</h6>';
                resident += '</td>';
                resident += '<td>';
                  resident += '<p class="text-xs font-weight-bold mb-0">Address:</p>';
                  resident += '<h6 class="text-sm mb-0 text-uppercase">'+value.address+'</h6>';
                resident += '</td>';
                resident += '<td>';
                  resident += '<p class="text-xs font-weight-bold mb-0">Contact Number:</p>';
                  resident += '<h6 class="text-sm mb-0 text-uppercase">'+value.contact_number+'</h6>';
                resident += '</td>';
                resident += '<td>';
                  resident += '<p class="text-xs font-weight-bold mb-0">Status:</p>';
                  resident += '<span class="badge text-uppercase cursor-pointer '+value.status_color+'">'+value.status+'</span>';
                resident += '</td>';
                resident += '<td class="align-middle text-sm">';
                  resident += '<div class="d-flex">';
                    resident += '<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="fa fa-cog  cursor-pointer"></i></button>';
                  resident += '</div>';
                resident += '</td>';
              resident += '</tr>';
            });
            $("#tbody_resident").empty().append(resident);
            pending_documents(qr_code);
          }
          
            
        }
    })

    }
    function onScanError(errorMessage) {
      //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);


    //PENDING DOCUMENTS  
    function pending_documents(qrCodeMessage){
      $.ajax({
          url: "/admin/finder_resident/"+qrCodeMessage+"/pending_documents", 
          type: "get",
          dataType: "HTMl",
          beforeSend: function() {
              
          },
          success: function(response){
              $("#tbody_pending_documents").html(response);
          }	
      })
    }

    $(document).on('click', '.pending_view', function(){
      var id = $(this).attr('id');

      $.ajax({
            url :"/admin/requested_document/"+id,
            dataType:"json",
            method:"get",
            beforeSend:function(){

            },
            success:function(data){
               $('#resident').val(data.resident)
               $('#document').val(data.document)
               $('#requirement').val(data.requirement)
               $('#amount').val(data.amount)
               $('.title_document').text('REQUESTED DOCUMENTS - '+data.document );
               //Payment
               var payment = '';
               payment += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm payment_status '+data.payment_unpaid+'" id="'+data.requested_id+'" payment_value="0">UNPAID</button>';
               payment += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm payment_status '+data.payment_paid+'" id="'+data.requested_id+'" payment_value="1">PAID</button>';
               $("#payment_section").empty().append(payment);

                //Status
                var status = '';
                status += '<div class="d-flex">';
                  status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_pending+'" id="'+data.requested_id+'" status_value="PENDING">PENDING</button>';
                  status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_approved+'" id="'+data.requested_id+'" status_value="APPROVED">APPROVED</button>';
                status += '</div>';
                status += '<div class="d-flex">';
                  status += '<button class="btn  w-100 px-3 mb-2 me-2 btn-sm status '+data.status_completed+'" id="'+data.requested_id+'" status_value="COMPLETED">COMPLETED</button>';
                  status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_canceled+'" id="'+data.requested_id+'" status_value="CANCELED">CANCELED</button>';
                status += '</div>';
                $("#status_section").empty().append(status);
            }
        });

      var fixedPlugin = document.querySelector('.fixed-plugin');
      var fixedPluginButton = document.querySelector('.pending_view'+id);


      var fixedPluginCard = document.querySelector('.fixed-plugin .card');
      var fixedPluginCloseButton = document.querySelectorAll('.fixed-plugin-close-button');

      if (!fixedPlugin.classList.contains('show')) {
            fixedPlugin.classList.add('show');
        } else {
            fixedPlugin.classList.remove('show');
        }


      fixedPluginCloseButton.forEach(function(el) {
        el.onclick = function() {
          fixedPlugin.classList.remove('show');
        }
      })

      document.querySelector('body').onclick = function(e) {
        if (e.target != fixedPluginButton && e.target != fixedPluginButtonNav && e.target.closest('.fixed-plugin .card') != fixedPluginCard) {
          fixedPlugin.classList.remove('show');
        }
      }
    });

    $(document).on('click', '.payment_status', function(){
      var id = $(this).attr('id');
      var payment_value = $(this).attr('payment_value');

      $.ajax({
        url :"/admin/requested_document/payment_status/payment_status",
        dataType:"json",
        method:"get",
        data: {id:id,payment_value:payment_value,_token:'{!! csrf_token() !!}'},
        beforeSend:function(){
          $('.payment_status').attr('disabled', true);
        },
        success:function(data){
          $('.payment_status').attr('disabled', false);
           //Payment
           var payment = '';
           payment += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm payment_status '+data.payment_unpaid+'" id="'+data.requested_id+'" payment_value="0">UNPAID</button>';
           payment += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm payment_status '+data.payment_paid+'" id="'+data.requested_id+'" payment_value="1">PAID</button>';
           $("#payment_section").empty().append(payment);
           pending_documents(qr_code);
        }
      })
    
    });
    $(document).on('click', '.status', function(){
        var id = $(this).attr('id');
        var status_value = $(this).attr('status_value');

        $.ajax({
          url :"/admin/requested_document/status/status",
          dataType:"json",
          method:"get",
          data: {id:id,status_value:status_value,_token:'{!! csrf_token() !!}'},
          beforeSend:function(){
              $('.status').attr('disabled', true);
          },
          success:function(data){
            //Status
            $('.status').attr('disabled', false);
            var status = '';
              status += '<div class="d-flex">';
                status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_pending+'" id="'+data.requested_id+'" status_value="PENDING">PENDING</button>';
                status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_approved+'" id="'+data.requested_id+'" status_value="APPROVED">APPROVED</button>';
              status += '</div>';
              status += '<div class="d-flex">';
                status += '<button class="btn  w-100 px-3 mb-2 me-2 btn-sm status '+data.status_completed+'" id="'+data.requested_id+'" status_value="COMPLETED">COMPLETED</button>';
                status += '<button class="btn w-100 px-3 mb-2 me-2 btn-sm status '+data.status_canceled+'" id="'+data.requested_id+'" status_value="CANCELED">CANCELED</button>';
              status += '</div>';
              $("#status_section").empty().append(status);
              pending_documents(qr_code);
          }
      })
    });
</script>


@endsection
