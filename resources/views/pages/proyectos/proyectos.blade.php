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
                    Soluciones para<br>
                    cada tipo de<br>
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

@endsection