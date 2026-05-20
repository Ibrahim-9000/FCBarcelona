<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>Nieuw contactbericht</h1>

    <p><strong>Naam:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Bericht:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>