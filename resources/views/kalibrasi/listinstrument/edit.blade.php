@extends('layouts.master')
@php
    $titles = 'Q-LIS LIST INSTRUMENT/ EDIT';
    $title = 'Q-LIS | INSTRUMENT EDIT ';
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
    <h4 class="mb-2">Edit Instrument </h4>
</div>

<div class="col">
    <label class="form-label h5"> Status Instrument : {{ $kalibrasi->status_instrument == 1 ? 'Active' : 'Inactive' }}

    </label>
    <a class="btn btn-danger btn-sm" href="{{ route('kalibrasi.nonaktif', $kalibrasi->id) }}"{{ $kalibrasi->status_instrument ? '' : 'hidden' }}
        title="Deactivate Material"> <i class="fa fa-pen"></i> Deactivate</a>
    <a class="btn btn-primary btn-sm" href="{{ route('kalibrasi.aktif', $kalibrasi->id) }}"{{ $kalibrasi->status_instrument ? 'hidden' : '' }}
        title="Activate Material"> <i class="fa fa-pen"></i> Activate</a>
</div>



<div class="card ">
    <div class="card-body " style="background-color: rgb(230, 225, 225);">
        <form action="{{ route('listKalibrasi.update',$kalibrasi->id) }}" class="" method="post">

            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Instrument ID</label>
                    <input type="text" name="instrumentid"
                        class="form-control @error('instrumentid')is-invalid @enderror"
                        name="example-text-input" placeholder="Input here" value="{{ old('instrumentid',$kalibrasi->instrumentid)}}">
                    @error('instrumentid')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Instrument Name</label>
                        <input type="text" name="instrumentname"
                            class="form-control @error('instrumentname')is-invalid @enderror"
                            name="example-text-input" placeholder="Input here" value="{{ old('instrumentname',$kalibrasi->instrumentname) }}">
                        @error('instrumentname')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Serial Number</label>
                        <input type="text" name="serialnumber"
                            class="form-control @error('serialnumber')is-invalid @enderror"
                            name="example-text-input" placeholder="Input here" value="{{ old('serialnumber',$kalibrasi->serialnumber) }}">
                        @error('serialnumber')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Last Calibration Date</label>
                    <input class="form-control @error('lastcalibration')is-invalid @enderror" type="date" name="lastcalibration" 
                    placeholder=" Input Last Calibration Date" value="{{ old('lastcalibration',$kalibrasi->lastcalibration)}}">
                    @error('lastcalibration')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Calibration Frequency (Month)</label>
                    <input class="form-control @error('frekuensicalibration')is-invalid @enderror" type="number" name="frekuensicalibration" 
                    placeholder="(Month)" value="{{ old('frekuensicalibration',$kalibrasi->frekuensicalibration)}}">
                    @error('frekuensicalibration')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label">Calibration By</label>
                    <input type="text" name="calibrationby"class="form-control @error('calibrationby')is-invalid @enderror"
                    placeholder="Input here" value="{{ old('calibrationby',$kalibrasi->calibrationby) }}">
                    @error('calibrationby')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label">Location</label>
                     <select class="form-select @error('location')is-invalid @enderror " name="location" id="location">
                         @foreach ($location as $row)
                         <option value="{{ $row->location }}" {{ old('location', $kalibrasi->location) == $row->location ? 'selected' : '' }}>
                            {{ $row->location }}
                        </option>
                         @endforeach
                     </select>
                     @error('location')
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