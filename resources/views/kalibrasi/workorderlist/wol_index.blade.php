@extends('layouts.master')
@php
    $titles = 'QC - Work Order List';
    $title = 'Q-LIS | WORK ORDER LIST ';
    $pretitle = 'Calibration  Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')


    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary btn-sm" href="{{ route('dashboard.kalibrasi') }}">Dashboard</a>
                    <a href="{{ route('listKalibrasi') }}" class="btn btn-info btn-sm"><i class="fa-solid fa-file-lines"></i> List Instrument</a>
                    {{-- <a href="{{ route('listkalibrasi.create') }}" class="btn btn-primary btn-sm">Create New Instrument</a>
                    <a href="{{ route('jadwal') }}" class="btn btn-success btn-sm">Add Calibration Schedule</a> --}}

                </div>
            </div>
            <div class="mx-2 mt-2">
                <h4 class="mb-2">Work Order List</h4>
            </div>


            <div class="table-responsive ">
                <table class="table table-bordered text-nowrap table-responsive-sm" id="listlowss">
                    <thead>
                        <tr>
                            <?php $no = 1; ?>
                            <th class="w-1 ml-1" style="background-color: lightgray;">Action
                            </th>
                            <th style="background-color: lightgray;">No.</th>
                            <th style="background-color: lightgray;">Instrument ID</th>
                            <th style="background-color: lightgray;">Instrument Name</th>
                            <th style="background-color: lightgray;">No WO/No PR</th>
                            <th style="background-color: lightgray;">Location</th>
                            <th style="background-color: lightgray;">Service By</th>
                            <th style="background-color: lightgray;">Requestor</th>
                            <th style="background-color: lightgray;">Breakdown Date</th>
                            <th style="background-color: lightgray;">Problem</th>
                            <th style="background-color: lightgray;">Status</th>
                            <th style="background-color: lightgray;">Start Service Date</th>
                            <th style="background-color: lightgray;">Finish Service</th>
                            <th style="background-color: lightgray;">Root Cause</th>
                            <th style="background-color: lightgray;">Preventive Action</th>
                            <th style="background-color: lightgray;">Change Part</th>





                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kalibrasi as $kalibrasis)
                            <tr>
                                <td class="text-end">
{{-- 
                                    <a href="{{ route('Barang.show', $kalibrasis->id) }}"title="Info Detail Material"
                                        class="btn btn-info btn-sm"><i class="fa fa-info"></i></a> --}}

                                      
                                            
                                            <form action="{{ route('workorderlist.done', $kalibrasis->id) }}" class=""
                                                method="post">
                
                                                @csrf
                                                @method('PUT')
                                                <a href="{{ route('workorderlist.edit', $kalibrasis->id) }}" class="btn btn-primary btn-sm"
                                                    title="Edit Instrument"><i class="fa fa-pen"></i></a>

                                                    
                                                <button type="submit" class="btn btn-success btn-sm"
                                                    onclick="return confirm('Are you sure want to Done?');"title="Done Work Order">
                                                    <i class="fa-regular fa-square-check"></i></button>
                                                {{-- <a href="{{ route('income.edit', $baranglow->id) }}" class="btn btn-primary btn-sm"
                                                    title="Edit Material"><i class="fa fa-pen"></i></a> --}}
                                            </form>
                                        

                                </td>

                                <td><span class="text-muted">{{ $no++ }}</span></td>
                                <td>{{ $kalibrasis->instrumentid }}</td>
                                <td>{{ $kalibrasis->instrumentname }}</td>
                                <td>{{ $kalibrasis->nowo}}</td>
                                <td>{{ $kalibrasis->location}}</td>
                                <td>{{ $kalibrasis->serviceby}}</td>
                                <td>{{ $kalibrasis->requestor}}</td>
                                <td>{{ $kalibrasis->startbreakdown}}</td>
                                <td>{{ $kalibrasis->problem}}</td>
                                <td>{{ $kalibrasis->Status== 1 ? 'Solve' : 'Not Solve'}}</td>
                                <td>{{ $kalibrasis->startservicedate}}</td>
                                <td>{{ $kalibrasis->finishservice}}</td>
                                <td>{{ $kalibrasis->rootcause}}</td>
                                <td>{{ $kalibrasis->preventiveaction}}</td>
                                <td>{{ $kalibrasis->changepart== 1 ? 'Yes' : 'No'}}</td>

             
 
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