@extends('registration')
@section('header')
@section('content')
    <div id="elegirnos">
        <div class="aboutUsWhoWeAre"><h1>¿Por qué elegirnos?</h1><div class="containerElement"><div class="blueBox"><p>Como centro de referencia de formación no reglada en Canarias,
                    transformamos la formación en una experiencia positiva para nuestros alumnos; desde la sonrisa y excelente trato de la recepcionista al inscribirte,
                    hasta el día en que conseguimos que la situación laboral de
                    nuestro alumnado mejore exponencialmente mediante nuestro elevado compromiso de contratación. Convertimos la formación en una experiencia de vida,
                    no solo laboral sino personal.</p></div><img src="{{asset('images/img_noticiaberros.jpg')}}"></div>
        </div>

        <div class="aboutUsWhoWeAre"><div class="containerElement2"><div class="blueBox"><p>Esta filosofía de trabajo, se transmite también en el resto de nuestros servicios; cursos privados, 
                cursos para ocupados, o para la organización de eventos, alquiler de aulas, etc. La escuela de Hostelería Europea es la plataforma perfecta donde convertir ese proyecto pendiente, 
                en una realidad tangible.
                    </p></div><img src="{{asset('images/img_aula2.jpg')}}"></div></div>

        <div class="aboutUsWhoWeAre">
            <div id="comps">
                <div><i class="icon-iconos-06"></i><p class="boxTitle">Educación de calidad</p></div>
                <div><i class="icon-iconos-07"></i><p class="boxTitle">Instalaciones punteras</p></div>
                <div><i class="icon-iconos-08"></i><p class="boxTitle">Compromiso de contratación</p></div>
            </div>
        </div>
    </div>
@stop
@section('footer')