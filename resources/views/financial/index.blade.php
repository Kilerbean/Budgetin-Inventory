@extends('templates.dasar')
@php
  $title = 'Financial';
  $pretitle = 'COST-QC LAB';

@endphp 
@section('coba')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List of all Budget </h3>
      </div>
      
      <div class="table-responsive table-bordered">
        <table class="table card-table table-vcenter text-nowrap datatable">
          <thead>
            {{-- <?php $i = 0; ?> --}}
            <tr>
        {{-- <th>No</th> --}}
        <th >Action</th>
        <th>Bulan dan Tahun</th>
        <th>Tipe Budget</th>
        <th>Budget</th>
        <th>Actual</th>
        <th>Keterangan</th>
    </tr>
    @foreach ($financial as $financials)
    <tr>
       
        {{-- <td>{{ ++$i }}</td> --}}
        <td>
       
          {{-- tombol Edit --}}
          <a class="btn btn-primary btn-sm" href="{{ route('financial.edit',$financials->id) }}" >Edit budget</a>
        </td>
        <td>{{ $financials->bulan_tahun }}</td>
        <td>{{ $financials->Type_of_Budget }}</td>
        <td>{{ $financials->budget }}</td>
        <td>{{ $financials->actual }}</td>
        <td>{{ $financials->Keterangan}}</td>
        
    </tr>
    @endforeach
</table>
</div>


@endsection