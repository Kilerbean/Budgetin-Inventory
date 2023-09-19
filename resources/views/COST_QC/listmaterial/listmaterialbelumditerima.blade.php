<div class="card">
    <div class="mt-2">
        <h4 class="mb-2">List of Incoming Materials and Will be Confirmed </h4>
    </div>
    <div class="table-responsive ">
        <table class="table card-table table-bordered table-vcenter text-nowrap datatable" id="listlowq">
            <thead style="background-color: lightgray;">
                <?php $x = 0; ?>
                <tr>
                    <th style="background-color: lightgray;">Action</th>
                    <th style="background-color: lightgray;">No</th>
                    <th style="background-color: lightgray;">No PR</th>
                    <th style="background-color: lightgray;">Catalog Number</th>
                    <th style="background-color: lightgray;">Name of Material</th>
                    <th style="background-color: lightgray;">Type of Budget</th>
                    <th style="background-color: lightgray;">Quantity</th>
                    <th style="background-color: lightgray;">Unit</th>
                    <th style="background-color: lightgray;">Total</th>
                    <th style="background-color: lightgray;">Propose</th>
                    <th style="background-color: lightgray;">No PO</th>
                    <th style="background-color: lightgray;">PR Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                    <tr>
                        <td>
                            {{-- tombol modalnya --}}
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop{{ $income->id }}"
                                {{ $income->Status ? 'hidden' : '' }} title="Terima Barang">
                                <i class="fa fa-check"></i>
                            </button>

                            @include('income.includelist.modalterima')

                            {{-- tombol Edit --}}
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('income.edit', $income->id) }}"{{ $income->Status ? 'hidden' : '' }}
                                title="Edit Barang"><i class="fa fa-pen"></i></a>

                            <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure want to delete this ?');"
                                    title="Delete Barang"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ ++$x }}</td>
                        <td>{{ $income->No_PR }}</td>
                        <td>{{ $income->Catalog_Number }}</td>
                        <td>{{ $income->Barang->Name_of_Material }}</td>
                        <td>{{ $income->Barang->Type_of_Budget }}</td>
                        <td>{{ $income->Quantity }}</td>
                        <td>{{ $income->Unit }}</td>
                        <td>{{ number_format($income->Total, 2, '.', ',') }}</td>
                        <td>{{ $income->Propose }}</td>
                        <td>{{ $income->No_PO }}</td>
                        <td>{{ $income->PO_Date }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
