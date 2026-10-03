@extends('layouts.app')

@section('title', 'Preguntas Frecuentes')
@section('description', 'Resolvemos tus dudas sobre productos, envíos, garantías y devoluciones de Sedia.')

@push('styles')
    @vite('resources/css/preguntas-frecuentes.css')
@endpush

@section('content')

<section class="class-preguntas-frecuentes">

<h1 class="class-preguntas-frecuentes-title">
Preguntas frecuentes
</h1>

<div class="class-preguntas-frecuentes-container">


<div class="class-preguntas-frecuentes-item">

<div class="class-preguntas-frecuentes-question">
<span>¿Cuándo llegará mi pedido?</span>
<div class="class-preguntas-frecuentes-arrow"></div>
</div>

<div class="class-preguntas-frecuentes-answer">
<p>
El tiempo de entrega depende de tu ubicación y la disponibilidad del producto. Generalmente, los pedidos se entregan entre 24 y 72 horas en Lima Metropolitana. Para otras zonas, el plazo puede variar. Te confirmaremos la fecha exacta al realizar tu compra.
</p>
</div>

</div>


<div class="class-preguntas-frecuentes-item">

<div class="class-preguntas-frecuentes-question">
<span>¿Cómo sabré si el producto pasa por la puerta?</span>
<div class="class-preguntas-frecuentes-arrow"></div>
</div>

<div class="class-preguntas-frecuentes-answer">
<p>
Te brindamos las medidas exactas del producto para que puedas compararlas con el acceso de tu espacio. Si tienes dudas, nuestro equipo puede asesorarte antes de la compra.
</p>
</div>

</div>


<div class="class-preguntas-frecuentes-item">

<div class="class-preguntas-frecuentes-question">
<span>¿Qué debo hacer cuando recibo mi pedido?</span>
<div class="class-preguntas-frecuentes-arrow"></div>
</div>

<div class="class-preguntas-frecuentes-answer">
<p>
Revisa que el producto esté en buen estado y coincida con tu pedido. Si notas algún detalle, repórtalo de inmediato a nuestro equipo.
</p>
</div>

</div>


<div class="class-preguntas-frecuentes-item">

<div class="class-preguntas-frecuentes-question">
<span>¿Los productos se entregan armados?</span>
<div class="class-preguntas-frecuentes-arrow"></div>
</div>

<div class="class-preguntas-frecuentes-answer">
<p>
La mayoría de nuestros productos se entregan listos para usar. En algunos casos, pueden requerir un armado sencillo.
</p>
</div>

</div>


<div class="class-preguntas-frecuentes-item">

<div class="class-preguntas-frecuentes-question">
<span>¿Cómo solicitar una devolución?</span>
<div class="class-preguntas-frecuentes-arrow"></div>
</div>

<div class="class-preguntas-frecuentes-answer">
<p>
Primero verifica si tu caso aplica en nuestra política de devoluciones. Ahí encontrarás los requisitos y pasos a seguir para iniciar el proceso.
</p>
</div>

</div>


<div class="class-preguntas-frecuentes-item">

<div class="class-preguntas-frecuentes-question">
<span>¿Qué garantía tienen nuestros productos?</span>
<div class="class-preguntas-frecuentes-arrow"></div>
</div>

<div class="class-preguntas-frecuentes-answer">
<p>
Nuestros productos cuentan con garantía por defectos de fabricación. El tiempo y condiciones específicas se detallan en la visualizacion de cada producto.
</p>
</div>

</div>


<div class="class-preguntas-frecuentes-item">

<div class="class-preguntas-frecuentes-question">
<span>¿Cuánto tarda el reembolso?</span>
<div class="class-preguntas-frecuentes-arrow"></div>
</div>

<div class="class-preguntas-frecuentes-answer">
<p>
Una vez aprobado, el tiempo de reembolso puede variar según el motivo y el método de pago. Te indicaremos el plazo exacto durante el proceso.
</p>
</div>

</div>


<div class="class-preguntas-frecuentes-item">

<div class="class-preguntas-frecuentes-question">
<span>¿Cuánto cuesta el envío a provincias?</span>
<div class="class-preguntas-frecuentes-arrow"></div>
</div>

<div class="class-preguntas-frecuentes-answer">
<p>
El costo de envío depende de la agencia de transporte y la ciudad de destino. Nosotros llevamos tu pedido sin costo a la agencia; desde ahí, el precio lo define la propia agencia.</p>
</div>

</div>


</div>
</section>

@endsection


@push('scripts')
@vite('resources/js/preguntas-frecuentes.js')
@endpush