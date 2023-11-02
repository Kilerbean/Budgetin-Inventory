
<!-- ####### HEY, I AM THE SOURCE EDITOR! #########-->
<h1><span style="color: #0000ff;">Q-LIS</span></h1>
<p>&nbsp;</p>
<h2 style="color: #2e6c80;">Reminder of calibration schedule approaching 1 month of calibration time</h2>
<table class="editorDemoTable"   style="height: 36px; border-style: solid; border-color: black;" border="1">
    <thead>
        <tr>
            <td>ID Instrument</td>
            <td>Name Instrument</td>
            <td>Next Calibration Date</td>
            <td>Calibration By</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($kalibrasinear as $item)
            <tr>
                <td>{{ $item->instrumentid }}</td>
                <td>{{ $item->instrumentname }}</td>
                <td>{{ $item->nextcalibration }}</td>
                <td>{{ $item->nextcalibration }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>&nbsp;</strong></p>
<p><strong>Save this link into your bookmarks and share it with your friends. It is all FREE!
    </strong><br /><strong>Enjoy!</strong></p>
<p><strong>&nbsp;</strong></p>
