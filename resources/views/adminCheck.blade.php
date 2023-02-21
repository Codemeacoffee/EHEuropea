<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <title>EHEuropea - Admin</title>
    <meta name="author" content="INVERSIONES BORMA S.L.">
    <meta name="keywords" content="eheuropea, escuela hostelería europea, escuela hostelería, escuela europea hosteleria,
        formacion gratuita, formacion gratis, formacion desempleados gratis, formacion trabajadores gratis, escuela, hostelería, europea,
        formación, desempleados, trabajadores, gratuita, gratuito, cocina, cafetería, bar, restaurante, cursos, educación, enseñanza, estudios,
        aprendizaje, gratis, formación bonificada, cursos sepe, cursos desempleados, sepe, cursos fundae, fundae, servicio canario empleo,
        cursos servicio canario empleo, cursos hostelería, cursos restaurante, cursos cafetería, certificado calidad, calidad,
        certificado profesionalidad, compromiso contratación, agencia colocación, bolsa trabajo, gran canaria, fuerteventura.">
    <meta name="description" content="La Escuela de Hostelería Europea es una entidad reconocida y acreditada por el Servicio Canario de
        Empleo para la impartición de Cursos de Formación Profesional para el Empleo">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#008ACF"/>
    <meta name="msapplication-navbutton-color" content="#008ACF"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#008ACF"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="shortcut icon" type="image/png" href= "{{asset('images/favicon-01.png')}}"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="adminAccess">
<div class="innerAdminAccess">
<form method="post" action="{{ action('AdminController@checkAdmin') }}">
    {{csrf_field()}}
    <div>
        <label for="email">Email</label>
        <input type="text" <?php if(isset($error)){
            echo'id="invalidField" onclick="$(this).attr(\'id\', \'\')"';
        } ?> name="email" spellcheck="false" required>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" <?php if(isset($error)){
            echo'id="invalidField2" onclick="$(this).attr(\'id\', \'\')"';
        } ?> name="password" required>
    </div>
    <input type="submit" value="Acceder">
</form>
</div>
</div>
</body>
</html>