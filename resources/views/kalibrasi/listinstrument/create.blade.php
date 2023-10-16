@extends('layouts.master')
@php
    $titles = 'QC - LIST INSTRUMENT/ ASSET QUALITY CONTROL DEPARTMENT';
    $title = 'Q-LIS | LIST INSTRUMENT ';
    $pretitle = 'Calibration  Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')


<div class="mx-2 mt-2">
    <h4 class="mb-2">Create New Instrument </h4>
</div>

<div class="card ">
    <div class="card-body " style="background-color: rgb(230, 225, 225);">
        <form action="{{ route('Barang.store') }}" class="" method="post">

            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Instrument ID</label>
                    <input type="text" name="instrumentid"
                        class="form-control @error('instrumentid')is-invalid @enderror"
                        name="example-text-input" placeholder="Input here" value="{{ old('instrumentid') }}">
                    @error('instrumentid')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Instrument Name</label>
                        <input type="text" name="instrumentname"
                            class="form-control @error('instrumentname')is-invalid @enderror"
                            name="example-text-input" placeholder="Input here" value="{{ old('instrumentname') }}">
                        @error('instrumentname')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Serial Number</label>
                        <input type="text" name="serialnumber"
                            class="form-control @error('serialnumber')is-invalid @enderror"
                            name="example-text-input" placeholder="Input here" value="{{ old('serialnumber') }}">
                        @error('serialnumber')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                {{-- <div class="col-md-6">
                    <label class="form-label">Material Code</label>
                    <select name="Material_Code" id="Material_Code"
                        class="form-select @error('Material_Code')is-invalid @enderror"name="example-text-input"
                        placeholder="Leave blank if new material" value="{{ old('Material_Code') }}">
                        <option value="">Automatically Generate Code Material</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->Material_Code }}"
                                @if (old('Material_Code') == $item->Material_Code) selected @endif>
                                {{ $item->Material_Code }}
                        @endforeach
                    </select>
                    @error('Material_Code')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label">Last Calibration Date</label>
                    <input class="form-control @error('lastcalibration')is-invalid @enderror" type="date" name="lastcalibration" 
                    placeholder=" Input Expire Date" value="{{ old('lastcalibration')}}">
                    @error('lastcalibration')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Calibration Frequency</label>
                    <input class="form-control @error('frekuensicalibration')is-invalid @enderror" type="number" name="frekuensicalibration" 
                    placeholder=" Input Expire Date" value="{{ old('frekuensicalibration')}}">
                    @error('frekuensicalibration')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label">Calibration By</label>
                    <input type="text" name="calibrationby"class="form-control @error('calibrationby')is-invalid @enderror"
                    placeholder="Input here" value="{{ old('calibrationby') }}">
                    @error('calibrationby')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class=" col-md-4 mb-3">
                    <div class="form-label">Location</div>
                    <select class="form-select @error('location') is-invalid @enderror" name="location">
                        <option value="">Select</option>
                        <option value="Chemical Lab" {{ old('location') === 'Chemical Lab' ? 'selected' : '' }}>Chemical Lab</option>
                        <option value="Microbiology Lab" {{ old('location') === 'Microbiology Lab' ? 'selected' : '' }}>Microbiology Lab</option>
                        <option value="Sampling Room" {{ old('location') === 'Sampling Room' ? 'selected' : '' }}>Sampling Room</option>
                    </select>
                    @error('location')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-2 mb-3">
                    <label class="form-label">Year of Investment</label>
                    <input type="number" name="yearofinvenstment"
                        class="form-control 
                    @error('yearofinvenstment') is-invalid @enderror"
                        name="example-text-input" placeholder="Input here" value="{{ old('yearofinvenstment') }}">
                    @error('yearofinvenstment')
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