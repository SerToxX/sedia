@extends('layouts.app')

@section('title', 'Blog')
@section('description', 'Artículos, tendencias y consejos sobre decoración y muebles para el hogar de parte de Sedia.')

@section('body-class', 'class-blog-post-page')

@push('styles')
    @vite('resources/css/blog.css')
@endpush

@section('content')

<!-- ============================
HERO
============================ -->
<section class="class-blog-hero">
    <img src="{{ asset('image/restaurantes.png') }}" class="class-blog-hero-img" loading="eager" fetchpriority="high" alt="Blog hero">
    <div class="class-blog-hero-overlay"></div>
    <div class="class-blog-hero-content">
        <span class="class-blog-hero-tag">Nuevo</span>
        <h1 class="class-blog-hero-title">El poder de una buena silla: el detalle que transforma tu comedor</h1>
        <p class="class-blog-hero-quote"><em>"El diseño atrae las miradas, pero es la comodidad de una buena silla la que invita a quedarse."</em></p>
        <!-- Iconos sociales — solo visibles en móvil -->
        <div class="class-blog-hero-social">
            <a href="#" class="class-blog-hero-social-link" aria-label="Twitter">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.7 5.3 4.3 8.5 4.5-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3.5-1.7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="#" class="class-blog-hero-social-link" aria-label="Facebook">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="#" class="class-blog-hero-social-link" aria-label="LinkedIn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <rect x="2" y="9" width="4" height="12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="4" cy="4" r="2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</section>


<!-- ============================
CUERPO ARTÍCULO
============================ -->
<div class="class-blog-body">
    <div class="class-blog-container">

        <!-- SIDEBAR SOCIAL (solo desktop / tablet) -->
        <aside class="class-blog-social-sidebar">
            <a href="#" class="class-blog-social-link" aria-label="Twitter">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.7 5.3 4.3 8.5 4.5-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3.5-1.7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="#" class="class-blog-social-link" aria-label="Facebook">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="#" class="class-blog-social-link" aria-label="LinkedIn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <rect x="2" y="9" width="4" height="12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="4" cy="4" r="2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </aside>

        <!-- ARTÍCULO -->
        <article class="class-blog-article">

            <p class="class-blog-intro">
                Cuando diseñamos o decoramos un comedor, solemos pensar primero en la mesa, en el color de las paredes o en la iluminación. Sin embargo, hay un elemento que marca la diferencia entre un espacio funcional y uno verdaderamente memorable: la silla. No se trata solo de estética, sino de cómo ese mueble hace sentir a las personas que se sientan en él.
            </p>

            <!-- IMAGEN 1 -->
            <div class="class-blog-img-wrap">
                <img src="{{ asset('image/ambiente1.png') }}" loading="lazy" decoding="async" alt="Ambiente de comedor con sillas de diseño">
            </div>

            <!-- SECCIÓN 1 -->
            <div class="class-blog-section">
                <h2 class="class-blog-section-title">
                    <span class="class-blog-section-num">1.</span>
                    La primera impresión comienza con la silla
                </h2>
                <p class="class-blog-section-body">
                    Una silla bien diseñada comunica el carácter del espacio antes de que cualquier comensal tome asiento. La silueta, los materiales y el acabado son los primeros elementos que captan la mirada. En un restaurante o en un comedor residencial de alto nivel, la silla es la tarjeta de presentación del ambiente. Por eso en SEDIA seleccionamos cada pieza con criterio estético y funcional.
                </p>
            </div>

            <!-- SECCIÓN 2 -->
            <div class="class-blog-section">
                <h2 class="class-blog-section-title">
                    <span class="class-blog-section-num">2.</span>
                    Ergonomía: el lujo que no se ve pero se siente
                </h2>
                <p class="class-blog-section-body">
                    Una silla ergonómica no es exclusiva de las oficinas. En el comedor, una postura correcta durante la comida mejora la digestión, prolonga el tiempo agradable en la mesa y evita molestias en la espalda baja. La altura del asiento, la profundidad del respaldo y el ángulo de inclinación son variables que los fabricantes de alta gama calibran con precisión milimétrica. Según la International Ergonomics Association, más del 60 % de las molestias posturales crónicas tienen origen en mobiliario inadecuado.
                </p>
            </div>

            <!-- SECCIÓN 3 -->
            <div class="class-blog-section">
                <h2 class="class-blog-section-title">
                    <span class="class-blog-section-num">3.</span>
                    Materiales que elevan la experiencia
                </h2>
                <p class="class-blog-section-body">
                    La madera maciza transmite calidez y durabilidad; el metal bruñido aporta modernidad y ligereza visual; el tapizado en cuero o tela de alta resistencia añade confort táctil y permite personalización de color. En proyectos de contract —hoteles, restaurantes, cafeterías— la elección del material también responde a criterios de mantenimiento y resistencia al uso intensivo. SEDIA trabaja con colecciones que equilibran diseño, durabilidad y facilidad de limpieza.
                </p>
            </div>

            <!-- SECCIÓN 4 -->
            <div class="class-blog-section">
                <h2 class="class-blog-section-title">
                    <span class="class-blog-section-num">4.</span>
                    Coherencia con el espacio
                </h2>
                <p class="class-blog-section-body">
                    Una silla extraordinaria en un entorno que no la acompaña pierde su impacto. El diseño interior de un comedor debe funcionar como sistema: la silla dialoga con la mesa, con el suelo, con la paleta de color y con la escala del espacio. Los interioristas más reconocidos recomiendan definir primero el "tono" del espacio —cálido o frío, clásico o contemporáneo— y seleccionar las sillas como piezas que refuerzan esa identidad.
                </p>
            </div>

            <!-- SECCIÓN 5 -->
            <div class="class-blog-section">
                <h2 class="class-blog-section-title">
                    <span class="class-blog-section-num">5.</span>
                    Inversión vs. gasto: la perspectiva correcta
                </h2>
                <p class="class-blog-section-body">
                    Una silla de calidad puede tener un costo inicial mayor, pero su vida útil supera con creces a la de piezas de fabricación masiva. En el sector hotelero y de restauración, donde las sillas se usan miles de veces al año, la amortización de una pieza premium es significativamente más favorable que la de una silla de bajo costo que requiere reposición frecuente. Según datos de la American Society of Interior Designers, los espacios con mobiliario de calidad retienen un 30 % más a sus clientes.
                </p>
            </div>

            <!-- IMAGEN 2 -->
            <div class="class-blog-img-wrap">
                <img src="{{ asset('image/proyectos-mesa.png') }}" loading="lazy" decoding="async" alt="Mesa de comedor con sillas premium">
            </div>

            <p class="class-blog-source">
                <em>Fuente: International Ergonomics Association y la American Society of Interior Designers.</em>
            </p>

        </article>

    </div>
</div>

@endsection
