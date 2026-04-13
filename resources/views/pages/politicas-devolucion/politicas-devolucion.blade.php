@extends('layouts.app')

@section('content')

<section class="class-politicas-devolucion">

    <h1 class="class-politicas-devolucion-title">
        Políticas de devolución
    </h1>


    <div class="class-politicas-devolucion-container">

        <!-- CARD 1 -->

        <div class="class-politicas-devolucion-card">

            <div class="class-politicas-devolucion-text">

                <ul>

                    <li>
                        <strong>Plazo de Devolución:</strong>
                        Aceptamos devoluciones y cambios dentro de los primeros 7 días
                        a partir de la fecha de recepción de tu pedido.
                    </li>

                    <li>
                        <strong>Estado del Artículo:</strong>
                        El artículo debe estar sin usar, en las mismas condiciones
                        en que fue recibido, en su embalaje original con todas
                        las etiquetas y accesorios intactos.
                    </li>

                    <li>
                        <strong>Comprobante:</strong>
                        Para completar la devolución, es indispensable
                        presentar el recibo o comprobante de compra.
                    </li>

                </ul>

            </div>

            <div class="class-politicas-devolucion-side">
                CONDICIONES<br>GENERALES
            </div>

        </div>


        <!-- CARD 2 -->

        <div class="class-politicas-devolucion-card">

            <div class="class-politicas-devolucion-side">
                MOTIVOS DE<br>DEVOLUCIÓN<br>ACEPTADOS
            </div>

            <div class="class-politicas-devolucion-text">

                <p>
                    Puedes solicitar una devolución o cambio si el producto:
                </p>

                <ul>

                    <li>Está defectuoso o presenta daños de fábrica.</li>

                    <li>
                        Fue un error en el envío
                        (recibiste un artículo, talla o color diferente al solicitado).
                    </li>

                    <li>
                        Simplemente cambiaste de opinión
                        (derecho de retracto).
                    </li>

                </ul>

            </div>

        </div>


        <!-- CARD 3 -->

        <div class="class-politicas-devolucion-card">

            <div class="class-politicas-devolucion-text">

                <ul>

                    <li>
                        Al aprobarse tu devolución,
                        te ofrecemos las siguientes opciones:
                    </li>

                    <li>
                        <strong>Cambio:</strong>
                        Reemplazo por el mismo artículo
                        (si hay existencias) o por otro de igual valor.
                    </li>

                    <li>
                        <strong>Reembolso:</strong>
                        Devolución del importe total de la compra
                        (solo el valor del producto) a tu método de pago original.
                    </li>

                </ul>

            </div>

            <div class="class-politicas-devolucion-side">
                OPCIONES DE<br>SOLUCIÓN
            </div>

        </div>


    </div>


    <!-- =================================== -->
    <!-- SECCION PASOS -->
    <!-- =================================== -->

    <div class="class-politicas-devolucion-steps">

<div class="class-politicas-devolucion-step active" data-step="0">

<svg viewBox="0 0 350 52" class="step-svg">

<polygon class="step-shape"
points="0,0 325,0 350,26 325,52 0,52"/>

<text x="46%" y="50%" dominant-baseline="middle" text-anchor="middle">
<tspan font-weight="600">Paso 1:</tspan> Notificación
</text>

</svg>

</div>


<div class="class-politicas-devolucion-step" data-step="1">

<svg viewBox="0 0 350 52" class="step-svg">

<polygon class="step-shape"
points="0,0 325,0 350,26 325,52 0,52 25,26"/>

<text x="46%" y="50%" dominant-baseline="middle" text-anchor="middle">
<tspan font-weight="600">Paso 2:</tspan> Instrucciones
</text>

</svg>

</div>


<div class="class-politicas-devolucion-step" data-step="2">

<svg viewBox="0 0 350 52" class="step-svg">

<polygon class="step-shape"
points="0,0 325,0 350,26 325,52 0,52 25,26"/>

<text x="46%" y="50%" dominant-baseline="middle" text-anchor="middle">
<tspan font-weight="600">Paso 3:</tspan> Envío del artículo
</text>

</svg>

</div>


<div class="class-politicas-devolucion-step" data-step="3">

<svg viewBox="0 0 350 52" class="step-svg">

<polygon class="step-shape"
points="0,0 350,0 350,52 0,52 25,26"/>

<text x="46%" y="50%" dominant-baseline="middle" text-anchor="middle">
<tspan font-weight="600">Paso 4:</tspan> Procesamiento
</text>

</svg>

</div>

</div>


    @endsection


    @push('scripts')
    @vite('resources/js/politicas-devolucion.js')
    @endpush