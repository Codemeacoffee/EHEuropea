@extends('registration')
@section('header')
@section('content')
    <section class="section1">
    <?php
        foreach($contacts as $contact){
            foreach ($images as $image){
                if($image->code == $contact->img_code){
                    echo'<img class="slide" src="'.asset($image->img_link).'">';
                }
            }
        }
    ?>
    </section>
    <!--<div class="my-4">
         <div class="col-xl-10 offset-xl-1 col-lg-12 offset-lg-0 col-sm-10 offset-sm-1 col-12 offset-0 px-md-2 px-0">
            <h5 class="text-center mb-4">INFORMACIÓN BÁSICA SOBRE PROTECCIÓN DE DATOS</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Responsable del tratamiento</th>
                        <td>FUERTEVENTURA 2000 S.L.</td>
                    </tr>
                     <tr>
                        <th scope="row">Dirección del responsable</th>
                        <td>Calle Cisneros, 82, Puerto del Rosario 35600</td>
                    </tr>
                     <tr>
                        <th scope="row">Finalidad</th>
                        <td>Sus datos serán usados para poder atender sus solicitudes y prestarle nuestros servicios.</td>
                    </tr>
                     <tr>
                        <th scope="row">Publicidad</th>
                        <td>Solo le enviaremos publicidad con su autorización previa, que podrá facilitarnos mediante la casilla correspondiente establecida al efecto.</td>
                    </tr>
                     <tr>
                        <th scope="row">Legitimación</th>
                        <td>Únicamente trataremos sus datos con su consentimiento previo, que podrá facilitarnos mediante la casilla correspondiente establecida al efecto.</td>
                    </tr>
                     <tr>
                        <th scope="row">Destinatarios</th>
                        <td>Con carácter general, sólo el personal de nuestra entidad que esté debidamente autorizado podrá tener conocimiento de la información que le pedimos.</td>
                    </tr>
                     <tr>
                        <th scope="row">Derechos</th>
                        <td>Tiene derecho a saber qué información tenemos sobre usted, corregirla y eliminarla, tal y como se explica en la información adicional disponible en nuestra página web.</td>
                    </tr>
                     <tr>
                        <th scope="row">Información adicional</th>
                        <td>Más información en el apartado “SUS DATOS SEGUROS” de nuestra página web.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>-->
    <?php
            $num = 0;
            foreach($contacts as $contact){
                $aux = str_replace(' ', '+', $contact->location);
                $gMapLocation = 'https://maps.google.com/maps?q='.$aux.'&t=&z=13&ie=UTF8&iwloc=&output=embed';
                echo'<div class="contacto">';
                echo'<div class="innerContact">';
                echo'<h1>'.$contact->area.'</h1>';
                echo'<div class="contactHalf">';
                echo'<p>Contacto</p>';
                echo'<span><i class="icon-iconos-05"></i>'.$contact->telephone.'</span>';
                echo'<span><i class="icon-iconos-02"></i>'.$contact->email.'</span>';
                echo'<span><i class="icon-iconos-14"></i><p>'.$contact->location.'</p></span>';
                echo'</div>';
                echo'<div class="contactHalf">';
                echo'<p>Horario</p>';
                echo'<span><i class="icon-iconos-12"></i>'.$contact->hours.'</span>';
                echo'<span><i class="icon-iconos-13"></i>'.$contact->days.'</span>';
                echo'</div>';
                echo'</div>';
                echo'<iframe class="googleMap" id="gmap_canvas" src="'.$gMapLocation.'" frameborder="0" scrolling="no"></iframe>';
                echo'<a href="https://www.pureblack.de/google-maps/"></a>';
                echo'</div>';
                $num ++;
            }

    ?>
    <script type="text/javascript" src="{{asset('js/slider.js')}}"></script>
@stop
@section('footer')