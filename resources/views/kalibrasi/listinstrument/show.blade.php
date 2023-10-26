@extends('layouts.master')
@php
    $titles = 'Q-LIS - List of Material';
    $title = 'Q-LIS |Detail of Material';
    $pretitle = 'EXPENSE-Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary text-white" href="{{ route('Barang.index') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Detail Material</h4>
    </div>

    <div class="col-12">
        <div class="card">            
            <div class="card-body">
                <label class="form-label"> Instrument ID : {{ $kalibrasi->instrumentid }} </label><br>
                <label class="form-label"> Instrument Name : {{ $kalibrasi->instrumentname }} </label><br>
                <label class="form-label"> Serial Number : {{ $kalibrasi->serialnumber }} </label><br>
                <label class="form-label"> Last Calibration : {{ $kalibrasi->lastcalibration }} </label><br>
                <label class="form-label"> Calibration Frequency : {{ $kalibrasi->frekuensicalibration }} </label><br>
                <label class="form-label"> Calibration By : {{ $kalibrasi->calibrationby }} </label><br>
                <label class="form-label"> Location : {{ $kalibrasi->location }} </label><br>
               
               
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
                <h3 class="card-title"> List of All Material Batch </h3>
            </div>

            <div class="table-responsive">
                <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable" id="lis">
                    <thead>
                        <tr>
                            <th class="w-1 ml-1"style="background-color: lightgray;">Action</th>
                            <th style="background-color: lightgray;">No</th>
                            <th style="background-color: lightgray;">PR Date</th>
                            <th style="background-color: lightgray;">No PR </th>
                            <th style="background-color: lightgray;">No PO</th>
                            <th style="background-color: lightgray;">Request By</th>
                            <th style="background-color: lightgray;">Input By</th>
                            <th style="background-color: lightgray;">Quantity</th>
                            <th style="background-color: lightgray;">Quantity Unit</th>
                            <th style="background-color: lightgray;">Batch Number</th>
                            <th style="background-color: lightgray;">Expire Date</th>
                            <th style="background-color: lightgray;">Propose</th>
                            <th style="background-color: lightgray;">Packing Size</th>
                            <th style="background-color: lightgray;">Packing Size Unit</th>


                            <th style="background-color: lightgray;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td class="text-nowrap">

                                   

                                
                                        <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-primary btn-sm" href="{{ route('income.edit', $income->id) }}"
                                                title="Edit Material"> <i class="fa fa-pen"></i></a>
        
                                            @if (auth()->user()->leveluser > 4)
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure want to delete this ?');"
                                                title="Delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @endif
                                </td>

                                <td>{{ ++$i }}</td>
                                <td>{{ \Carbon\Carbon::parse($income->created_at)->setTimezone('Asia/Jakarta')->format('d-M-Y ') }}
                                </td>
                                <td>{{ $income->No_PR }}</td>
                                <td>{{ $income->No_PO }}</td>
                                <td>{{ $income->request_by }}</td>
                                <td>{{ $income->input_by }}</td>
                                <td>{{ $income->Quantity }}</td>
                                <td>{{ $income->Unit }}</td>
                                <td>{{ $income->no_batch }}</td>
                                <td>{{ $income->Expire_Date }}</td>
                                <td>{{ $income->Propose }}</td>
                                <td>{{ $income->packingsize }}</td>
                                <td>{{ $income->packingsize_unit }}</td>


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
                            <th style="background-color: lightgray;">PR Date</th>
                            <th style="background-color: lightgray;">Input By</th>
                            <th style="background-color: lightgray;">Open By</th>
                            <th style="background-color: lightgray;">Quantity</th>
                            <th style="background-color: lightgray;">Quantity Unit</th>
                            <th style="background-color: lightgray;">Batch Number</th>
                            <th style="background-color: lightgray;">Expire Date</th>
                            <th style="background-color: lightgray;">Packing Size</th>
                            <th style="background-color: lightgray;">Packing Size Unit</th>


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
                                <td>{{ $usages->no_batch }}</td>
                                <td>{{ $usages->Expire_Date }}</td>
                                <td>{{ $usages->Income->packingsize }}</td>
                                <td>{{ $usages->Income->packingsize_unit }}</td>
    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>
 
    

@stop
@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#lis,#listlowss,#li').DataTable({

            });
        });
    </script>
@endpush
