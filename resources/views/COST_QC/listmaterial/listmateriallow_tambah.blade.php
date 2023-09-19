@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'New Purchasing Material';
    $pretitle = 'Incoming Material';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">            
            <a class="btn btn-primary" href="{{ route('Dashboards') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">New Purchasing Material</h4>
    </div>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>                
                <h4 class="px-2">Material Code: {{ $baranglows->Material_Code }}</h4>
            </div>

        </div>
    </div>
    <form action="{{ route('tambahmaterial') }}" method="POST">
        @csrf

        <div class="card ">
            <div class="card-body " style="background-color: rgb(230, 225, 225);">                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Nama Material</strong>
                            <input class="form-control bg-secondary text-white" name="Name_of_Material"
                                placeholder=""value="{{ $baranglows->Name_of_Material }}" @readonly(true)>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Type of Material</strong>
                            <input class="form-control bg-secondary text-white" name="Type_of_Material" placeholder=" Type of Material"
                                value="{{ $baranglows->Type_of_Material }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Catalog Number </strong>
                            <select class="form-select" name="Catalog_Number" id="Catalog_Number">
                                <option value="">Click to search for Catalog Number</option>
                                @foreach ($barangcatalog as $row)
                                    <option value="{{ $row->Catalog_Number }}"
                                        @if (old('Catalog_Number') == $row->Catalog_Number) selected @endif>
                                        {{ $row->Catalog_Number }} | {{ $row->packingsize }} {{ $row->packingsize_unit }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>No PR</strong>
                            <input type="text" name="No_PR" class="form-control" placeholder="Input here"
                                value="{{ old('No_PR') }}">
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Quantity</strong>
                            <input class="form-control" name="Quantity" input type="number" placeholder="Input here "
                                value="{{ old('Quantity') }}">
                        </div>
                    </div>

                    
                    <div class="col-md-6">
                        <strong>Propose</strong>
                        <select class="form-select" name="Propose">
                            <option value="">Select</option>
                            <option value="routine" {{ old('Propose') === 'routine' ? 'selected' : '' }}>routine</option>
                            <option value="consumable part" {{ old('Propose') === 'consumable part' ? 'selected' : '' }}>
                                consumable part</option>
                            <option value="services" {{ old('Propose') === 'services' ? 'selected' : '' }}>services
                            </option>
                            <option value="calibration" {{ old('Propose') === 'calibration' ? 'selected' : '' }}>
                                calibration</option>
                            <option value="new" {{ old('Propose') === 'new' ? 'selected' : '' }}>new</option>
                            <option value="external testing" {{ old('Propose') === 'external testing' ? 'selected' : '' }}>
                                external testing</option>
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

        </div>
    </form>


@stop
