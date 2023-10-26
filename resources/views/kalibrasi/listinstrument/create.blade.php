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
    <h4 class="mb-2">Create New Instrument </h4>
</div>

<div class="card ">
    <div class="card-body " style="background-color: rgb(230, 225, 225);">
        <form action="{{ route('listkalibrasi.store') }}" class="" method="post">

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

                <div class="col-md-3 mb-3">
                    <label class="form-label">Last Calibration Date</label>
                    <input class="form-control @error('lastcalibration')is-invalid @enderror" type="date" name="lastcalibration" 
                    placeholder=" Input Last Calibration Date" value="{{ old('lastcalibration')}}">
                    @error('lastcalibration')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Calibration Frequency (Month)</label>
                    <input class="form-control @error('frekuensicalibration')is-invalid @enderror" type="number" name="frekuensicalibration" 
                    placeholder="(Month)" value="{{ old('frekuensicalibration')}}">
                    @error('frekuensicalibration')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                       <label class="form-label">Calibration By</label>
                        <select class="form-select @error('calibrationby')is-invalid @enderror " name="calibrationby" id="calibrationby">
                            <option value="">Click to search for materials</option>
                            @foreach ($vendor as $row)
                                <option value="{{ $row->nama }}"
                                    @if (old('calibrationby') == $row->nama) selected @endif>
                                    {{ $row->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('calibrationby')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                </div>




                {{-- <div class=" col-md-4 mb-3">
                    <div class="form-label">Location</div>
                    <select class="form-select @error('location') is-invalid @enderror" name="location">
                        <option value="">Select</option>
                        <option value="Chemical QC Lab" {{ old('location') === 'Chemical QC Lab' ? 'selected' : '' }}>Chemical QC Lab</option>
                        <option value="Microbiology Lab" {{ old('location') === 'Microbiology Lab' ? 'selected' : '' }}>Microbiology Lab</option>
                        <option value="Sampling Room" {{ old('location') === 'Sampling Room' ? 'selected' : '' }}>Sampling Room</option>
                    </select>
                    @error('location')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div> --}}


                <div class="col-md-6 mb-3">
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



          

            

                 <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </div>

        </form>

    </div>
</div>




@stop
@push('js')
    <script>
        $(document).ready(function() {
            $('#location',).select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: true,
                tags: true,
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
            });
            $(document).on("select2:open", () => {
                document.querySelector(".select2-container--open .select2-search__field").focus()
            });
        });
    </script>
<script>
    $(document).ready(function() {
        $('#calibrationby',).select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: true,
            tags: true,
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        $(document).on("select2:open", () => {
            document.querySelector(".select2-container--open .select2-search__field").focus()
        });
    });
</script>
    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#listlowss,#listlowq').DataTable({

            });
        });
    </script>
@endpush