@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'List of All Material';
    $pretitle = 'COST-QC LAB';
    $pages = $title;
@endphp
@section('title', $pages)
@push('css')
    <style>
        .btn-blue {
            background-image: linear-gradient(to right, #314755 0%, #26a0da 51%, #314755 100%);
            margin: 10px;
            padding: 15px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
        }

        .btn-blue:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
        }
    </style>
@endpush
@section('content')    
    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col">
                    <a href="{{ route('Barang.Create') }}" class="btn btn-primary btn-sm">Create New Material</a>
                    <a href="{{ route('barangtidakaktif') }}" class="btn btn-danger btn-sm">List Material Inactive</a>
                </div>            
            </div>
            <div class="mx-2 mt-2">
                <h4 class="mb-2">List Of All Material </h4>
            </div>
            <div class="container">
                <form method="GET" action="" class="row">
                    <div class="col-md-3">
                        <label for="">Start Date</label>
                        <input class="form-control" type="date" name="start_date" value="{{ old('start_date') }}">
                    </div>
        
                    <div class="col-md-3">
                        <label for="">End Date</label>
                        <input class="form-control" type="date" name="end_date" value="{{ old('end_date') }}">
                    </div>
                    <div class="col-md-1 pt-4">
                        <button type="submit" class="btn btn-success ">Filter</button>
        
                    </div>

            <div class="table-responsive ">
                <table class="table table-bordered text-nowrap table-responsive-sm" id="listlowss">
                    <thead>
                        <tr>
                            <?php $no = 1; ?>
                            <th class="w-1 ml-1" style="background-color: lightgray;">Action
                            </th>
                            <th style="background-color: lightgray;">No.</th>
                            <th style="background-color: lightgray;">Catalog Number</th>
                            <th style="background-color: lightgray;">Name of Material</th>
                            <th style="background-color: lightgray;">Material Code</th>
                            <th style="background-color: lightgray;">Quantity</th>
                            <th style="background-color: lightgray;">Unit</th>
                            <th style="background-color: lightgray;">Type of Material</th>
                            <th style="background-color: lightgray;">Packing Size</th>
                            <th style="background-color: lightgray;">PackingSize Unit</th>
                            <th style="background-color: lightgray;">Manufaktur</th>
                            <th style="background-color: lightgray;">Prices (IDR)</th>
                            <th style="background-color: lightgray;">Safe Stock</th>
                            <th style="background-color: lightgray;">Maximum Stock</th>
                            <th style="background-color: lightgray;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td class="text-end">

                                    <a href="{{ route('Barang.show', $barang->id) }}"title="Info Detail Material"
                                        class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>

                                    <a href="{{ route('Barang.edit', $barang->id) }}" class="btn btn-primary btn-sm"
                                        title="Edit Barang"><i class="fa fa-pen"></i></a>

                                </td>

                                <td><span class="text-muted">{{ $no++ }}</span></td>
                                <td>{{ $barang->Catalog_Number }}</td>
                                <td>{{ $barang->Name_of_Material }}</td>
                                <td> {{ $barang->Material_Code }}</td>

                                <td>{{ $barang->Quantity }}</td>
                                <td>{{ $barang->Unit }}</td>
                                <td>{{ $barang->Type_of_Material }}</td>
                             
                                <td>{{ $barang->packingsize }}</td>
                                <td>{{ $barang->packingsize_unit }}</td>
                                <td>{{ $barang->Manufaktur }}</td>
                                <td>{{ number_format($barang->Harga, 2, '.', ',') }}</td>
                                <td>{{ $barang->Safety_Stock }}</td>
                                <td>{{ $barang->Maximum_Stock }}</td>
                                <td>{{ $barang->Status == 1 ? 'Active' : 'Inactive' }}</td>
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
    @include('ListOfMaterial.audit')

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
