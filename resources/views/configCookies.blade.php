@extends('registration')
@section('header')
@section('content')
    <div class="cookiesPolitics">
        <h1>Configuración de Cookies</h1>
        <p>En cumplimiento de la ley, presentamos a continuación un panel que permite habilitar y deshabilitar las cookies que usa nuestra web,
        solo permitimos controlar de esta forma aquellas cookies cuyo uso no sea estrictamente necesario para el funcionamiento de nuestra página web,
        si necesitas más información acerca de las cookies que utilizamos puedes obtenerla en nuestra sección <a href="{{url('políticaDeCookies')}}"><b>POLÍTICA DE COOKIES.</b></a></p>
        <div class="custom-control custom-switch mt-4">
            <input type="checkbox" class="cookiesConfigField custom-control-input" id="googleAnalyticsSwitch" name="Google Analytics" checked="true">
            <label class="custom-control-label" for="googleAnalyticsSwitch"><strong>Google Analytics</strong></label>
        </div>
        <div class="text-center mt-5">
            <button onclick="configCookies()" class="btn btn-primary px-4"><strong>Guardar</strong></button>
        </div>
    </div>
@stop
@section('footer')