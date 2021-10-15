@extends('../layouts.admin')
@section('sub-title','Resident')
@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection



@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      
    </div>
</div>

<div class="container-fluid mt--6 table-load">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-uppercase" id="titletable">Resident List</h3>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-brgy display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($residents as $resident)
                    <tr>
                      <td>
                          <button type="button" name="edit" edit="{{  $resident->id ?? '' }}"  class="edit  btn btn-sm btn-link text-primary">Edit Info</button>
                         
                      </td>
                      <td>
                          {{  $resident->name ?? '' }}
                      </td>
                      <td>
                          {{  $resident->email ?? '' }}
                      </td>

                      <td>
                            {{  $resident->contact_number ?? '' }}
                      </td>
                      <td>
                            {{  $resident->address ?? '' }}
                      </td>
                      <td>
                          {{ $resident->created_at->format('l, j \\/ F / Y h:i:s A') }}
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

<form method="post" id="myForm" class="contact-form">
    @csrf
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
                    <div class="form-group">
                      <label for="status" class="bmd-label-floating">Status</label>
                      <select name="status" id="status" class="form-control select2">
                          <option value="" disabled selected>Select Status</option>
                              <option value="0">Pending</option>
                              <option value="1">Approve</option>
                              <option value="2">Decline</option>
                      </select>
                    </div>
                  
                <div class="form-group">
                  <label for="comment" id="lblpurpose" class="bmd-label-floating">Comment:</label>
                  <textarea class="form-control comment" rows="4" name="comment" id="comment"></textarea>
                  <span class="invalid-feedback" role="alert">
                      <strong id="error-comment"></strong>
                  </span>
                </div>

                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer">
            <input type="submit" name="action_button" id="action_button" class="btn btn-link text-primary" value="Save" />
            <button type="button" class="btn text-danger btn-link" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>

@section('footer')
    @include('../partials.admin.footer')
@endsection


@endsection

@section('script')
<script>
  $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    sale: [[ 1, 'desc' ]],
    pageLength: 100,
    'columnDefs': [{ 'orderable': false, 'targets': 0 }],
  });

  $('.datatable-brgy:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
  });


</script>
@endsection
