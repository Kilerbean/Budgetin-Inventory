@extends('templates.dasar')
@php
  $title = 'Material Usage';
  $pretitle = 'Create New Data';

@endphp 

@section('coba')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div>
          <h2>Edit Material Usage</h2>
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
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
 
<form action="{{ route('usage.update',$usage->id) }}" method="POST">
  @csrf
  @method('PUT')

   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Catalog Number</strong>
            <input class="form-control" name="Catalog_Number" placeholder="Masukan Catalog Number" value="{{ $usage->Catalog_Number }}" @readonly(true)>
        </div>
    </div>
      
      <div class="col-md-4">
          <div class="form-group">
              <strong>Jumlah</strong>
              <input class="form-control" name="Quantity"  placeholder=" masukan jumlah barang" value="{{ $usage->Quantity }}" {{ $usage->Status ? 'readonly' : '' }}>
          </div>
      </div>
      <div class="col-md-8">
          <div class="form-group">
              <strong>Open_By</strong>
              <input class="form-control" name="Open_By" placeholder=" masukan nama" value="{{ $usage->Open_By }}">
          </div>
      </div>
      <div class="col-md-2">
          <div class="form-group">
              <strong>Expire Date</strong>
              <input class="form-control" type="date" name="Expire_Date" placeholder=" masukan Expire Date" value="{{ $usage->Expire_Date }}">
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
          <button type="submit" class="btn btn-success">Submit</button>
      </div>
  </div>
 
</form>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $usage->id }}" {{ $usage->Status ? 'disabled' : '' }}>
    Terima
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
                    <input class="form-control" name="Catalog_Number" placeholder="Masukan Catalog Number" value="|{{ $usage->Name_of_Material }}|{{ $usage->Type_of_Material }} | {{ $usage->Catalog_Number }}">
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
                    <input class="form-control" inputtype="number" name="Quantity" placeholder="Masukan " value="{{ $usage->Quantity }}">
                </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>


@endsection