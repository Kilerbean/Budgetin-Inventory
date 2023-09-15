<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of All Incoming Materials that do not yet have a PO number </h3>
        </div>

        <div class="table-responsive">
            <table class="table card-table  table-bordered   table-vcenter  text-nowrap datatable" id="lis">
                <div style="background-color: lightgray;">
                    <thead>
                        <tr>
                            <th class="w-1 ml-1"style="background-color: lightgray;">Action</th>
                            <th style="background-color: lightgray;">No</th>
                            <th style="background-color: lightgray;">No PR</th>
                            <th style="background-color: lightgray;">Catalog Number</th>
                            <th style="background-color: lightgray;">Name of Material</th>
                            <th style="background-color: lightgray;">Quantity</th>
                            <th style="background-color: lightgray;">Price/pcs</th>
                            <th style="background-color: lightgray;">Total</th>
                            <th style="background-color: lightgray;">Unit</th>
                            <th style="background-color: lightgray;">Propose</th>
                            <th style="background-color: lightgray;">PR Date</th>
                            <th style="background-color: lightgray;">Expire Date</th>
                            <th style="background-color: lightgray;">Status</th>
                </div>
                </tr>
                </thead>
                @foreach ($incomeskurang as $income)
                    <tr>
                        <td>

                            {{-- tombol modalnya --}}
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropspo{{ $income->id }}"
                            {{ $income->Status ? 'hidden' : '' }} title="Input no PO">
                            <i class="fa fa-keyboard"></i></i>
                            </button>
                            @include('income.includelist.modalinputpo')

                            {{-- tombol Edit --}}
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('income.edit', $income->id) }}"{{ $income->Status ? 'hidden' : '' }}
                                title="Edit Barang"> <i class="fa fa-pen"></i></a>



                            <form action="{{ route('income.destroy', $income->id) }}" method="POST">

                                {{-- <a class="btn btn-info btn-sm" href="{{ route('income.show',$income->id) }}">Show</a> --}}


                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure want to delete this ?');"
                                    title="Delete Barang"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ ++$i }}</td>
                        <td>{{ $income->No_PR }}</td>
                        <td>{{ $income->Catalog_Number }}</td>
                        <td>{{ $income->Barang->Name_of_Material }}</td>
                        <td>{{ $income->Quantity }}</td>
                        <td>{{ number_format($income->Prices, 2, '.', ',') }}</td>
                        <td>{{ number_format($income->Total, 2, '.', ',') }}</td>
                        <td>{{ $income->Unit }}</td>
                        <td>{{ $income->Propose }}</td>
                        <td>{{ $income->PO_Date }}</td>
                        <td>{{ $income->Expire_Date }}</td>
                        <td>{{ $income->Status == 1 ? 'Accepted' : 'Unaccepted' }}</td>

                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row text-center">

        </div>
    </div>
</div>
