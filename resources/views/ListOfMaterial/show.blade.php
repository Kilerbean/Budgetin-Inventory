@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Detail of Material';
    $pretitle = 'COST-QC LAB';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-grad text-white" href="{{ route('Barang.index') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Detail Material</h4>
    </div>

    <div class="col-12">
        <div class="card">            
            <div class="card-body">
                <label class="form-label"> Material Code : {{ $barang->Material_Code }} </label><br>
                <label class="form-label"> Catalog Number : {{ $barang->Catalog_Number }} </label><br>
                <label class="form-label"> Name Materials : {{ $barang->Name_of_Material }} </label><br>
                <label class="form-label"> Type of Material : {{ $barang->Type_of_Material }} </label><br>
                <label class="form-label"> Type of Budget : {{ $barang->Type_of_Budget }} </label><br>
                <label class="form-label"> Packing Size : {{ $barang->packingsize }} </label><br>
                <label class="form-label"> Manufaktur : {{ $barang->Manufaktur }} </label><br>
                <label class="form-label"> Quantity : {{ $barang->Quantity }} </label><br>
                <label class="form-label"> Unit : {{ $barang->Unit }} </label><br>
                <label class="form-label"> Packing Size : {{ $barang->packingsize }} </label><br>
                <label class="form-label"> Packing Size Unit : {{ $barang->packingsize_unit }} </label><br>
                <label class="form-label"> Price :IDR {{ number_format($barang->Harga, 2, '.', ',') }} </label><br>
                <label class="form-label"> Movement Category : {{ $barang->category }} </label><br>
                <label class="form-label"> Safety Stock : {{ $barang->Safety_Stock }} </label><br>
                <label class="form-label"> Maximum Stock : {{ $barang->Maximum_Stock }} </label>
            </div>
        </div>
    </div>

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> list of incoming materials </h3>
            </div>

            <div class="table-responsive">
                <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable" id="lis">
                    <thead>
                        <tr>
                            <th class="w-1 ml-1"style="background-color: lightgray;">Action</th>
                            <th style="background-color: lightgray;">No</th>
                            <th style="background-color: lightgray;">Create Date</th>
                            <th style="background-color: lightgray;">No PO</th>
                            <th style="background-color: lightgray;">Request By</th>
                            <th style="background-color: lightgray;">Input By</th>
                            <th style="background-color: lightgray;">Quantity</th>
                            <th style="background-color: lightgray;">Unit</th>
                            <th style="background-color: lightgray;">Packing Size</th>
                            <th style="background-color: lightgray;">Packing Size Unit</th>
                            <th style="background-color: lightgray;">Propose</th>
                            <th style="background-color: lightgray;">Batch Number</th>
                            <th style="background-color: lightgray;">Expire Date</th>
                            <th style="background-color: lightgray;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td class="text-nowrap">

                                    {{-- tombol Edit --}}
                                    <a class="btn btn-primary btn-sm" href="{{ route('income.edit', $income->id) }}"
                                        title="Edit Material"> <i class="fa fa-pen"></i></a>

                                    @if (auth()->user()->leveluser > 4)
                                        <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure want to delete this ?');"
                                                title="Delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @endif
                                </td>

                                <td>{{ ++$i }}</td>
                                <td>{{ \Carbon\Carbon::parse($income->created_at)->setTimezone('Asia/Jakarta')->format('d-M-Y ') }}
                                </td>
                                <td>{{ $income->No_PO }}</td>
                                <td>{{ $income->request_by }}</td>
                                <td>{{ $income->input_by }}</td>
                                <td>{{ $income->Quantity }}</td>
                                <td>{{ $income->Unit }}</td>
                                <td>{{ $income->packingsize }}</td>
                                <td>{{ $income->packingsize_unit }}</td>
                                <td>{{ $income->Propose }}</td>
                                <td>{{ $income->no_batch }}</td>
                                <td>{{ $income->Expire_Date }}</td>
                                <td>{{ $income->Status == 1 ? 'Accepted' : 'Unaccepted' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> List of Material Usage </h3>
            </div>

            <div class="table-responsive">
                <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable" id="lis">

                    <thead>
                        <?php $l = 0; ?>
                        <tr>
                            <th class="w-1 ml-1"style="background-color: lightgray;">Action</th>
                            <th style="background-color: lightgray;">No</th>
                            <th style="background-color: lightgray;">Create Date</th>
                            <th style="background-color: lightgray;">Input By</th>
                            <th style="background-color: lightgray;">Open By</th>
                            <th style="background-color: lightgray;">Quantity</th>
                            <th style="background-color: lightgray;">Unit</th>
                            <th style="background-color: lightgray;">Packing Size</th>
                            <th style="background-color: lightgray;">Packing Size Unit</th>
                            <th style="background-color: lightgray;">Batch Number</th>
                            <th style="background-color: lightgray;">Expire Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usage as $usages)
                            <tr>
                                <td>


                                 
                                        <form action="{{ route('usage.destroy', $usages->id) }}" method="POST">
                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('usages.show',$usages->id) }}">Show</a> --}}
                                            <a class="btn btn-primary btn-sm"
                                            href="{{ route('usage.edit', $usages->id) }}"title="Edit Barang"> <i
                                                class="fa fa-pen"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            @if (auth()->user()->leveluser > 4)
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure want to delete this ?');"
                                                title="Delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @endif
                                </td>
                                <td>{{ ++$l }}</td>
                                <td>{{ \Carbon\Carbon::parse($usages->created_at)->setTimezone('Asia/Jakarta')->format('d-M-Y ') }}
                                </td>
                                <td>{{ $usages->input_by }}</td>
                                <td>{{ $usages->Open_By }}</td>
                                <td>{{ $usages->Quantity }}</td>
                                <td>{{ $usages->Unit }}</td>
                                <td>{{ $usages->Income->packingsize }}</td>
                                <td>{{ $usages->Income->packingsize_unit }}</td>
                                <td>{{ $usages->no_batch }}</td>
                                <td>{{ $usages->Expire_Date }}</td>
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
    @include('ListOfMaterial.listdead')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">History Activity</h3>
            </div>

            <div class="table-responsive ">
                <table class="table card-table table-bordered table-vcenter text-nowrap datatable" id="listlowss">
                    <thead>
                        <tr>
                            <?php $no = 1; ?>

                            <th style="background-color: lightgray;">No.</th>
                            <th style="background-color: lightgray;">date</th>
                            <th style="background-color: lightgray;">Change by</th>
                            <th style="background-color: lightgray;">Activity</th>
                            <th style="background-color: lightgray;">Table</th>
                            <th style="background-color: lightgray;">Field/Batch Number</th>
                            <th style="background-color: lightgray;">Quantity Before</th>
                            <th style="background-color: lightgray;">Quantity After</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($audit as $audits)
                            <tr>
                                <td><span class="text-muted">{{ $no++ }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($audits->created_at)->setTimezone('Asia/Jakarta')->format('d-m-Y  H:i:s') }}
                                </td>
                                <td> {{ $audits->change_by }}</td>
                                <td>{{ $audits->activity }}</td>
                                <td>{{ $audits->sourcetable }}</td>
                                <td>{{ $audits->sourcefield }}</td>
                                <td>{{ $audits->beforevalue }}</td>
                                <td>{{ $audits->aftervalue }}</td>
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
            var table = $('#listlow,#lis,#listlowss,#li').DataTable({

            });
        });
    </script>
@endpush
