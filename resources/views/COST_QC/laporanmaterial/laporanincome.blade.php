@extends('templates.dasar')
@php
  $title = 'Incoming of Material Report';
  $pretitle = 'COST-QC LAB';

@endphp 

@push('page-action')
  <a class="btn btn-success" href="{{ route('Dashboards') }}"> Back</a>
  @endpush


@section('coba')
<div class="text-center">
  <a class="btn btn-info" href="{{ route('laporanincomepdf') }}"><i class="fa fa-file-pdf"></i> Download PDF</a>
</div>

{{-- <div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Incoming Material</h2>
        </div>
        <div class="float-end">

        </div>
    </div>
</div> --}}

{{-- @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif --}}

<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Report of All Incoming Material</h3>
      </div>
      
      <div class="table-responsive ">
        <table class="table card-table table-bordered   table-vcenter  text-nowrap datatable">
          <thead>
            <tr>
       
        <th>No</th>
        <th>PO Date</th>
        <th>No PR</th>
        <th>Catalog Number</th>
        <th>Name of Material</th>
        <th>Quantity</th>
        <th>Price/unit</th>
        <th>Total</th>
        <th>Unit</th>
        <th>Propose</th>
        <th>No PO</th>
        <th>No Batch</th>
        <th>Expire Date</th>
        <th>Status</th>
    </tr>
    @foreach ($incomes as $income)
    <tr>
        
         
        <td>{{ ++$i }}</td>
        <td>{{ $income->PO_Date }}</td>
        <td>{{ $income->No_PR }}</td>
        <td>{{ $income->Catalog_Number }}</td>
        <td>{{ $income->Barang->Name_of_Material }}</td>
        <td>{{ $income->Quantity }}</td>
        <td>{{ $income->Prices }}</td>
        <td>{{ $income->Total }}</td>
        <td>{{ $income->Unit }}</td>
        <td>{{ $income->Propose }}</td>
        <td>{{ $income->No_PO }}</td>
        <td>{{ $income->no_batch }}</td>
        <td>{{ $income->Expire_Date }}</td>
        <td>{{ $income->Status == 1 ? 'DiTerima' : 'BelumDiTerima' }}</td>
        
    </tr>
    @endforeach
</table>
</div>
<div class="row text-center">

</div>


@endsection