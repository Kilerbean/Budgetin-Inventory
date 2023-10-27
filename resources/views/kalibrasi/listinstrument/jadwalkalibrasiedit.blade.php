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
        {{-- <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"><i class="fa fa-clipboard-list"></i><i
                class="fa fa-turn-up"></i> List of Incoming Material</a> --}}
        <a class="btn btn-primary btn-sm" href="{{ route('dashboard.kalibrasi') }}">Back</a>
    </div>
</div>

    <div class="mx-2 mt-2">
        <h4 class="mb-2">Edit Schedule of Calibration Instruments</h4>
    </div>

    <div class="card ">
        <div class="card-body " style="background-color: rgb(230, 225, 225);">
            <form action="{{ route('kalibrasi.jadwalkalibrasi.edit',$kalibrasi->id) }}" class="" method="post">

                @csrf
                @method('PUT')

                <div class="row">
                
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

                 
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Calibration date</label>
                        <input class="form-control @error('jadwalkalibrasi')is-invalid @enderror" type="date"
                            name="jadwalkalibrasi" placeholder=" Input Last Calibration Date"
                            value="{{ old('jadwalkalibrasi', $kalibrasi->jadwalkalibrasi) }}">
                        @error('jadwalkalibrasi')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-8 mb-3">
                        <label class="form-label">Calibration By</label>
                         <select class="form-select @error('calibrationby')is-invalid @enderror " name="calibrationby" id="calibrationby">
                             @foreach ($vendor as $row)
                             <option value="{{ $row->nama }}" {{ old('nama', $kalibrasi->calibrationby) == $row->nama ? 'selected' : '' }}>
                                {{ $row->nama }} </option>
                             @endforeach
                         </select>
                         @error('calibrationby')
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

