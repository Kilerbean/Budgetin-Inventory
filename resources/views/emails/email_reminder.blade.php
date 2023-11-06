
<!-- ####### HEY, I AM THE SOURCE EDITOR! #########-->
<!DOCTYPE html>
<html>
<head>
    <title>Calibration Reminder</title>
    <style>
        .header {
            color: #0000ff;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .greeting {
            color: #0000ff;
            font-size: 18px;
        }
        .due-date {
            color: #2e6c80;
            font-size: 20px;
            margin-top: 10px;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .button {
            background-color: #2e6c80;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .footer {
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">Q-LIS Calibration Reminder</div>
    <div class="greeting">Dear Bapak/Ibu,</div>
    <p>&nbsp;</p>
    <div class="due-date">Due Date Calibration: Approaching 1 Month - Requires Follow-Up</div>
    <table class="table">
        <thead>
            <tr>
                <th>ID Instrument</th>
                <th>Name Instrument</th>
                <th>Next Calibration Date</th>
                <th>Calibrations By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kalibrasinear as $item)
                <tr>
                    <td>{{ $item->instrumentid }}</td>
                    <td>{{ $item->instrumentname }}</td>
                    <td>{{ $item->nextcalibration }}</td>
                    <td>{{ $item->calibrationby }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="http://172.19.19.39:98" class="button">Login to Calibration System</a>
    <div class="footer">This email is auto-generated from the Q-LIS Calibration System Database. Please do not reply.</div>
    <div class="footer">Best Regards</div>
</body>
</html>
