<!DOCTYPE html>
<html>
<head>
    <title>Apstiprini konta dzēšanu</title>
</head>
<body>
    <p>Sveiciens, {{ $user->name }},</p>

    <p> Tu esi pieprasījis sava konta dzēšanu. Lai to apstiprinātu, lūdzu spied uz saites zemāk: </p>
    <p>
        <a href="{{ $deletionUrl }}">Apstiprini konta dzēšanu</a>
    </p>

    <p>Ja Tu neveici šo pieprasījumu, lūdzu ignorē šo e-pastu.</p>
</body>
</html>

