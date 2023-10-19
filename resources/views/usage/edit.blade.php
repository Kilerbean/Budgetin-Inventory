@extends('layouts.master')
@php
    $titles = 'Q-LIS - List of Material';
    $title = 'Q-LIS |Edit Material Usage';
  $pretitle = 'Create New Data';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('usage.index') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Edit Material Usage</h4>
    </div>

<form action="{{ route('usage.update',$usage->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="row"  style="background-color: rgb(230, 225, 225);">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Catalog Number</strong>
            <input class="form-control bg-secondary text-white" name="Catalog_Number" placeholder="Input Catalog Number" value="{{ old('Catalog_Number', $usage->Catalog_Number) }}" @readonly(true)>
        </div>
    </div>
      
      <div class="col-md-4">
          <div class="form-group">
              <strong>Quantity</strong>
              <input class="form-control {{ $usage->Status ? 'bg-secondary text-white' : '' }}" name="Quantity" placeholder="Input jumlah barang" value="{{ old('Quantity', $usage->Quantity) }}" {{ $usage->Status ? 'readonly' : '' }}>
          </div>
      </div>
      <div class="col-md-8">
          <div class="form-group">
              <strong>Open_By</strong>
              <input class="form-control" name="Open_By" placeholder="Input nama" value="{{ old('Open_By', $usage->Open_By) }}">
          </div>
      </div>
      <div class="col-md-2">
          <div class="form-group">
              <strong>Expire Date</strong>
              <input class="form-control" type="date" name="Expire_Date" placeholder="Input Expire Date" value="{{ old('Expire_Date', $usage->Expire_Date) }}">
          </div>
      </div>

      <div class="col-md-4">
        <strong>Usage</strong>
        <select class="form-select" name="usage">
            <option value="Usage for analysis" 
            {{ old('usage', $usage->usage) === 'Usage for analysis' ? 'selected' : '' }}>
                Usage for analysis</option>
            <option value="Usage by other departement"
                {{ old('usage', $usage->usage) === 'Usage by other departement' ? 'selected' : '' }}>
                Usage by other departement</option>
           
        </select>
    </div>
      
      <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
          <button type="submit" class="btn btn-success">Submit</button>
      </div>
  </div>
 
</form>


{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $usage->id }}" {{ $usage->Status ? 'disabled' : '' }}>
    Confirm
  </button>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{ $usage->id }}"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Barang Digunakan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="{{ route('Usage.Digunakan',$usage->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang</strong>
                    <input class="form-control" name="Catalog_Number" placeholder="Input Catalog Number" value="|{{ $usage->Name_of_Material }}|{{ $usage->Type_of_Material }} | {{ $usage->Catalog_Number }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Open By</strong>
                    <input type="text" name="Open_By" value="{{ $usage->Open_By }}" class="form-control" placeholder="Nama">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity</strong>
                    <input class="form-control" inputtype="number" name="Quantity" placeholder="Input " value="{{ $usage->Quantity }}">
                </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div> --}}


@stop