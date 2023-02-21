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
    <div class="fichaDiv mb-5" style="width: 80%;">
                <div class="mt-5 mr-5 bars">
                    <h2>Comisionado de Transparencia</h2>
                </div>
                <p class="mt-5">El Comisionado de Transparencia y Acceso a la Información Pública de Canarias es un órgano creado por la Ley de Transparencia de Canarias y dedicado al fomento, análisis, control y protección de la transparencia y del derecho de acceso a la información pública en el ámbito canario.<br> 

<a href="https://transparenciacanarias.org/">Acceso a la página principal del Comisionado de Transparencia</a><br>

 

<br>En el caso de considerar que se ha vulnerado su derecho a la información o para cualquier sugerencia o reclamación, puede dirigirse al Comisionado de Transparencia, en el siguiente <a href="https://transparenciacanarias.org/como-reclamar/">enlace.</a><br><br>
</p>
        </div>
    <script type="text/javascript" src="{{asset('js/overflow.js')}}"></script>
@stop
@section('footer')