@extends('registration')
@section('header')
@section('content')
    <div class="cursosBox ml-5 mr-4 selectViewMode">
        <?php echo '<h1>' . $type . '</h1>';?>
        <button class="viewMode listMode buttonSelected"><i class="glyphicon glyphicon-th-list"></i></button>
        <button class="viewMode normalMode"><i class="glyphicon glyphicon-th-large"></i></button>
    </div>
    <div class="cursosBox standartViewMode">
        <div class="cursosInner">
            <?php
                if(isset($courses) && sizeof($courses) > 0){
                    $acu = 0;
            foreach($courses as $cours){
                if($acu === 0){
                    echo '<div class="lineCursos">';
                } else if($acu % 3 === 0){
                    echo '</div><div class="lineCursos">';
                }
                foreach($images as $image){
                    if($cours['img_code'] === $image['code']){
                        $img = asset($image['img_link']);
                    }
                }
                    $date = explode('-', $cours['init_date']);
                    $shortDate = $date[2] . '/' . $date[1] . '/' . substr($date[0], 2, 4);
                    echo
                        '<div class="cursoEffect">
                            <img data-src="' . $img . '"/>
                            <div class="overBox">
                                <p>'.$cours['name']. '</p>';
                if($cours->public != 1 && $cours->public !=2){
                    echo'<p style="font-weight: lighter"> Nivel ' .$cours['level'] .'</p>';
                    echo'<div><span><i class="icon-iconos-14"></i>'.$cours['location'].'</span>';
                    if($cours->display ==2){
                        echo '<span><i class="icon-iconos-13"></i>Próximamente</span><span><i class="icon-iconos-12"></i>' . $cours['hours'] .'</span></div>';
                    }else{
                        echo '<span><i class="icon-iconos-13"></i>' . $shortDate .'</span><span><i class="icon-iconos-12"></i>' . $cours['hours'] .'</span></div>';
                    }
                }
                            echo'</div>
                        <div class="countDownInfo">
                            <div><h1>' . $cours['name'] . '</h1><p>' . $cours['description'] . '</p>
                            <a href="' . URL::to('curso/'. $cours['name'].'?key='.$cours['id']).'">
                                <button>Ver más</button>
                            </a></div>
                        </div>
                    </div>';
                    $acu++;
            }
            if($acu % 3 !== 0){
                for($i = $acu; $i <= $acu + 3; $i++){
                    if($acu % 3 === 0){
                        break;
                    } else {
                        echo '<div class="cursoEffect invisibleBox"></div>';
                    }
                    $acu++;
                }
                }} else {
                    echo '<div class="lineCursos">
                            <div class="blueBox"><p>En este momento no tenemos cursos disponibles de formación a medida. Puedes consultar nuestro catálogo de cursos <a href="' . URL::to('cursos') . '">aquí</a></div>
                            <div class="blueBox invisibleBox"></div>
                            <div class="blueBox invisibleBox"></div>
                            </div>';
            }?>
        </div>
    </div>
    </div>
    </div>
    <div class="mt-4 listViewMode w-100" style="overflow-x:auto;">
    <?php 
    if((isset($courses) && sizeof($courses) == 0)){
        echo '<div class="ml-3 mr-3" style="margin-left: 10%; margin-top: 3rem;">
        <p>En este momento no tenemos cursos disponibles de formación a medida. Puedes consultar nuestro catálogo de cursos <a href="' . URL::to('cursos') . '" style="color: #008acf;">aquí</a></p>
        </div>';
    } else {
        echo'
        <table class="coursesTable" border="1">
            <tr class="tableHead">
                <th>Nombre</th>
                <th>Nivel</th>
                <th>Lugar de impartición</th>
                <th>Fecha de inicio</th>
                <th>Tipo de curso</th>
                <th>Información Curso</th>
            </tr>';
            if(isset($courses) && sizeof($courses) > 0){
                foreach ($courses as $course){
                    if($course->display !=2){
                        $date = explode('-', $course['init_date']);
                        $shortDate = $date[2] . '/' . $date[1] . '/' . substr($date[0], 2, 4);
                        echo'<tr>
                            <th>'.$course['name'].'</th><th style="padding:3rem">';
                        if($course['level'] == 0){
                            echo'–';
                        } else {
                            echo $course['level'];
                            echo'</th>';
                        }
                        echo'<th style="padding:3rem">'.$course['location'].'</th>';
                        echo'<th style="padding:3rem">'.$shortDate.'</th>';
                        if($course['type'] == 0){
                            echo'<th style="padding:3rem">Ocupados</th>';
                        } else if($course['type'] == 1){
                            echo'<th style="padding:3rem">Desempleados</th>';
                        }
                        echo'<th><a class="d-flex" href="' . URL::to('curso/'. $course['name'].'?key='.$course['id']).'"><p class="text-center">Ver más</p> <i class="glyphicon glyphicon-list-alt centerHorizontal" style="color: #008acf; font-size: 2rem"></i></a></th>
                        </tr>';
                    }
                    
                }
            }
    
            if(isset($courses) && sizeof($courses) > 0){
                foreach ($courses as $course){
                    if($course->display == 2){
                        $date = explode('-', $course['init_date']);
                        $shortDate = $date[2] . '/' . $date[1] . '/' . substr($date[0], 2, 4);
                        echo'<tr>
                            <th>'.$course['name'].'</th><th style="padding:3rem">';
                        if($course['level'] == 0){
                            echo'–';
                        } else {
                            echo $course['level'];
                            echo'</th>';
                        }
                        echo'<th style="padding:3rem">'.$course['location'].'</th>';
                        echo'<th style="padding:3rem">Próximamente</th>';
                        
                        if($course['type'] == 0){
                            echo'<th style="padding:3rem">Ocupados</th>';
                        } else if($course['type'] == 1){
                            echo'<th style="padding:3rem">Desempleados</th>';
                        }
                        echo'<th><a class="d-flex" href="' . URL::to('curso/'. $course['name'].'?key='.$course['id']).'"><p class="text-center">Ver más</p> <i class="glyphicon glyphicon-list-alt centerHorizontal" style="color: #008acf; font-size: 2rem"></i></a></th>
                        </tr>';
                    }
                    
                }
            }
            
            echo'</table>';
    }
    ?>
    </div>
    
    <script type="text/javascript" src="{{asset('js/courseMode.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/carouselResponsive.js')}}"></script>
@stop
@section('footer')