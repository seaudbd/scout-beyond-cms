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
    Hello {{ $user->userProfile->first_name }},
</div>
<div style="margin-top: 15px; padding-left: 15px; padding-right: 15px; text-align: justify;">
    Welcome to Scout Beyond. We are happy to welcome you on board. From now on, you will be able to access our system and take full advantage of it.
</div>

<div style="margin-top: 15px; padding-left: 15px; padding-right: 15px; text-align: justify;">
    There’s just one last step left. You just need to verify your profile by clicking this link : <a href="{{ url('/') }}/verify?user_id={{ $user->id }}">Verify My Account</a>.
</div>

<div style="margin-top: 15px; padding-left: 15px;">
    Best Regards,
    Scout Beyond Support Team
</div>

<div style="margin-top: 30px; padding-top: 15px; text-align: center; color: white; height: 40px; font-size: 0.7rem;">
    &copy; {{ date('Y') }} scoutbeyond.com. All Rights Reserved.
</div>

</body>
</html>