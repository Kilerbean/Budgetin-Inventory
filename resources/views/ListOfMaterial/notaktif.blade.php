@extends('layouts.master')
@php
    $titles = 'Q-LIS - List of Material';
    $title = 'Q-LIS |List of All Material Inactive';
    $pretitle = 'EXPENSE-Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a href="{{ route('Barang.Create') }}" class="btn btn-info btn-sm">Create New Material</a>
            <a href="{{ route('Barang.index') }}" class="btn btn-primary btn-sm">Back</a>
        </div>
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Of All Inactive Material</h3>
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
                            <th style="background-color: lightgray;">Material Code</th>
                            <th style="background-color: lightgray;">Name of Material</th>
                            <th style="background-color: lightgray;">Quantity</th>
                            <th style="background-color: lightgray;">Unit</th>
                            <th style="background-color: lightgray;">Type of Material</th>
                            <th style="background-color: lightgray;">Type of budget</th>
                            <th style="background-color: lightgray;">Packing Size</th>
                            <th style="background-color: lightgray;">Manufacture</th>
                            <th style="background-color: lightgray;">Prices (IDR)</th>

                            <th style="background-color: lightgray;">Safety Stock</th>
                            <th style="background-color: lightgray;">Maximum Stock</th>
                            <th style="background-color: lightgray;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td class="text-end">


                                    <a href="{{ route('Barang.edit', $barang->id) }}" class="btn btn-primary btn-sm"
                                        title="Edit Barang"><i class="fa fa-pen"></i></a>
                                    @if (auth()->user()->leveluser > 4)
                                        <form action="{{ route('Barang.destroy', $barang->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure want to delete this ?');"title="Delete Barang"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    @endif
                                </td>

                                <td><span class="text-muted">{{ $no++ }}</span></td>
                                <td>{{ $barang->Catalog_Number }}</td>
                                <td> {{ $barang->Material_Code }}</td>
                                <td>{{ $barang->Name_of_Material }}</td>
                                <td>{{ $barang->Quantity }}</td>
                                <td>{{ $barang->Unit }}</td>
                                <td>{{ $barang->Type_of_Material }}</td>
                                <td>{{ $barang->Type_of_Budget }}</td>
                                <td>{{ $barang->packingsize }}</td>
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


@stop
@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('#listlowss,#listupcoming').DataTable({

            });
        });
    </script>
@endpush
