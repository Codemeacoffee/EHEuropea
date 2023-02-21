@extends('registration')
@section('header')
@section('content')
    <?php
    if(session('message')){
        echo '<div id="floatingMessage">' . session('message') . '</div>';
    }
    ?>
    <div id="frontier">
        <div id="cursoFrontierFull">
            <div class="imgCursoFull">
                <img src="{{asset('images/img_comedor1.jpg')}}">
            </div>
        </div>
    </div>
    <div id="aulas" class="fichaDiv">
        <h2>Alquiler de instalaciones</h2>
        <div id="textoAulas">
            <div>
                <p>
                Escuela de Hostelería Europea pone a su disposición más de 12 instalaciones para eventos y reuniones distribuidas en las siguientes sedes:
                </p>
                <br>
                <ul>
                    <li><i class="fas fa-square"></i>Las Palmas de Gran Canaria: Calle Pérez del Toro, 54 – 56.</li>
                </ul>
                <p>
                    Ambos centros reúnen las condiciones higiénicas, acústicas, eléctricas, de iluminación, ventilación, habitabilidad
                    y seguridad exigidas por la legislación vigente. Y por supuesto, todas las instalaciones son accesibles para
                    personas con movilidad reducida.
                </p>
                <p>
                    Cada una de nuestras instalaciones está equipada con las últimas tecnologías y recursos necesarios para su evento o reunión.
                    Pero además, en caso de que así lo desee, podrá impartir su formación de calidad con nosotros dado que todos y cada
                    uno de nuestros espacios están homologados por el Servicio Canario de Empleo, al disponer de sistema de climatización,
                    extintores, luz de emergencia en cada aula y pasillos, y la correcta señalización de accesibilidad y seguridad.
                </p>
                <span><button onclick="budgetForm('{{URL::to('solicitudInfo')}}')">Solicitar presupuesto</button></span>
            </div>
            <div>
                <?php
                    $item1 =['img_link'=> asset('images/img_aula2.jpg'), 'video'=>0];
                    $item2 =['img_link'=> asset('images/img_aula1.jpg'), 'video'=>0];
                    $item3 =['img_link'=> asset('images/img_cocina1.jpg'), 'video'=>0];
                    $item4 =['img_link'=> asset('images/cocina pajara.jpg'), 'video'=>0];
                    $images = [$item1, $item2, $item3, $item4];
                $routes = array();
                $j = 0;
                echo '<script type="text/javascript">let routes = new Array();let h = 0;';
                foreach($images as $img){
                    echo 'routes[h] = [\'' . asset($img['img_link']) . '\',' . $img['video'] . ']; h++;';
                    $j++;
                }
                echo '</script>';
                echo '<img src="' . asset($images[0]['img_link']) . '" onclick="generateImg(routes, 1)">';
                echo '<div id="subImgCarousel">';
                $i = 0;
                foreach($images as $img){
                    if($i === 0){
                        $i++;
                        continue;
                    }
                    if($img['video'] === 0){
                        echo '<img src="' . asset($img['img_link']) . '" onclick="generateImg(routes, ' . ($i + 1) . ')">';
                        $i++;
                    } else {
                        echo '<span class="spanVideo"><i class="fas fa-play"></i><video class="videoNew" onclick="generateImg(routes, ' . ($i + 1) . ')">
                        <source src="' . asset($img['img_link']) . '" type="video/mp4">
                        <source src="' . asset($img['img_link']) . '" type="video/ogg">
                        Tu navegador no soporte este video.
                        </video></span>';
                        $i++;
                    }
                }
                ?>
            </div>
            </div>
    </div>
    <div class="aboutUsWhoWeAre" id="aulaStuff">
        <h1>Servicios Incluidos</h1>
        <h3>Nuestro servicio de alquiler de instalaciones ofrece, entre otros, los siguientes servicios extra:</h3>
        <div id="boxes">
            <div><i class="icon-iconos-03"></i>
                <p class="boxTitle">Instalaciones informatizadas</p>
                <p class="hiddenText">Equipamiento de última tecnología con pizarra interactiva.</p>
            </div>
            <div><i class="icon-iconos-161"></i>
                <p class="boxTitle">Aulas blancas<br>teóricas</p>
                <p class="hiddenText">Idóneo para conseguir ambientes luminosos y tranquilos. <br/>En una zona de estudio genera una atmósfera serena, ordenada y limpia.</p>
            </div>
            <div><i class="icon-iconos-23"></i>
                <p class="boxTitle">Servicio de captación, publicidad y promoción</p>
                <p class="hiddenText">Nuestro amable y cercano personal de administración se adaptará a todas sus necesidades, incluyendo servicios de publicidad y marketing.</p>
            </div>
            <div><i class="icon-iconos-24"></i>
                <p class="boxTitle">Servicio de formadores</p>
                <p class="hiddenText">Nuestros centros cuentan con un gran número de especialistas en todas aquellas áreas profesionales para las que se pueda requerir formación.</p>
            </div>
            <div><i class="icon-iconos-25"></i>
                <p class="boxTitle">Material didáctico</p>
                <p class="hiddenText">Equipamiento y herramientas necesario para el desarrollo de la Acción Formativa.</p>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $($('#subImgCarousel').children()[$('#subImgCarousel').children().length - 1]).css('margin-right', '0');
        $($('#subImgCarousel').children()[0]).css('margin-left', '0');
    </script>
@stop
@section('footer')