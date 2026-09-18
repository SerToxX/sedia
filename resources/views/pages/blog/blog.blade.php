@extends('layouts.app')

@section('title', 'Blog')
@section('description', 'Artículos, tendencias y consejos sobre decoración y muebles para el hogar de parte de Sedia.')

@section('body-class', 'class-blog-home-page')

@push('styles')
    @vite('resources/css/blog.css')
@endpush

@section('content')

<!-- ============================
HERO
============================ -->
<section class="class-blog-home-hero">
    <div class="class-blog-home-hero-img-wrap">
        <img src="{{ asset('image/blog-1.png') }}" loading="eager" fetchpriority="high" decoding="async" alt="Nuestro blog">
    </div>
    <div class="class-blog-home-hero-content">
        <h1 class="class-blog-home-hero-title">Nuestro blog</h1>
        <p class="class-blog-home-hero-text">
            Al combinar diseño, comodidad e innovación, creamos sillas de hogar que aportan estilo y
            funcionalidad a cada espacio. Piezas pensadas para brindar confort diario sin renunciar a la
            estética, perfectas para acompañar la vida moderna con elegancia y personalidad.
        </p>
    </div>
</section>

<!-- ============================
NUEVO ARTÍCULO
============================ -->
<div class="class-blog-divider">
    <h2 class="class-blog-divider-title">Nuevo Artículo</h2>
</div>

<div class="class-blog-featured">
    <div class="class-blog-feat-text">
        <h3 class="class-blog-feat-title">Comedor con Estilo Atemporal</h3>
        <p class="class-blog-feat-body">
            Descubre cómo elegir sillas de comedor que combinen diseño y comodidad para crear
            un ambiente acogedor y sofisticado. Materiales, colores y proporciones que transforman
            cada reunión en una experiencia especial.
            Opta por tapizados duraderos, estructuras resistentes y tonos que armonicen con tu mesa.
            Una buena elección puede renovar por completo la percepción del espacio.
        </p>
        <a href="{{ route('blog-post') }}" class="class-blog-read">LEER ARTÍCULO</a>
    </div>
    <a href="{{ route('blog-post') }}" class="class-blog-feat-img">
        <img src="{{ asset('image/blog/blog-featured.jpg') }}" alt="Comedor con Estilo Atemporal" loading="lazy" decoding="async">
    </a>
</div>

<!-- ============================
TODOS LOS ARTÍCULOS
============================ -->
<div class="class-blog-divider">
    <h2 class="class-blog-divider-title">Todos los artículos</h2>
</div>

<div class="class-blog-grid">

    <article class="class-blog-card">
        <a href="{{ route('blog-post') }}" class="class-blog-card-img">
            <img src="{{ asset('image/blog/blog2.jpg') }}" alt="Sillas de barra" loading="lazy" decoding="async">
        </a>
        <div class="class-blog-card-body">
            <h3>Sillas de barras que marcan tendencia esta temporada</h3>
            <p>
                Las sillas de barra aportan personalidad y dinamismo a cocinas y espacios sociales.
                Encuentra la altura ideal, acabados modernos y detalles que elevan el estilo de tu hogar.
                Desde diseños minimalistas hasta propuestas más audaces, cada modelo puede convertirse en el
                punto focal del ambiente.
            </p>
            <a href="{{ route('blog-post') }}" class="class-blog-read">LEER ARTÍCULO</a>
        </div>
    </article>

    <article class="class-blog-card">
        <a href="{{ route('blog-post') }}" class="class-blog-card-img">
            <img src="{{ asset('image/cafeterias.png') }}" alt="Confort interior, diseño exterior" loading="lazy" decoding="async">
        </a>
        <div class="class-blog-card-body">
            <h3>Confort interior, diseño exterior la perfecta armonía</h3>
            <p>
                Integra sillas versátiles que funcionen tanto en espacios interiores como en terrazas y
                balcones. Resistencia, estética y funcionalidad en piezas pensadas para disfrutar todo el año.
                Materiales fáciles de mantener y estructuras sólidas garantizan mayor durabilidad.
            </p>
            <a href="{{ route('blog-post') }}" class="class-blog-read">LEER ARTÍCULO</a>
        </div>
    </article>

    <article class="class-blog-card">
        <a href="{{ route('blog-post') }}" class="class-blog-card-img">
            <img src="{{ asset('image/blog/blog3.jpg') }}" alt="Espacios compactos" loading="lazy" decoding="async">
        </a>
        <div class="class-blog-card-body">
            <h3>Espacios compactos, grandes ideas, cambios necesarios</h3>
            <p>
                Optimiza ambientes pequeños con sillas de diseño ligero y proporciones equilibradas.
                Soluciones prácticas que mantienen la elegancia sin sacrificar comodidad. Modelos apilables o
                de líneas estilizadas ayudan a maximizar el espacio disponible.
            </p>
            <a href="{{ route('blog-post') }}" class="class-blog-read">LEER ARTÍCULO</a>
        </div>
    </article>

</div>

<!-- ============================
PAGINACIÓN
============================ -->
<nav class="class-blog-pagination" aria-label="Paginación de artículos">
    <a href="{{ route('blog') }}" class="class-blog-pagination-item active">1</a>
    <a href="#" class="class-blog-pagination-item">2</a>
    <a href="#" class="class-blog-pagination-arrow" aria-label="Siguiente"></a>
</nav>

@endsection
