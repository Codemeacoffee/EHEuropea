@extends('registration')
@section('header')
@section('content')
    <?php
    if(session('message')){
        echo '<div id="floatingMessage">' . session('message') . '</div>';
    }
    ?>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <div class="fichaDiv" style="width: 80%;">
                <div class="mt-5 mr-5 bars">
                    <h2>Organizativa</h2>
                </div>
                <p class="mt-5">Escuela de Hostelería Europea, es una empresa de titularidad privada. A continuación se especifica los datos correspondientes: <br>

ESCUELA DE HOSTELERÍA EUROPEA, S.L., constituida el 03 de septiembre de 2015,  ante el registrador Fernando Eduardo Aregón Hijosa, en Puerto del Rosario, con datos registrales: folio 20 del tomo 172 General, hoja IF-7596 e inscripción 1º..  <br>

 

<br>Su sede fiscal y sus centros de formación e instalaciones se encuentran ubicadas en: <br>

C/ PÉREZ DEL TORO 54-56, 35004, LAS PALMAS DE GRAN CANARIA, Las Palmas. <br>

<br>Sedes:<br>

C/ LANZAROTE, BUTIHONDO, PÁJARA 35625, Las Palmas.<br>

 

Administrador único YASMINA NEWPORT PERDOMO.  <br>

 

Organigrama
<img class="w-100" src="{{asset('images/Diapositiva_ehe.png')}}"><br>
<br>PERFIL Y TRAYECTORIA DE LOS RESPONSABLES DE LA ENTIDAD<br>

·         Yasmina Newport Perdomo: Directora General de la Escuela de Hostelería y máxima responsable de la empresa. Yasmina gestiona tanto la sede de Las Palmas de Gran Canaria como el centro en Pájara.<br>

·         Elizabeth Luján Benítez: Coordinadora de formación de la sede de Escuela de Hostelería Europea en Pérez del Toro en Las Palmas de Gran Canaria.<br>

·         Soraya Medina Martín: Coordinadora de formación de la sede de Escuela de Hostelería Europea en Butihondo en Pájara.<br>
</p>
        </div>
    <script type="text/javascript" src="{{asset('js/overflow.js')}}"></script>
@stop
@section('footer')