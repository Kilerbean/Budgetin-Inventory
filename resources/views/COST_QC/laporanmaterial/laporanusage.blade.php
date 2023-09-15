@extends('templates.dasar')
@php
  $title = 'Material Usage Report';
  $pretitle = 'COST-QC LAB';

@endphp 

@push('page-action')
  <a class="btn btn-success" href="{{ route('Dashboards') }}"> Back</a>
 
  @endpush
@section('coba')
<div class="text-center">
<a class="btn btn-info" href="{{ route('laporanusagepdf') }}"><i class="fa fa-file-pdf"></i> Download PDF</a>
</div>
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Report all Material Usage</h3>
      </div>
      
      <div class="table-responsive ">
        <table class="table card-table table-bordered  table-vcenter text-nowrap datatable">
          <thead>
            <tr>
        <th>No</th>
        <th>Type of Material</th>
        <th>Type of Budget</th>
        <th>Catalog Number</th>
        <th>Name of Material</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Status</th>
    </tr>
    @foreach ($usage as $usages)
    <tr>
      
        <td>{{ ++$i }}</td>
        <td>{{ $usages ->Type_of_Material }}</td>
        <td>{{ $usages ->Barang->Type_of_Budget }}</td>
        <td>{{ $usages->Catalog_Number }}</td>
        <td>{{ $usages->Barang->Name_of_Material }}</td>
        <td>{{ $usages->Quantity }}</td>
        <td>{{ $usages->Unit }}</td>
        <td>{{ $usages->Status == 1 ? 'Aktif' : 'InAktif' }}</td>
        
    </tr>
    @endforeach
</table>
</div>



@endsection