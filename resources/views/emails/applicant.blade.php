<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Solicitud de trabajo</title>
</head>
<body>
<p>Por favor, NO responda a este mensaje, es un envío automático.</p>
<p><b>{{ $name }}</b> ha solicitado el siguiente puesto de trabajo: <b>{{ $occupation }}</b>.</p>
<p>Envía tu respuesta a este email: <b>{{ $email }}</b></p>
<p>o contacta a este teléfono: <b>{{ $phone }}</b>.</p>
<a href="{{ asset($pathToFile) }}"><b>Puedes descargar el archivo adjunto o verlo online aquí.</b></a>
</body>
</html>