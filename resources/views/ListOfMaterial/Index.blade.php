@extends('templates.dasar')
@php
    $titles='QC - List of Material';
    $title = 'List of All Material';
    $pretitle = 'COST-QC LAB';
    
@endphp
<style>
             
             .btn-blue {
            background-image: linear-gradient(to right, #314755 0%, #26a0da  51%, #314755  100%);
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
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         
</style>

@push('page-action')
    <a href="{{ route('Barang.Create') }}" class="btn btn-primary btn-sm">Create New Material</a>
    <a href="{{ route('barangtidakaktif') }}" class="btn btn-danger btn-sm">List Material Inactive</a>
@endpush

@section('coba')
{{-- <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <input type="submit" value="Import" class="btn btn-primary">
</form> --}}

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Of All Material</h3>
            </div>

            <div class="table-responsive ">
                <table class="table card-table table-bordered table-vcenter text-nowrap datatable" id="listlowss">
                    <thead>
                        <tr>
                            <?php $no = 1; ?>
                            <th class="w-1 ml-1" style="background-color: lightgray;">Action
                            </th>
                            <th style="background-color: lightgray;">No.</th>
                            <th style="background-color: lightgray;">catalog Number</th>
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

                                    <a href="{{ route('Barang.show',$barang->id) }}"title="Info Detail Material" class="btn btn-grad btn-sm"><i class="fa fa-info"></i></a>

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
@endsection
