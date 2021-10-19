@extends('../layouts.admin')
@section('sub-title','Dashboard')
@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('content')
<div class="container pt-2">
    <a href="../assets/img/brgy/bg1.jpg">
      <div class="card border-0 brgy_chart">
          <img src="../assets/img/brgy/bg1.jpg" alt="BARANGAY ORGANIZATIONAL CHART">
      </div>
    </a>
</div>
    @section('footer')
        @include('../partials.admin.footer')
    @endsection
@endsection


@section('script')
<script> 
</script>
@endsection




