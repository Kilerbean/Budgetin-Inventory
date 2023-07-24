@extends('templates.dasar')
@php
  $title = 'Material Usage';
  $pretitle = 'COST-QC LAB';

@endphp 

@push('page-action')
  <a class="btn btn-success" href="{{ route('usage.create') }}"> Create new Material Usage</a>
  @endpush
@section('coba')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List Of all Material Usage</h3>
      </div>
      
      <div class="table-responsive ">
        <table class="table card-table table-bordered  table-vcenter text-nowrap datatable" >
          <thead  style="background-color: rgb(230, 230, 230);">
            <tr>
        <th class="w-1 ml-1">Action</th>
        <th>No</th>
        <th>Type of Material</th>
        <th>Catalog Number</th>
        <th>Name of Material</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Expire Date</th>
        <th>Status</th>
    </tr>
    @foreach ($usage as $usages)
    <tr>
        <td>
            
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $usages->id }}" {{ $usages->Status ? 'hidden' : '' }}>
                Confirm
              </button>
            @include('usage.modalconfirm')

                {{-- <a class="btn btn-info btn-sm" href="{{ route('usage.show',$usage->id) }}">Show</a> --}}
            
                <form action="{{ route('usage.destroy',$usages->id) }}" method="POST">

                    <a class="btn btn-primary btn-sm" href="{{ route('usage.edit',$usages->id) }}" >Edit</a>


                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this ?');">Delete</button>
            </form>
        </td>
        <td>{{ ++$i }}</td>
        <td>{{ $usages ->Type_of_Material }}</td>
        <td>{{ $usages->Catalog_Number }}</td>
        <td>{{ $usages->Barang->Name_of_Material }}</td>
        <td>{{ $usages->Quantity }}</td>
        <td>{{ $usages->Unit }}</td>
        <td>{{ $usages->Expire_Date }}</td>
        <td>{{ $usages->Status == 1 ? 'Aktif' : 'InAktif' }}</td>
        
    </tr>
    @endforeach
</table>
</div>



@endsection