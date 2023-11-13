@extends('layouts.master')
@php
    $titles = 'QC - LIST APPROVAL/ NEED REVISION';
    $title = 'Q-LIS | LIST FINAL APPROVAL ';
    $pretitle = 'Calibration  Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">

            <a class="btn btn-primary btn-sm" href="{{ route('dashboard.kalibrasi') }}">Back</a>
        </div>
    </div>

    <div class="col-12">
        <div class="card">

            <div class="mx-2 mt-2">
                <h4 class="mb-2">Final Approval of Scheduled Calibration</h4>
            </div>


            <div class="table-responsive ">
                <table class="table table-bordered text-nowrap table-responsive-sm" id="listlowss">
                    <thead>
                        <tr>
                            <?php $no = 1; ?>
                            <th class="w-1 ml-1" style="background-color: lightgray;">Action</th>
                            <th style="background-color: lightgray;">No.</th>
                            <th style="background-color: lightgray;">Instrument ID</th>
                            <th style="background-color: lightgray;">Instrument Name</th>
                            <th style="background-color: lightgray;">Calibration Date</th>
                            <th style="background-color: lightgray;">Calibration By</th>
                            <th style="background-color: lightgray;">Location</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kalibrasifinal as $kalibrasis)
                            <tr>
                                <td class="text-end">


                                    <form action="{{ route('kalibrasi.terjadwal.final', $kalibrasis->id) }}" class=""
                                        method="post">

                                        @csrf
                                        @method('PUT')

     

                                            <button type="submit" class="btn btn-success btn-sm"
                                            onclick="return confirm('Are You Sure About Approved Calibrating This Instrument??');"title="Approve">
                                            <i class="fa-solid fa-check-double"></i></button>



                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdropsreject{{$kalibrasis->id}}"
                                            title="Rejected">
                                            <i class="fa-solid fa-xmark"></i>
                                            </button>
                                           

                                    </form>
                                    @include('kalibrasi.listinstrument.modalreason')




                                </td>

                                <td><span class="text-muted">{{ $no++ }}</span></td>
                                <td>{{ $kalibrasis->instrumentid }}</td>
                                <td>{{ $kalibrasis->instrumentname }}</td>
                                <td>{{ $kalibrasis->jadwalkalibrasi }}</td>
                                <td>{{ $kalibrasis->calibrationby }}</td>
                                <td>{{ $kalibrasis->location }}</td>
                        @endforeach

                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>



    <br>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    <div class="col-12">
        <div class="card">

            <div class="mx-2 mt-2">
                <h4 class="mb-2">Rejected Calibration Schedule</h4>
            </div>


            <div class="table-responsive ">
                <table class="table table-bordered text-nowrap table-responsive-sm" id="listlowss">
                    <thead>
                        <tr>
                            <?php $no = 1; ?>
                            <th class="w-1 ml-1" style="background-color: lightgray;">Action</th>
                            <th style="background-color: lightgray;">No.</th>
                            <th style="background-color: lightgray;">Instrument ID</th>
                            <th style="background-color: lightgray;">Instrument Name</th>
                            <th style="background-color: lightgray;">Reason Rejected</th>
                            <th style="background-color: lightgray;">Calibration Date</th>
                            <th style="background-color: lightgray;">Calibration By</th>
                            <th style="background-color: lightgray;">Location</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kalibrasiditolak as $kalibrasis)
                            <tr>
                                <td class="text-end">
                                    <form action="{{ route('kalibrasi.terjadwal.revisi', $kalibrasis->id) }}" class=""
                                        method="post">

                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm"
                                            onclick="return confirm('Are You Sure About confirm Revision Calibrating This Instrument?');"title="Done Revision">
                                            <i class="fa fa-calendar-check"></i></button>

                                        <a href="{{ route('jadwalkalibrasi.edit', $kalibrasis->id) }}"
                                            class="btn btn-primary btn-sm" title="Edit Instrument"><i
                                                class="fa fa-pen"></i></a>

                                    </form>


                                </td>

                                <td><span class="text-muted">{{ $no++ }}</span></td>
                                <td>{{ $kalibrasis->instrumentid }}</td>
                                <td>{{ $kalibrasis->instrumentname }}</td>
                                <td>{{ $kalibrasis->reason_notapprove }}</td>
                                <td>{{ $kalibrasis->jadwalkalibrasi }}</td>
                                <td>{{ $kalibrasis->calibrationby }}</td>
                                <td>{{ $kalibrasis->location }}</td>
                        @endforeach

                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@stop
@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('#listlowss,#listupcoming').DataTable({
                dom: 'lBftrip',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'colvis',
                        text: "Hide / Show",
                        postfixButtons: ['colvisRestore']
                    }
                ],
            });
        });
    </script>
@endpush
