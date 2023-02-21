@extends('registration')
@section('header')
@section('content')
    <div id="frontier">
        <div id="cursoFrontierFull">
            <div class="imgCursoFull">
                <img src="<?php echo asset($images[0]['img_link'])?>">
            </div>
        </div>
    </div>
    <div id="noticia" class="fichaDiv">
        <h2><?php echo $new['title']?></h2>
        <!--<i class="icon-iconos-13"></i><b>
        <?php 
        // echo explode('-', $new['date'])[2] . '/' . explode('-', $new['date'])[1] . '/' . substr(explode('-', $new['date'])[0], 2, 4)
        ?></b>-->
            <div id="sectoresNoticia">
            <div>
            <?php
            $text = preg_split('/[\r\n]/', htmlspecialchars_decode($new['text']));
            $fullText = '';
            foreach($text as $part){
                $fullText .= '<p>' . $part . '</p>';
            }
            echo $fullText?>
            </div>
            <div>
            <?php
                $routes = array();
                echo '<script type="text/javascript">let routes = new Array();let h = 0;';
                for($i =1; $i<count($images); $i++){
                     echo 'routes[h] = [\'' . asset($images[$i]['img_link']) . '\',' . $images[$i]['video'] . ']; h++;';
                }
                echo '</script>';
                echo'<div class="carrouselFullBox">';
                if(isset($images[1])){
                    echo '<img src="'.asset($images[1]['img_link']) . '" onclick="generateImg(routes, 1)">';
                echo '<div id="subImgCarousel">';
                for($i=2; $i<count($images); $i++){
                    if($images[$i]['video'] === 0){
                        echo '<img src="' . asset($images[$i]['img_link']) . '" onclick="generateImg(routes, ' . ($i) . ')">';
                    } else {
                        echo '<span class="spanVideo"><i class="fas fa-play"></i><video class="videoNew" onclick="generateImg(routes, ' . ($i) . ')">
                        <source src="' . asset($images[$i]['img_link']) . '" type="video/mp4">
                        <source src="' . asset($images[$i]['img_link']) . '" type="video/ogg">
                        Tu navegador no soporte este video.
                        </video></span>';
                    }
                }
                }
                ?>
                </div>
                </div>
             </div>
        </div>
    </div>
    <div id="newsArrows">
        <?php
            foreach($otherImages as $otherImage){
                if(isset($otherNews[0])){
                    if($otherNews[0]['img_code'] === $otherImage['code']){
                        $img = $otherImage['img_link'];
                    }
                }
                if(isset($otherNews[1])){
                    if($otherNews[1]['img_code'] === $otherImage['code']){
                        $img2 = $otherImage['img_link'];
                    }
                }
            };
            if(isset($img)){
                echo '<a href="'. URL::to('noticias/' . $otherNews[0]['title']) . '"><div id="leftArrow" class="arrow">
            <i class="icon-iconos-15 arrowIcon"></i><p>'.$otherNews[0]['title'].'</p>
        </div></a>';
            }
            if(isset($img2)){
                echo '<a href="'. URL::to('noticias/' . $otherNews[1]['title']) . '"><div id="rightArrow" class="arrow">
            <p>'.$otherNews[1]['title'].'</p><i class="icon-iconos-16 arrowIcon"></i>
        </div></a>';
            }
        ?>
    </div>
    <div id="otherNews">
        <h2>Otras noticias</h2>
        <div>
            <?php
            $i = 0;
            foreach($otherNews as $new){
                $img = '';
                if($i === 0){
                    echo '<div class="lineNews">';
                } else if($i % 3 === 0){
                    echo '</div><div class="lineNews">';
                }
                $date = explode('-', $new['date']);
                $shortDate = $date[2] . '/' . $date[1] . '/' . substr($date[0], 2, 4);
                foreach ($images as $image){
                    $img = asset(\Eheuropea\Image::where('code', $new['img_code'])->get()->first()['img_link']);
                }
                //<i class="icon-iconos-13"></i>' . $shortDate . '
                $text = strip_tags(htmlspecialchars_decode($new['text']));
                echo '<div class="cursoEffect">
                     <a href="'. URL::to('noticias/' . $new['title']) . '">
                        <img src="'.asset($img).'"/>
                        <div class="overBox">
                            <p>' . $new['title'] . '</p>
                            <div>
                                <span>
                                    <i class=""></i>
                                </span>
                            </div>
                        </div>
                     </a>
                     <div class="countDownInfo">
                        <div>
                            <h1>' . $new['title'] . '</h1>
                            <p>' . $text . '</p>
                            <a href="' . URL::to('noticias/'. $new['title']).'">
                                <button>Ver más</button>
                            </a>
                        </div>
                    </div>
              </div>';
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
                }
            }?>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $($('#subImgCarousel').children()[$('#subImgCarousel').children().length - 1]).css('margin-right', '0');
        $($('#subImgCarousel').children()[0]).css('margin-left', '0');
    </script>
@stop
@section('footer')