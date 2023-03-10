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
                    <h2>Ayudas y Subvenciones</h2>
                </div>
                <p class="mt-5">En esta sección encontrarás toda la información en materia de Ayudas y Subvenciones de ESCUELA DE HOSTELERÍA EUROPEA SL.<br>
 
Además, en la parte inferior de la pantalla encontrarás todos los enlaces a todas las convocatorias a los que hace referencia la siguiente información. <br>

<br>ESCUELA DE HOSTELERÍA EUROPEA SL.<br>

<br><br>4.2.1 FORMACIÓN DIRIGIDA PRIORITARIAMENTE PARA TRABAJADORES DESEMPLEADOS (FPE)<br><br>
ESCUELA DE HOSTELERÍA EUROPEA S.L.  de forma directa le ha sido asignada la siguiente subvención del FORMACIÓN DIRIFIGA PRIORITARIAMENTE A TRABAJADORES DESEMPLEADOS:<br><br>
•	FPED 2018 RESOLUCIÓN DEFINITIVA DE LA SUBDIRECCIÓN DE FORMACIÓN DE CONCESIÓN DE LAS SUBVENCIONES PUBLICADA EN EL TABLÓN DE ANUNCIOS DEL SCE EL 14 DICIEMBRE, EN RELACIÓN A LA RESOLUCIÓN 07 DE JUNIO DE 2018, DE LA PRESIDENTA, POR LA QUE SE APRUEBA LA CONVOCATORIA PARA LA CONCESIÓN DE SUBVENCIONES DESTINADAS A LA REALIZACIÓN DE ACCIONES FORMATIVAS DIRIGIDAS PRIORITARIAMENTE A TRABAJADORES/AS DESEMPLEADOS/AS INCLUIDAS EN LA PROGRAMACIÓN 2018 (BOC nº 118 de 20/06/2018) IMPORTE:975.750,00€<br>
<br><br>ESCUELA DE HOSTELERÍA EUROPEA S.L.  de forma directa, dentro de los planes de formación dirigidos prioritariamente para trabajadores ocupados, en los planes ejecutados por centro de formación, ha recibido los siguientes planes de formación:<br><br>
•	EXPTE: FC-2017.2/06/1634001 PLANES DE FORMACION DIRIGIDOS PRIORITARIAMENTE A TRABAJADORES/TRABADORAS OCUPADOS IMPORTE ECONÓMICO (90.470€). RESOLUCION Nº 17/12536 DE LA DIRECCIÓN DEL SERVICIO CANARIO DE EMPLEO, DE FECHA 26.12.2017. PLAN DE HOSTELERÍA<br>
•	EXPTE: FC-2018.2/06./1715206 PLANES DE FORMACION DIRIGIDOS PRIORITARIAMENTE A TRABAJADORES/ TRABAJADORAS OCUPADOS IMPORTE ECONÓMICO (142.580,00€) RESOLUCIÓN DE 30/07/2018 (EXTRACTO PUBLICADO EN BOC nº 153 DE 08/08/2018) PLAN HOSTELERIA<br>
•	EXPTE: FC-2018.1/II.000/1715203 PLANES DE FORMACION DIRIGIDOS PRIORITARIAMENTE A TRABAJADORES/ TRABAJADORAS OCUPADOS IMPORTE ECONÓMICO (412.420,00€) RESOLUCIÓN DE 30/07/2018 (EXTRACTO PUBLICADO EN BOC nº 153 DE 08/08/2018) PLAN TRANSVERSAL<br>
<br><br>ESCUELA DE HOSTELERÍA EUROPEA ha recibido de manera directa las siguientes subvenciones de FORMACIÓN CON COMPROMISO DE CONTRATACIÓN: <br><br>

•	En el año 2018 – ESCUELA DE HOSTELERÍA EUROPA, fue beneficiario de una la subvención a través de Resolución Nº 7391/2018 de la Dirección del SCE por la que se resuelve la concesión de subvenciones de las solicitudes presentadas en el segundo periodo de la convocatoria de concesión de subvenciones destinadas a la financiación de Programas formativos con compromiso de contratación para el ejercicio 2018, aprobadas mediante resolución de 19 de Abril de 2018, de la Presidenta (BOC nº 82, de 27 de abril de 2018) por importe de 388.557,48€<br>

