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
    Dear {{ $user->userProfile->first_name }},
</div>
<div style="margin-top: 15px; padding-left: 15px; padding-right: 15px; text-align: justify;">
    Your Scout Beyond Premium Membership plan is about to expire on {{ date('F d, Y', strtotime($user->membership->end_date)) }}. Please log in to your <a href="{{ env('APP_URL') }}">account</a> and visit your profile for renewing your membership for uninterrupted services!
</div>

<div style="margin-top: 15px; padding-left: 15px;">
    Best Regards,<br>
    The Scout Beyond Team
</div>

<div style="margin-top: 30px; padding-top: 15px; text-align: center; height: 40px; font-size: 0.7rem;">
    &copy; {{ date('Y') }} scoutbeyond.com. All Rights Reserved.
</div>

</body>
</html>
