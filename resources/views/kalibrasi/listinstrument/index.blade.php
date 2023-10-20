@extends('layouts.master')
@php
    $titles = 'QC - LIST INSTRUMENT/ ASSET QUALITY CONTROL DEPARTMENT';
    $title = 'Q-LIS | LIST INSTRUMENT ';
    $pretitle = 'Calibration  Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')






    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col">
                    <a href="{{ route('listkalibrasi.create') }}" class="btn btn-primary btn-sm">Create New Instrument</a>
                    <a href="{{ route('kalibrasi.addbreakdown') }}" class="btn btn-warning btn-sm">Instrument Breakdown</a>
                    <a href="{{ route('barangtidakaktif') }}" class="btn btn-success btn-sm">Add Calibration Schedule</a>
                    <a href="{{ route('barangtidakaktif') }}" class="btn btn-dark btn-sm">Create Work Order List</a>
                    <a href="{{ route('kalibrasi.vendor') }}" class="btn btn-secondary btn-sm">Add Vendor</a>
                </div>
            </div>
            <div class="mx-2 mt-2">
                <h4 class="mb-2">List Instrument / Asset Quality Control Departement</h4>
            </div>


            <div class="table-responsive ">
                <table class="table table-bordered text-nowrap table-responsive-sm" id="listlowss">
                    <thead>
                        <tr>
                            <?php $no = 1; ?>
                            <th class="w-1 ml-1" style="background-color: lightgray;">Action
                            </th>
                            <th style="background-color: lightgray;">No.</th>
                            <th style="background-color: lightgray;">Instrument Name</th>
                            <th style="background-color: lightgray;">Instrument ID</th>
                            <th style="background-color: lightgray;">Serial number</th>
                            <th style="background-color: lightgray;">Calibration Frequency</th>
                            <th style="background-color: lightgray;">Need Calibration</th>
                            <th style="background-color: lightgray;">Last Calibration</th>
                            <th style="background-color: lightgray;">Next Calibration</th>
                            <th style="background-color: lightgray;">Calibration By</th>
                            <th style="background-color: lightgray;">Year of Investment</th>
                            <th style="background-color: lightgray;">Location</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kalibrasi as $kalibrasis)
                            <tr>
                                <td class="text-end">
{{-- 
                                    <a href="{{ route('Barang.show', $kalibrasis->id) }}"title="Info Detail Material"
                                        class="btn btn-info btn-sm"><i class="fa fa-info"></i></a> --}}

                                   

                                        <form action="{{ route('kalibrasi.destroy', $kalibrasis->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('listKalibrasi.edit', $kalibrasis->id) }}" class="btn btn-primary btn-sm"
                                                title="Edit Instrument"><i class="fa fa-pen"></i></a>
                                                <a href="{{ route('kalibrasi.breakdown', $kalibrasis->id) }}" class="btn btn-warning btn-sm"
                                                    title="Breakdown Instrument"><i class="fa fa-pen-to-square"></i></a>

                                                @if (auth()->user()->leveluser >3)
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure want to delete this ?');" title="Delete"><i
                                                    class="fa fa-trash"></i></button>
                                                @endif
                                        </form>

                                </td>

                                <td><span class="text-muted">{{ $no++ }}</span></td>
                                <td>{{ $kalibrasis->instrumentname }}</td>
                                <td>{{ $kalibrasis->instrumentid }}</td>
                                <td>{{ $kalibrasis->serialnumber }}</td>
                                <td>{{ $kalibrasis->frekuensicalibration }} Month</td>
                                <td>{{ $kalibrasis->needcalibration== 1 ? 'Yes' : 'No'  }}</td>
                                <td>{{ $kalibrasis->lastcalibration}}</td>
                                <td>{{ $kalibrasis->nextcalibration}}</td>
                                <td>{{ $kalibrasis->calibrationby }}</td>
                                <td>{{ $kalibrasis->yearofinvestment }}</td>
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