<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Products Export from {{ config('app.name') }}</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            margin: 0;
            padding: 0;
            background-color: #453B26;
            color: #C7B594;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #453B26;
            padding: 0;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #211C12;
            color: #C7B594;
            text-align: center;
            padding: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 30px;
            font-size: 16px;
            line-height: 1.6;
            color: #C7B594;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777777;
            background-color: #211C12;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('logo.png')) }}" alt="Company Logo">
            <h1>Your Products Export</h1>
        </div>
        <div class="content">
            <p>Hi, {{ $reciverName }}</p>
            <p>Thank you for using our service. Please find the exported products CSV file attached to this email.</p>
            <p>If you have any questions, feel free to contact us.</p>
            <p>Regards,<br>{{ $senderName }}</p>
            <img src="{{ $message->embed(storage_path('app/' . $qrPath)) }}" alt="QR Code">
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
