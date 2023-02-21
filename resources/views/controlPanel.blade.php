<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <title>EHEuropea - Panel de Control</title>
    <meta name="author" content="INVERSIONES BORMA S.L.">
    <meta name="keywords" content="eheuropea, escuela hostelería europea, escuela hostelería, escuela europea hosteleria,
        formacion gratuita, formacion gratis, formacion desempleados gratis, formacion trabajadores gratis, escuela, hostelería, europea,
        formación, desempleados, trabajadores, gratuita, gratuito, cocina, cafetería, bar, restaurante, cursos, educación, enseñanza, estudios,
        aprendizaje, gratis, formación bonificada, cursos sepe, cursos desempleados, sepe, cursos fundae, fundae, servicio canario empleo,
        cursos servicio canario empleo, cursos hostelería, cursos restaurante, cursos cafetería, certificado calidad, calidad,
        certificado profesionalidad, compromiso contratación, agencia colocación, bolsa trabajo, gran canaria, fuerteventura.">
    <meta name="description" content="La Escuela de Hostelería Europea es una entidad reconocida y acreditada por el Servicio Canario de
        Empleo para la impartición de Cursos de Formación Profesional para el Empleo">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#008ACF"/>
    <meta name="msapplication-navbutton-color" content="#008ACF"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#008ACF"/>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="_token2" content="{{csrf_token()}}"/>
    <link rel="shortcut icon" type="image/png" href= "{{asset('images/favicon-01.png')}}"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/equipo.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/news.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/secondary.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/Ehe_Fonts/style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui-1.12.1/jquery-ui.js')}}"></script>
</head>
<body>
<div id="outerNavBar" style="top: 0; z-index: 10001;">
    <a href="{{URL::to('admin')}}"><img style=" margin: 1rem auto 1rem auto; display: block;" src="{{asset('images/Ehe_logo.svg')}}"/></a>
