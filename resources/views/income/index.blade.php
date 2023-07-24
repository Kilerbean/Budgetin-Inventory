@extends('templates.dasar')
@php
  $title = 'Incoming of Material';
  $pretitle = 'COST-QC LAB';

@endphp 

@push('page-action')
  <a class="btn btn-success" href="{{ route('income.create') }}"> Create new Incoming Material</a>
  @endpush


@section('coba')
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
        <h3 class="card-title">List Of All Incoming Material</h3>
      </div>
      
      <div class="table-responsive">
        <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable">
          <div style="background-color: lightgray;">
          <thead>
            <tr >
        <th class="w-1 ml-1">Action</th>
        <th>No</th>
        <th>No PR</th>
        <th>Catalog Number</th>
        <th>Name of Material</th>
        <th>Quantity</th>
        <th>Price/pcs</th>
        <th>Total</th>
        <th>Unit</th>
        <th>Propose</th>
        <th>No PO</th>
        <th>PO Date</th>
        <th>Expire Date</th>
        <th>Status</th>
      </div>
    </tr>
    </thead>
    @foreach ($incomes as $income)
    <tr>
        <td>
                
                {{-- tombol modalnya --}}
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $income->id }}" {{ $income->Status ? 'hidden' : '' }}>
                    Terima
                  </button>
                  
                @include('income.modalterima')
                
                {{-- tombol Edit --}}
                <a class="btn btn-primary btn-sm" href="{{ route('income.edit',$income->id) }}"{{ $income->Status ? 'hidden' : '' }} > <i class="fa fa-pencil"></i> <i class="fa-solid fa-plus"></i>Edit</a>



            <form action="{{ route('income.destroy',$income->id) }}" method="POST">

                {{-- <a class="btn btn-info btn-sm" href="{{ route('income.show',$income->id) }}">Show</a> --}}

               
                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this ?');">Delete</button>
            </form>
        </td>
        <td>{{ ++$i }}</td>
        <td>{{ $income->No_PR }}</td>
        <td>{{ $income->Catalog_Number }}</td>
        <td>{{ $income->Barang->Name_of_Material }}</td>
        <td>{{ $income->Quantity }}</td>
        <td>{{ number_format($income->Prices, 2, '.', ',') }}</td>
        <td>{{ number_format($income->Total, 2, '.', ',') }}</td>
        <td>{{ $income->Unit }}</td>
        <td>{{ $income->Propose }}</td>
        <td>{{ $income->No_PO }}</td>
        <td>{{ $income->PO_Date }}</td>
        <td>{{ $income->Expire_Date }}</td>
        <td>{{ $income->Status == 1 ? 'DiTerima' : 'BelumDiTerima' }}</td>
        
    </tr>
    @endforeach
</table>
</div>
<div class="row text-center">

</div>


@endsection