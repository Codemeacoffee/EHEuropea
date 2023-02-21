<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Preinscripción</title>
</head>
<body>
<p>Por favor, NO responda a este mensaje, es un envío automático.</p>
<p><b>{{ $name }}</b> ha solicitado una preinscripción en <b>{{$course['name']}}</b> ({{$course['location']}}).</p>
<p>Si necesitas contactar a este usuario, puedes hacerlo a través de este email: <b>{{ $email }}</b></p>
<p>o a través de este teléfono: <b>{{ $phone }}</b>.</p>
</body>
</html>