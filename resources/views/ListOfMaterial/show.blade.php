@extends('templates.dasar')
@php
    $title = 'Detail Material';
    $pretitle = 'COST-QC LAB';
    
@endphp

@push('page-action')
    {{-- <a href="{{ route('barangtidakaktif') }}" class="btn btn-danger btn-sm">List Material Inactive</a> --}}
    <a class="btn btn-grad text-white" href="{{ route('Barang.index') }}"> Back</a>
@endpush

@section('coba')
 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Material</h3>
            </div>

            <label class="form-label"> Material Code : {{ $barang->Material_Code }} </label>
            <label class="form-label"> Catalog Number : {{ $barang->Catalog_Number }} </label>
            <label class="form-label"> Name Materials : {{ $barang->Name_of_Material }} </label>
            <label class="form-label"> Type of Material : {{ $barang->Type_of_Material }} </label>
            <label class="form-label"> Type of Budget : {{ $barang->Type_of_Budget }} </label>
            <label class="form-label"> Packing Size : {{ $barang->packingsize }} </label>
            <label class="form-label"> Manufaktur : {{ $barang->Manufaktur }} </label>
            <label class="form-label"> Quantity : {{ $barang->Quantity }} </label>
            <label class="form-label"> Unit : {{ $barang->Unit }} </label>
            <label class="form-label"> Packing Size : {{ $barang->packingsize }} </label>
            <label class="form-label"> Packing Size Unit : {{ $barang->packingsize_unit }} </label>
            <label class="form-label"> Price : {{ $barang->Harga }} </label>
            <label class="form-label"> Safety Stock : {{ $barang->Safety_Stock }} </label>
            <label class="form-label"> Maximum Stock : {{ $barang->Maximum_Stock }} </label>
        </div>
    </div>

    <br>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> list of incoming materials </h3>
            </div>

            <div class="table-responsive">
                <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable" id="lis">
                    <div style="background-color: lightgray;">
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
                    </div>
                    </tr>
                    </thead>
                    @foreach ($incomes as $income)
                        <tr>
                            <td class="text-nowrap">

                                {{-- tombol Edit --}}
                                <a class="btn btn-primary btn-sm" href="{{ route('income.edit', $income->id) }}"
                                    title="Edit Material"> <i class="fa fa-pen"></i></a>

                                    @if (auth()->user()->leveluser >4)
                                <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure want to delete this ?');" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                                @endif
                            </td>
                            
                            <td>{{ ++$i }}</td>
                            <td>{{ \Carbon\Carbon::parse($income->created_at)->setTimezone('Asia/Jakarta')->format('d-M-Y ') }}</td>
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
                </table>
            </div>


        </div>
    </div>


    <br>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> List of Material Usage </h3>
            </div>

            <div class="table-responsive">
                <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable" id="lis">
                    <div style="background-color: lightgray;">
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
                    </div>
                    </tr>
                    </thead>
                    @foreach ($usage as $usages)
                        <tr>
                            <td>


                                @if (auth()->user()->leveluser >4)
                                <form action="{{ route('usage.destroy', $usages->id) }}" method="POST">
                                    {{-- <a class="btn btn-info btn-sm" href="{{ route('usages.show',$usages->id) }}">Show</a> --}}
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure want to delete this ?');" title="Delete"><i
                                            class="fa fa-trash"></i></button>
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
                            <th style="background-color: lightgray;">Catalog Number</th>
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
                                <td>{{ $audits->recordid }}</td>
                                <td>{{ $audits->sourcetable }}</td>
                                <td>{{ $audits->sourcefield }}</td>
                                <td>{{ $audits->beforevalue }}</td>
                                <td>{{ $audits->aftervalue }}</td>
                        @endforeach

                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
 
    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#lis,#listlowss,#li').DataTable({

            });
        });


    </script>
@endsection
