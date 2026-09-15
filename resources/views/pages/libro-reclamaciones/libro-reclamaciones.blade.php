@extends('layouts.app')

@section('title', 'Libro de Reclamaciones')
@section('description', 'Registra tu reclamo o queja de acuerdo a la normativa peruana de protección al consumidor.')

@push('styles')
    @vite('resources/css/libro-reclamaciones.css')
@endpush

@section('content')

<link rel="stylesheet" href="{{ asset('css/libro-reclamaciones.css') }}">

<section class="class-reclamaciones-section">

    <div class="class-reclamaciones-container">

        {{-- HEADER --}}
        <div class="class-reclamaciones-header">

            <h1 class="class-reclamaciones-title">
                Libro de reclamaciones
            </h1>

            <p class="class-reclamaciones-description">
                En ProOffice, nos comprometemos a ofrecerte productos y servicios de calidad.
                Si tu experiencia no fue satisfactoria o deseas presentar un reclamo o queja,
                ponemos a tu disposición nuestro Libro de Reclamaciones virtual, conforme a lo
                establecido en el Código de Protección y Defensa del Consumidor – Ley N° 29571.
            </p>

        </div>

    </div>

    {{-- PASOS --}}
    <div class="class-reclamaciones-steps-wrapper">

        <div class="class-reclamaciones-steps-title-container">

            <h2 class="class-reclamaciones-steps-title">
                Para poder registrar tu reclamo o queja sigue los siguientes pasos
            </h2>

        </div>

        <div class="class-reclamaciones-steps-content">

            <ol class="class-reclamaciones-steps-list">

                <li>
                    Llenar el siguiente formulario registrando el tipo de reclamo o queja,
                    tienda donde fuiste atendido y datos de contacto para poder ubicarte.
                </li>

                <li>
                    Después de completar el formulario haz clic en el botón “Enviar”.
                </li>

                <li>
                    El proveedor deberá dar respuesta al reclamo en un plazo no mayor
                    de quince (15) días hábiles.
                </li>

            </ol>

        </div>

    </div>

    <div class="class-reclamaciones-container">

        <div class="class-reclamaciones-form-section">

            {{-- PROGRESS --}}
            <div
                class="class-reclamaciones-steps-progress"
                id="class-reclamaciones-progress"
            >

                <div class="class-reclamaciones-steps-progress-wrapper">

                    {{-- STEP 1 --}}
                    <div class="class-reclamaciones-step-item">

                        <div class="class-reclamaciones-step-top">

                            <div class="class-reclamaciones-step-line"></div>

                            <div class="class-reclamaciones-step-circle class-reclamaciones-step-circle-active">
                                1
                            </div>

                            <div class="class-reclamaciones-step-line class-reclamaciones-step-line-active"></div>

                        </div>

                        <span class="class-reclamaciones-step-label class-reclamaciones-step-label-active">
                            Datos del <br>
                            consumidor
                        </span>

                    </div>

                    {{-- STEP 2 --}}
                    <div class="class-reclamaciones-step-item">

                        <div class="class-reclamaciones-step-top">

                            <div class="class-reclamaciones-step-line"></div>

                            <div class="class-reclamaciones-step-circle">
                                2
                            </div>

                            <div class="class-reclamaciones-step-line"></div>

                        </div>

                        <span class="class-reclamaciones-step-label">
                            Información <br>
                            del producto
                        </span>

                    </div>

                    {{-- STEP 3 --}}
                    <div class="class-reclamaciones-step-item">

                        <div class="class-reclamaciones-step-top">

                            <div class="class-reclamaciones-step-line"></div>

                            <div class="class-reclamaciones-step-circle">
                                3
                            </div>

                            <div class="class-reclamaciones-step-line"></div>

                        </div>

                        <span class="class-reclamaciones-step-label">
                            Detalles <br>
                            del reclamo
                        </span>

                    </div>

                </div>

            </div>

            {{-- FORM --}}
            <form
                class="class-reclamaciones-form"
                id="class-reclamaciones-form"
            >

                {{-- STEP 1 --}}
                <div
                    class="class-reclamaciones-step-content-form"
                    data-step="1"
                >

                    <div class="class-reclamaciones-form-grid">

                        {{-- LEFT --}}
                        <div class="class-reclamaciones-form-column">

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    Nombres
                                </label>

                                <input
                                    type="text"
                                    class="class-reclamaciones-input"
                                >

                            </div>

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    Tipo de documento
                                </label>

                                <select class="class-reclamaciones-select">

                                    <option value=""></option>

                                    <option value="dni">
                                        DNI
                                    </option>

                                    <option value="ce">
                                        Carnet de extranjería
                                    </option>

                                </select>

                            </div>

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    Telefono o celular
                                </label>

                                <input
                                    type="text"
                                    class="class-reclamaciones-input"
                                >

                            </div>

                        </div>

                        {{-- RIGHT --}}
                        <div class="class-reclamaciones-form-column">

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    Apellidos
                                </label>

                                <input
                                    type="text"
                                    class="class-reclamaciones-input"
                                >

                            </div>

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    N° de documento
                                </label>

                                <input
                                    type="text"
                                    class="class-reclamaciones-input"
                                >

                            </div>

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    Correo electronico
                                </label>

                                <input
                                    type="email"
                                    class="class-reclamaciones-input"
                                >

                            </div>

                        </div>

                    </div>

                    {{-- ROW 3 --}}
                    <div class="class-reclamaciones-form-row-3">

                        <div class="class-reclamaciones-field">

                            <label class="class-reclamaciones-label">
                                Region
                            </label>

                            <input
                                type="text"
                                class="class-reclamaciones-input"
                            >

                        </div>

                        <div class="class-reclamaciones-field">

                            <label class="class-reclamaciones-label">
                                Distrito
                            </label>

                            <input
                                type="text"
                                class="class-reclamaciones-input"
                            >

                        </div>

                        <div class="class-reclamaciones-field">

                            <label class="class-reclamaciones-label">
                                Direccion
                            </label>

                            <input
                                type="text"
                                class="class-reclamaciones-input"
                            >

                        </div>

                    </div>

                </div>

                {{-- STEP 2 --}}
                <div
                    class="class-reclamaciones-step-content-form"
                    data-step="2"
                    style="display: none;"
                >

                    <div class="class-reclamaciones-form-grid">

                        <div class="class-reclamaciones-form-column">

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    Fecha de compra
                                </label>

                                <input
                                    type="date"
                                    class="class-reclamaciones-input"
                                >

                            </div>

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    Monto reclamado (si en caso aplica)
                                </label>

                                <input
                                    type="text"
                                    class="class-reclamaciones-input"
                                >

                            </div>

                        </div>

                        <div class="class-reclamaciones-form-column">

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    Número de comprobante de pago
                                </label>

                                <input
                                    type="text"
                                    class="class-reclamaciones-input"
                                >

                            </div>

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label">
                                    Producto/ servicio adquirido
                                </label>

                                <input
                                    type="text"
                                    class="class-reclamaciones-input"
                                >

                            </div>

                        </div>

                    </div>

                </div>

                {{-- STEP 3 --}}
                <div
                    class="class-reclamaciones-step-content-form"
                    data-step="3"
                    style="display: none;"
                >

                    <div class="class-reclamaciones-form-grid">

                        {{-- LEFT --}}
                        <div class="class-reclamaciones-form-column">

                            <div class="class-reclamaciones-radio-group">

                                <h3 class="class-reclamaciones-radio-title">
                                    Selecciona una opción:
                                </h3>

                                <label class="class-reclamaciones-radio-item">

                                    <input
                                        type="radio"
                                        name="tipo_reclamo"
                                        class="class-reclamaciones-radio-input"
                                    >

                                    <span class="class-reclamaciones-radio-circle"></span>

                                    <span class="class-reclamaciones-radio-text">
                                        <strong>Reclamo:</strong>
                                        disconformidad relacionada directamente
                                        con el producto o servicio adquirido.
                                    </span>

                                </label>

                            </div>

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label-bold">
                                    Descripción
                                </label>

                                <textarea
                                    class="class-reclamaciones-textarea"
                                    placeholder="Explica de manera clara el motivo de su queja"
                                ></textarea>

                            </div>

                            <label class="class-reclamaciones-checkbox-item">

                                <input
                                    type="checkbox"
                                    class="class-reclamaciones-checkbox-input"
                                >

                                <span class="class-reclamaciones-checkbox-square"></span>

                                <span class="class-reclamaciones-checkbox-text">
                                    Declaro haber leído y aceptado la Política
                                    de Privacidad y los Términos y Condiciones de Sedia.
                                </span>

                            </label>

                        </div>

                        {{-- RIGHT --}}
                        <div class="class-reclamaciones-form-column">

                            <div class="class-reclamaciones-radio-group">

                                <h3 class="class-reclamaciones-radio-title-hidden">
                                    .
                                </h3>

                                <label class="class-reclamaciones-radio-item">

                                    <input
                                        type="radio"
                                        name="tipo_reclamo"
                                        class="class-reclamaciones-radio-input"
                                    >

                                    <span class="class-reclamaciones-radio-circle"></span>

                                    <span class="class-reclamaciones-radio-text">
                                        <strong>Queja:</strong>
                                        malestar o descontento no vinculado
                                        al producto o servicio.
                                    </span>

                                </label>

                            </div>

                            <div class="class-reclamaciones-field">

                                <label class="class-reclamaciones-label-bold">
                                    Pedido o solución solicitada
                                </label>

                                <textarea
                                    class="class-reclamaciones-textarea"
                                    placeholder="Indica lo que solicitas como respuesta o compensacion"
                                ></textarea>

                            </div>

                            <label class="class-reclamaciones-checkbox-item">

                                <input
                                    type="checkbox"
                                    class="class-reclamaciones-checkbox-input"
                                >

                                <span class="class-reclamaciones-checkbox-square"></span>

                                <span class="class-reclamaciones-checkbox-text">
                                    Declaro que la información proporcionada
                                    es verdadera y corresponde a mi experiencia de consumo.
                                </span>

                            </label>

                        </div>

                    </div>

                </div>

                {{-- SUCCESS --}}
                <div
                    class="class-reclamaciones-success"
                    id="class-reclamaciones-success"
                    style="display: none;"
                >

                    <div class="class-reclamaciones-success-circle">
                        ✓
                    </div>

                    <h2 class="class-reclamaciones-success-title">
                        Tu reclamo ha sido registrado correctamente
                    </h2>

                    <p class="class-reclamaciones-success-text">
                        Hemos recibido tu reclamo correctamente.
                        Estamos revisando tu caso y te responderemos
                        a la brevedad a través de los datos proporcionados.
                    </p>

                </div>

                {{-- ACTIONS --}}
                <div
                    class="class-reclamaciones-actions"
                    id="class-reclamaciones-actions"
                >

                    {{-- ATRAS --}}
                    <button
                        type="button"
                        class="class-reclamaciones-back"
                        id="class-reclamaciones-back"
                    >

                        <div class="class-reclamaciones-back-circle">

                            <span class="class-reclamaciones-back-icon">
                                &#10094;
                            </span>

                        </div>

                        <span class="class-reclamaciones-back-text">
                            Atrás
                        </span>

                    </button>

                    {{-- NEXT --}}
                    <button
                        type="button"
                        class="class-reclamaciones-next"
                        id="class-reclamaciones-next"
                    >

                        <span class="class-reclamaciones-next-text">
                            Siguiente
                        </span>

                        <div class="class-reclamaciones-next-circle">

                            <span class="class-reclamaciones-next-icon">
                                &#10095;
                            </span>

                        </div>

                    </button>

                </div>

            </form>

        </div>

    </div>

</section>

@push('scripts')
    @vite('resources/js/libro-reclamaciones.js')
@endpush

@endsection
