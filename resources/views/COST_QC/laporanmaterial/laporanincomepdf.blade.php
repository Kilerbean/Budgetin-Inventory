<head>
  <title>Laporan PDF Tabel Incoming Material</title>

</head>
  <h1>  Incoming Material Report</h1>
  <p>Tanggal: {{ $data['tanggal'] }}</p>
   <p>Waktu: {{ $data['waktu'] }}</p>
    <table border ="1" cellpadding="1" cellspacing="0">
          <thead> @php
              $i=0;
          @endphp
            <tr>
       
        <th>No</th>
        <th>PO Date</th>
        
        <th>No PR</th>
        <th>Catalog Number</th>
        <th>Name of Material</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Propose</th>
        <th>No Batch</th>
    </tr>
    @foreach ($incomes as $income)
    <tr>
        
         
        <td>{{ ++$i }}</td>
        <td>{{ $income->PO_Date }}</td>
        <td>{{ $income->No_PR }}</td>
        <td>{{ $income->Catalog_Number }}</td>
        <td>{{ $income->Barang->Name_of_Material }}</td>
        <td>{{ $income->Quantity }}</td>
        <td>{{ number_format($income->Total, 2, '.', ',') }}</td>
        <td>{{ $income->Propose }}</td>
        <td>{{ $income->no_batch }}</td>
        
    </tr>
    @endforeach
</table>
</div>
