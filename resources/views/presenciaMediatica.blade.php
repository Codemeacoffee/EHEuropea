@extends('registration')
@section('header')
@section('content')
    <div id="otherNews">
        <h2>Noticias</h2>
        <div>
            <?php
                $i = 0;
                foreach($news as $new){
                    if($i === 0){
                        echo '<div class="lineNews">';
                    } else if($i % 3 === 0){
                        echo '</div><div class="lineNews">';
                    }
                    $date = explode('-', $new['date']);
                    $shortDate = $date[2] . '/' . $date[1] . '/' . substr($date[0], 2, 4);
            foreach ($images as $image){
                if($new['img_code'] === $image['code']){
                    $img = $image['img_link'];
                    break;
                }
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
    </div>
@stop
@section('footer')
