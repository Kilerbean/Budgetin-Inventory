@extends('layouts.master')
@php
    $titles = 'QC - Work Order List';
    $title = 'Q-LIS |EDIT WORK ORDER LIST ';
    $pretitle = 'Calibration  Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')

<div class="row">
    <div class="col">
        {{-- <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"><i class="fa fa-clipboard-list"></i><i
                class="fa fa-turn-up"></i> List of Incoming Material</a> --}}
        <a class="btn btn-primary btn-sm" href="{{ route('index.workorderlist') }}">Back</a>

        {{-- <a href="{{ route('workorderlist.done',$kalibrasi->id) }}" class="btn btn-success btn-sm" >Done WO <i class="fa-regular fa-circle-check"></i> </a> --}}
    </div>
</div>

<div class="mx-2 mt-2">
    <h4 class="mb-2">Edit Work Order List </h4>
</div>


<div class="card ">
    <div class="card-body " style="background-color: rgb(230, 225, 225);">
        <form action="{{ route('workorderlist.update',$kalibrasi->id) }}" class="" method="post">

            @csrf
            @method('PUT')

            <div class="row">
            
                <div class="col-md-6 mb-3">
                    <label class="form-label">Instrument ID</label>
                    <input type="text" name="instrumentid"
                        class="form-control  bg-secondary text-white @error('instrumentid')is-invalid @enderror" name="example-text-input"
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
                    <label class="form-label">No WO</label>
                    <input type="text" name="nowo"class="form-control @error('nowo')is-invalid @enderror"
                        placeholder="Input here" value="{{ old('nowo', $kalibrasi->nowo) }}">
                    @error('nowo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Breakdown Date</label>
                    <input class="form-control @error('startbreakdown')is-invalid @enderror" type="date"
                        name="startbreakdown" placeholder=" Input Last Calibration Date"
                        value="{{ old('startbreakdown', $kalibrasi->startbreakdown) }}">
                    @error('startbreakdown')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="col-md-3 mb-3">
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
                <label class="form-label">Service By</label>
                 <select class="form-select @error('serviceby')is-invalid @enderror " name="serviceby" id="serviceby">
                     @foreach ($vendor as $row)
                     <option value="{{ $row->nama }}" {{ old('nama', $kalibrasi->serviceby) == $row->nama ? 'selected' : '' }}>
                        {{ $row->nama }}
                    </option>
                     @endforeach
                 </select>
                 @error('serviceby')
                 <span class="invalid-feedback">{{ $message }}</span>
                 @enderror
         </div>



                <div class="col-md-6 mb-3">
                    <label class="form-label">Requestor</label>
                    <input type="text" name="requestor"class="form-control @error('requestor')is-invalid @enderror"
                        placeholder="Input here" value="{{ old('requestor', $kalibrasi->requestor) }}">
                    @error('requestor')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
    

             <div class="col-md-6 mb-3">
                <label class="form-label">Problem</label>
                <input type="text" name="problem"class="form-control @error('problem')is-invalid @enderror"
                    placeholder="Input here" value="{{ old('problem', $kalibrasi->problem) }}">
                @error('problem')
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
                <label class="form-label">Root Cause</label>
                <input type="text" name="rootcause"class="form-control @error('rootcause')is-invalid @enderror"
                    placeholder="Input here" value="{{ old('rootcause', $kalibrasi->rootcause) }}">
                @error('rootcause')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Preventive Action</label>
                <input type="text" name="preventiveaction"class="form-control @error('preventiveaction')is-invalid @enderror"
                    placeholder="Input here" value="{{ old('preventiveaction', $kalibrasi->preventiveaction) }}">
                @error('preventiveaction')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="Status">
                    <option value=1 {{ old('Status', $kalibrasi->Status) == 1 ? 'selected' : '' }}>
                        Solve</option>
                    <option value=0 {{ old('Status', $kalibrasi->Status) == 0 ? 'selected' : '' }}>
                        Not Solve</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Change Part</label>
                <select class="form-select" name="changepart">
                    <option value=1 {{ old('changepart', $kalibrasi->changepart) == 1 ? 'selected' : '' }}>
                        Yes</option>
                    <option value=0 {{ old('changepart', $kalibrasi->changepart) == 0 ? 'selected' : '' }}>
                        No</option>
                </select>
            </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </div>

        </form>

    </div>
</div>

@stop
