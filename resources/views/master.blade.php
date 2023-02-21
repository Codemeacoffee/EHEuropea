@extends('registration')
@section('header')
@section('content')
    <script type="text/javascript" src="{{asset('js/preFormCreation.js')}}"></script>
    
    <?php
    $numAlterMod = 1;
    $alterCode = '';
    if(session('message')){
        echo '<div id="floatingMessage">' . session('message') . '</div>';
    }
    ?>
    <div id="frontier">
        <div id="cursoFrontierFull">
            <div class="imgCursoFull">
                <img  src="{{asset('images/MBA Turismo.jpg')}}">
            </div>
        </div>
        <div id="descCursoFull">
            <?php /*echo '<p><b>' . $course['name'] . '</b>';
            if($course['public'] == 0) {
                echo' Nivel ' . $course['level'] .'';
            }
            echo'</p>';
            */?>
            <p><b>Máster internacional en dirección de empresas de turismo y ocio</b></p>
        </div>
        <div id="navCurso" class="botonInscripcionMaster">
            <span onclick="masterInscription('{{URL::to("masterInscription")}}')">Preinscríbete</span>
        </div>
        <script type="text/javascript" src="{{asset('js/fichaMaster.js')}}"></script>
        <?php  echo '<script type="text/javascript">fichaParts();</script>' ?>
    </div>
    <div id="cajaPreins">
        <div><i class="icon-iconos-05"></i><p><b>Para más información:</b><br> 699511741<br></p></div>
        <button onclick="masterInscription('{{URL::to('masterInscription')}}')">Preinscríbete</button>
    </div>
    <div class="fichaDiv" id="presentacion">
        <h2>¿Qué es?</h2>
        <p>El MBA Turismo es un Máster Executive que se organiza en las islas de Gran Canaria, Tenerife, Lanzarote y Fuerteventura.<br>
        Es una formación de capacitación profesional dividida en dos niveles fuertemente basados en la práctica y cuyos contenidos serán siempre impartidos por profesionales que están actualmente
        trabajando en el sector.</p>
    </div>
    
    <div class="fichaDiv" id="destinatario">
        <h2>¿A quién va dirigido?</h2>
        <p>El máster está dirigido a directivos, mandos intermedios y emprendedores que quieran mejorar su formación en el sector y ver mejoradas sus competencias profesionales. 
            Como resumen, el máster va dirigido a:<br><br>
            •	Directores y propietarios de hoteles.<br><br>
            •	Mandos intermedios: directores de operaciones, finanzas y recursos humanos subdirectores de hotel; jefes de recepción; jefes de departamento.<br><br>
            •	Empresarios del sector de la restauración y el ocio.<br><br>
            •	Técnicos de la administración<br><br>
            •	Licenciados que quieran especializarse en el sector turístico
        </p>
    </div>
    
    <div class="fichaDiv" id="modulos">
        <h2>¿Qué contenidos se imparten?</h2>
        <p>Las diferentes áreas de capacitación van desde gestión de recursos humanos, a dirección financiera, pasando por estrategia,
        operaciones o marketing digital, divididos en 2 programas, un programa superior de Septiembre a Diciembre, y un programa Experto de Abril a Julio. </p>
        <ul>
            <div id="lineaModulo"></div>
            <li>Programa Superior: 
               <li class="subMod" id="subMod1" onclick="displaySub()">Dirección Estratégica.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Dirección Operaciones I.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Técnicas de Negociación.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Finanzas.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Marketing.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">MICE.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Dirección de Personas.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Digital Business.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Entorno Jurídico.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Comunicación Directiva.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Seminarios y Conferencias.</li></li>
            <li>Programa Experto:
               <li class="subMod" id="subMod1" onclick="displaySub()">Análisis Financiero.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Gestión de la Innovación</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Food & Beverage.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Dirección de Ventas.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Dirección Operaciones II.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Canal Directo.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Gestión de Equipos.</li></li>
               <li class="subMod" id="subMod1" onclick="displaySub()">Proyecto Final.</li></li>
        </ul>
    </div>
    
    <div class="fichaDiv" id="imparticion">
        <h2>¿Dónde se imparte?</h2><br>
        <h3>Tenerife</h3>
        <p>
            •	<b>HORARIO:</b> Lunes y miércoles, de 16:30 a 20:45<br><br>
            •	<b>UBICACIÓN:</b> Mare Nostrum Resort (Playa de las Américas).<br><br>
            •	<b>FECHAS:</b> el Programa Superior comenzará el 14 de septiembre y finalizará el 14 de diciembre de 2020. El programa Experto tendrá lugar a principios de abril hasta principios de julio de 2021
        </p><br>
        <h3>Gran Canaria</h3>
        <p>
            •	<b>HORARIO:</b> Lunes y miércoles, de 16:30 a 20:45<br><br>
            •	<b>UBICACIÓN:</b> Hotel Meliá Tamarindos (San Agustín).<br><br>
            •	<b>FECHAS:</b> el Programa Superior comenzará el 16 de septiembre y finalizará el 16 de diciembre de 2020. El Programa Experto tendrá lugar a principios de abril hasta principios de julio de 2021.
        </p><br>
        <h3>Lanzarote</h3>
        <p>
            •	<b>HORARIO:</b> Lunes y Jueves, de 15:45 a 19:45.<br><br>
            •	<b>UBICACIÓN:</b> Lava Beach Hotel (Puerto del Carmen).<br><br>
            •	<b>FECHAS:</b> el Programa Superior comenzará el 17 de septiembre y finalizará el 17 de diciembre de 2020. El Programa Experto tendrá lugar a principios de abril hasta principios de julio de 2021.
        </p><br>
        <h3>Fuerteventura</h3>
        <p>
            •	<b>HORARIO:</b> Martes y Jueves, de 16:00 a 20:00.<br><br>
            •	<b>UBICACIÓN:</b> Hotel Barceló Fuerteventura Thalasso Spa (Caleta de Fuste).<br><br>
            •	<b>FECHAS:</b> el Programa Superior comenzará el 15 de septiembre y finalizará el 15 de diciembre de 2020. El Programa Experto tendrá lugar a principios de abril hasta principios de julio de 2021.
        </p><br>
    </div>
    
    <script type="text/javascript" src="{{asset('js/placeArrows.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/scrollFichaMaster.js')}}"></script>
@stop
@section('footer')