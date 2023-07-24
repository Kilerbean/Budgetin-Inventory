@extends('templates.dasar')
@php
  $title = 'Material Usage';
  $pretitle = 'Create New Data';

@endphp 

@section('coba')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div>
          <h2>Add New Material Usage</h2>
      </div>
      <div>
          <a class="btn btn-primary" href="{{ route('usage.index') }}"> Back</a>
      </div>
  </div>
</div>
 
@if ($errors->any())
  <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
          {{-- @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach --}}
      </ul>
  </div>
@endif
 

<div class="card"style="background-color: lightgray;">
    <div class="card-body" >

<form action="{{ route('usage.store') }}" method="POST">
  @csrf
  
   <div class="row">
          <div class="col-md-6">
              <strong>Nama Barang</strong>
      <select class="form-select" name="Catalog_Number" id="Catalog_Number">
          @foreach ($barang as $row )
          <option value="{{ $row->Catalog_Number }}">  {{ $row->Name_of_Material }} | {{ $row->Catalog_Number }}  | {{ $row->Type_of_Material }} | {{ $row->Unit}}</option>
      @endforeach
      </select>
      </div>        
      
      
      <div class="col-md-4">
          <div class="form-group">
              <strong>Jumlah</strong>
              <input class="form-control" input type="number" name="Quantity" placeholder=" masukan jumlah barang" value="{{ old('Quantity') }}">
          </div>
      </div>
      <div class="col-md-8">
          <div class="form-group">
              <strong>Open_By</strong>
              <input class="form-control" name="Open_By" placeholder=" masukan nama" value="{{ old('Open_By') }}">
          </div>
      </div>
      <div class="col-md-2">
          <div class="form-group">
              <strong>Expire Date</strong>
              <input class="form-control" type="date" name="Expire_Date" placeholder=" masukan Expire Date" value="{{ old('Expire_Date') }}">
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
          <button type="submit" class="btn btn-success">Simpan</button>
      </div>
  </div>
 
</form>
</div>
</div>

@endsection