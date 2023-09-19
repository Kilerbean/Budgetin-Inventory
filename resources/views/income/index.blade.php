@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Incoming of Material';
    $pretitle = 'COST-QC LAB';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-success" href="{{ route('income.create') }}"> Create new Purchasing Material</a>
            <a class="btn btn-dark " href="{{ route('Income.deadstock') }}"> List Dead Stock</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Incoming of Material </h4>
    </div>
    <br>
    @include('income.includelist.incomekurang')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>


    @include('COST_QC.listmaterial.listmaterialbelumditerima')
    <br>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>

    <br>
    <br>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of All Incoming Materials and Has Been Confirmed </h3>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="listlow">
                    <div style="background-color: lightgray;">
                        <thead>
                            <tr>
                                <th class="w-1 ml-1"style="background-color: lightgray;">Action</th>
                                <th style="background-color: lightgray;">No</th>
                                <th style="background-color: lightgray;">No PO</th>
                                <th style="background-color: lightgray;">Catalog Number</th>
                                <th style="background-color: lightgray;">Name of Material</th>
                                <th style="background-color: lightgray;">Batch Number</th>
                                <th style="background-color: lightgray;">Quantity</th>
                                <th style="background-color: lightgray;">Price/pcs</th>
                                <th style="background-color: lightgray;">Total</th>
                                <th style="background-color: lightgray;">Unit</th>
                                <th style="background-color: lightgray;">Propose</th>
                                <th style="background-color: lightgray;">No PR</th>
                                <th style="background-color: lightgray;">PR Date</th>
                                <th style="background-color: lightgray;">Expire Date</th>
                                <th style="background-color: lightgray;">Status</th>
                    </div>
                    </tr>
                    </thead>
                    @foreach ($incomess as $income)
                        <tr>
                            <td>
                                <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm" href="{{ route('income.edit', $income->id) }}"
                                        title="Edit Material"> <i class="fa fa-pen"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure want to delete this ?');" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            <td>{{ ++$i }}</td>
                            <td>{{ $income->No_PO }}</td>
                            <td>{{ $income->Catalog_Number }}</td>
                            <td>{{ $income->Barang->Name_of_Material }}</td>
                            <td>{{ $income->no_batch }}</td>
                            <td>{{ $income->Quantity }}</td>
                            <td>{{ number_format($income->Prices, 2, '.', ',') }}</td>
                            <td>{{ number_format($income->Total, 2, '.', ',') }}</td>
                            <td>{{ $income->Unit }}</td>
                            <td>{{ $income->Propose }}</td>
                            <td>{{ $income->No_PR }}</td>
                            <td>{{ $income->PO_Date }}</td>
                            <td>{{ $income->Expire_Date }}</td>
                            <td>{{ $income->Status == 1 ? 'Accepted' : 'Unaccepted' }}</td>

                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="row text-center">

            </div>
        </div>
    </div>


    <br>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    @include('income.includelist.audit')



@stop
@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#listlowq,#listlowss,#lis').DataTable({
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

        // $(function() {
        //     var table = $('#lis').DataTable({

        //     });
        // });
    </script>
@endpush
