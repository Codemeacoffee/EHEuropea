@extends('registration')
@section('header')
@section('content')
    <div class="cajaInvisible" id="GC"></div>
    <div class="cursosBox ml-5 mr-4 selectViewMode"> 
        <?php echo '<h1>' . $type . '</h1>';?>
    </div>
    <div class="cursosBox">
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
                            <div class="blueBox"><p>No hay cursos disponibles en este momento, pero puedes ver nuestros <a href="' . URL::to('cursos') . '">otros cursos</a></div>
                            <div class="blueBox invisibleBox"></div>
                            <div class="blueBox invisibleBox"></div>
                            </div>';
            }?>
        </div>
    </div>
    </div>
    </div>
    
    <script type="text/javascript" src="{{asset('js/courseMode.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/carouselResponsive.js')}}"></script>
@stop
@section('footer')