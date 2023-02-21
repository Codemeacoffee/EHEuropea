@extends('registration')
@section('header')
@section('content')
<div class="cursosBox" style="overflow:hidden;">
    <h1>Nuestros Certificados</h1>
    
    <div class="certificates">
        <h2>Certificado de accesibilidad</h2>
        <div class="grid-2-columns">
            <div>
                 <p>
                    Con el fin de garantizar un acceso universal en el que cualquier persona, independientemente de su edad o discapacidad, pueda acceder a cualquier parte o punto del interior y del exterior de nuestros centros de formación,
                    Escuela de Hostelería Europea, posee las cédulas de certificación para la accesibilidad de personas con limitaciones motoras y/o de otras con mermas de tipo sensorial. Todo ello con el propósito de que se desenvuelvan de 
                    manera autónoma y no discriminativa en lugares públicos y privados comunes.
                </p>
                </br>
                <p>
                  Del mismo modo, la accesibilidad universal desarrollada conforme a la Norma UNE 170001-2 para los entornos laborales, manifiesta el compromiso por parte de nuestra organización con la sociedad, creando entornos donde cualquier
                  trabajador independientemente de sus capacidades, pueda desarrollar sus actividades laborales en condiciones de igualdad de oportunidades que el resto de sus compañeros.
               </p>
            </div>
            <div>
                 <img src="{{asset('images/accesibilidad.png')}}">
            </div>
        </div>
    </div>
    
    <div class="certificates" id="EFQM">
        <h2>Certificado EFQM+500</h2>
        <div class="grid-2-columns">
            <div>
                 <p>
                    Este certificado, también conocido como sellos de la Excelencia, es otorgado por la Fundación Europea para la Gestión de la Calidad, y define el modelo de calidad adoptado por nuestra empresa.
                </p>
                </br>
                <p>
                    El EFQM que está proyectado para ayudar a las organizaciones europeas más afianzadas en el mercado comunitario, se centra en aquellas organizaciones que llevan a cabo los principios de la administración en 
                    su actividad diaria y en las relaciones con sus stakeholders u otros grupos.
               </p>
               </br>
                <p>
                    Desde Escuela de Hostelería Europea entendemos la excelencia como modo sobresaliente de gestionar la organización y obtener resultados. Por tanto, una organización excelente es aquella que se esfuerza en 
                    satisfacer a todos sus stakeholders y cuyo éxito se mide en función de los resultados obtenidos.
               </p>
                <br>
                <a href="{{asset('files/CERTIFICADOS Y SUBCERTIFICADOS GRUPO GESTIÓN DE FORMACIÓN-3.pdf')}}" target="_blank">Ver certificado EFQM +500</a>
            </div>
            <div>
                 <img class="w-50" src="{{asset('images/EFQM+500.png')}}">
            </div>
        </div>
    </div>
    
    <div class="certificates" id="ISO">
        <h2>Garantía de calidad y compromiso con el medio ambiente</h2>
        <div class="grid-2-columns">
            <div>
                 <p>
                     Conscientes de la importancia de mantener un desarrollo sostenible, los centros de Escuela de Hostelería Europea aplican un <strong>sistema de gestión integrado</strong>, tanto de calidad como ambiental que intenta prevenir 
                     los impactos sobre el entorno de sus actividades e instalaciones, según los estándares <strong>ISO 14001:2015</strong> e <strong>ISO 9001:2015.</strong>
                </p>
                </br>
                <p>
                   Los centros de Escuela de Hostelería Europea quieren conseguir que sus procesos y procedimientos de formación tengan un mínimo impacto medioambiental. Para ello, previenen, controlan y minimizan los efectos medioambientales 
                   que sus actividades generan en el entorno, estudiando y perfeccionando constantemente nuevos métodos para reducir el consumo de materias primas, la energía requerida para elaborar sus productos y las emisiones a la atmósfera 
                   de gases contaminantes producidas. 
                </p>
                <br>
                <a href="{{asset('files/politica_de_calidad.pdf')}}" target="_blank">Ver política ambiental y de calidad</a>
            </div>
            <div>
                <img src="{{asset('images/ISO 9001+ISO 14001.jpg')}}">
            </div>
        </div>
    </div>

    <div class="certificates" id="EMAS">
        <h2>Sensibilización ambiental</h2>
        <div class="grid-2-columns">
            <div>
                 <p>
                    <h4>EMAS 2021</h4></br></br>
                    Con el objetivo de sensibilizar a los alumnos de nuestras academias sobre el buen uso de nuestras instalaciones y las normas básicas para un futuro más sostenible, trabajaremos en una nueva campaña de sensibilización 
                    ambiental a través de nuestro blog.
                </p>
                </br>
                <p>
                    El antiguo Ministerio de Trabajo y Asuntos Sociales, a través de la Unidad Administradora para el Fondo Social Europeo y el antiguo Instituto Nacional de Empleo, en colaboración con la Red de Autoridades Ambientales elaboraron 
                    estos Manuales de Buenas Prácticas Ambientales para las diferentes familias profesionales en que se organiza la Formación Ocupacional. Estos manuales de buenas prácticas surgen como complemento necesario al módulo de 
                    sensibilización ambiental, dándole continuidad a una idea que, con carácter general y básico, integraba consideraciones ambientales transversales a los cursos de formación ocupacional. Las buenas prácticas que se exponen 
                    en estos manuales son de gran utilidad y sencillas de aplicar, tanto por su simplicidad como por lo sorprendente de sus resultados. De esta manera, contribuimos a conseguir un objetivo fundamental: el desarrollo sostenible. 
                    
                    Pinchando en el siguiente <a href="https://www.miteco.gob.es/es/calidad-y-evaluacion-ambiental/temas/red-de-autoridades-ambientales-raa-/sensibilizacion-medioambiental/manuales-de-buenas-practicas/" target="_blank">enlace</a>, 
                    encontrarás el manual de buenas prácticas asociado a la especialidad formativa que estás realizando.
               </p>
                </br>
                <a href="{{asset('files/EMAS 2017.pdf')}}" target="_blank">Ver declaracion ambiental del grupo "Gestión Empresarial Europea"</a>
            </div>
            <div>
                 <img width="250" src="{{asset('images/emaslogo.png')}}">
            </div>
        </div>
    </div>
    
    <div class="certificates" id="ISO">
        <h2>Certificado ISO 27001</h2>
        <div class="grid-2-columns">
            <div>
                 <p>
                    ISO/IEC 27001 es un estándar para la seguridad de la información (Information Technology – Security techniques – Information security management systems – Requirements) aprobado y publicado en octubre de 2005 como estándar internacional 
                    por el International Organization for Standarization y por la comisión International Electrotechnical Commission.
                </p>
                </br>
                <p>
                    ISO 27001 es una norma internacional que permite el aseguramiento, la confidencialidad e integridad de los datos y de la información, así como de los sistemas que la procesan.
               </p>
               </br>
                <p>
                    El estándar ISO 27001:2013 para los Sistemas Gestión de la Seguridad de la Información permite a las organizaciones, la evaluación del riesgo y la aplicación de los controles necesarios para mitigarlos o eliminarlos.
               </p>
               </br>
                <p>
                    La aplicación de ISO-27001 supone una diferenciación respecto al resto, mejorando la competitividad y la imagen de una organización.
               </p>
            </div>
            <div>
                 <img src="{{asset('images/27001_ENAC_CAST.jpg')}}">
            </div>
        </div>
    </div>
    
</div>

<?php

if(isset($_GET['section'])){
    echo '<script type="text/javascript">$(window).on("load", function(){animateTo("'.$_GET['section'].'");});</script>';
}

?>


@stop
@section('footer')