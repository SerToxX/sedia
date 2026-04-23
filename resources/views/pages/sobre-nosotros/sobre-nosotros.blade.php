@extends('layouts.app')

@section('body-class', 'class-sobre-nosotros-page')

@section('content')

<!-- ========================================
HERO SOBRE NOSOTROS
======================================== -->

<section class="class-sobre-nosotros-hero">

    <!-- IMAGEN -->
    <img
        src="{{ asset('image/sobre-nosotros-banner.png') }}"
        alt="Sobre Nosotros"
        class="class-sobre-nosotros-hero-img">

    <!-- CONTENEDOR -->
    <div class="class-sobre-nosotros-hero-container">

        <!-- CONTENIDO -->
        <div class="class-sobre-nosotros-hero-content">
            <h1 class="class-sobre-nosotros-hero-title">
                SOBRE<br>
                NOSOTROS
            </h1>
        </div>

    </div>

</section>

<section class="class-nosotros-valores">

    <div class="class-nosotros-valores-container">

        <!-- TEXTO IZQUIERDA -->

        <div class="class-nosotros-valores-text">

            <span class="class-nosotros-valores-sub">
                NUESTROS VALORES
            </span>

            <h2 class="class-nosotros-valores-title">
                Comodidad y diseño para<br>
                cada espacio
            </h2>

            <p class="class-nosotros-valores-desc">
                En Sedia nos dedicamos a ofrecer sillas y mobiliario que
                combinan calidad, estilo y funcionalidad. Diseñamos
                soluciones para hogares, negocios y espacios que
                buscan transmitir confort y personalidad.
            </p>

        </div>


        <!-- GRID DERECHA -->

        <div class="class-nosotros-valores-grid">

            <!-- ITEM 1 -->

            <div class="valor-card">

                <div class="valor-top">

                    <div class="valor-num">1</div>

                    <h3>Confianza</h3>

                </div>

                <p>
                    Construimos relaciones transparentes,
                    cumpliendo lo que prometemos en cada
                    pedido.
                </p>

            </div>


            <!-- ITEM 2 -->

            <div class="valor-card">

                <div class="valor-top">

                    <div class="valor-num">2</div>

                    <h3>Calidad</h3>

                </div>

                <p>
                    Ofrecemos mobiliario resistente,
                    funcional y diseñado para durar
                    en interiores y exteriores.
                </p>

            </div>


            <!-- ITEM 3 -->

            <div class="valor-card">

                <div class="valor-top">

                    <div class="valor-num">3</div>

                    <h3>Cercanía</h3>

                </div>

                <p>
                    Escuchamos tus necesidades y
                    te brindamos asesoría real para
                    elegir los piezas que mejor
                    encajan contigo.
                </p>

            </div>


            <!-- ITEM 4 -->

            <div class="valor-card">

                <div class="valor-top">

                    <div class="valor-num">4</div>

                    <h3>Compromiso</h3>

                </div>

                <p>
                    Acompañamos cada proyecto con
                    dedicación, asegurando una
                    experiencia simple y confiable.
                </p>

            </div>

        </div>

    </div>

</section>

<section class="class-nosotros-historia">

    <div class="class-nosotros-historia-container">

        <!-- IMAGEN -->

        <div class="class-nosotros-historia-img-wrap">

            <img
                src="{{ asset('image/historia-banner.png') }}"
                alt="Historia Sedia">

        </div>


        <!-- CONTENIDO -->

        <div class="class-nosotros-historia-content">

            <!-- IZQUIERDA -->

            <div class="class-nosotros-historia-text">

                <span class="historia-subtitle">
                    Nuestra Historia
                </span>

                <h2 class="historia-title">
                    De una necesidad real, nace
                    una solución confiable
                </h2>

            </div>


            <!-- DERECHA -->

            <div class="historia-desc">

                <p>
                    Sedia nació con una misión simple: ofrecer sillas que se adapten
                    a las personas, a los espacios y al ritmo diario. Con materiales
                    resistentes, líneas modernas y una selección pensada para
                    diferentes estilos, buscamos hacer más cómodo cada momento.
                </p>

            </div>

        </div>

    </div>

</section>

<section class="class-nosotros-servicio">

    <div class="class-nosotros-servicio-container">

        <!-- IMAGEN -->

        <div class="class-nosotros-servicio-img-wrap">

            <img
                src="{{ asset('image/servicio-banner.png') }}"
                alt="Servicio Sedia">

        </div>


        <!-- TEXTO -->

        <div class="class-nosotros-servicio-text">

            <h2 class="servicio-title">
                Calidad y servicio en
                cada paso
            </h2>

            <p class="servicio-desc">
                Trabajamos con materiales confiables y acabados pensados
                para el uso diario. Ofrecemos asesoría personalizada,
                opciones listas para entrega y productos que mantienen
                su aspecto y resistencia con el tiempo.
            </p>

        </div>

    </div>

</section>

<section class="class-nosotros-ambientes">

    <div class="class-nosotros-ambientes-container">

        <!-- TEXTO -->

        <div class="class-nosotros-ambientes-text">

            <h2 class="ambientes-title">
                La silla perfecta para cada ambiente
            </h2>

            <p class="ambientes-desc">
                Contamos con una amplia variedad de sillas y taburetes pensados para hogares modernos y negocios que
                buscan practicidad. Además, fabricamos mesas a medida para complementar cualquier espacio.
            </p>

        </div>


        <!-- IMAGENES -->

        <div class="class-nosotros-ambientes-grid">

            <div class="ambiente-img ambiente-left">
                <img src="{{ asset('image/ambiente1.png') }}">
            </div>

            <div class="ambiente-img ambiente-center">
                <img src="{{ asset('image/ambiente2.png') }}">
            </div>

            <div class="ambiente-img ambiente-right">
                <img src="{{ asset('image/ambiente3.png') }}">
            </div>

        </div>

    </div>

</section>

<section class="class-nosotros-project">

    <div class="class-nosotros-project-container">

        <div class="class-nosotros-project-left">

            <h2 class="class-nosotros-project-title">
                <span>SEDIA</span> - PROJECT
            </h2>

            <p class="class-nosotros-project-sub">
                MOBILIARIO IDEAL PARA GRANDES PROYECTOS.
            </p>

            <button class="class-nosotros-project-button">
                ¡TRABAJEMOS JUNTOS!
            </button>

        </div>


        <div class="class-nosotros-project-img">
            <img src="{{ asset('image/sedia-project-chair.png') }}">
        </div>


        <div class="class-nosotros-project-info">

            <div class="class-nosotros-project-item">
                <img src="{{ asset('image/icons/project1.png') }}">
                <p>Proyectos a gran escala para cafeterías, restaurantes, oficinas y más.</p>
            </div>

            <div class="class-nosotros-project-item">
                <img src="{{ asset('image/icons/project2.png') }}">
                <p>Acompañamiento completo guiándote en cada decisión de mobiliario.</p>
            </div>

            <div class="class-nosotros-project-item">
                <img src="{{ asset('image/icons/project3.png') }}">
                <p>Implementación sin complicaciones desde el diseño hasta la instalación final.</p>
            </div>

        </div>

    </div>

</section>

@endsection