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
                <img  <?php if(strlen($course['img_offset'])>0){echo'style="object-position: '.$course["img_offset"].'"'; } ?> src="{{asset($img['img_link'])}}">
            </div>
        </div>
        <div id="descCursoFull">
            <?php echo '<p><b>' . $course['name'] . '</b>';
            if($course['public'] == 0) {
                echo' Nivel ' . $course['level'] .'';
            }
            echo'</p>';
            ?>
        </div>
        <script type="text/javascript" src="{{asset('js/fichas.js')}}"></script>
        <?php echo '<script type="text/javascript">fichaParts('. $course['id'] . ');</script>'?>
    </div>
    <div id="cajaPreins">
        <div <?php if($course['public'] != 0) echo 'style="display:none;"'; ?>><i class="icon-iconos-12"></i><p><b>Horas</b><br><?php echo $course['hours']?></p></div>
        <div <?php if($course['public'] != 0 || $course['presencial'] || $course['display'] == 2) echo 'style="display:none;"'; ?>><i class="icon-iconos-13"></i><div class="gridP"><b>Fecha Inicio</b><?php
                $date = explode('-', $course['init_date']);
                echo '<p>'.$date[2] . '/' . $date[1] . '/' . substr($date[0], 2, 4) . '</p>'?></div></div>
        <div <?php if($course['public'] != 0) echo 'style="display:none;"'; ?><?php if($course['display'] == 2) echo 'style="display:none;"'; ?>><i class="icon-iconos-12"></i><p><b>Horario</b><br><?php $split = explode('-', $course['schedule']); echo$split[0].' - '.$split[1];  ?></p></div>
        <?php
        if($course['display'] == 2){
            echo '<div>';
            echo '<i class="icon-iconos-13"></i>';
            echo '<p><b>Fecha Inicio</b><br/>Próximamente</p>';
            echo '</div>';
        }
        ?>
        <div <?php if($course['public'] != 0) echo 'style="display:none;"'; ?>><i class="icon-iconos-111"></i><p><b>Asistencia</b><br><?php
                if($course['location'] == 'Teleformación'){
                    echo 'Teleformación';
                }else{
                    switch ($course['presencial']){
                    case 0:
                        echo'Presencial';
                        break;
                    case 1:
                        echo 'Semipresencial';
                        break;
                    case 2:
                        echo 'Teleformación';
                        break;
                }
                }
        
                ?></p></div>
        <div <?php if($course['location'] == 'Teleformación') echo 'style="display:none;"' ?>><i class="icon-iconos-14"></i><p><b>Ubicación</b><br><?php echo $course['location']?></p></div>
        <button onclick="preForm('<?php echo $course['id']?>', '{{URL::to('preRegistration')}}')">Preinscríbete</button>
    </div>
    <div class="fichaDiv" id="presentacion">
        <h2>Presentación</h2>
        <pre style="white-space:pre-wrap;"><p><?php echo $course['description']?></p></pre>
    </div>
    <div class="fichaDiv" <?php 
    if(Count($modules) < 1){
        echo 'style="display:none;"';
    }else{
        echo 'id="modulos"';
    } 
    ?>>
        <h2>Módulos Formativos</h2>
        <p>A través de los siguientes módulos formativos, conseguiremos que el alumnado adquiera los competencias necesarias para convertirse en un profesional del sector elegido.</p>
        <ul>
            <div id="lineaModulo"></div>
            <?php
            $totalHours = 0;
            foreach($modules as $module){
                $numAlterUnit = 1;
                if (strpos($module['code'], '-') !== false) {
                    $temporal = explode('-', $module['code']);
                    if($temporal[0] == 'AM'){
                        $alterCode = 'Módulo '.$numAlterMod;
                    }
                }
                $totalHours += $module['hours'];
                if(strlen($alterCode)>0){
                    if($module['hours']>0){
                        echo '<li><b>' . $alterCode . ': </b>' . $module['name'] . '<span class="horasModulo">' . $module['hours'] . '</span>';
                    }else{
                        echo '<li><b>' . $alterCode . ': </b>' . $module['name'] . '<span class="horasModulo"></span>';
                    }
                }else{
                    echo '<li><b>' . $module['code'] . ': </b>' . $module['name'] . '<span class="horasModulo">' . $module['hours'] . '</span>';
                }
                $unitForms = $units[$module['code']];
                foreach($unitForms as $unitForm){
                    if (strpos($unitForm['code'], '-') !== false) {
                        $temporal = explode('-', $unitForm['code']);
                        if($temporal[0] == 'AU'){
                            $alterCode = 'Unidad '.$numAlterUnit;
                        }
                    }
                    if(strlen($alterCode)>0 ){
                        if($unitForm['hours']>0){
                            echo '<li class="subMod" id="subMod1" onclick="displaySub()"><b>' . $alterCode . ': </b>' . $unitForm['name'] . '<span class="horasModulo">' . $unitForm['hours'] . '</span></li></li>';
                        }else{
                            echo '<li class="subMod" id="subMod1" onclick="displaySub()"><b>' . $alterCode . ': </b>' . $unitForm['name'] . '<span class="horasModulo"></span></li></li>';
                        }
                    }else{
                        echo '<li class="subMod" id="subMod1" onclick="displaySub()"><b>' . $unitForm['code'] . ': </b>' . $unitForm['name'] . '<span class="horasModulo">' . $unitForm['hours'] . '</span></li></li>';
                    }
                    $numAlterUnit++;
                }
                $numAlterMod++;
            }
            if($totalHours >0){
                echo '<li><span id="total">Total</span><span class="horasModulo">' . $totalHours .'</span></li>';
            }else{
                echo '<li style="display: none"><span id="total">Total</span><span class="horasModulo">' . $totalHours .'</span></li>';
            }
            ?>
        </ul>
    </div>
    <div class="fichaDiv" <?php 
    if(Count($departures) < 1){
        echo 'style="display:none;"';
    }else{
        echo 'id="salidasProfesionales"';
    } 
    ?>>
        <h2>Salidas profesionales</h2>
        <p>En un mercado en el que la duración de los contratos y las condiciones laborales son cada vez más inestables, en la Escuela de Hostelería Europea centramos nuestros esfuerzos en que los profesionales que formamos obtengan titulaciones atractivas para el sector empresarial.
            <br><br>
            Esto se consigue estableciendo un vínculo cercano con multitud de empresas del sector, quienes nos ven como una fuente de profesionales cualificados confiables que a su vez ayuden a mejorar tanto el estándar de sus servicios, como la atención a su clientela y por consecuencia la calidad de su oferta.
            <br><br>
            Así pues, a continuación te exponemos la lista de ocupaciones o puestos de trabajo para los que estarás cualificado con este curso:
        </p>
        <div id="salidas">
            <?php
            $i = 0;
            foreach($departures as $departure){
                foreach($departure as $item){
                    echo '<li><img class="square" src="'.asset('images/square.png').'"/>'.$item['name'] . '</li>';
                }
                $i++;
            }
          ?>
        </div>
    </div>
    <div class="fichaDiv" <?php 
        if($course['public'] == 0){
            echo 'id="requisitosL"';
        }else{
            echo 'style="display:none;"';
        }
    ?> >
        <h2>Requisitos</h2>
        <div id="requirements">
            <table>
                <?php
                if($course['level'] == 1){
                    echo '
                <tr id="desiredLevel">
                    <td></i>Nivel 1</td>
                    <td><div class="line"></div>NO REQUIERE NINGUNA TITULACIÓN</td>
                </tr>';
                } else {
                    echo '<tr>
                    <td>Nivel 1</td>
                    <td><div class="line"></div>NO REQUIERE NINGUNA TITULACIÓN</td>
                </tr>';
                }

                if($course['level'] == 2){
                    echo '<tr id="desiredLevel">
                    <td>Nivel 2</td>
                    <td>
                        <div class="line"></div>
                        <ul>
                            <li><i class="fas fa-square"></i><p>Haber obtenido un certificado de Nivel 1 en la misma familia profesional.</p></li>
                            <li><i class="fas fa-square"></i><p>Graduado en ESO.</p></li>
                        </ul>
                    </td>
                </tr>';
                } else {
                    echo '<tr>
                    <td>Nivel 2</td>
                    <td>
                        <div class="line"></div>
                        <ul>
                            <li><i class="fas fa-square"></i><p>Haber obtenido un certificado de Nivel 1 en la misma familia profesional.</p></li>
                            <li><i class="fas fa-square"></i><p>Graduado en ESO.</p></li>
                        </ul>
                    </td>
                </tr>';
                }
                if($course['level'] == 3){
                    echo '<tr id="desiredLevel">
                    <td>Nivel 3</td>
                    <td>
                        <div class="line"></div>
                        <ul>
                            <li><i class="fas fa-square"></i><p>Haber obtenido un certificado de Nivel 2 en la misma familia profesional.</p></li>
                            <li><i class="fas fa-square"></i><p>Bachillerato.</p></li>
                        </ul>
                    </td>
                </tr>';
                } else {
                    echo '<tr>
                    <td>Nivel 3</td>
                    <td>
                        <div class="line"></div>
                        <ul>
                            <li><i class="fas fa-square"></i><p>Haber obtenido un certificado de Nivel 2 en la misma familia profesional.</p></li>
                            <li><i class="fas fa-square"></i><p>Bachillerato.</p></li>
                        </ul>
                    </td>
                </tr>';
                }
                ?>
            </table>
        </div>
    </div>
    <div id="cursos">
        <h2>Otros cursos</h2>
        <div style="overflow: auto">
            <div id="cursosCarousel" class="frontierCarousel">
                <?php
                $i = 0;
                $img = '';
                foreach($otherCourses as $courses){
                    foreach($courses as $cours) {
                        $img = asset(\Eheuropea\Image::where('code', $cours['img_code'])->get()->first()['img_link']);
                        $date = explode('-', $cours['init_date']);
                        $shortDate = $date[2] . '/' . $date[1]. '/' . $date[0];

                        if($i != 2){
                            echo '<div class="cursoEffect " >';
                        }else{
                            echo '<div class="cursoEffect" style="margin-right:5vw;">';
                        }
                        echo'<a href="'. URL::to('curso/'. $cours['name'].'?key='.$cours['id']) . '">
                        <img src="'.asset($img).'"/>
                        <div class="overBox">
                            <p>' . $cours['name'] . '</p>
                            <div>
                                <span><i class="icon-iconos-14"></i>' . $cours['location'] .'</span>';
                        if($cours->display ==2){
                            echo '<span><i class="icon-iconos-13"></i>Próximamente</span>';
                        }else{
                            echo '<span><i class="icon-iconos-13"></i>' . $shortDate .'</span>';
                        }

                        echo'<span><i class="icon-iconos-12"></i>' . $cours['hours'] .'</span>
                            </div>
                        </div>
                     </a>
                     <div class="countDownInfo">
                        <div>
                            <h1>' . $cours['name'] . '</h1>
                            <p>' . $cours['description'] . '</p>
                            <a href="' . URL::to('curso/'. $cours['name'].'?key='.$cours['id']).'">
                                <button>Ver más</button>
                            </a>
                        </div>
                    </div>
              </div>';
                        $i++;
                    }
                }
                if($i % 3 !== 0){
                    for($j = $i; $j <= 3; $j++){
                        if($i % 3 === 0){
                            break;
                        } else {
                            echo '<div class="cursoEffect invisibleBox"></div>';
                        }
                        $j++;
                    }
                }?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/placeArrows.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/scrollFicha.js')}}"></script>
@stop
@section('footer')