</div>
    <div class="leftHalf">
        <i id="openNav" onclick="displayNavBar($('#closeNav'))" class="icon-iconos-18"></i>
       <i id="closeNav"  onclick="closeNavBar($(this))" class="icon-iconos-17"></i>
        <div class="adminInner">
            <p id="displayCourses" onclick="displayCourses()">Cursos</p>
             <p id="displayNews" onclick="displayNews()">Noticias</p>
            <p id="displayContact" onclick="displayContacts()">Contactos</p>
            <a href="closeSession"><button class="sessionClose">Cerrar Sesión</button></a>
        </div>
    </div>
    <div class="rightHalf">
        <div class="adminInner">
            <div id="courses">
                <script type="text/javascript">let dataList = [];
                    <?php
                    echo'let defaultImage ="'.asset('images/adminAddPhoto.svg').'";';
                    echo'let uploadCourse = "'.action('AdminController@addCourse').'";';
                    echo'let editContact = "'.action('AdminController@updateContact').'";';
                    echo'let editCourse ="'.action('AdminController@editCourse').'";';
                    echo'let uploadNew ="'.action('AdminController@uploadNew').'";';
                    echo'let uploadContact ="'.action('AdminController@uploadContact').'";';
                    echo'let editNew = "'.action('AdminController@editNew').'"'
                    ?>
                   </script>
                <div class="filterBar">
                    <div class='containerEdit'>
                        <span>Nombre</span>
                        <input onkeyup="filterCourses(($('#courseFilterName').val()),($('#filterLevel').val()),($('#filterLocation').val()),($('#courseFilterSector').val()))" id="courseFilterName" type="text">
                    </div>
                    <div class='containerEdit'>
                        <span>Sector</span>
                        <input spellcheck="false" onfocusout="($(this).parent().find('div:first')).html('')" onfocusin="ajaxFilterSector($(this).val(), $(this), ($(this).parent().find('div:first')))" onchange="filterCourses(($('#courseFilterName').val()),($('#filterLevel').val()),($('#filterLocation').val()),($('#courseFilterSector').val()));" onkeyup="filterCourses(($('#courseFilterName').val()),($('#filterLevel').val()),($('#filterLocation').val()),($('#courseFilterSector').val()));ajaxFilterSector($(this).val(), $(this), ($(this).parent().find('div:first')))" id="courseFilterSector" type="text">
                        <div id="ajaxContainer"></div>
                    </div>
                    <div class="containerEdit">
                        <span>Nivel</span>
                        <select onchange="filterCourses(($('#courseFilterName').val()),($('#filterLevel').val()),($('#filterLocation').val()),($('#courseFilterSector').val()))" id="filterLevel">
                            <option name=""></option>
                            <option name="1">1</option>
                            <option name="2">2</option>
                            <option name="3">3</option>
                        </select>
                    </div>
                    <div class="containerEdit">
                        <span>Ubicación</span>
                        <select onchange="filterCourses(($('#courseFilterName').val()),($('#filterLevel').val()),($('#filterLocation').val()),($('#courseFilterSector').val()))" id="filterLocation">
                            <option name=""></option>
                            <option name="Gran Canaria">Gran Canaria</option>
                            <option name="Fuerteventura">Fuerteventura</option>
                        </select>
                    </div>
                </div>
                <div class="course" id="addCourse" onclick="displayAddCourse()">
                    <div class="circle plus"></div>
                    <div><p class="addTitle">Añadir Curso</p></div>
                </div>
                <?php
                    $num = 1;
                    $num2 = 1;
                    $num3 = 1;
                    $num4 = 0;
                foreach ($courses as $course){
                    $date = new DateTime($course->init_date);
                    $now = new DateTime();
                    $date->modify('+1 day');
                    if($course['visibility'] == '1' || ($date<$now && $course['public'] != '1')){
                        echo'<div id="outdated" class="course">';
                    }else if($course['public'] == '1' && $course['visibility'] == '0'){
                        echo'<div class="course">';
                    }else {
                        echo'<div class="course">';
                    }
                    echo'<form id="deleteCourseForm'.$num.'" method="post" style="display: none" action="'.action('AdminController@editCourse').'">';
                    echo csrf_field();
                    echo'<input type="hidden" name="oldTitle" value="'.$course->id.'">';
                    echo'<input type="hidden" name="delete" value="delete">';
                    echo'</form>';
                    echo'<script type="text/javascript">
                        let wrapperArray'.$num.' = [];
                        let data'.$num.' = '.json_encode($course).';
                        wrapperArray'.$num.'.push(data'.$num.');
                        let modsUnits'.$num.' = [];
                        wrapperArray'.$num.'.push(modsUnits'.$num.');
                        let depart'.$num.' = [];
                        wrapperArray'.$num.'.push(depart'.$num.');
                        </script>';
                    foreach($relationCourseModule as $relation){
                        if($course->id == $relation->id_course){
                            foreach ($modules as $module){
                                if($relation->cod_mod == $module->code){
                                    echo'<script>let innerArray'.$num2.'=[]; let modules'.$num2.'='.json_encode($module).'; innerArray'.$num2.'.push(modules'.$num2.');</script>';
                                    foreach ($relationModuleUnitFormative as $innerRelation){
                                        if($innerRelation->cod_mod == $module->code){
                                            foreach ($units as $unit){
                                                if($unit->code == $innerRelation->cod_unitformative){
                                                    echo'<script>let units'.$num3.' = '.json_encode($unit).'; innerArray'.$num2.'.push(units'.$num3.');</script>';
                                                    $num3++;
                                                }
                                            }
                                        }
                                    }
                                    echo'<script>wrapperArray'.$num.'[1].push(innerArray'.$num2.');</script>';
                                    $num2++;
                                }
                            }
                        }
                    }
                    echo'<span class="courseTitle">'.$course->name.' <br /> '.$course->location.'</span>';
                    if($course['visibility'] == '1' || ($date<$now && $course['public'] != '1')){
                        echo'<span onclick="displayActivationCourse('.$course->id.');" class="activate"><i id="activation" class="fas fa-eye-slash"></i></span>';
                    } else if($course['public'] == '1' && $course['visibility'] == '0'){
                        echo'<span onclick="displayActivationCourse('.$course->id.');" class="activate"><i id="activation" class="fas fa-eye"></i></span>';
                    } else {
                        echo'<span onclick="displayActivationCourse('.$course->id.');" class="activate"><i id="activation" class="fas fa-eye"></i></span>';
                    }
                    echo'<span onclick="displayEditCourse('.$num.');" class="edit">Editar</span>';
                    echo'<span onclick="displayDeleteCourse('.$num.')" class="delete">Borrar</span>';
                    foreach($images as $image){
                        if($image->code == $course->img_code){
                              if($course['visibility'] == '1' || ($date<$now && $course['public'] != '1')){
                                  echo'<img id="courseImage'.$num.'" class="filtroOutdated" src="'.asset($image->img_link).'"/>';
                              }else if($course['public'] == '1' && $course['visibility'] == '0'){
                                  echo'<img id="courseImage'.$num.'" src="'.asset($image->img_link).'"/>';
                              }else {
                                  echo'<img id="courseImage'.$num.'" src="'.asset($image->img_link).'"/>';
                              }
                        }
                    }
                    echo'</div>';
                    foreach ($courseDeparture as $relation){
                        if($course->id == $relation->id_course){
                            foreach ($departures as $departure){
                                if($departure->id == $relation->id_departure){
                                    echo'<script type=text/javascript>let departures'.$num4.'='.json_encode($departure).';wrapperArray'.$num.'[2].push(departures'.$num4.');</script>';
                                }
                                $num4++;
                            }
                        }

                    }
                    echo'<script>let outsideWrapper'.$num.' = [];outsideWrapper'.$num.'.push('.$num.'); outsideWrapper'.$num.'.push(wrapperArray'.$num.'); dataList.push(outsideWrapper'.$num.');</script>';
                    $num ++;
                }
                ?>
            </div>
            <div id="news">
                <div id="editNew">
                    <div class="course" id="addCourse" onclick="displayCreateNew()">
                        <div class="circle plus"></div>
                        <div><p class="addTitle">Añadir Noticia</p></div>
                        <script type="text/javascript"> let News = [];</script>
                    </div>
                    <?php
                    $num = 1;
                    foreach($news as $new){
                        echo'<div class="course">';
                        $value = preg_replace( "/\r|\n/", "<br/>", $new->text );
                        echo'<script type="text/javascript"> let sublist'.$num.'=["'.$num.'", "'.$new->title.'", "'.$new->date.'", \''.htmlspecialchars_decode($value).'\'];</script>';
                        echo'<form id="deleteNewsForm'.$num.'" method="post" style="display: none" action="'.action('AdminController@editNew').'">';
                        echo csrf_field();
                        echo'<input type="hidden" name="oldTitle" value="'.$new->id.'">';
                        echo'<input type="hidden" name="delete" value="delete">';
                        echo'</form>';
                        echo'<span class="courseTitle">'.$new->title.'</span>';
                        echo'<span onclick="displayEditNew('.$num.')" class="edit">Editar</span>';
                        echo'<span onclick="displayDeleteNew('.$num.')" class="delete">Borrar</span>';
                        foreach($images as $image){
                            if($image->code == $new->img_code){
                                echo'<img id="courseImage'.$num.'" src="'.asset($image->img_link).'"/>';
                                echo'<script type="text/javascript">sublist'.$num.'.push("'.asset($image->img_link).'");</script>';
                            }
                        }
                        echo'</div>';
                        echo'<script type="text/javascript">for(let variable = (sublist'.$num.').length-4; variable<5; variable++){  (sublist'.$num.').push(defaultImage)} News.push(sublist'.$num.'); sublist'.$num.'.push('.$new->id.')</script>';
                        $num++;
                    } ?>
                </div>
            </div>
            <div id="contact">
                <div class="course" id="addCourse" onclick="displayCreateContact()">
                    <div class="circle plus"></div>
                    <div><p class="addTitle">Añadir Contacto</p></div>
                    <script type="text/javascript"> let contactArray = [];</script>
                </div>
                <?php
                $num = 1;
                foreach($contacts as $contact){
                    echo'<div class="course">';
                    $days = explode("-", $contact->days);
                    echo'<script type="text/javascript"> let contactList'.$num.'=["'.$num.'", "'.$contact->area.'", "'.$contact->telephone.'", "'.$contact->email.'", "'.$contact->location.'", "'.$contact->hours.'", "'.$days[0].'", "'.$days[1].'"];</script>';
                    echo'<form id="deleteContactForm'.$num.'" method="post" style="display: none" action="'.action('AdminController@updateContact').'">';
                    echo csrf_field();
                    echo'<input type="hidden" name="oldTitle" value="'.$contact->id.'">';
                    echo'<input type="hidden" name="delete" value="delete">';
                    echo'</form>';
                    echo'<span class="courseTitle">'.$contact->area.'</span>';
                    echo'<span onclick="displayEditContact('.$num.')" class="edit">Editar</span>';
                    echo'<span onclick="displayDeleteContact('.$num.')" class="delete">Borrar</span>';
                    foreach($images as $image){
                        if($image->code == $contact->img_code){
                            echo'<img id="courseImage'.$num.'" src="'.asset($image->img_link).'"/>';
                            echo'<script type="text/javascript">contactList'.$num.'.push("'.asset($image->img_link).'");</script>';
                        }
                    }
                    echo'</div>';
                    echo'<script type="text/javascript">contactArray.push(contactList'.$num.')</script>';
                    $num++;
                } ?>

            </div>
        </div>
        </div>
<script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
</body>
</html>
