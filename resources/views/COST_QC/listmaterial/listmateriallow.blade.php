<div class="card">
    <div class="mt-2">
        <h4 class="mb-2">List Of Material That Will Be Out of Stock </h4>
    </div>

    <div class="table-responsive ">
      <table class="table table-bordered text-nowrap " id="listlow" style="width: 100%">
        <thead >
          <tr  >
            <?php $no = 1; ?>
            <th class="w-1 ml-1" style="background-color: lightgray;">Action </th>
            <th style="background-color: lightgray;">No.</th>

            <th style="background-color: lightgray;">Name of Material</th>
             <th style="background-color: lightgray;">Material Code</th>
            <th style="background-color: lightgray;">Type of Material</th>
   
            {{-- <th style="background-color: lightgray;">Packing Size</th>
            <th style="background-color: lightgray;">Packing Size Unit</th> --}}
            <th style="background-color: lightgray;">Quantity</th>
            <th style="background-color: lightgray;">Unit</th>
            <th style="background-color: lightgray;">Category Movement</th>
            <th style="background-color: lightgray;">Safety Stock</th>
            <th style="background-color: lightgray;">Maximum Stock</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($baranglows as $baranglow)
          <tr >
            <td class="text-end">
              

              {{-- <a href="{{ route('Barang.edit' , $baranglow->id) }}" class="btn btn-primary btn-sm" title="Edit Material"><i class="fa fa-pen"></i></a> --}}
              <a href="{{ route('tambah' , $baranglow->id) }}" class="btn btn-warning btn-sm" title="Tambah Material"><i class="fa fa-cart-plus"></i></a>
              {{-- <form action="{{ route('baranglow.destroy' , $baranglow->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="Delete" class="btn btn-danger btn-sm ">
              </form> --}}
            </td>
            
            <td><span class="text-muted">{{ $no++ }}</span></td>

            <td>{{ $baranglow ->Name_of_Material}}</td>
            <td>{{ $baranglow ->Material_Code}}</td>
            <td>{{ $baranglow ->Type_of_Material }}</td>

            {{-- <td>{{ $baranglow ->packingsize }}</td>
            <td>{{ $baranglow ->packingsize_unit }}</td> --}}
            <td>{{ $totalQuantity[$baranglow->Material_Code]}}</td>
            <td>{{ $baranglow ->Unit }}</td>
            <td>{{ $baranglow ->category }}</td>
            <td>{{ $baranglow ->Safety_Stock }}</td>
            <td>{{ $baranglow ->Maximum_Stock }}</td>

            @endforeach
            
          </tr>
          
        </tbody>
      </table>
    </div>
