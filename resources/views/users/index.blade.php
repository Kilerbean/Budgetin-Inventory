@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'List Karyawan';
    $pretitle = 'karyawan';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('Dashboards') }}"> Back</a>
                </div>
            </div>
            <div class="mx-2 mt-2">
                <h4 class="mb-2">List of Employees </h4>
            </div>

            <div class="table-responsive ">
                <table class="table card-table table-bordered  table-vcenter text-nowrap datatable" id="listkaryawan">
                    <thead>
                        <tr>
                            <th class="w-1 ml-1">Action</th>
                            <th>No</th>
                            <th>Employe Name </th>
                            <th>Email</th>
                            <th>Title</th>
                            <th>Level User</th>
                            <th>Status</th>
                        </tr>
                    <tbody>
                        @foreach ($user as $users)
                            <tr>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('karyawan.edit', $users->id) }}">Edit
                                        Access level</a>
                                </td>
                                <td>{{ ++$i }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->title }}</td>
                                <td>{{ \App\Http\Controllers\UserController::getLevelUserText($users->leveluser) }}</td>
                                <td>{{ $users->Status == 1 ? 'Active' : 'Inactive' }}</td>

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
            var table = $('#listkaryawan').DataTable({
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
