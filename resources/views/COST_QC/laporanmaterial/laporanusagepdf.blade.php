<head>
    <title>Laporan PDF Tabel Incoming Material</title>
  
  </head>
    <h1>  Incoming Material Report</h1>
    <p>Tanggal: {{ $data['tanggal'] }}</p>
     <p>Waktu: {{ $data['waktu'] }}</p>

     < <table border ="1" cellpadding="1" cellspacing="0">
        <thead> @php
            $i=0;
        @endphp
        <tr>
            <th>No</th>
            <th>Catalog Number</th>
            <th>Name of Material</th>
            <th>Type of Budget</th>
            <th>Type of Material</th>
            <th>Usage</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Open By</th>
        </tr>
        @foreach ($usage as $usages)
        <tr>
          
            <td>{{ ++$i }}</td>
            <td>{{ $usages->Catalog_Number }}</td>
            <td>{{ $usages->Barang->Name_of_Material }}</td>
            <td>{{ $usages ->Barang->Type_of_Budget }}</td>
            <td>{{ $usages ->Type_of_Material }}</td>
            <td>{{ $usages->usage }}</td>
            <td>{{ $usages->Quantity }}</td>
            <td>{{ $usages->Unit }}</td>
            <td>{{ $usages->Open_By }}</td>
            
        </tr>
        @endforeach
    </table>
    </div>