<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $subject ?? 'Email' }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 30px;">
<div style="background: white; padding: 25px; border-radius: 6px; max-width: 600px; margin: auto;">
    {!! $body !!}
</div>
</body>
</html>
