@extends('templates.dasar')
@php
  $title = ' Material income Edit';
  $pretitle = 'EDIT';

@endphp 
@section('coba')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div>
          <h2>Edit Material Income</h2>
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
  <label class="h5 form-label"> Stock Quantity : {{ $income->Quantity }} </label>
  <label  class="form-label h5"> Status Material : {{ $income->Status == 1 ? 'Confirmed' : 'Unconfirmed' }}   
   
   <br><br> <div class="row"  style="background-color: rgb(230, 225, 225);">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>No PO</strong>
            <input class="form-control" name="No_PO" placeholder="Input " value="{{ $income->No_PO }}">
        </div>
    </div>

      <div class="col-md-6">
          <div class="form-group">
              <strong>No PR</strong>
              <input type="text" name="No_PR" value="{{ $income->No_PR }}" class="form-control" placeholder="No">
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <strong>Catalog Number</strong>
              <input class="form-control" name="Catalog_Number" placeholder="Input Catalog Number" value="{{ $income->Catalog_Number }}" @readonly(true)>
          </div>
      </div>
      <div class="col-md-6"  {{ $income->Status ? 'hidden' : '' }}>
          <div class="form-group">
              <strong>Quantity</strong>
              <input class="form-control" name="Quantity" input type="number" placeholder="Input " value="{{ $income->Quantity }}" >
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <strong>Type of Material</strong>
            <input class="form-control" name="Type_of_Material" placeholder="Input Type of Material" value="{{ $income->Type_of_Material }}" @readonly(true)>
        </div>
    </div>

      <div class="col-md-6">
        <strong>Propose</strong>
        <select class="form-select" name="Propose">
            <option value="routine" {{ old('Propose', $income->Propose) === 'routine' ? 'selected' : '' }}>routine</option>
            <option value="consumable part" {{ old('Propose', $income->Propose) === 'consumable part' ? 'selected' : '' }}>consumable part</option>
            <option value="services" {{ old('Propose', $income->Propose) === 'services' ? 'selected' : '' }}>services</option>
            <option value="calibration" {{ old('Propose', $income->Propose) === 'calibration' ? 'selected' : '' }}>calibration</option>
            <option value="new" {{ old('Propose', $income->Propose) === 'new' ? 'selected' : '' }}>new</option>
            <option value="external testing" {{ old('Propose', $income->Propose) === 'external testing' ? 'selected' : '' }}>external testing</option>
            <option value="assets" {{ old('Propose', $income->Propose) === 'assets' ? 'selected' : '' }}>assets</option>
        </select>
      </div>
  
      <div class="col-md-2">
          <div class="form-group">
              <strong>PR Date</strong>
              <input class="form-control"  type="date" name="PO_Date" placeholder="Input " value="{{ $income->PO_Date }}">
          </div>
      </div>

      <div class="col-md-2"  {{ $income->Status ? '' : 'hidden' }}>
        <div class="form-group">
            <strong>Expire Date</strong>
            <input class="form-control"  type="date" name="Expire_Date" placeholder="Input " value="{{ $income->Expire_Date }}">
        </div>
    </div>
      <div class="col-md-6">
        <div class="form-group">
            <strong>Request By</strong>
            <input type="text" name="request_by" class="form-control" placeholder="Input name here" value="{{ $income->request_by }}">
        </div>
    </div>

      <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
        <button type="submit" class="btn btn-success">Submit</button>
        <br>
        <br>
        <a href="{{ route('quantity', $income->id) }}" class="btn btn-info " title="Edit Quantity" {{ $income->Status ? '' : 'hidden' }}><i
            class="fa fa-pen" > </i> Adjust Quantity</a>
      </div>
  </div>

</form>

    



@endsection