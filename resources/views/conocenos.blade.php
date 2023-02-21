@extends('registration')
@section('header')
@section('content')
    <div class="aboutUsWhoWeAre" id="somos"><h1>¿Quiénes Somos?</h1><div class="containerElement"><div class="blueBox"><p>Escuela de Hostelería Europea, nace con la finalidad de apoyar la formación en el ámbito de la hostelería y turismo. Con escuelas tanto en Las Palmas de Gran Canaria como en 
                Pájara, el objetivo de cubrir la necesidad de obtener trabajadores cualificados para las labores desempeñadas en el sector de la hostelería y el turismo.<br/><br/>
                La Escuela de Hostelería Europea es una entidad reconocida y acreditada por el Servicio Canario de Empleo para la impartición de Cursos de Formación Profesional para el Empleo.
                </p></div><img src="{{asset('images/img_escuela.jpg')}}"></div>
    </div>

    <div class="aboutUsWhoWeAre" id="mision"><div class="containerElement2"><div class="blueBox"><h1>Misión</h1><p>Mejorar la formación, cualificación y la empleabilidad de las personas a través de la formación, orientación, colocación y
                    asesoramiento a empresas.</p></div><img src="{{asset('images/Misión.jpg')}}"></div></div>

    <div class="aboutUsWhoWeAre" id="vision"><div class="containerElement2"><div class="blueBox"><h1>Visión</h1><p>Seguir siendo un referente en el sector de la formación, tanto en la Formación Profesional para el Empleo como en la
                    formación privada, ofreciendo un servicio de calidad, así como seguir siendo pioneros en la inserción de personas en los
                    diversos sectores productivos de ámbito regional.</p></div><img src="{{asset('images/Visión.jpg')}}"></div></div>

    <div class="aboutUsWhoWeAre"><h1>Valores</h1>Los principios éticos en los que se sustentan la cultura del centro de formación Escuela de Hostelería Europea son:
        <div id="valores">
            <div><i class="icon-iconos-09"></i><p class="boxTitle">Confianza</p><p class="hiddenText">Basamos las relaciones con nuestros clientes en la confianza.</p></div>
            <div><i class="icon-iconos-08"></i><p class="boxTitle">Compromiso y predisposición</p><p class="hiddenText">Para dar lo mejor en todos los proyectos que se emprenden.</p></div>
            <div><i class="icon-iconos-10"></i><p class="boxTitle">Respeto</p><p class="hiddenText">Al ciudadano, reconociéndole y considerándolo como uno mismo.</p></div>
            <div><i class="icon-iconos-07"></i><p class="boxTitle">Liderazgo y mejora continua</p><p class="hiddenText">Compromiso con el desarrollo de las personas y su motivación intentando llevar a cabo las mejores prácticas en todos los ámbitos en que se desarrolla la organización.</p></div>
            <div><i class="icon-iconos-06"></i><p class="boxTitle">Calidad</p><p class="hiddenText">Capacidad de captar y satisfacer las expectativas del cliente, mediante accesibilidad y atención personalizada.</p></div>
            <div><i class="icon-iconos-11"></i><p class="boxTitle">Exigencia</p><p class="hiddenText">Buscamos la excelencia en todos nuestros actos.</p></div>
        </div>
    </div>
@stop
@section('footer')