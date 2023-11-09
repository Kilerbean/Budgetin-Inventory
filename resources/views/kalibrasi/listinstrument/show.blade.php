@extends('layouts.master')
@php
    $titles = 'Q-LIS - List of Material';
    $title = 'Q-LIS |Detail of Material';
    $pretitle = 'EXPENSE-Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary text-white" href="{{ route('listKalibrasi') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Detail Instrument</h4>
    </div>

    <div class="col-12">
        <div class="card">            
            <div class="card-body">
                <label class="form-label"> Instrument ID : {{ $kalibrasi->instrumentid }} </label><br>
                <label class="form-label"> Instrument Name : {{ $kalibrasi->instrumentname }} </label><br>
                <label class="form-label"> Serial Number : {{ $kalibrasi->serialnumber }} </label><br>
                <label class="form-label"> Last Calibration : {{ $kalibrasi->lastcalibration }} </label><br>
                <label class="form-label"> Calibration Frequency : {{ $kalibrasi->frekuensicalibration }} </label><br>
                <label class="form-label"> Calibration By : {{ $kalibrasi->calibrationby }} </label><br>
                <label class="form-label"> Location : {{ $kalibrasi->location }} </label><br>
               
                    <label class="form-label h5"> Status Instrument : {{ $kalibrasi->status_instrument == 1 ? 'Active' : 'Inactive' }}
                
                    </label>
                    <a class="btn btn-danger btn-sm" href="{{ route('kalibrasi.nonaktif', $kalibrasi->id) }}"{{ $kalibrasi->status_instrument ? '' : 'hidden' }}
                        title="Deactivate Material"> <i class="fa fa-pen"></i> Deactivate</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('kalibrasi.aktif', $kalibrasi->id) }}"{{ $kalibrasi->status_instrument ? 'hidden' : '' }}
                        title="Activate Material"> <i class="fa fa-pen"></i> Activate</a>
                
               
            </div>
        </div>
    </div>

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Calibration History </h3>
            </div>

            <div class="table-responsive">
                <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable" id="lis">
                    <thead>
                        <tr>
                            <?php $i = 0; ?>
                            <th style="background-color: lightgray;">No</th>
                            <th style="background-color: lightgray;">Input By</th>
                            <th style="background-color: lightgray;">Calibration Date</th>
                            <th style="background-color: lightgray;">Calibration By</th>
                            <th style="background-color: lightgray;">Status Calibration</th>
                            <th style="background-color: lightgray;">Reason if Overdue</th>
                            <th style="background-color: lightgray;">No Deviasi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kalibrasiontime as $kalibrasi)
                            <tr>
                               
                                <td>{{ ++$i }}</td>
                                <td>{{ $kalibrasi->input_by }}</td>
                                <td>{{ $kalibrasi->lastcalibration}}</td>
                                <td>{{ $kalibrasi->calibrationby }}</td>
                                <td>{{ $kalibrasi->statuskalibrasi }}</td>
                                <td>{{ $kalibrasi->reason_overdue }}</td>
                                <td>{{ $kalibrasi->nodeviasi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Work Order List History</h3>
            </div>

            <div class="table-responsive">
                <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable" id="lis">

                    <thead>
                        <?php $l = 0; ?>
                        <tr>

                            <th style="background-color: lightgray;">No</th>
                            <th style="background-color: lightgray;">Date</th>
                            <th style="background-color: lightgray;">Input By</th>
                            <th style="background-color: lightgray;">No WO</th>
                            <th style="background-color: lightgray;">Location</th>
                            <th style="background-color: lightgray;">Service By</th>
                            <th style="background-color: lightgray;">Requestor</th>
                            <th style="background-color: lightgray;">Breakdown Date</th>
                            <th style="background-color: lightgray;">Problem</th>
                            <th style="background-color: lightgray;">Status</th>
                            <th style="background-color: lightgray;">Start Service Date</th>
                            <th style="background-color: lightgray;">Finish Service Date</th>
                            <th style="background-color: lightgray;">Root Cause</th>
                            <th style="background-color: lightgray;">Preventive Action</th>
                            <th style="background-color: lightgray;">Change Part</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($breakdown as $kalibrasi)
                            <tr>
                                <td>{{ ++$l }}</td>
                                <td>{{ \Carbon\Carbon::parse($kalibrasi->created_at)->setTimezone('Asia/Jakarta')->format('d-M-Y ') }}</td>
                                <td>{{ $kalibrasi->input_by }}</td>
                                <td>{{ $kalibrasi->nowo }}</td>
                                <td>{{ $kalibrasi->location }}</td>
                                <td>{{ $kalibrasi->serviceby }}</td>
                                <td>{{ $kalibrasi->requestor}}</td>
                                <td>{{ $kalibrasi->breakdowndate }}</td>
                                <td>{{ $kalibrasi->problem }}</td>
                                <td>{{ $kalibrasi->Status== 1 ? 'Solve' : 'Not Solve' }}</td>
                                <td>{{ $kalibrasi->startservicedate }}</td>
                                <td>{{ $kalibrasi->finishservice }}</td>
                                <td>{{ $kalibrasi->rootcause }}</td>
                                <td>{{ $kalibrasi->preventiveaction }}</td>
                                <td>{{ $kalibrasi->changepart== 1 ? 'Yes' : 'No'}}</td>
    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>
 
    <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">History Edit Activity</h3>
        </div>

        <div class="table-responsive ">
            <table class="table card-table table-bordered table-vcenter text-nowrap datatable" id="listlowss">
                <thead>
                    <tr>
                        <?php $no = 1; ?>

                        <th style="background-color: lightgray;">No.</th>
                        <th style="background-color: lightgray;">date</th>
                        <th style="background-color: lightgray;">Change by</th>
                        <th style="background-color: lightgray;">Activity</th>
                        <th style="background-color: lightgray;">Table</th>
                        <th style="background-color: lightgray;">Field</th>
                        <th style="background-color: lightgray;">Before</th>
                        <th style="background-color: lightgray;">After</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($audit as $audits)
                        <tr>
                            <td><span class="text-muted">{{ $no++ }}</span></td>
                            <td>{{ \Carbon\Carbon::parse($audits->created_at)->setTimezone('Asia/Jakarta')->format('d-m-Y  H:i:s') }}
                            </td>
                            <td> {{ $audits->change_by }}</td>
                            <td>{{ $audits->activity }}</td>
                            <td>{{ $audits->sourcetable }}</td>
                            <td>{{ $audits->sourcefield }}</td>
                            <td>{{ $audits->beforevalue }}</td>
                            <td>{{ $audits->aftervalue }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>


@stop
@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#lis,#listlowss,#li').DataTable({

            });
        });
    </script>
@endpush
