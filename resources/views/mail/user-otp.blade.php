<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm your email</title>
</head>
<body>
    Enter this code on Ideaco to continue your sign up: {{ $otp->otp }}

    <small class="text-muted">
        This email was generated while signing you up for Ideaco.
        If you didn't initiate this request, you can safely ignore the email.
    </small>

    <span>
        Sent to {{ $otp->email }}
    </span>
</body>
</html>