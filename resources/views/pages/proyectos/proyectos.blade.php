@extends('layouts.app')

@section('body-class', 'class-proyectos-page')

@section('content')

<section class="class-proyectos-hero">

    <!-- IMAGEN -->
    <img
        src="{{ asset('image/proyectos-inicio.png') }}"
        alt="Proyectos Sedia"
        class="class-proyectos-hero-img">

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
                    class="class-proyectos-info-img">
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
                    <img src="{{ asset('image/restaurantes.png') }}">
                    <span>Restaurantes</span>
                </div>

                <div class="class-proyectos-card">
                    <img src="{{ asset('image/cafeterias.png') }}">
                    <span>Cafeterías</span>
                </div>

                <div class="class-proyectos-card">
                    <img src="{{ asset('image/bares.png') }}">
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
            <img src="{{ asset('image/proyectos-mesa.png') }}">
        </div>

    </div>

</section>

<section class="class-proyectos-beneficios">

    <div class="class-proyectos-beneficios-container">

        <!-- IMAGEN -->

        <div class="class-proyectos-beneficios-img-wrap">
            <img src="{{ asset('image/proyectos-beneficios.png') }}">
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

        <form class="class-proyectos-form-grid">

            <div class="form-group">
                <label>Nombres y Apellidos</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>Empresa</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>Telefono /Celular</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>DNI / RUC</label>
                <input type="text">
            </div>

            <div class="form-group full">
                <label>Email</label>
                <input type="email">
            </div>

            <div class="form-group full">
                <label>Comentanos de tu proyecto</label>
                <textarea></textarea>
            </div>

        </form>

        <div class="class-proyectos-form-bottom">

            <button class="btn-file">
                Seleccionar archivo
            </button>

            <button class="btn-submit">
                ENVIAR
            </button>

        </div>

    </div>

</section>

@endsection