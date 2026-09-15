@extends('layouts.app')

@section('title', 'Proyectos')
@section('description', 'Descubre cómo nuestros muebles han transformado espacios corporativos y residenciales en todo el país.')

@section('body-class', 'class-proyectos-page')

@push('styles')
    @vite('resources/css/proyectos.css')
@endpush

@section('content')

<section class="class-proyectos-hero">

    <!-- IMAGEN -->
    <img
        src="{{ asset('image/proyectos-inicio.png') }}"
        alt="Proyectos Sedia"
        class="class-proyectos-hero-img"
        loading="eager"
        fetchpriority="high"
        decoding="async">

    <!-- CONTENIDO -->
    <div class="class-proyectos-hero-content">

        <h1 class="class-proyectos-hero-title">
            PROYECTOS CON<br>
            SEDIA PROJECT
        </h1>

        <button class="class-proyectos-hero-button">
            COTIZAR PROYECTO
        </button>

    </div>

</section>

<section class="class-proyectos-info">

    <div class="class-proyectos-info-container">

        <!-- BLOQUE 1 -->

        <div class="class-proyectos-info-top">

            <div class="class-proyectos-info-img-wrap">
                <img
                    src="{{ asset('image/proyecto-espacios.png') }}"
                    class="class-proyectos-info-img"
                    loading="lazy"
                    decoding="async">
            </div>

            <div class="class-proyectos-info-text">

                <h2>
                    Creando espacios con<br>
                    diseño y comodidad.
                </h2>

                <p>
                    Sillas de comedor y de barra para interior y exterior, diseñadas
                    para disfrutar cada momento: compartir, relajarse y vivir tu día a
                    día con estilo, comodidad y funcionalidad.
                </p>

            </div>

        </div>


        <!-- BLOQUE 2 -->

        <div class="class-proyectos-negocios">

            <div class="class-proyectos-negocios-text">

                <h3>
                    Soluciones para
                    cada tipo de
                    negocio
                </h3>

                <p>
                    Cada espacio que diseñamos refleja una visión hecha realidad.
                    En Sedia, transformamos ideas en ambientes funcionales,
                    estéticos y listos para disfrutarse desde el primer día.
                </p>

            </div>

            <div class="class-proyectos-negocios-grid">

                <div class="class-proyectos-card">
                    <img src="{{ asset('image/restaurantes.png') }}" loading="lazy" decoding="async">
                    <span>Restaurantes</span>
                </div>

                <div class="class-proyectos-card">
                    <img src="{{ asset('image/cafeterias.png') }}" loading="lazy" decoding="async">
                    <span>Cafeterías</span>
                </div>

                <div class="class-proyectos-card">
                    <img src="{{ asset('image/bares.png') }}" loading="lazy" decoding="async">
                    <span>Bares</span>
                </div>

            </div>

        </div>

    </div>

</section>

<section class="class-proyectos-bloque3">

    <div class="class-proyectos-bloque3-container">

        <div class="class-proyectos-bloque3-text">

            <h2>
                Nuestros proyectos<br>
                cobran vida
            </h2>

            <p>
                Desde cafeterías y restaurantes hasta patios, terrazas y espacios
                comerciales, ofrecemos sillas, taburetes y mesas que se adaptan al
                estilo, uso y dinámica de cada negocio. Mobiliario práctico,
                resistente y listo para el día a día.
            </p>

        </div>

        <div class="class-proyectos-bloque3-img-wrap">
            <img src="{{ asset('image/proyectos-mesa.png') }}" loading="lazy" decoding="async">
        </div>

    </div>

</section>

<section class="class-proyectos-beneficios">

    <div class="class-proyectos-beneficios-container">

        <!-- IMAGEN -->

        <div class="class-proyectos-beneficios-img-wrap">
            <img src="{{ asset('image/proyectos-beneficios.png') }}" loading="lazy" decoding="async">
        </div>

        <!-- CONTENIDO -->

        <div class="class-proyectos-beneficios-content">

            <h2 class="class-proyectos-beneficios-title">
                ¿Por qué elegirnos?
            </h2>

            <div class="class-proyectos-beneficios-grid">

                <!-- ITEM 1 -->

                <div class="beneficio-item">
                    <span class="beneficio-num">1</span>
                    <h3>Diseño que funciona</h3>
                    <p>
                        Creamos espacios estéticos, cómodos y pensados para el
                        uso diario de tu negocio.
                    </p>
                </div>

                <!-- ITEM 2 -->

                <div class="beneficio-item beneficio-border-left">
                    <span class="beneficio-num">2</span>
                    <h3>Asesoría personalizada</h3>
                    <p>
                        Te guiamos en materiales, estilos y distribución para
                        que tu proyecto quede perfecto desde el inicio.
                    </p>
                </div>

                <!-- ITEM 3 -->

                <div class="beneficio-item beneficio-border-top">
                    <span class="beneficio-num">3</span>
                    <h3>Diseño que funciona</h3>
                    <p>
                        Trabajamos con productos de calidad que resisten el
                        ritmo real de cafeterías, restaurantes y todo tipo de negocios.
                    </p>
                </div>

                <!-- ITEM 4 -->

                <div class="beneficio-item beneficio-border-top beneficio-border-left">
                    <span class="beneficio-num">4</span>
                    <h3>Entregas confiables</h3>
                    <p>
                        Cumplimos tiempos y aseguramos que tu pedido llegue
                        correctamente embalado y en perfectas condiciones.
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>

<section class="class-proyectos-form">

    <div class="class-proyectos-form-container">

        <h2 class="class-proyectos-form-title">
            Tu proyecto empieza con una idea...<br>
            y SEDIA lo hace realidad.
        </h2>

        @include('partials.message-toast')
        <form class="class-proyectos-form-grid"
              id="formContactoProyectos"
              method="POST"
              action="{{ route('contacto.enviar') }}"
              enctype="multipart/form-data"
              novalidate>
            @csrf
            <div class="form-group">
                <label>Nombres y Apellidos</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label>Empresa</label>
                <input type="text" name="empresa">
            </div>
            <div class="form-group">
                <label>Telefono /Celular</label>
                <input type="text" name="telefono">
            </div>
            <div class="form-group">
                <label>DNI / RUC</label>
                <input type="text" name="documento">
            </div>
            <div class="form-group full">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group full">
                <label>Comentanos de tu proyecto</label>
                <textarea name="mensaje" required></textarea>
            </div>
            <div class="class-proyectos-form-bottom">
                <button type="button" class="btn-file" id="btnSelectFiles">
                    Seleccionar archivos
                </button>
                <button type="submit" class="btn-submit" id="btnSubmit">
                    ENVIAR
                </button>
            </div>
            <div class="form-group full">
                <label>Archivos (Máx. 20 archivos, total 15MB)</label>
                <input type="file" name="archivos[]" id="archivosInput" style="display: none;" multiple accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar">
                <div id="archivosList" class="class-proyectos-archivos-list"></div>
                <p id="archivosTotal" class="class-proyectos-archivos-total">Total: 0.00 MB / 15.00 MB</p>
            </div>
        </form>

    </div>

</section>

@push('scripts')
    @vite('resources/js/proyectos/form.js')
@endpush

@endsection
