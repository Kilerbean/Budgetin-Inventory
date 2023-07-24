@extends('templates.dasar')

@php
$title = 'Tambah Material';
$pretitle = 'Create New';
@endphp

@section('coba')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h4>Add New Incoming Material</h4>
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
        {{-- @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach --}}
    </ul>
</div>
@endif

<div class="card"style="background-color: lightgray;">
    <div class="card-body" >
        <form action="{{ route('income.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>No PR:</strong>
                        <input type="text" name="No_PR" class="form-control" placeholder="No PR" value="{{ old('No_PR') }}">
                    </div>
                </div>
                <div class="col-md-9" >
                    <div class="form-group">
                        <strong>Nama Barang</strong>
                        <select class="form-select" name="Catalog_Number" id="Catalog_Number" >
                            @foreach ($barang as $row)
                            <option value="{{ $row->Catalog_Number }}"> {{ $row->Name_of_Material }} | {{ $row->Type_of_Budget }}| {{ $row->Type_of_Material }} | {{ $row->Unit}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" >
                        <strong>Jumlah</strong>
                        <input class="form-control" type="number" name="Quantity" placeholder=" masukan Quantity" value="{{ old('Quantity') }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>No PO</strong>
                        <input class="form-control" name="No_PO" placeholder=" masukan No PO" value="{{ old('No_PO') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Propose</strong>
                        <input class="form-control" name="Propose" placeholder=" masukan  Propose" value="{{ old('Propose') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <strong>PO Date</strong>
                        <input class="form-control" type="date" name="PO_Date" placeholder=" masukan PO Date" value="{{ old('PO_Date') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <strong>Expire Date</strong>
                        <input class="form-control" type="date" name="Expire_Date" placeholder=" masukan Expire Date" value="{{ old('Expire_Date') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection