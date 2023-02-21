@section('header')
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <title>Escuela de Hostelería Europea</title>
    <meta name="author" content="<?php echo env("AUTHOR", "Inversiones Borma S.L."); ?>">
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
    <meta name="csrf_token" content="{{csrf_token()}}"/>
    <meta name="csrf_token2" content="{{csrf_token()}}"/>
    <meta property="og:url" content="https://www.eheuropea.com" />
    <meta property="og:description" content="La Escuela de Hostelería Europea es una entidad reconocida y acreditada por el Servicio Canario de
        Empleo para la impartición de Cursos de Formación Profesional para el Empleo">
    <meta property="og:image" itemprop="image" content="{{asset('images/EHESeo.jpg')}}">
    <link rel="shortcut icon" type="image/png" href= "{{asset('images/favicon-01.png')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/glyphicon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/equipo.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/news.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/secondary.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/Ehe_Fonts/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script type="text/javascript"  src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        let index = "{{URL::to('/')}}";
        let contacto = "{{URL::to('contacto')}}";
        let elg = "{{URL::to('elegirnos')}}";
        let cursoPrivado = "{{URL::to('cursos/privado')}}";
        let cursoDes = "{{URL::to('cursos/desempleados')}}";
        let cursoT = "{{URL::to('cursos/trabajadores')}}";
        let cursoTeleformacion = "{{URL::to('cursos/teleformacion')}}";
        let cursoLink1 = "{{URL::to('cursos')}}";
        let cursoLink2 = "{{URL::to('cursos/GC')}}";
        let cursoLink3 = "{{URL::to('cursos/FTV')}}";
        let cursoLink4 = "{{URL::to('cursos/empresas')}}";
        let master = "{{URL::to('master')}}";
        let teleformacion = "{{URL::to('teleformation')}}";
        let linkAl = "{{URL::to('alquilerInstalaciones')}}";
        let linkEmpresa = "{{URL::to('certificados')}}";
        let linkC = "{{URL::to('conocenos')}}";
        let linkE = "{{URL::to('centros')}}";
        let linkN = "{{URL::to('noticias')}}";
        let linkU = "{{URL::to('equipo')}}";
        let transparencia = "{{URL::to('transparencia')}}";
        let preRegis = "{{URL::to('preRegistration')}}";
        let configuracionDeCookies = "{{URL::to('configCookies')}}";
        let politicaDeCookies = "{{URL::to('políticaDeCookies')}}";
        let susDatosSeguros = "{{URL::to('susDatosSeguros')}}";
        let proteccionDatos = "{{URL::to('proteccionDeDatos')}}";
    </script>
    <script type="text/javascript" src="{{asset('js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dropDownMenu.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/preFormCreation.js')}}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122323154-1"></script>
    <script src="{{asset('js/googleAnalytics.js')}}"></script>
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '740887680611588');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=740887680611588&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<noscript><div class="scriptWarning"><p>Por favor activa javascript, para poder disfrutar de la experiencia completa que te ofrece esta web</p></div></noscript>
<body>
<header>
    <div id="innerHeader">
        <p><a href="https://web.whatsapp.com/send?phone=34646555278&text=Hola" target="_blank"><b>Infórmate en</b> 646555278<i class="icon-whatsapp"></i></a><a target="_blank" href="https://www.facebook.com/EHEuropea/"><i class="icon-facebook"></i></a>
            <a target="_blank" href="https://www.instagram.com/eheuropea/"><i class="icon-instagram"></i></a>
             <a target="_blank" href="https://www.linkedin.com/company/79913298/admin/"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.gesforcan.com/" target="_blank"><b>Aula virtual</b></a>
            </p>
    </div>
</header>
<div id="certifyBar">
    <a href="https://www.un.org/sustainabledevelopment/es/sustainable-development-goals/" target="_blank">
        <div><img alt="Icono de Sustainable Development Goals" src="{{asset('images/SDG-Wheel_Transparent_WEB.PNG')}}"></div>
    </a>
    <a href="{{url('certificados')}}">
        <div><img src="{{asset('images/accesibilidad.png')}}"/></div>
        <div><img src="{{asset('images/EFQM+500.png')}}"/></div>
        <div><img src="{{asset('images/ISO.png')}}"/></div>
        <div><img src="{{asset('images/EMAS.png')}}"/></div>
        <div><img src="{{asset('images/ISO 27001.png')}}"></div>
    </a>
</div>
<div id="outerNavBar">
    <a href="{{URL::to('/')}}"><img src="{{asset('images/Ehe_logo.svg')}}"/></a>
    <div id="navBar">
    </div>
</div>
<script type="text/javascript" src="{{asset('js/footerCreation.js')}}"></script>
@show
@yield('content')
@section('footer')
    <div id="colaboradores">
        <h2>Colaboradores</h2>
        <div class=" swiper-container swiper-container-horizontal footerSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a href="https://www3.gobiernodecanarias.org/empleo/portal/web/sce" target="_blank"><img style="width: 250px; height: 250px; object-fit: contain; margin-right: 1rem;" src="{{asset('images/colab1.png')}}"></a></div>
                    <div class="swiper-slide"><a href="https://www.sepe.es/" target="_blank"><img style="width: 250px; height: 250px; object-fit: contain; margin-right: 1rem;" src="{{asset('images/colab2.JPG')}}"></a></div>
                    <div class="swiper-slide"><a href="https://www.oxfordtestofenglish.es/" target="_blank"><img style="width: 250px; height: 250px; object-fit: contain; margin-right: 1rem;" src="{{asset('images/oxfordTest31.png')}}"></a></div>
                    <div class="swiper-slide"><a href="https://www.turijobs.com/" target="_blank"><img style="width: 250px; height: 250px; object-fit: contain; margin-right: 1rem;" src="{{asset('images/1-Logo-Turijobs-2017-ORIGINAL.PNG')}}"></a></div>
                    <div class="swiper-slide"><a href="http://gfeuropea.com/" target="_blank"><img style="width: 250px; height: 250px; object-fit: contain; margin-right: 1rem;" src="{{asset('images/V1_COL.png')}}"></a></div>
                    <div class="swiper-slide"><a href="https://fundacioncife.org/" target="_blank"><img style="width: 250px; height: 250px; object-fit: contain; margin-right: 1rem;" src="{{asset('images/Fundación-Calidad-Empleo-a.png')}}"></a></div>

                </div>
            </div>
            <script>
               new Swiper('.footerSwiper', {
                   slidesPerView: 4,
                   spaceBetween: 0,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                         1200:{
                            slidesPerView: 3
                        },
                        900:{
                            slidesPerView: 2
                        },
                        600:{
                            slidesPerView: 1
                        }
                   }
                });
            </script>
        </div>
    </div>
    <div class="footer">
    <script type="text/javascript">
        if(screen.width < 680){
            $('.footer').append('<div class="upperFooter">' +
                '<span><a href='+proteccionDatos+'>Compromiso con la Protección de Datos Personales</a></span><span><a href="'+politicaDeCookies+'">Política de cookies</a></span><span><a href='+susDatosSeguros+'>Política de Privacidad</a></span><span><a href="'+configuracionDeCookies+'">Configuración De Cookies</a></span>'+
                '<span>&copy EHEuropea ' + <?php echo date('Y')?> + '</span>\n' +
                '</div>');
        } else {
            $('.footer').append('<div class="upperFooter">' +
                '<span>&copy EHEuropea ' + <?php echo date('Y')?> + '</span>\n'+
                '<span><a href='+proteccionDatos+'>Compromiso con la Protección de Datos Personales</a> | <a href='+politicaDeCookies+'>Política de cookies</a> | <a href='+susDatosSeguros+'>Política de Privacidad</a> | <a href="'+configuracionDeCookies+'">Configuración De Cookies</a></span>'+
                '</div>')
        }
        $('#outerNavBar').css('top', $('#innerHeader').outerHeight(true));
    </script>
    </div>
    <script type="text/javascript" src="{{asset('js/navBarCreation.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/cookies.js')}}"></script>
</body>
</html>
@show