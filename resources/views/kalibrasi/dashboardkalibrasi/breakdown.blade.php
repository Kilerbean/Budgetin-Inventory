<div class="col-12">
    <div class="card">

        <div class="mx-2 mt-2">
            <h4 class="mb-2">Instrument Breakdown</h4>
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
                        <th style="background-color: lightgray;">Start Breakdown</th>
                        <th style="background-color: lightgray;">Servive By</th>
                        <th style="background-color: lightgray;">Start Service</th>
                        <th style="background-color: lightgray;">Finish Service</th>

                        <th style="background-color: lightgray;">Location</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($kalibrasibreak as $kalibrasis)
                        <tr>
                            <td class="text-end">
{{-- 
                                <a href="{{ route('Barang.show', $kalibrasis->id) }}"title="Info Detail Material"
                                    class="btn btn-info btn-sm"><i class="fa fa-info"></i></a> --}}

                               

                                    <form action="{{ route('kalibrasi.destroy', $kalibrasis->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('listKalibrasi.edit', $kalibrasis->id) }}" class="btn btn-primary btn-sm"
                                            title="Edit Barang"><i class="fa fa-pen"></i></a>
                                            @if (auth()->user()->leveluser >4)
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure want to delete this ?');" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                            @endif
                                    </form>

                            </td>

                            <td><span class="text-muted">{{ $no++ }}</span></td>
                            <td>{{ $kalibrasis->instrumentid }}</td>
                            <td>{{ $kalibrasis->instrumentname }}</td>
                            <td>{{ $kalibrasis->lastcalibration}}</td>         
                            <td>{{ $kalibrasis->calibrationby }}</td>
                            <td>{{ $kalibrasis->location }}</td>

                    @endforeach

                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>