<br>•	2019 - PROGRAMAS FORMATIVOS CON COMPROMISO DE CONTRATACIÓN DIRIGIDOS A PERSONAS DESEMPLEADAS PARA EL EJERCICIO 2019. IMPORTE: 391.135,40 €.<br>
<br>•	2019 - CONVOCATORIA DE INCENTIVOS A LA CONTRATACIÓN DE COLECTIVOS DE DIFÍCIL INSERCIÓN. EJE 1 DE LA LÍNEA ESTRATÉGICA 3 “APOYO A LA EMPLEABILIDAD” DEL FONDO DE DESARROLLO DE CANARIAS (FDCAN). ANUALIDAD 2019. CABILDO DE GRAN CANARIA (PUBLICADO EN EL BOP DE LAS PALMAS 39 DE 1 DE ABRIL DE 2019). IMPORTE: 3.000,00 €.<br>
<br>•	2019 - CONVOCATORIA DE INCENTIVOS A LA CONTRATACIÓN DE COLECTIVOS DE DIFÍCIL INSERCIÓN. EJE 1 DE LA LÍNEA ESTRATÉGICA 3 “APOYO A LA EMPLEABILIDAD” DEL FONDO DE DESARROLLO DE CANARIAS (FDCAN). ANUALIDAD 2019. CABILDO DE GRAN CANARIA (PUBLICADO EN EL BOP DE LAS PALMAS 39 DE 1 DE ABRIL DE 2019). IMPORTE: 3.500,00 €.<br>
<br>•	2019 - RESOLUCIÓN DE LA DIRECCIÓN DEL SCE, POR LA QUE SE INCREMENTA LA DOTACIÓN ECONÓMICA DE LA CONVOCATORIA DE SUBVENCIONES EJECUCIÓN PLANES FORMACIÓN OCUPADOS (PUBLICADO EN EL BOC 228 DE 25 DE NOVIEMBRE DE 2019). IMPORTE: 412.121,40 €.<br>
<br>•	2019 - RESOLUCIÓN DE LA DIRECCIÓN DEL SCE, POR LA QUE SE INCREMENTA LA DOTACIÓN ECONÓMICA DE LA CONVOCATORIA DE SUBVENCIONES EJECUCIÓN PLANES FORMACIÓN OCUPADOS (PUBLICADO EN EL BOC 228 DE 25 DE NOVIEMBRE DE 2019). IMPORTE: 142.315,20 €.<br>
<br>•	2019 - CONVOCATORIA DE SUBVENCIONES PARA ACCIONES FORMATIVAS A DESEMPLEADOS FPED 2019. IMPORTE: 1.075.375,50 €.<br>
<br>•	2020 - AVALES A FINANCIACIÓN A EMPRESAS Y AUTÓNOMOS CONCEDIDOS POR EL MINISTERIO DE ASUNTOS ECONÓMICOS Y TRANSFORMACIÓN DIGITAL PARA PALIAR EFECTOS DEL COVID19, GESTIONADOS POR EL ICO POR CUENTA DEL MINISTERIO. ARTÍCULO 29 RDL 8/2020. IMPORTE: 64.037,41 €.<br>
<br>•	2020 - CONVOCATORIA DE SUBVENCIONES PARA ACCIONES FORMATIVAS PRIORITARIAMENTE A DESEMPLEADOS FPED 2020. IMPORTE: 823.494,00 €.<br>
<br>•	2021 - CONVOCATORIA DE SUBVENCIONES DENOMINADAS BONOS PARA LA TRANSFORMACIÓN DIGITAL DE LA EMPRESA CANARIA PARA EL EJERCICIO 2020, MOTIVADA POR LA CRISIS SANITARIA DE LA COVID-19. IMPORTE: 14.601,71 €.<br>
<br>•	2021 - RESOLUCIÓN DE LA PRESIDENTA DEL SCE, POR LA QUE SE APRUEBA LA CONVOCATORIA PARA EL EJERICIO PRESUPUESTARIO 2021 DE CONCESIÓN DE SUBVENCIONES PÚBLICAS, PARA LA EJECUCIÓN DE PLANES DE FORMACIÓN DIRIGIDOS PRIORITARIAMENTE A PERSONAS TRABAJADORAS OCUPADAS. EXP: FC-2021.2/04/1906232 /6/1/2021-0921124752. IMPORTE: 75.381,30 €.<br>
<br>•	2021 - RESOLUCIÓN DE LA PRESIDENTA DEL SCE, POR LA QUE SE APRUEBA LA CONVOCATORIA PARA EL EJERICIO PRESUPUESTARIO 2021 DE CONCESIÓN DE SUBVENCIONES PÚBLICAS, PARA LA EJECUCIÓN DE PLANES DE FORMACIÓN DIRIGIDOS PRIORITARIAMENTE A PERSONAS TRABAJADORAS OCUPADAS. EXP: FC-2021.2/04/1906232 /6/1/2021-0921124752. IMPORTE: 60.093,00 €.<br>
<br>•	2021 - RESOLUCIÓN DE LA PRESIDENTA DEL SCE, POR LA QUE SE APRUEBA LA CONVOCATORIA PARA EL EJERICIO PRESUPUESTARIO 2021 DE CONCESIÓN DE SUBVENCIONES PÚBLICAS, PARA LA EJECUCIÓN DE PLANES DE FORMACIÓN DIRIGIDOS PRIORITARIAMENTE A PERSONAS TRABAJADORAS OCUPADAS. EXP: FC-2021.1/II.000/1906218 /20/1/2021-0921124752. IMPORTE: 173.868,75 €.<br>
<br>•	2021 - CONVOCATORIA ACCIONES FORMATIVAS CON COMPROMISO DE CONTRATACIÓN AFCC 2021. IMPORTE: 259.204,00 €.<br>
<br>•	2021 - CONVOCATORIA FORMACIÓN PARA DESEMPLEADOS FPED2021. IMPORTE: 470.055,00 €.<br>
<br>•	2021 - RESOLUCIÓN DE LA PRESIDENTA DEL SCE, POR LA QUE SE APRUEBA LA CONVOCATORIA PARA EL EJERICIO PRESUPUESTARIO 2021 DE CONCESIÓN DE SUBVENCIONES PÚBLICAS, PARA LA EJECUCIÓN DE PLANES DE FORMACIÓN DIRIGIDOS PRIORITARIAMENTE A PERSONAS TRABAJADORAS OCUPADAS. IMPORTE: 173.868,75 €.<br>




<br><br>Enlaces:<br>
<br><b><a href="{{asset('files/Ocupados2018.pdf')}}" target="_blank">•  Ocupados 2018</a> <br><br>  <a href="{{asset('files/FPED2018.pdf')}}" target="_blank">•   Asignación FPED 2018</a> <br><br> <a href="{{asset('files/FPED2019.pdf')}}" target="_blank">•   Asignación FPED 2019</a></b>
<br></p>
        </div>
    <script type="text/javascript" src="{{asset('js/overflow.js')}}"></script>
@stop
@section('footer')