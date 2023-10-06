@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'List of All Material Based Material Code';
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
                    <a href="{{ route('Barang.index') }}" class="btn btn-primary btn-sm">Back</a>
                   
                </div>
            </div>


    <div class="mx-2 mt-2">
        <h4 class="mb-2">List Of All Material Based Material Code </h4>
    </div>
    <div class="container">

       
    </div>
    <div class="table-responsive ">
        <table class="table table-bordered text-nowrap table-responsive-sm" id="listlowss">
            <thead>
                <tr>
                    <?php $no = 1; ?>
                    {{-- <th class="w-1 ml-1" style="background-color: lightgray;">Action</th> --}}
                    <th style="background-color: lightgray;">No.</th>
                    <th style="background-color: lightgray;">Name of Material</th>
                    <th style="background-color: lightgray;">Material Code</th>
                    <th style="background-color: lightgray;">Quantity</th>
                    <th style="background-color: lightgray;">Unit</th>
                    <th style="background-color: lightgray;">Type of Material</th>
                    {{-- <th style="background-color: lightgray;">Packing Size</th> --}}
                    <th style="background-color: lightgray;">Total Amount</th>
                    <th style="background-color: lightgray;">Total Amount Unit</th>

                    <th style="background-color: lightgray;">Manufacture</th>

                    <th style="background-color: lightgray;">Prices (IDR)</th>
                    <th style="background-color: lightgray;">Movement Category</th>
                    <th style="background-color: lightgray;">Safety Stock</th>
                    <th style="background-color: lightgray;">Maximum Stock</th>
                    <th style="background-color: lightgray;">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
              $prevMaterialCode = null; // Inisialisasi kode material sebelumnya
                 $totalAmount = 0; // Inisialisasi total amount
        
        @endphp
                @foreach ($barangs as $barang)
                    <tr>
                        {{-- <td class="text-end">

                            <a href="{{ route('Barang.show', $barang->id) }}"title="Info Detail Material"
                                class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>


                        </td> --}}
                        
                        <td><span class="text-muted">{{ $no++ }}</span></td>
                        <td>{{ $barang->Name_of_Material }}</td>
                        <td> {{ $barang->Material_Code }}</td>
                        <td>{{ $totalQuantity[$barang->Material_Code] }}</td>
                        <td>{{ $barang->Unit }}</td>
                        <td>{{ $barang->Type_of_Material }}</td>
                        {{-- <td>{{ $barang->packingsize }}</td> --}}
                        <td>{{ $totalAmounts[$barang->Material_Code] }}</td>
                        <td>{{ $barang->packingsize_unit }}</td>

                        <td>{{ $barang->Manufaktur }}</td>
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
