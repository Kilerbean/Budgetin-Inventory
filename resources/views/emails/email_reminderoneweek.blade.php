
<!-- ####### HEY, I AM THE SOURCE EDITOR! #########-->
<h1><span style="color: #0000ff;">Q-LIS</span></h1>
<p>&nbsp;</p>
<h2 style="color: #2e6c80;">Reminder of calibration schedule approaching 1 week of calibration time</h2>
<table class="editorDemoTable"   style="height: 36px; border-style: solid; border-color: black;" border="1">
    <thead>
        <tr>
            <td>ID Instrument</td>
            <td>Name Instrument</td>
            <td>Next Calibration Date</td>
            <td>Calibrations By</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($kalibrasinearoneweek as $item)
            <tr>
                <td>{{ $item->instrumentid }}</td>
                <td>{{ $item->instrumentname }}</td>
                <td>{{ $item->nextcalibration }}</td>
                <td>{{ $item->calibrationby }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

