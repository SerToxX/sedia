@extends('layouts.app')

@section('content')

<section class="class-terminos-condiciones">

<h1 class="class-terminos-condiciones-title">
Términos y condiciones
</h1>

<div class="class-terminos-condiciones-container">

<div class="class-terminos-condiciones-static">

<h2>Uso del Sitio Web</h2>

<p>
Este sitio está destinado exclusivamente a la venta de sillas, mesas y mobiliario para hogar,
comedor y barra, tanto para interiores como exteriores. Está prohibido utilizar el sitio para
actividades fraudulentas, ilícitas o que afecten su funcionamiento.
</p>

</div>


<div class="class-terminos-condiciones-item">

<div class="class-terminos-condiciones-question">
<span>Información de productos</span>
<div class="class-terminos-condiciones-arrow"></div>
</div>

<div class="class-terminos-condiciones-answer">
<p>
La información, descripciones, fotografías y dimensiones de los productos mostrados en el sitio
tienen fines informativos. Aunque procuramos que toda la información sea precisa, puede haber
ligeras variaciones dependiendo del modelo o lote del producto.
</p>
</div>

</div>


<div class="class-terminos-condiciones-item">

<div class="class-terminos-condiciones-question">
<span>Precios y disponibilidad</span>
<div class="class-terminos-condiciones-arrow"></div>
</div>

<div class="class-terminos-condiciones-answer">
<p>
Los precios mostrados en el sitio web pueden cambiar sin previo aviso. La disponibilidad de
productos está sujeta a stock y confirmación del pedido.
</p>
</div>

</div>


<div class="class-terminos-condiciones-item">

<div class="class-terminos-condiciones-question">
<span>Pedidos y pagos</span>
<div class="class-terminos-condiciones-arrow"></div>
</div>

<div class="class-terminos-condiciones-answer">
<p>
Para completar una compra el usuario deberá proporcionar información válida y seleccionar uno de
los métodos de pago disponibles. El pedido será confirmado una vez verificado el pago correspondiente.
</p>
</div>

</div>


<div class="class-terminos-condiciones-item">

<div class="class-terminos-condiciones-question">
<span>Garantía</span>
<div class="class-terminos-condiciones-arrow"></div>
</div>

<div class="class-terminos-condiciones-answer">
<p>
Nuestros productos cuentan con garantía contra defectos de fabricación. La garantía no cubre daños
ocasionados por mal uso, instalación incorrecta o desgaste natural del producto.
</p>
</div>

</div>


<div class="class-terminos-condiciones-item">

<div class="class-terminos-condiciones-question">
<span>Cambios y devoluciones</span>
<div class="class-terminos-condiciones-arrow"></div>
</div>

<div class="class-terminos-condiciones-answer">
<p>
Las solicitudes de cambio o devolución deben realizarse dentro del plazo establecido después de
recibir el producto. El artículo debe encontrarse en buen estado y con su empaque original.
</p>
</div>

</div>


<div class="class-terminos-condiciones-item">

<div class="class-terminos-condiciones-question">
<span>Envíos y entregas</span>
<div class="class-terminos-condiciones-arrow"></div>
</div>

<div class="class-terminos-condiciones-answer">
<p>
Los tiempos de entrega pueden variar según la ubicación del cliente y la disponibilidad del
producto. Nuestro equipo coordinará la entrega una vez confirmado el pedido.
</p>
</div>

</div>


<div class="class-terminos-condiciones-item">

<div class="class-terminos-condiciones-question">
<span>Privacidad y protección de datos</span>
<div class="class-terminos-condiciones-arrow"></div>
</div>

<div class="class-terminos-condiciones-answer">
<p>
La información personal proporcionada por los usuarios será utilizada únicamente para procesar
pedidos, mejorar el servicio y cumplir con las obligaciones legales correspondientes.
</p>
</div>

</div>


<div class="class-terminos-condiciones-item">

<div class="class-terminos-condiciones-question">
<span>Modificación de términos</span>
<div class="class-terminos-condiciones-arrow"></div>
</div>

<div class="class-terminos-condiciones-answer">
<p>
Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento. Las
modificaciones entrarán en vigor desde su publicación en el sitio web.
</p>
</div>

</div>


</div>

</section>

@endsection


@push('scripts')
@vite('resources/js/terminos-condiciones.js')
@endpush