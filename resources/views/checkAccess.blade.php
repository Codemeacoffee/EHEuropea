<!DOCTYPE html>
<html>
<head>
    <title>EHEuropea</title>
    <meta name="author" content="Lionel & Emmanuel">
    <meta name="keywords" content="Eheuropea">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href= "{{asset('images/favicon-01.png')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="adminAccess">
<div class="innerAdminAccess">
<form method="post" action="{{ action('AdminController@checkValidUser') }}">
    {{csrf_field()}}
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