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
            <form action="{{ route('kalibrasi.addbreakdown.edit') }}" class="" method="post">

                @csrf
                @method('PUT')

                <div class="row">
                
                    <div class="col-12 ">
                        <div class="form-label"><strong>Intrument Name |Instrument ID</strong></div>
                        <select class="form-select" name="instrumentid" id="instrumentid">
                            <option value="">Click to search for Instrument</option>
                            @foreach ($uniqueIncomes as $row)
                                <option value="{{ $row->instrumentid }}"
                                    @if (old('instrumentid') == $row->instrumentid) selected @endif>
                                    {{ $row->instrumentname }}   |   {{ $row->instrumentid }}
                                </option>
                            @endforeach
                        </select>
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

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Location</label>
                         <select class="form-select @error('location')is-invalid @enderror " name="location" id="location">
                             <option value="">Click to search for materials</option>
                             @foreach ($location as $row)
                                 <option value="{{ $row->location }}"
                                     @if (old('location') == $row->location) selected @endif>
                                     {{ $row->location }}
                                 </option>
                             @endforeach
                         </select>
                         @error('location')
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
                    <input type="text" name="reason_breakdown"class="form-control @error('reason_breakdown')is-invalid @enderror"
                        placeholder="Input here" value="{{ old('reason_breakdown', $kalibrasi->reason_breakdown) }}">
                    @error('reason_breakdown')
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
