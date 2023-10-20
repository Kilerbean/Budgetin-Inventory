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
        <a class="btn btn-primary btn-sm" href="{{ route('listKalibrasi') }}">Back</a>
    </div>
</div>

    <div class="mx-2 mt-2">
        <h4 class="mb-2">Instrument Breakdown </h4>
    </div>

    <div class="card ">
        <div class="card-body " style="background-color: rgb(230, 225, 225);">
            <form action="{{ route('kalibrasi.breakdown.edit', $kalibrasi->id) }}" class="" method="post">

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

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Start Breakdown</label>
                        <input class="form-control @error('startbreakdown')is-invalid @enderror" type="date"
                            name="startbreakdown" placeholder=" Input Last Calibration Date"
                            value="{{ old('startbreakdown', $kalibrasi->startbreakdown) }}">
                        @error('startbreakdown')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class=" col-md-3 mb-3">
                        <div class="form-label">Location</div>
                        <select class="form-select @error('location') is-invalid @enderror" name="location">
                            <option
                                value="Chemical Lab"{{ old('location', $kalibrasi->location) === 'Chemical Lab' ? 'selected' : '' }}>
                                Chemical Lab</option>
                            <option
                                value="Microbiology Lab"{{ old('location', $kalibrasi->location) === 'Microbiology Lab' ? 'selected' : '' }}>
                                Microbiology Lab</option>
                            <option
                                value="Sampling Room"{{ old('location', $kalibrasi->location) === 'Sampling Room' ? 'selected' : '' }}>
                                Sampling Room</option>

                        </select>
                        @error('location')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Service By</label>
                         <select class="form-select @error('serviceby')is-invalid @enderror " name="serviceby" id="serviceby">
                             <option value="">Click to search for materials</option>
                             @foreach ($vendor as $row)
                                 <option value="{{ $row->nama }}"
                                     @if (old('serviceby') == $row->nama) selected @endif>
                                     {{ $row->nama }}
                                 </option>
                             @endforeach
                         </select>
                         @error('serviceby')
                         <span class="invalid-feedback">{{ $message }}</span>
                         @enderror
                 </div>




                    <div class="col-md-6 mb-3">
                        <label class="form-label">Reason</label>
                        <input type="text" name="reason"class="form-control @error('reason')is-invalid @enderror"
                            placeholder="Input here" value="{{ old('reason', $kalibrasi->reason) }}">
                        @error('reason')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-3 mb-3">
                        <label class="form-label">Start Service</label>
                        <input class="form-control @error('startservicedate')is-invalid @enderror" type="date"
                            name="startservicedate" placeholder=" Input Last Calibration Date"
                            value="{{ old('startservicedate', $kalibrasi->startservicedate) }}">
                        @error('startservicedate')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-3 mb-3">
                        <label class="form-label">Finish Service</label>
                        <input class="form-control @error('finishservice')is-invalid @enderror" type="date"
                            name="finishservice" placeholder=" Input Last Calibration Date"
                            value="{{ old('finishservice', $kalibrasi->finishservice) }}">
                        @error('finishservice')
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
