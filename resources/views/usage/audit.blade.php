<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">History Activity</h3>
      </div>
      
      <div class="table-responsive ">
        <table class="table card-table table-bordered table-vcenter text-nowrap datatable" id="listlowss">
          <thead>
            <tr> 
              <?php $no = 1; ?>

              <th style="background-color: lightgray;">No.</th>
              <th style="background-color: lightgray;">Date</th>
              <th style="background-color: lightgray;">User</th>
              <th style="background-color: lightgray;">Activity</th>
              <th style="background-color: lightgray;">Catalog Number</th>
              <th style="background-color: lightgray;">Batch Number</th>
              <th style="background-color: lightgray;">Quantity Before</th>
              <th style="background-color: lightgray;">Quantity After</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($audit as $audits)
            <tr>
              <td><span class="text-muted">{{ $no++ }}</span></td>
              <td>{{ \Carbon\Carbon::parse($audits->created_at)->setTimezone('Asia/Jakarta')->format('d-m-Y  H:i:s') }}</td>
              <td> {{ $audits ->change_by }}</td>
              <td>{{ $audits ->activity}}</td>
              <td>{{ $audits ->Barang->Name_of_Material.' | '.$audits->Barang->Catalog_Number }}</td>
              <td>{{ $audits ->sourcefield}}</td>
              <td>{{ $audits ->beforevalue }}</td>
              <td>{{ $audits ->aftervalue }}</td>
              @endforeach
              
            </tr>
            
          </tbody>
        </table>
      </div>
      
    </div>
  </div>