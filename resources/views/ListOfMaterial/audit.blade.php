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
              <th style="background-color: lightgray;">date</th>
              <th style="background-color: lightgray;">Change by</th>
              <th style="background-color: lightgray;">Activity</th>
              <th style="background-color: lightgray;">Catalog Number</th>
              <th style="background-color: lightgray;">Table</th>
              <th style="background-color: lightgray;">Field/Batch Number</th>
              <th style="background-color: lightgray;">Quantity Before </th>
              <th style="background-color: lightgray;">Qantity After</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($audit as $audits)
            <tr>
              <td><span class="text-muted">{{ $no++ }}</span></td>
              <td>{{ \Carbon\Carbon::parse($audits->created_at)->setTimezone('Asia/Jakarta')->format('d-m-Y  H:i:s') }}</td>
              <td> {{ $audits ->change_by }}</td>
              <td>{{ $audits ->activity}}</td>
              <td>{{ $audits ->recordid }}</td>
              <td>{{ $audits ->sourcetable }}</td>
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