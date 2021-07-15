<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        body {
            font-family: Arial;
            font-size: 0.9rem;
        }
    </style>
</head>
<body style="margin: 0;">
<div style="margin-top: 15px;">Name: {{ $name }}</div>
<div style="margin-top: 15px;">Email: {{ $mailFrom }}</div>
<div style="margin-top: 15px;">{!! $data->message !!}</div>
</body>
</html>
