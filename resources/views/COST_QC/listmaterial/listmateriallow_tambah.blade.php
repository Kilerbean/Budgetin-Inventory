@extends('templates.dasar')
@php
    $title = 'Purchasing Material';
    $pretitle = 'Incoming Material';
    
@endphp
@section('coba')
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
<div>
    <a class="btn btn-primary" href="{{ route('Dashboards') }}"> Back</a>
</div>
<div class="row" >
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Purchasing Material</h2>
            </div>

        </div>
    </div>
    <form action="{{ route('tambahmaterial') }}" method="POST">
        @csrf

        <div class="card ">
            <div class="card-body " style="background-color: rgb(230, 225, 225);">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Material</strong>
                <input class="form-control" name="Name_of_Material" placeholder=""value="{{ $baranglows->Name_of_Material }}"
                    @readonly(true)>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>No PR</strong>
                    <input type="text" name="No_PR" class="form-control" placeholder="No" value="{{ old('No_PR') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Catalog Number</strong>
                    <input class="form-control" name="Catalog_Number" placeholder="Masukan Catalog Number"
                        value="{{ $baranglows->Catalog_Number }}" @readonly(true)>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Quantity</strong>
                    <input class="form-control" name="Quantity" input type="number" placeholder="Masukan "
                        value="{{ old('Quantity') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Type of Material</strong>
                    <input class="form-control" name="Type_of_Material" placeholder="Masukan Type of Material"
                        value="{{ $baranglows->Type_of_Material }}">
                </div>
            </div>
            <div class="col-md-6">
                <strong>Propose</strong>
                <select class="form-select" name="Propose">
                  <option value="">Select</option>
                  <option value="routine" {{ old('Propose') === 'routine' ? 'selected' : '' }}>routine</option>
                  <option value="consumable part" {{ old('Propose') === 'consumable part' ? 'selected' : '' }}>consumable part</option>
                  <option value="services" {{ old('Propose') === 'services' ? 'selected' : '' }}>services</option>
                  <option value="calibration" {{ old('Propose') === 'calibration' ? 'selected' : '' }}>calibration</option>
                  <option value="new" {{ old('Propose') === 'new' ? 'selected' : '' }}>new</option>
                  <option value="external testing" {{ old('Propose') === 'external testing' ? 'selected' : '' }}>external testing</option>
                  <option value="assets" {{ old('Propose') === 'assets' ? 'selected' : '' }}>assets</option>
                </select>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <strong>Request By</strong>
                    <input type="text" name="request_by" class="form-control" placeholder="Input name here"
                        value="{{ old('request_by') }}">
                </div>
            </div>
        </div>
       


        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </div>

    </form>

    
@endsection
