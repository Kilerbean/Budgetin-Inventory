@extends('layouts.master')
@php
    $titles = 'Q-LIS - INSTRUMENT BREAKDOWN';
    $title = 'Q-LIS | INSTRUMENT BREAKDOWN';
    $pretitle = 'Calibration  Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
<div class="row">
    <div class="col">

        
        <a class="btn btn-primary btn-sm" href="{{ route('dashboard.kalibrasi') }}">Back</a>
        {{-- <form action="{{ route('Kalibrasi.overdue', $kalibrasi->id) }}" class="" method="post">
            @csrf
            @method('PUT')
             <div class="card" hidden>
             </div>
        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure want to calibrated this Instrument ?');"title="Done Calibration">Instrument Calibrated <i class="fa fa-circle-check"></i></button>
    </form> --}}
   
    </div>
</div>

    <div class="mx-2 mt-2">
        <h4 class="mb-2">Instrument Overdue Calibration </h4>
    </div>

    <div class="card">
        <div class="card-body " style="background-color: rgb(230, 225, 225);">
            <form action="{{ route('Kalibrasi.overdue', $kalibrasi->id) }}" class="" method="post">

                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Instrument ID</label>
                        <input type="text" name="instrumentid"
                            class="form-control bg-secondary text-white @error('instrumentid')is-invalid @enderror " name="example-text-input"
                            placeholder="Input here" value="{{ old('instrumentid', $kalibrasi->instrumentid) }}" @readonly(true)>
                        @error('instrumentid')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Instrument Name</label>
                        <input type="text" name="instrumentname"
                            class="form-control  bg-secondary text-white @error('instrumentname')is-invalid @enderror" name="example-text-input"
                            placeholder="Input here" value="{{ old('instrumentname', $kalibrasi->instrumentname) }}" @readonly(true)>
                        @error('instrumentname')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Serial Number</label>
                        <input type="text" name="serialnumber"
                            class="form-control bg-secondary text-white @error('serialnumber')is-invalid @enderror" name="example-text-input"
                            placeholder="Input here" value="{{ old('serialnumber', $kalibrasi->serialnumber) }}" @readonly(true)>
                        @error('serialnumber')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

{{-- 
                    <div class="col-md-3 mb-3">
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
                 </div> --}}


                   


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Calibration By</label>
                         <select class="form-select @error('calibrationby')is-invalid @enderror " name="calibrationby" id="calibrationby">
                             <option value="">Click to search for materials</option>
                             @foreach ($vendor as $row)
                             <option value="{{ $row->nama }}" {{ old('nama', $kalibrasi->calibrationby) == $row->nama ? 'selected' : '' }}>
                                {{ $row->nama }}
                            </option>
                             @endforeach
                         </select>
                         @error('calibrationby')
                         <span class="invalid-feedback">{{ $message }}</span>
                         @enderror
                 </div>




                    <div class="col-md-6 mb-3">
                        <label class="form-label">Reason</label>
                        <input type="text" name="reason_overdue"class="form-control @error('reason_overdue')is-invalid @enderror"
                            placeholder="Input here" value="{{ old('reason_overdue', $kalibrasi->reason_overdue) }}">
                        @error('reason_overdue')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Calibration Date</label>
                        <input class="form-control @error('lastcalibration')is-invalid @enderror" type="date"
                            name="lastcalibration" placeholder=" Input Last Calibration Date"
                            value="{{ old('lastcalibration') }}">
                        @error('lastcalibration')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">No Deviasi</label>
                        <input type="text" name="nodeviasi"class="form-control @error('nodeviasi')is-invalid @enderror"
                            placeholder="Input here" value="{{ old('nodeviasi', $kalibrasi->nodeviasi) }}">
                        @error('nodeviasi')
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
