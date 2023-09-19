@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Material Usage';
    $pretitle = 'COST-QC LAB';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-success" href="{{ route('usage.create') }}"> Create new Material Usage</a>
        </div>
    </div>
    <br>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List all materials that will be used</h3>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="listlow">
                    <thead>
                        <tr>
                            <?php $no = 1; ?>

                            <th class="w-1 ml-1" style="background-color: lightgray;">Action</th>
                            <th style="background-color: lightgray;">No</th>

                            <th style="background-color: lightgray;">Catalog Number</th>
                            <th style="background-color: lightgray;">Name of Material</th>
                            <th style="background-color: lightgray;">Type of Material</th>
                            <th style="background-color: lightgray;">Quantity</th>
                            <th style="background-color: lightgray;">Unit</th>
                            <th style="background-color: lightgray;">No Batch</th>
                            <th style="background-color: lightgray;">Expire Date</th>
                            <th style="background-color: lightgray;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usage as $usages)
                            <tr>
                                <td>
                                    <form action="{{ route('usage.destroy', $usages->id) }}" method="POST">

                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('usage.edit', $usages->id) }}"title="Edit Barang"> <i
                                                class="fa fa-pen"></i></a>


                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure want to delete this ?');"title="Delete Barang"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>

                                <td>{{ ++$i }}</td>
                                <td>{{ $usages->Catalog_Number }}</td>
                                <td>{{ $usages->Barang->Name_of_Material }}</td>
                                <td>{{ $usages->Type_of_Material }}</td>
                                <td>{{ $usages->Quantity }}</td>
                                <td>{{ $usages->Unit }}</td>
                                <td>{{ $usages->no_batch }}</td>
                                <td>{{ $usages->Expire_Date }}</td>
                                <td>{{ $usages->Status == 1 ? 'Aktif' : 'InAktif' }}</td>
                            </tr>
                        @endforeach
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

    @include('usage.audit')


@stop
@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#listlowss').DataTable({
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
