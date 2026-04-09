@extends('layouts.app')

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
1. Elige el modelo, la cantidad y el color del tapiz.<br>
2. Agrega el producto al carrito de compras.<br>
3. Ingresa al carrito y haz clic en Finalizar compra.<br>
4. Completa tus datos: nombre, dirección, teléfono, etc.<br>
5. Selecciona el método de pago.<br>
6. Haz clic en “Realizar pedido”.
</p>
</div>

</div>


<div class="class-preguntas-frecuentes-item">

<div class="class-preguntas-frecuentes-question">
<span>¿Cómo puedo asegurarme de que el producto cabrá por la puerta o en el ascensor?</span>
<div class="class-preguntas-frecuentes-arrow"></div>
</div>

<div class="class-preguntas-frecuentes-answer">
<p>
Revisa las dimensiones del producto en la ficha técnica antes de realizar la compra.
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
Verifica que el producto esté en buen estado antes de firmar la recepción.
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
Algunos productos requieren ensamblaje sencillo.
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
Contáctanos dentro de los primeros 7 días después de recibir tu producto.
</p>
</div>

</div>


</div>
</section>

@endsection


@push('scripts')
@vite('resources/js/preguntas-frecuentes.js')
@endpush