@extends('templates.dasar')

@section('coba')

@push('page-action')
  <a class="btn btn-success" href="{{ route('Dashboards') }}"> Back</a>

  @endpush

@yield('financial')
<br>
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
</div>
<br>

@include('financial.audit')

<script type="text/javascript">
    $(function() {
        var table = $('#listlowss,#listupcoming').DataTable({

        });
    });
</script>
  @endsection