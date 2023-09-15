<div class="card">
    <div class="mt-2">
        <h4 class="mb-2">List of Materials Close or  Past their Expiration Date</h4>
      </div>

    <div class="table-responsive ">
        <table class="table table-sm table-bordered table-vcenter text-nowrap datatable" id="listlowss">
            <thead>
                <tr>
                    <?php $no = 1; ?>
                    <th style="background-color: lightgray;">Action</th>
                    <th style="background-color: lightgray;">No.</th>
                    <th style="background-color: lightgray;">Catalog Number</th>
                    <th style="background-color: lightgray;">Batch Number</th>
                    <th style="background-color: lightgray;">Type of budget</th>
                    <th style="background-color: lightgray;">Name of Material</th>
                    <th style="background-color: lightgray;">Expired Date</th>
                    <th style="background-color: lightgray;">Quantity</th>
                    <th style="background-color: lightgray;">Unit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangexpire as $baranglow)
                    <tr>
                        <td class="text-center">

                            {{-- <form action="{{ route('income.destroy', $baranglow->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure want to delete this ?');"
                                    title="Delete Barang"><i class="fa fa-trash"></i></button>
                            </form> --}}
                            <form action="{{ route('Income.dikosongkan', $baranglow->id) }}" class=""
                              method="post">

                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-info btn-sm"
                                  onclick="return confirm('Are you sure want to empty this material ?');"title="Empty Material"><i
                                      class="fa fa-fire" style="color: #ff0000;"></i></button>
                          </form>
                            <a href="{{ route('income.edit', $baranglow->id) }}" class="btn btn-primary btn-sm"
                                title="Edit Material"><i class="fa fa-pen"></i></a>

                     
                            
                        </td>

                        <td><span class="text-muted">{{ $no++ }}</span></td>
                        <td> {{ $baranglow->Catalog_Number }}</td>
                        <td> {{ $baranglow->no_batch }}</td>
                        <td>{{ $baranglow->Barang->Type_of_Budget }}</td>
                        <td>{{ $baranglow->Name_of_Material }}</td>
                        <td>{{ $baranglow->Expire_Date }}</td>
                        <td>{{ $baranglow->Quantity }}</td>
                        <td>{{ $baranglow->Unit }}</td>
                @endforeach

                </tr>

            </tbody>
        </table>
    </div>
</div>
