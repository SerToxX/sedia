@extends('layouts.app')

@section('title', 'Contáctanos')
@section('description', 'Comunícate con nosotros por teléfono, email o WhatsApp. Estamos para resolver tus dudas rápidamente.')

@section('body-class', 'class-contactanos-page')

@push('styles')
    @vite('resources/css/contactanos.css')
@endpush

@section('content')

<!-- ========================================
SECCION 1 — INFORMACION DE CONTACTO
======================================== -->

<section class="class-contactanos">

    <h1 class="class-contactanos-title">Contáctanos</h1>

    <p class="class-contactanos-desc">
        ¡Estamos para ayudarte! Queremos resolver tus dudas rápidamente. Póngase en contacto con nosotros y nos aseguraremos de brindarle una respuesta pronto.
    </p>

    <div class="class-contactanos-cards">

        <!-- CARD 1 — TELEFONO -->

        <div class="class-contactanos-card">

            <img src="{{ asset('image/icons/contactanos/telefono.svg') }}" alt="Teléfono" class="class-contactanos-card-icon">

            <h3 class="class-contactanos-card-title">Teléfono</h3>

            <p class="class-contactanos-card-text">
                Para atención personalizada, comunícate con nosotros al siguiente número.
            </p>

            <a href="tel:+51999999999" class="class-contactanos-card-action">
                +51 920 379 619
            </a>

        </div>


        <!-- CARD 2 — EMAIL -->

        <div class="class-contactanos-card">

            <img src="{{ asset('image/icons/contactanos/correo.svg') }}" alt="Email" class="class-contactanos-card-icon">

            <h3 class="class-contactanos-card-title">Email</h3>

            <p class="class-contactanos-card-text">
                Envíanos un email para consultas detalladas o documentación o menos urgentes.
            </p>

            <a href="mailto:contacto@sedia.pe" class="class-contactanos-card-action">
                informes@proteplus.pe
            </a>

        </div>


        <!-- CARD 3 — CHAT -->

        <div class="class-contactanos-card">

            <img src="{{ asset('image/icons/contactanos/mensaje.svg') }}" alt="Mensaje" class="class-contactanos-card-icon">

            <h3 class="class-contactanos-card-title">Chatea con nosotros</h3>

            <p class="class-contactanos-card-text">
                Conversa con nosotros en tiempo real por WhatsApp que se encuentra en la esquina inferior
            </p>

            <a href="https://wa.me/51999999999" target="_blank" rel="noopener" class="class-contactanos-card-action">
                Abre el chat
            </a>

        </div>

    </div>

</section>


<!-- ========================================
SECCION 2 — FORMULARIO CTA
======================================== -->

<div class="class-contactanos-cta">

    <!-- BLOQUE VERDE -->

    <div class="class-contactanos-green">

        <h2 class="class-contactanos-green-title">
            Envíanos un mensaje!
        </h2>

        <p class="class-contactanos-green-text">
            ¿Tienes alguna duda, sugerencia o consulta?<br> Escríbenos y te daremos una solución.
        </p>

        <div class="class-contactanos-social">

            <!-- Facebook -->
            <a href="#" class="class-contactanos-social-icon" aria-label="Facebook">
                <img src="{{ asset('image/icons/contactanos/facebook.svg') }}" alt="Facebook">
            </a>

            <!-- YouTube -->
            <a href="#" class="class-contactanos-social-icon" aria-label="YouTube">
                <img src="{{ asset('image/icons/contactanos/youtube.svg') }}" alt="YouTube">
            </a>

            <!-- Instagram -->
            <a href="#" class="class-contactanos-social-icon" aria-label="Instagram">
                <img src="{{ asset('image/icons/contactanos/instagram.svg') }}" alt="Instagram">
            </a>

            <!-- Twitter/X -->
            <a href="#" class="class-contactanos-social-icon class-contactanos-social-icon--twitter" aria-label="Twitter">
                <img src="{{ asset('image/icons/contactanos/twitter.svg') }}" alt="Twitter">
            </a>

            <!-- LinkedIn -->
            <a href="#" class="class-contactanos-social-icon" aria-label="LinkedIn">
                <img src="{{ asset('image/icons/contactanos/linkedin.svg') }}" alt="LinkedIn">
            </a>

        </div>

    </div>


    <!-- BLOQUE FORMULARIO -->

    <div class="class-contactanos-form-wrap">

        @include('partials.message-toast')

        <form
            id="formContactanos"
            method="POST"
            action="{{ route('contactanos.enviar') }}"
            novalidate>
            @csrf

            <div class="class-contactanos-form-grid">

                <div>
                    <input
                        type="text"
                        name="nombres"
                        placeholder="Nombres"
                        class="class-contactanos-input">
                </div>

                <div>
                    <input
                        type="text"
                        name="apellidos"
                        placeholder="Apellidos"
                        class="class-contactanos-input">
                </div>

                <div>
                    <input
                        type="tel"
                        name="celular"
                        placeholder="Celular"
                        class="class-contactanos-input">
                </div>

                <div>
                    <input
                        type="text"
                        name="asunto"
                        placeholder="Asunto"
                        class="class-contactanos-input">
                </div>

            </div>

            <div class="class-contactanos-form-full">
                <input
                    type="email"
                    name="correo"
                    placeholder="Correo electrónico"
                    class="class-contactanos-input">
            </div>

            <div class="class-contactanos-form-full">
                <textarea
                    name="mensaje"
                    placeholder="Deja tu mensaje"
                    class="class-contactanos-textarea"></textarea>
            </div>

            <div class="class-contactanos-form-bottom">
                <button type="submit" class="class-contactanos-btn">
                    ENVIAR
                </button>
            </div>

        </form>

    </div>

</div>

@push('scripts')
    @vite('resources/js/contactanos/form.js')
@endpush

@endsection
