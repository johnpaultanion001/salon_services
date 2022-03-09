@foreach($resident->requestedDocuments()->get() as $requested)
<tr>
    <td class="w-30">
        <div class="d-flex px-2 py-1 align-items-center">
            <div class="icon icon-shape icon-sm me-3 bg-warning shadow text-center">
            <i class="fa-solid fa-file-export text-white" style="font-size: 15px;"></i>
            </div>
            <div class="ms-4">
            <p class="text-xs font-weight-bold mb-0">Document:</p>
            <h6 class="text-sm mb-0 text-uppercase">
                <h6 class="text-sm mb-0 text-uppercase">{{$requested->document->name}}</h6>
            </h6>
            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">Requirements:</p>
        <h6 class="text-sm mb-0 text-uppercase">{{$requested->document->requirements}}</h6>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">Amount:</p>
        <h6 class="text-sm mb-0 text-uppercase">{{$requested->document->amount}}</h6>
        <a href="" data-toggle="collapse" data-target="#reciept" class="accordion-toggle text-sm">View Reciepts</a> 
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">Payment:</p>
        <span class="badge {{$requested->isPaid == 1 ? 'bg-success' : 'bg-danger'}} text-uppercase cursor-pointer">{{$requested->isPaid == 1 ? 'Paid' : 'Unpaid'}}</span>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">Status:</p>
        <span class="badge text-uppercase cursor-pointer {{$requested->status == 'PENDING' ? 'bg-warning' : ''}}  {{$requested->status == 'APPROVED' ? 'bg-success' : ''}} {{$requested->status == 'COMPLETED' ? 'bg-primary' : ''}} {{$requested->status == 'CANCELED' ? 'bg-danger' : ''}}">{{$requested->status}}</span>
    </td>
    <td class="align-middle text-sm">
        <div class="d-flex">
                <i id="{{$requested->id}}" class="fa fa-cog  cursor-pointer text-primary  pending_view pending_view{{$requested->id}}"></i>
        </div>
    </td>
</tr>
@endforeach


