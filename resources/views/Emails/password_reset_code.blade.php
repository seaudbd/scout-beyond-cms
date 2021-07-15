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


<div style="margin-top: 25px; padding-left: 15px; padding-right: 15px;">
    Hi {{ $user->userProfile->first_name }},
</div>
<div style="margin-top: 15px; padding-left: 15px; padding-right: 15px; text-align: justify;">
    You recently requested for a password reset. Here’s your password reset code: {{ $user->password_reset_code }}
</div>

<div style="margin-top: 15px; padding-left: 15px;">
    Best Regards,<br>
    Scout Beyond Support Team
</div>

<div style="margin-top: 30px; padding-top: 15px; text-align: center; height: 40px; font-size: 0.7rem;">
    &copy; {{ date('Y') }} scoutbeyond.com. All Rights Reserved.
</div>

</body>
</html>
