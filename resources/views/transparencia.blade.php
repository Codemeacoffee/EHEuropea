@extends('registration')
@section('header')
@section('content')
    <?php
    if(session('message')){
        echo '<div id="floatingMessage">' . session('message') . '</div>';
    }
    ?>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <style>
            @media (max-width:1563px) {
                .noMostrar{
                    display: none;
                }
            }
            @media (min-width: 1564px) and (max-width: 1769px) {
                  .noMostrar {
                    opacity: 0;
                  }
            }
            
            @media (min-width:1770px) {
                .noMostrar{
                    display: none;
                }
            }
        </style>
    <div class="fichaDiv" style="width: 80%;">
                <div class="mt-5 mr-5 bars">
                    <h2>Portal de Transparencia</h2>
                </div>
                <p class="mt-5">ESCUELA DE HOSTELERÍA EUROPEA como empresa dedicada a la formación profesional no reglada, tiene entre una de sus políticas de grupo recogidas en nuestras certificaciones de calidad y en concordancia además con nuestra Responsabilidad Social Corporativa, la directriz de la total transparencia en nuestra forma de relacionarnos con usuarios, empresas y sociedad en general. Lo hacemos por iniciativa propia además de en cumplimiento de la Ley estatal 19/2003, de 9 de diciembre de transparencia, acceso a la información pública y buen gobierno y a la Ley canaria 12/2014 de 26 de diciembre, de transparencia y de acceso a la información pública. Como entidad privada tal transparencia de información es mandataria, al percibir ayudas o subvenciones en una cuantía superior a 60.000 euros anuales con cargo a los Presupuestos de la Comunidad Autónoma de Canarias. Por lo tanto ambas directrices cumplen con el mismo fin de información pública de nuestras actividades subvencionadas con presupuestos de la Comunidad Canaria y Estatal y además que la sociedad en general, conozca lo que hacemos como ejecutores de actividades sociales.<br>

En cada sección de este portal de transparencia se podrá encontrar la normativa legal a la que estamos obligados cumplir, la sección institucional con la historia de EHE, la parte organizativa con nuestro organigrama de empresa, y su titularidad, la información económico financiera, donde podrás consultar los datos económicos publicados en el registro mercantil, contratos realizados con administraciones públicas sean o no provenientes de presupuestos estatales o canarios, nuestros convenios de colaboración y las ayudas y subvenciones públicas recibidas en los últimos años. Asimismo, dispone del punto de contacto para cualquier información aclaratoria que puedas precisar.<br>

Escuela de Hostelería Europea <img class="w-25" src="{{asset('images/Ehe_logo.svg')}}"></p>
                <br>
        </div>
        <div class="container-fluid adjustTransparency">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="card mb-5" style="box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); width: 50%; min-width: 200px; min-height: 375px;" onclick="window.location.href='{{URL::to('normativaTransparencia')}}';">
                        <img class="card-img-top p-5" style="min-width: 170px; min-height:200px;" src="{{asset('images/Grupo 449.svg')}}" alt="Card image cap">
                        <div class="card-body p-5">
                            <p class="card-text text-center">Normativa</p>
                        </div>
                        </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="card mb-5" style="box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); width: 50%; min-width: 200px; min-height: 375px;" onclick="window.location.href='{{URL::to('economicoFinancieraTransparencia')}}';">
                        <img class="card-img-top p-5" style="min-width: 170px; min-height:200px;" src="{{asset('images/Grupo 451.svg')}}" alt="Card image cap">
                        <div class="card-body p-5">
                            <p class="card-text text-center">Económico Financiera</p>
                        </div>
                        </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="card mb-5" style="box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); width: 50%; min-width: 200px; min-height: 375px;" onclick="window.location.href='{{URL::to('ayudaSubvencionesTransparencia')}}';">
                        <img class="card-img-top p-5" style="min-width: 170px; min-height:200px;" src="{{asset('images/Grupo 453.svg')}}" alt="Card image cap">
                        <div class="card-body p-5">
                            <p class="card-text text-center">Ayudas y Subvenciones</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="card mb-5" style="box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); width: 50%; min-width: 200px; min-height: 375px;" onclick="window.location.href='{{URL::to('institucionalTransparencia')}}';">
                        <img class="card-img-top p-5" style="min-width: 170px; min-height:200px;" src="{{asset('images/Grupo 455.svg')}}" alt="Card image cap">
                        <div class="card-body p-5">
                            <p class="card-text text-center">Institucional</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="card mb-5" style="box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); width: 50%; min-width: 200px; min-height: 375px;" onclick="window.location.href='{{URL::to('contratosTransparencia')}}';">
                        <img class="card-img-top p-5" style="min-width: 170px; min-height:200px;" src="{{asset('images/Grupo 457.svg')}}" alt="Card image cap">
                        <div class="card-body p-5">
                            <p class="card-text text-center">Contratos</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="card mb-5" style="box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); width: 50%; min-width: 200px; min-height: 375px;" onclick="window.location.href='{{URL::to('comisionadoTransparencia')}}';">
                        <img class="card-img-top p-5" style="min-width: 170px; min-height:200px;" src="{{asset('images/Grupo 459.svg')}}" alt="Card image cap">
                        <div class="card-body p-5">
                            <p class="card-text text-center">Comisionado de Transparencia</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="card mb-5" style="box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); width: 50%; min-width: 200px; min-height: 375px;" onclick="window.location.href='{{URL::to('organizativaTransparencia')}}';">
                        <img class="card-img-top p-5" style="min-width: 170px; min-height:200px;" src="{{asset('images/Grupo 461.svg')}}" alt="Card image cap">
                        <div class="card-body p-5">
                            <p class="card-text text-center">Organizativa</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="card mb-5" style="box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); width: 50%; min-width: 200px; min-height: 375px;" onclick="window.location.href='{{URL::to('conveniosTransparencia')}}';">
                        <img class="card-img-top p-5" style="min-width: 170px; min-height:200px;" src="{{asset('images/Grupo 463.svg')}}" alt="Card image cap">
                        <div class="card-body p-5">
                            <p class="card-text text-center">Convenios</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="card mb-5" style="box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 0.2); width: 50%; min-width: 200px; min-height: 375px;" onclick="window.location.href='{{URL::to('accesoInformacionTransparencia')}}';">
                        <img class="card-img-top p-5 p-5" style="min-width: 170px; min-height:200px;" src="{{asset('images/Grupo 465.svg')}}" alt="Card image cap">
                        <div class="card-body p-5 ">
                            <p class="card-text text-center">Acceso a la información</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="{{asset('js/overflow.js')}}"></script>
@stop
@section('footer')