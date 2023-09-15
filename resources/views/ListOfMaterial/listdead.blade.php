{{-- @extends('templates.dasar')
@php
    $title = 'Incoming of Material';
    $pretitle = 'COST-QC LAB';
    
@endphp

@push('page-action')
    <a class="btn btn-success" href="{{ route('income.index') }}"> Back</a>
@endpush

@section('coba')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of All Dead Stock/list of materials whose batch number is used up </h3>
        </div>

        <div class="table-responsive">
            <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable" id="listlow">
                <div style="background-color: lightgray;">
                    <thead>
                        <tr>
                            <th class="w-1 ml-1"style="background-color: lightgray;">Action</th>
                            <th style="background-color: lightgray;">No</th>
                            <th style="background-color: lightgray;">No PO</th>
                            <th style="background-color: lightgray;">Catalog Number</th>
                            <th style="background-color: lightgray;">Name of Material</th>
                            <th style="background-color: lightgray;">Batch Number</th>
                            <th style="background-color: lightgray;">Quantity</th>
                           
                            <th style="background-color: lightgray;">Unit</th>
                            <th style="background-color: lightgray;">Price/pcs</th>
                            <th style="background-color: lightgray;">No PR</th>
                            <th style="background-color: lightgray;">PR Date</th>
                            <th style="background-color: lightgray;">Expire Date</th>
                           
                </div>
                </tr>
                </thead>
                @foreach ($incomess as $income)
                    <tr>
                        <td>

                            {{-- tombol Edit --}}
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('income.edit', $income->id) }}"
                                title="Edit Material"> <i class="fa fa-pen"></i></a>

                            <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure want to delete this ?');" title="Delete"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ ++$i }}</td>
                        <td>{{ $income->No_PO }}</td>
                        <td>{{ $income->Catalog_Number }}</td>
                        <td>{{ $income->Barang->Name_of_Material }}</td>
                        <td>{{ $income->no_batch }}</td>
                        <td>{{ $income->Quantity }}</td>
                        <td>{{ $income->Unit }}</td>
                        <td>{{ number_format($income->Prices, 2, '.', ',') }}</td>
                        <td>{{ $income->No_PR }}</td>
                        
                      
                        <td>{{ $income->PO_Date }}</td>
                        <td>{{ $income->Expire_Date }}</td>
                       
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row text-center">

        </div>
    </div>
</div>
</div>
       
{{--     
    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#listlowq,#listlowss').DataTable({

            });
        });

        $(function() {
            var table = $('#lis').DataTable({

            });
        });
    </script>

@endsection --}}