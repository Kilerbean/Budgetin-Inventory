@extends('layouts.master')
@php
    $titles = 'Q-LIS - List of Material';
    $title = 'Q-LIS |List of All Material';
    $pretitle = 'EXPENSE-Q-LIS';
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
                    <a href="{{ route('Barang.Create') }}" class="btn btn-primary btn-sm">Add New Material</a>
                    <a href="{{ route('barangtidakaktif') }}" class="btn btn-danger btn-sm">List Material Inactive</a>
                    <a href="{{ route('Barang.listcode') }}" class="btn btn-info btn-sm">List Material based Material Code</a>
                </div>
            </div>
            <div class="mx-2 mt-2">
                <h4 class="mb-2">List Of All Material </h4>
            </div>
            <div class="container">
                <form method="GET" action="" class="row">
                    <div class="col-md-3">
                        <label for="Type_of_Material">Type of Material</label>
                        <select class="form-select" name="Type_of_Material">
                            <option value="">Select</option>
                            <option value="Column" {{ old('Type_of_Material') === 'Column' ? 'selected' : '' }}>Column
                            </option>
                            <option
                                value="Sparepart Instrument"{{ old('Type_of_Material') === 'Sparepart Instrument' ? 'selected' : '' }}>
                                Sparepart Instrument</option>
                            <option
                                value="Service Charge"{{ old('Type_of_Material') === 'Service Charge' ? 'selected' : '' }}>
                                Service Charge</option>
                            <option
                                value="Reference Standard"{{ old('Type_of_Material') === 'Reference Standard' ? 'selected' : '' }}>
                                Reference Standard</option>
                            <option
                                value="Working Standard"{{ old('Type_of_Material') === 'Working Standard' ? 'selected' : '' }}>
                                Working Standard</option>
                            <option
                                value="Bacteria/Yeast and Mold Standard"{{ old('Type_of_Material') === 'Bacteria/Yeast and Mold Standard' ? 'selected' : '' }}>
                                Bacteria / Yeast and Mold Standard</option>
                            <option
                                value="External Laboratory"{{ old('Type_of_Material') === 'External Laboratory' ? 'selected' : '' }}>
                                External Laboratory</option>
                            <option
                                value="Liquid Reagent"{{ old('Type_of_Material') === 'Liquid Reagent' ? 'selected' : '' }}>
                                Liquid Reagent</option>
                            <option
                                value="Solid Reagent"{{ old('Type_of_Material') === 'Solid Reagent' ? 'selected' : '' }}>
                                Solid Reagent</option>
                            <option
                                value="Microbiology Reagent"{{ old('Type_of_Material') === 'Microbiology Reagent' ? 'selected' : '' }}>
                                Microbiology Reagent</option>
                            <option
                                value="Microbiology Media"{{ old('Type_of_Material') === 'Microbiology Media' ? 'selected' : '' }}>
                                Microbiology Media</option>
                            <option value="Glassware" {{ old('Type_of_Material') === 'Glassware' ? 'selected' : '' }}>
                                Glassware</option>
                            <option
                                value="General Usage"{{ old('Type_of_Material') === 'General Usage' ? 'selected' : '' }}>
                                General Usage</option>
                        </select>

                    </div>
                    <div class="col-md-1 pt-4">
                        <button type="submit" class="btn btn-success ">Filter</button>
                    </div>
                </form>
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
                            <th style="background-color: lightgray;">CAS Number</th>
                            <th style="background-color: lightgray;">Material Code</th>
                            <th style="background-color: lightgray;">Quantity</th>
                            <th style="background-color: lightgray;">Quantity Unit</th>
                            <th style="background-color: lightgray;">Manufacture</th>
                            <th style="background-color: lightgray;">Packing Size</th>
                            <th style="background-color: lightgray;">Packing Size Unit</th>
                            <th style="background-color: lightgray;">Type of Material</th>
                            <th style="background-color: lightgray;">Prices (IDR)</th>
                            <th style="background-color: lightgray;">Movement Category</th>
                            <th style="background-color: lightgray;">Safety Stock</th>
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
                                <td>{{ $barang->CAS_Number }}</td>
                                <td> {{ $barang->Material_Code }}</td>
                                <td>{{ $barang->Quantity }}</td>
                                <td>{{ $barang->Unit }}</td>
                                <td>{{ $barang->Manufaktur }}</td>

                                <td>{{ $barang->packingsize }}</td>
                                <td>{{ $barang->packingsize_unit }}</td>
                                <td>{{ $barang->Type_of_Material }}</td>

                                <td>{{ number_format($barang->Harga, 2, '.', ',') }}</td>
                                <td>{{ $barang->category }}</td>
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
