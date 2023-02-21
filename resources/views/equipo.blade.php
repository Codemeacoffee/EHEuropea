@extends('registration')
@section('header')
@section('content')
    <?php
    if(session('message')){
        echo '<div id="floatingMessage">' . session('message') . '</div>';
    }
    ?>
    <div id="equipo">
        <h1>Únete al equipo</h1>
        <div id="formBox">
            <div class="halfBox">
                <img src="{{asset('images/img_aula1.jpg')}}">
                <div id="blueLayer"></div>
                <div id="textEquipo">
                    <div>
                        <h2>"No sólo otro trabajo, una carrera profesional..."</h2>
                        <p>Déjanos tus datos y CV en el siguiente formulario y... <br> ¡no olvides especificarnos qué pieza del puzzle serías para nuestro equipo!</p>
                    </div>
                </div>
                <form action="{{URL::to('equipo')}}" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div>
                        <label for="fullName">Nombre y apellido*</label>
                        <input autocomplete="off" type="text" name="fullName" maxlength="50" required>
                    </div>
                    <div>
                        <label for="email">Correo electrónico*</label>
                        <input autocomplete="off" type="text" name="email" onkeyup="validateEmail2($(this).val(), $(this))" maxlength="100" required>
                        <span class="toolTip">ejemplo@ejemplo.ej</span><span class="toolTip">Ya te has inscrito!</span>
                    </div>
                    <div>
                        <label for="tlf">Teléfono</label>
                        <input autocomplete="off" type="tel" name="tlf" maxlength="9">
                    </div>
                    <div>
                        <label for="position">Puesto al que aspiras</label>
                        <input autocomplete="off" type="text" name="position" maxlength="100" required>
                    </div>
                    <div>
                        <input autocomplete="off" type="file" name="cv" accept=".pdf, .docx" onchange="checkCV()" required>
                        <label for="cv" onclick="$('input[type=file]').click()">Sube tu CV*</label>
                        <span>Ningún archivo</span>
                    </div>
                    <p>Campos requeridos*</p>
                    <div id="submitDiv" class="d-block text-center">
                        <input type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/preFormCreation.js')}}"></script>
@stop
@section('footer')