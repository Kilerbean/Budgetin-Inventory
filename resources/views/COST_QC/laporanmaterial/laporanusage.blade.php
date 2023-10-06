@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Material Usage Report';
    $pretitle = 'EXPENSE-Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-info" href="{{ route('laporanusagepdf') }}"><i class="fa fa-file-pdf"></i> Download PDF</a>
            <a class="btn btn-success" href="{{ route('Dashboards') }}"> Back</a>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Report all Material Usage</h3>
            </div>

            <div class="table-responsive">
                <table class="table table-sm table-bordered text-nowrap" id="listreport-usage">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Type of Material</th>
                            <th>Type of Budget</th>
                            <th>Catalog Number</th>
                            <th>Name of Material</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usage as $usages)
                            <tr>

                                <td>{{ ++$i }}</td>
                                <td>{{ $usages->Type_of_Material }}</td>
                                <td>{{ $usages->Barang->Type_of_Budget }}</td>
                                <td>{{ $usages->Catalog_Number }}</td>
                                <td>{{ $usages->Barang->Name_of_Material }}</td>
                                <td>{{ $usages->Quantity }}</td>
                                <td>{{ $usages->Unit }}</td>
                                <td>{{ $usages->Status == 1 ? 'Aktif' : 'InAktif' }}</td>

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
            var table = $('#listreport-usage').DataTable({
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
                        extend: 'colvis',
                        text: "Hide / Show",
                        postfixButtons: ['colvisRestore']
                    }
                ],
            });
        });
    </script>
@endpush