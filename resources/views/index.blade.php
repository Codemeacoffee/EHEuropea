@extends('registration')
@section('header')
@section('content')
    <?php
    if(session('message')){
        echo '<div id="floatingMessage">' . session('message') . '</div>';
    }
    ?>
    
<!--Pop up-->
<!--<div class="modal fade" id="projectsModal" tabindex="-1" role="dialog" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header w-100">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span style="float:right; font-size: 30px;" aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body p-0">-->
<!--              <img class="w-100" src="{{asset('images/recogidadejuguetes_nformar.png')}}">-->
<!--            </div>-->
            
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
    
<script type="text/javascript">
    // $(window).on('load', function () {
    //   $('#projectsModal').modal('toggle');
    // });
</script>

<!--Pop up-->
    
    
        <div id="cursoFrontier">
        </div>
        <div class="container-fluid">
             <div class="row">
            <div class="col-12 text-center">
                <a href="innobonos"><img src="{{asset('images/innobonos-logo.png')}}" style="object-fit: cover" class="w-50"></a>
            </div>
        </div>
        </div>
       

    <div id="cursos">
        <div id="oxfordTestCard">
            <a data-ed="{{url('oxfordTestOfEnglish')}}" href="{{url('oxfordTestOfEnglish')}}">
                <div class="card">
                    <img src="{{asset('images/oxfordCertificate.svg')}}">
                    <div class="container" style="float:right;">
                        <h4><b>Oxford Test</b></h4>
                        <p>of English</p>
                    </div>
                </div>
            </a>
        </div>
        <h2>Próximos cursos</h2>
        <div style="overflow: auto">
        <div id="cursosCarousel" class="frontierCarousel">
            <?php
                $i = 0;
                $img = '';
                foreach($courses as $cours){
                    foreach($images as $image){
                        if($cours['img_code'] === $image['code']){
                            $img = asset($image['img_link']);
                        }
                    }
                    $display = $cours->display;
                    $date = explode('-', $cours['init_date']);
                    $shortDate = $date[2] . '/' . $date[1] . '/' . substr($date[0], 2, 4);
                    $url = URL::to('curso/'. $cours['name'].'?key='.$cours["id"].'');
                    if($i != 2){
                        echo '<div class="cursoEffect diagonalLine" >';
                    }else{
                        echo '<div class="cursoEffect diagonalLine" style="margin-right:5vw;">';
                    }
                    if($cours->public == 0){
                         switch ($cours->type) {
                            case 0:
                                echo'<p class="tag">Trabajadores</p>';
                                break;
                            case 1:
                                echo'<p class="tag">Desempleados</p>';
                                break;
                        }
                    }else{
                         echo'<p class="tag">Curso Privado</p>';
                    }
                    echo'<img alt="Curso '.$cours['name'].'" src="' . $img . '"/>';
                    echo '<div class="overBox"><p>'.$cours['name']. '</p>';
                    if($cours->public != 1 && $cours->public !=2){
                        echo'<p style="font-weight: lighter"> Nivel ' .$cours['level'] .'</p>';
                        echo'<div><span><i class="icon-iconos-14"></i>'.$cours['location'].'</span>';
                        if($cours->display ==2){
                            echo '<span><i class="icon-iconos-13"></i>Próximamente</span><span><i class="icon-iconos-12"></i>' . $cours['hours'] .'</span></div>';
                        }else{
                            echo '<span><i class="icon-iconos-13"></i>' . $shortDate .'</span><span><i class="icon-iconos-12"></i>' . $cours['hours'] .'</span></div>';
                        }
                    }
                    echo '</div><div class="countDownInfo"><div><h1>' . $cours['name'] .'</h1><p>' . $cours['description'] . '</p><a href="' . URL::to('curso/'. $cours['name'] .'?key='.$cours["id"].'').'"><button>Ver más</button></a></div></div>
                </a></div>';
                    $i++;
                }
            if($i % 3 !== 0){
            for($j = $i; $j <= $i + 3; $j++){
                if($i % 3 === 0){
                    break;
                } else {
                    echo '<div class="cursoEffect invisibleBox"></div>';
                }
                $i++;
            }}?>
            </div>
        </div>
    </div>
    <div id="noticias">
        <h2>Noticias</h2>
        <?php
        if(sizeof($news) > 0){
            $i = 0;
            echo '<div class="noticiasleft">';
            foreach($news as $new){
                if($i === 3){
                    break;
                }
            foreach($images as $image){
                if($new['img_code'] === $image['code']){
                    $img = $image['img_link'];
                    break;
                }
            }
            $splitDate = explode('-', $new['date']);
            switch ($splitDate[1]){
                case 1:
                    $splitDate[1] = 'ENE';
                    break;
                case 2:
                    $splitDate[1] = 'FEB';
                    break;
                case 3:
                    $splitDate[1] = 'MAR';
                    break;
                case 4:
                    $splitDate[1] = 'ABR';
                    break;
                case 5:
                    $splitDate[1] = 'MAY';
                    break;
                case 6:
                    $splitDate[1] = 'JUN';
                    break;
                case 7:
                    $splitDate[1] = 'JUL';
                    break;
                case 8:
                    $splitDate[1] = 'AGO';
                    break;
                case 9:
                    $splitDate[1] = 'SEP';
                    break;
                case 10:
                    $splitDate[1] = 'OCT';
                    break;
                case 11:
                    $splitDate[1] = 'NOV';
                    break;
                case 12:
                    $splitDate[1] = 'DIC';
                    break;
            }
                echo '
                    <a href="' . URL::to('noticias/' . $new['title']) . '"><ul class="new">
                    <li><p><span></span><br><span></span><br><span></span></p></li>
                    <li><p>' . $new['title'] . '</p></li>
                    <li><img alt="Noticia '.$new['title'].'" src="'.asset($img).'"></li>
                    </ul></a>';
                    // <li><p><span>' . $splitDate[2] . '</span><br><span>' . $splitDate[1] . '</span><br><span>' . $splitDate[0] .'</span></p></li>
            $i++;
        }
        echo '</div>';
            echo '<div class="noticiasRight">
            <a href="' . URL::to('noticias') . '"><div>
                <p>Más Noticias</p>
                <img src="'. asset($img) . '">
            </div></a></div>';
        }
        ?>

    </div>
    <script type="text/javascript" src="{{asset('js/overflow.js')}}"></script>
    <script type="text/javascript">
        <?php
            echo 'let categorias = new Array();
            let i = 0;';
                foreach ($frontierContent as $item) {
                    echo 'categorias[i] = [' . $item[0] . ',"' . $item[1] . '"];
                    i++;';
        }
        echo 'let images = ' .$images. ';';
        ?>
        let acu = 0;
        function carouselFrontier(){
            if(acu === categorias.length){
                acu = 0;
            }
            let img;
            for(let i = 0; i < images.length; i++){
                if(images[i]['code'] === categorias[acu][0]['img_code']){
                    img = images[i]['img_link'];
                    break;
                }
            }
            <?php
            echo 'if(categorias[acu][1] === "course"){
                let action = \''. URL::to('preRegistration').'\';
                let course = \''. URL::to('curso/\''. ' + categorias[acu][0][\'name\'] '.'+"?key="+categorias[acu][0][\'id\']').';
                $(\'#cursoFrontier\').html(
                    "<div id=\'descCurso\'>" +
                    "<p>" + categorias[acu][0][\'name\'] + "</p>" +
                    "<p>Nivel " + categorias[acu][0][\'level\'] + "</p>" +
                    "<button onclick=\"preForm(\'" + categorias[acu][0][\'id\'] + "\' , \'" + action + "\')\">Preinscríbete</button>" +
                    "</div>" +
                    "<div class=\'imgCurso\'>" +
                    "<a href=\"" + course + "\"><img id=\'courseCarrImage\' src=\'" + img + "\'></a>" +
                    "</div>");
                    if(categorias[acu][0][\'img_offset\'] != undefined){
                          $(\'#courseCarrImage\').css(\'object-position\', categorias[acu][0][\'img_offset\']);
                    };
            }';?>
            acu++;
            setTimeout(carouselFrontier, 5000);
        }
        carouselFrontier();
    </script>
@stop
@section('footer')