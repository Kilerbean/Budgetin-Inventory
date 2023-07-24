<strong class="h6">List Of Upcoming Materials</strong>
<div class="table-responsive ">
  <table class="table card-table table-bordered  table-vcenter text-nowrap datatable" id="listbelum">
    <thead>
      <?php $i = 1; ?>
      <tr>
  <th >Action</th>
  {{-- <th>No</th> --}}
  <th>No PR</th>
  <th>Catalog Number</th>
  <th>Name of Material</th>
  <th>Tipe Budget</th>
  <th>Amount</th>
  <th>Unit</th>
  <th>Total</th>
  <th>Propose</th>
  <th>No PO</th>
  <th>PO Date</th>
</tr>
@foreach ($incomes as $income)
<tr>
  <td>
          
          {{-- tombol modalnya --}}
          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $income->id }}" {{ $income->Status ? 'hidden' : '' }}>
              Terima
            </button>
            
          @include('income.modalterima')
          
          {{-- tombol Edit --}}
          <a class="btn btn-primary btn-sm" href="{{ route('income.edit',$income->id) }}"{{ $income->Status ? 'hidden' : '' }} > <i class="fa fa-pencil"></i> <i class="fa-solid fa-plus"></i>Edit</a>



      <form action="{{ route('income.destroy',$income->id) }}" method="POST">

          {{-- <a class="btn btn-info btn-sm" href="{{ route('income.show',$income->id) }}">Show</a> --}}

         
          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this ?');">Delete</button>
      </form>
  </td>
  {{-- <td>{{ ++$i }}</td> --}}
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
</table>
</div>
