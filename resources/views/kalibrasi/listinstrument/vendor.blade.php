@extends('layouts.master')
@php
    $titles = 'QC - LIST INSTRUMENT/ CREATE';
    $title = 'Q-LIS |INSTRUMENT CREATE';
    $pretitle = 'Calibration  Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')

<div class="row">
    <div class="col">
        {{-- <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"><i class="fa fa-clipboard-list"></i><i
                class="fa fa-turn-up"></i> List of Incoming Material</a> --}}
        <a class="btn btn-primary btn-sm" href="{{ route('listKalibrasi') }}">Back</a>
    </div>
</div>

<div class="mx-2 mt-2">
    <h4 class="mb-2">Add new Vendor External </h4>
</div>

<div class="card ">
    <div class="card-body " style="background-color: rgb(230, 225, 225);">
        <form action="{{ route('kalibrasi.addvedor') }}" class="" method="post">

            @csrf
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">Name Vendor</label>
                    <input type="text" name="nama"
                        class="form-control @error('nama')is-invalid @enderror"
                        name="example-text-input" placeholder="Input here" value="{{ old('nama') }}">
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


        
            

                 <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </div>

        </form>

    </div>
</div>




@stop