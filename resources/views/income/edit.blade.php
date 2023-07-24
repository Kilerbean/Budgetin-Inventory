@extends('templates.dasar')
@php
  $title = ' Material income';
  $pretitle = 'EDIT';

@endphp 
@section('coba')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div>
          <h2>Edit Data Material</h2>
      </div>
      <div>
          <a class="btn btn-primary" href="{{ route('income.index') }}"> Back</a>
      </div>
  </div>
</div>

@if ($errors->any())
  <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

<form action="{{ route('income.update',$income->id) }}" method="POST">
  @csrf
  @method('PUT')

   <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <strong>No PR</strong>
              <input type="text" name="No_PR" value="{{ $income->No_PR }}" class="form-control" placeholder="No">
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <strong>Catalog Number</strong>
              <input class="form-control" name="Catalog_Number" placeholder="Masukan Catalog Number" value="{{ $income->Catalog_Number }}" @readonly(true)>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <strong>Quantity</strong>
              <input class="form-control" name="Quantity" input type="number" placeholder="Masukan " value="{{ $income->Quantity }}" {{ $income->Status ? 'readonly' : '' }}>
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <strong>Type of Material</strong>
            <input class="form-control" name="Type_of_Material" placeholder="Masukan Type of Material" value="{{ $income->Type_of_Material }}" @readonly(true)>
        </div>
    </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Propose</strong>
              <input class="form-control" name="Propose" placeholder="Masukan " value="{{ $income->Propose }}">
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>No PO</strong>
              <input class="form-control" name="No_PO" placeholder="Masukan " value="{{ $income->No_PO }}">
          </div>
      </div>
      <div class="col-md-2">
          <div class="form-group">
              <strong>PO Date</strong>
              <input class="form-control" name="PO_Date" placeholder="Masukan " value="{{ $income->PO_Date }}">
          </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
            <strong>Expire Date</strong>
            <input class="form-control" name="Expire_Date" placeholder="Masukan " value="{{ $income->Expire_Date }}">
        </div>
    </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
  </div>

</form>

    

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $income->id }}" {{ $income->Status ? 'disabled' : '' }}>
    Terima
  </button>
  
@include('income.modalterima')


@endsection