@extends('registration')
@section('header')
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <!-- Aqui va una imagen -->
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- O X F O R D   T E S T   O F   E N G L I S H -->

<div id="oxfordTestOfEnglish" class="fichaDiv oxfordDiv" Style="margin-bottom: 3rem;">
    <h1 class="color-slate-blue noWrap pr-4">
        <strong class="ed-text-minus" data-ed="title-1">
            <p>Oxford Test of English</p>
        </strong>
    </h1>
    <hr class="titleHr w-100 mt-5">

    <p>Ahora con <strong>Escuela de Hostelería Europea</strong> obtén la certificación oficial de la <a href="https://www.oxfordtestofenglish.es/" target="_blank">
        <strong>Universidad de Oxford</strong></a>
        , una de las más importantes del mundo, y sobre todo, la certificación más reconocida por las instituciones españolas.</p>
        <img class="oxfordApprovedImg" src="{{asset('images/oxfordApprovedCentre.jpg')}}">
    <p><strong>¿Es muy difícil?</strong></p>
    <p>El Oxford Test of English es&nbsp;<strong>100% online.</strong> Además, el examen&nbsp;<strong>sirve para certificar el nivel que tienes</strong>, por lo que ni apruebas ni suspendes.</p>
    <p>Esto significa que no tiene que serte ni fácil ni difícil, si no que&nbsp;<strong>se adapta a tu nivel</strong>&nbsp;para que te sientas cómodo y sin miedo a suspender cuando lo realices.</p>
    <p>El examen es muy corto, en tan solo 2 horas certificas tu nivel de inglés, y además el tiempo de espera para la obtención de los resultados también lo es, ya que los recibes en apenas dos semanas.</p>
    <p>Es un examen adaptativo. En función de las respuestas que el alumno va dando, el nivel de la comprensión lectora y auditiva va variando para afinar el grado de dificultad.&nbsp;</p>
    <p>Además, su precio además es muy asequible. El nivel en las cuatro categorías se muestra por separado y también el nivel general de acuerdo con el Marco Común Europeo de Referencia (MCER).</p>
    <p><strong>¿En qué consiste el examen?</strong></p>
    <p>El examen del&nbsp;Oxford Test of English&nbsp;cubre&nbsp;cuatro competencias: expresión escrita&nbsp;(Writing),&nbsp;expresión oral&nbsp;(Speaking),&nbsp;comprensión auditiva&nbsp;(Listening)&nbsp;y comprensión lectora&nbsp;(Reading).</p>
    <img class="oxfordTestBoxes" src="{{asset('images/testBoxes.jpg')}}">
    <p>El&nbsp;Reading&nbsp;y el&nbsp;Listening&nbsp;son&nbsp;adaptables, es decir, se adapta a tus respuestas. El&nbsp;Speaking&nbsp;y el&nbsp;Writing&nbsp;son&nbsp;pruebas individualizadas&nbsp;revisadas por evaluadores con experiencia.</p>
    <p>Puedes realizar una&nbsp;<a style="text-decoration: underline;color: #007bff;" href="https://www.oxfordtestofenglish.es/prueba-el-examen-2/">DEMO</a>&nbsp;de cada una de las partes del Oxford Test of English para saber a qué te enfrentarás a la hora de realizar el examen.</p>

    <p><strong>¿Cuánto cuesta?</strong></p>
    <p><strong>Tasa por certificar las 4 Competencias</strong>. El precio oficial de las Tasas de Examen del Oxford Test of English – OTE es de <strong>100€ (cien euros)</strong> para cualquiera de los niveles certificables de A2, B1 y B2.</p><p>Este importe incluye el examen de las cuatro competencias lingüísticas: Speaking, Listening, Reading y Writing.</p>
    <p style="text-align:center;"><button class="oxfordButton" onclick="oxfordInscription('Oxford Test of English (4 competencias)', '{{URL::to('oxfordInscription')}}')">Inscríbete</button></p>
    <p><strong>Tasa por certificar 1 Competencia</strong>. El precio oficial de las Tasas de Examen del Oxford Test of English – OTE es de <strong>75€ (setenta y cinco euros)</strong> para cualquiera de los niveles certificables de A2, B1 y B2.</p><p>Este importe incluye el examen UNA de las cuatro competencias lingüísticas: Speaking, Listening, Reading y Writing, a elección del cliente.</p>
    <p style="text-align:center;"><button class="oxfordButton" onclick="oxfordInscription('Oxford Test of English (1 competencia)', '{{URL::to('oxfordInscription')}}')">Inscríbete</button></p>
</div>

<!-- E N D   O X F O R D   T E S T   O F   E N G L I S H -->

@stop
@section('footer')
