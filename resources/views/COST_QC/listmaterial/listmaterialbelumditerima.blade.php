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
                    <th style="background-color: lightgray;">No PO</th>
                    <th style="background-color: lightgray;">Catalog Number</th>
                    <th style="background-color: lightgray;">Name of Material</th>
                    <th style="background-color: lightgray;">Type of Budget</th>
                    <th style="background-color: lightgray;">Manufacture</th>
                    <th style="background-color: lightgray;">Quantity</th>
                    <th style="background-color: lightgray;">Quantity Unit</th>
                    <th style="background-color: lightgray;">Total</th>
                    <th style="background-color: lightgray;">Propose</th>
                
                    <th style="background-color: lightgray;">PR Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                    <tr>
                        <td>
                            {{-- tombol modalnya --}}


                           
                                <form action="{{ route('income.cancel', $income->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $income->id }}"
                                    {{ $income->Status ? 'hidden' : '' }} title="Receive Material">
                                    <i class="fa fa-check"></i>
                                </button>
                               
    
                                {{-- tombol Edit --}}
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('income.edit', $income->id) }}"{{ $income->Status ? 'hidden' : '' }}
                                    title="Edit Material"><i class="fa fa-pen"></i></a>



                                    @if (auth()->user()->leveluser >3)
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure want to cancel this Material?');"
                                        title="Cancel Material"><i class="fa-solid fa-xmark"></i></button>
                                        @endif
                                    </form>
                                    @include('income.includelist.modalterima')
                        
                        </td>
                        <td>{{ ++$x }}</td>
                        <td>{{ $income->No_PR }}</td>
                        <td>{{ $income->No_PO }}</td>
                        <td>{{ $income->Catalog_Number }}</td>
                        <td>{{ $income->Name_of_Material }}</td>
                        <td>{{ $income->Barang->Type_of_Budget }}</td>
                        <td>{{ $income->Barang->Manufaktur }}</td>
                        <td>{{ $income->Quantity }}</td>
                        <td>{{ $income->Unit }}</td>
                        <td>{{ number_format($income->Total, 2, '.', ',') }}</td>
                        <td>{{ $income->Propose }}</td>
                     
                        <td>{{ $income->PO_Date }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
