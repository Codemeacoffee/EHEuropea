@extends('registration')
@section('header')
@section('content')
    <div class="centroBox">
        <h1>Centros</h1>
        <div class="centroInnerBox"><img src="{{asset('images/Img_comedor2.jpg')}}"><div class="blueBox"><h2>Pérez del Toro</h2><p>En el corazón de la capital de Gran Canaria, nuestro centro de Pérez del Toro 54 abrió sus puertas en 2017 y desde entonces, 
            miles de alumnos han obtenido titulaciones oficinales en hostelería (cocina, servicios de restaurante, pastelería...) usando unas instalaciones punteras que permiten al personal docente explotar todo su potencial, incrementando así, el estándar 
            de calidad de la enseñanza y preparando a nuestro alumnado para el mercado laboral en el sector motor de la economía del archipiélago.</p>
            </div></div>
        <div class="centroInnerBox"><img src="{{asset('images/Aula pajara.jpg')}}"><div class="blueBox" id="box2"><h2>Pájara</h2><p>Abierto a comienzos del 2018, nuestro centro en Pájara se encuentra en pleno corazón turístico
                    y hostelero de la isla de Fuerteventura,
                    lo cual sitúa a nuestros alumnos en una situación inmejorable a la hora de que, con nuestra ayuda, afronten el mercado laboral con garantías de futuro.</p>
            </div></div>
    </div>
@stop
@section('footer')