
<!DOCTYPE html>
<html>
<head>
    <title>Calibration Reminder</title>
    <style>
        .button {
            background-color: #2e6c80;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2 style="color: #0000ff;">Q-LIS Calibration Reminder</h2>
    <p>Dear Bapak/Ibu,</p>
    <p style="color: #2e6c80;">Due Date Calibration: Approaching 1 Week - Requires Follow-Up</p>
    <table border="1" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>ID Instrument</th>
                <th>Name Instrument</th>
                <th>Next Calibration Date</th>
                <th>Calibrations By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kalibrasinearweek as $item)
                <tr>
                    <td>{{ $item->instrumentid }}</td>
                    <td>{{ $item->instrumentname }}</td>
                    <td>{{ $item->nextcalibration }}</td>
                    <td>{{ $item->calibrationby }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="http://172.19.19.39:98/Dashboard/Kalibrasi" class="button">Login to Calibration</a>
    <p>This email is auto-generated from the Q-LIS Calibration System Database. Please do not reply.</p>
    <p>Best Regards,</p>
</body>
</html>
