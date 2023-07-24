<div class="card">
    <div class="card-header">
      <h3 class="card-title">List Of Material yang akan Habis</h3>
    </div>
    
    <div class="table-responsive ">
      <table class="table card-table table-bordered table-vcenter text-nowrap datatable" id="listlow" >
        <thead >
          <tr  >
            <?php $no = 1; ?>
            <th class="w-1 ml-1" style="background-color: lightgray;">Action </th>
            <th style="background-color: lightgray;">No.</th>
            <th style="background-color: lightgray;">Material Code</th>
            {{-- <th>Type of Material</th> --}}
            <th style="background-color: lightgray;">Type of budget</th>
            <th style="background-color: lightgray;">Name of Material</th>
            {{-- <th>catalog Number</th> --}}
            {{-- <th>Vendor</th>
            <th>Supplier</th> --}}
            <th style="background-color: lightgray;">Amount</th>
            <th style="background-color: lightgray;">Unit</th>
            <th style="background-color: lightgray;">Safe Stock</th>
            <th style="background-color: lightgray;">Maximum Stock</th>
            {{-- <th>Status</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($baranglows as $baranglow)
          <tr >
            <td class="text-end">
              

              <a href="{{ route('Barang.edit' , $baranglow->id) }}" class="btn btn-info btn-sm">Edit</a>
              <a href="{{ route('income.create' , $baranglow->id) }}" class="btn btn-primary btn-sm">Tambah</a>
              {{-- <form action="{{ route('baranglow.destroy' , $baranglow->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="Delete" class="btn btn-danger btn-sm ">
              </form> --}}
            </td>
            
            <td><span class="text-muted">{{ $no++ }}</span></td>
            <td> {{ $baranglow ->Material_Code }}</td>
            {{-- <td>
              {{ $baranglow ->Type_of_Material }}
            </td> --}}
            <td>
              {{ $baranglow ->Type_of_Budget }}
            </td>
            <td>
              {{ $baranglow ->Name_of_Material}}
            {{-- </td>
              <td>{{ $baranglow ->Catalog_Number }}</td>
            </td> --}}
            {{-- <td>{{ $baranglow ->Vendor }}</td>
            <td>{{ $baranglow ->Supplier }}</td> --}}
            <td>{{ $baranglow ->Quantity }}</td>
            <td>{{ $baranglow ->Unit }}</td>
            <td>{{ $baranglow ->Safety_Stock }}</td>
            <td>{{ $baranglow ->Maximum_Stock }}</td>
            {{-- <td>{{ $baranglow->Status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td> --}}

            @endforeach
            
          </tr>
          
        </tbody>
      </table>
    </div>