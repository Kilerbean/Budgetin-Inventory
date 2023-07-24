<div class="card">
    <div class="card-header">
      <h3 class="card-title">List Of Material that will be out of stock</h3>
    </div>
    
    <div class="table-responsive ">
      <table class="table card-table table-bordered table-vcenter text-nowrap datatable" id="listhampirexp">
        <thead>
          <tr>
            <?php $no = 1; ?>
            <th class="w-1 ml-1">Action 
             
            </th>
            <th>No.</th>
            <th>Material Code</th>
            {{-- <th>Type of Material</th> --}}
            <th>Type of budget</th>
            <th>Name of Material</th>
            {{-- <th>catalog Number</th> --}}
            {{-- <th>Vendor</th> --}}
            <th>Tanggal Kadaluarsa</th>
            <th>Jumlah</th>
            <th>Unit</th>
            <th>Safe Stock</th>
            <th>Maximum Stock</th>
            {{-- <th>Status</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($barangexpire as $baranglow)
          <tr>
            <td class="text-end">
              

              <a href="{{ route('Barang.edit' , $baranglow->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
            {{-- <td>{{ $baranglow ->Vendor }}</td> --}}
            <td>{{ $baranglow ->Expire_Date }}</td>
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