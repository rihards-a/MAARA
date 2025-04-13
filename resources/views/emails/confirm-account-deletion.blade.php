<!DOCTYPE html>
<html>
<head>
    <title>Confirm Account Deletion</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>

    <p>You have requested to delete your account. To confirm this action, please click the link below:</p>
    <p>
        <a href="{{ $deletionUrl }}">Confirm Account Deletion</a>
    </p>

    <p>If you did not make this request, please ignore this email.</p>
</body>
</html>
