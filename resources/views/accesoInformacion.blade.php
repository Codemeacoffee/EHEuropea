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
                    <h2>Acceso a la información</h2>
                </div>
                <p class="mt-5">La Entidad mantendrá en la medida de lo posible la información actualizada, no obstante, cualquier persona podrá solicitar documentación adicional, tal como se indica en la normativa. La persona interesada en obtener más información deberá contactar por los siguientes medios: <br>

1.- Por correo electrónico a la siguiente dirección: info@eheuropea.com <br>

2.- Por medio de la web en el buzón de sugerencia y recomendaciones. <br>

3.- De forma presencial o a través de correo postal, en nuestra sede central ubicada en C/Pérez del Toro 54-56, 35004, Las Palmas de GC, Las Palmas.<br>

<br>En cualquiera de los casos anteriores, para poder tramitar correctamente su solicitud, se deberá cumplimentar los siguientes requisitos, tal como establece el art.41 de la Ley 12/2014: <br>

·         Identidad de la persona solicitante, adjuntando copia de su DNI/NIE. <br>

·         La Información que solicita. <br>

·         La dirección de contacto, preferentemente electrónica a efectos de comunicaciones.</p>
        </div>
    <script type="text/javascript" src="{{asset('js/overflow.js')}}"></script>
@stop
@section('footer')