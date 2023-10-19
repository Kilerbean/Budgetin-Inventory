<div class="col-12">
    <div class="card">

        <div class="mx-2 mt-2">
            <h4 class="mb-2">Instrument Over Due Calibration</h4>
        </div>


        <div class="table-responsive ">
            <table class="table table-bordered text-nowrap table-responsive-sm" id="listlowss">
                <thead>
                    <tr>
                        <?php $no = 1; ?>
                        <th class="w-1 ml-1" style="background-color: lightgray;">Action</th>
                        <th style="background-color: lightgray;">No.</th>
                        <th style="background-color: lightgray;">Instrument ID</th>
                        <th style="background-color: lightgray;">Instrument Name</th>
                        <th style="background-color: lightgray;">Last Calibration</th>
                        <th style="background-color: lightgray;">Calibration By</th>
                        <th style="background-color: lightgray;">Location</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($kalibrasiover as $kalibrasis)
                        <tr>
                            <td class="text-end">
                                {{-- 
                                <a href="{{ route('Barang.show', $kalibrasis->id) }}"title="Info Detail Material"
                                    class="btn btn-info btn-sm"><i class="fa fa-info"></i></a> --}}




                                <a href="{{ route('listKalibrasi.edit', $kalibrasis->id) }}"
                                    class="btn btn-primary btn-sm" title="Edit Barang"><i class="fa fa-pen"></i></a>


                            </td>

                            <td><span class="text-muted">{{ $no++ }}</span></td>
                            <td>{{ $kalibrasis->instrumentid }}</td>
                            <td>{{ $kalibrasis->instrumentname }}</td>
                            <td>{{ $kalibrasis->lastcalibration }}</td>
                            <td>{{ $kalibrasis->calibrationby }}</td>
                            <td>{{ $kalibrasis->location }}</td>
                    @endforeach

                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>
