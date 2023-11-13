<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification: Calibration Rejection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            color: #ff0000;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .greeting {
            color: #000000;
            font-size: 18px;
        }
        .message {
            color: #000000;
            font-size: 16px;
            margin-top: 10px;
        }
        .details {
            color: #2e6c80;
            font-size: 18px;
            margin-top: 20px;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #2e6c80;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #2e6c80;
            padding: 8px;
            text-align: left;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2e6c80;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            font-size: 16px;
            margin-top: 20px;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Notification: Calibration Rejection</div>
        <div class="greeting">Dear Validation Support,</div>
        <p>&nbsp;</p>
        <div class="message">We regret to inform you that the calibration for the following instrument has been rejected:</div>
        <div class="details">Instrument Details:</div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Instrument</th>
                    <th>Name Instrument</th>
                    <th>Rejection Reason</th>
                    <th>Calibrations By</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $kalibrasiz->instrumentid }}</td>
                    <td>{{ $kalibrasiz->instrumentname }}</td>
                    <td>{{ $kalibrasiz->reason_notapprove}}</td>
                    <td>{{ $kalibrasiz->calibrationby }}</td>
                </tr>
            </tbody>
        </table>
        <a href="http://172.19.19.39:98/kalibrasi/approval" class="button">Login to Calibration System</a>
        <div class="footer">If you have any questions, please contact our support team. This is an automated message; please do not reply.</div>
        <div class="footer">Best Regards</div>
    </div>
</body>
</html>
