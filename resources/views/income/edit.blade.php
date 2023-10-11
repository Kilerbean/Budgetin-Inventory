@extends('layouts.master')
@php
    $titles = 'Q-LIS - Incoming Material';
    $title = 'Q-LIS |Edit Purchasing Material';
    $pretitle = 'EDIT';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"><i class="fa fa-clipboard-list"></i><i
                    class="fa fa-turn-up"></i> List of Incoming Material</a>
            <a class="btn btn-primary btn-sm" href="{{ route('income.index') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Edit Incoming Material</h4>
    </div>

    <div class="card" style="background-color: rgb(230, 225, 225);">
        <div class="card-body">
            <form action="{{ route('income.update', $income->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="form-label h5"> Material - Catalog No : <strong>{{ $income->Name_of_Material }} -
                        {{ $income->Catalog_Number }}</strong> </label>
                <br>
                <label class="h5 form-label"> Stock Quantity : <strong>{{ $income->Quantity }} </label>
                <br>
                <label class="form-label h5"> Status Material : {{ $income->Status == 1 ? 'Confirmed' : 'Unconfirmed' }}
                </label>
                <br><br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label"><strong>PR Date</strong></div>
                            <input class="form-control" type="date" name="PO_Date" placeholder="Input "
                                value="{{ old('PO_Date', $income->PO_Date) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label"><strong>Catalog Number</strong></div>
                            <input class="form-control bg-secondary text-white" name="Catalog_Number" placeholder="Input Catalog Number"
                                value="{{old('Catalog_Number', $income->Catalog_Number) }}" @readonly(true)>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label"><strong>Type of Material</strong></div>
                            <input class="form-control bg-secondary text-white" name="Type_of_Material" placeholder="Input Type of Material"
                                value="{{ $income->Type_of_Material }}" @readonly(true)>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label"><strong>No PO</strong></div>
                            <input class="form-control" name="No_PO" placeholder="Input " value="{{ old('No_PO', $income->No_PO) }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label"><strong>No PR</strong></div>
                            <input type="text" name="No_PR" value="{{ old('No_PR', $income->No_PR)}}" class="form-control"
                                placeholder="No">
                        </div>
                    </div>

                    


                    <div class="col-md-4">
                        <div class="form-label"><strong>Propose</strong></div>

                        <select class="form-select" name="Propose">
                            <option value="routine" {{ old('Propose', $income->Propose) === 'routine' ? 'selected' : '' }}>
                                routine</option>
                            <option value="consumable part"
                                {{ old('Propose', $income->Propose) === 'consumable part' ? 'selected' : '' }}>
                                consumable part</option>
                            <option value="services"
                                {{ old('Propose', $income->Propose) === 'services' ? 'selected' : '' }}>services
                            </option>
                            <option value="calibration"
                                {{ old('Propose', $income->Propose) === 'calibration' ? 'selected' : '' }}>calibration
                            </option>
                            <option value="new" {{ old('Propose', $income->Propose) === 'new' ? 'selected' : '' }}>
                                new</option>
                            <option value="external testing"
                                {{ old('Propose', $income->Propose) === 'external testing' ? 'selected' : '' }}>
                                external testing</option>
                            <option value="assets" {{ old('Propose', $income->Propose) === 'assets' ? 'selected' : '' }}>
                                assets</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4" {{ $income->Status ? '' : 'hidden' }}>
                        <div class="form-group">
                            <div class="form-label"><strong>Expire Date</strong></div>

                            <input class="form-control" type="date" name="Expire_Date" placeholder="Input "
                                value="{{ old('Expire_Date', $income->Expire_Date) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label"><strong>Request By</strong></div>

                            <input type="text" name="request_by" class="form-control" placeholder="Input name here"
                                value="{{ old('request_by', $income->request_by) }}">
                        </div>
                    </div>
                    <div class="col-md-4" {{ $income->Status ? 'hidden' : '' }}>
                        <div class="form-group">
                            <div class="form-label"><strong>Quantity</strong></div>

                            <input class="form-control" name="Quantity" input type="number" placeholder="Input "
                                value="{{ $income->Quantity }}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('quantity', $income->id) }}" class="btn btn-info mx-2" title="Edit Quantity"
                            {{ $income->Status ? '' : 'hidden' }}><i class="fa fa-pen"> </i> Adjust Quantity</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
