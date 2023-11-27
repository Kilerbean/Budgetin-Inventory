@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Q-LIS |Incoming of Material Report - Purchasing';
    $pretitle = 'EXPENSE-Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-info" href="{{ route('laporanincomepdf') }}"><i class="fa fa-file-pdf"></i> Download PDF</a>
            <a class="btn btn-success" href="{{ route('Dashboards') }}"> Back</a>
        </div>
    </div>
    <br>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Report of All Incoming Material</h3>
            </div>

            <div class="table-responsive ">
                <table class="table table-sm table-bordered text-nowrap" id="listreport-incoming">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>PO Date</th>
                            <th>No PR</th>
                            <th>Catalog Number</th>
                            <th>Name of Material</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Price/unit</th>
                            <th>Total</th>
                            <th>Propose</th>
                            <th>No PO</th>
                            <th>No Batch</th>
                            <th>Expire Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $income->PO_Date }}</td>
                                <td>{{ $income->No_PR }}</td>
                                <td>{{ $income->Catalog_Number }}</td>
                                <td>{{ $income->Barang->Name_of_Material }}</td>
                                <td>{{ $income->Quantity }}</td>
                                <td>{{ $income->Unit }}</td>
                                <td>{{ $income->Prices }}</td>
                                <td>{{ $income->Total }}</td>
                                <td>{{ $income->Propose }}</td>
                                <td>{{ $income->No_PO }}</td>
                                <td>{{ $income->no_batch }}</td>
                                <td>{{ $income->Expire_Date }}</td>
                                <td>{{ $income->Status == 1 ? 'DiTerima' : 'BelumDiTerima' }}</td>
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
            var table = $('#listreport-incoming').DataTable({
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
