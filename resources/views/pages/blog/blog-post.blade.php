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
    <img src="{{ $banner->imageUrl() }}" class="class-blog-hero-img" loading="eager" fetchpriority="high" alt="Blog hero">
    <div class="class-blog-hero-overlay"></div>
    <div class="class-blog-hero-content">
        <span class="class-blog-hero-tag">Nuevo</span>
        <h1 class="class-blog-hero-title">El poder de una buena silla: el detalle que transforma tu comedor</h1>
        <p class="class-blog-hero-quote"><em>"El diseño atrae las miradas, pero es la comodidad de una buena silla la que invita a quedarse."</em></p>
    </div>
</section>

<!-- Iconos sociales — solo visibles en móvil, debajo del banner -->
<div class="class-blog-hero-social">
    <a href="#" class="class-blog-hero-social-link" aria-label="Twitter">
        <img src="{{ asset('image/icons/blog/twitter.svg') }}" width="28" height="28" alt="Twitter">
    </a>
    <a href="#" class="class-blog-hero-social-link" aria-label="Facebook">
        <img src="{{ asset('image/icons/blog/facebook.svg') }}" width="28" height="28" alt="Facebook">
    </a>
    <a href="#" class="class-blog-hero-social-link" aria-label="LinkedIn">
        <img src="{{ asset('image/icons/blog/linkedin.svg') }}" width="28" height="28" alt="LinkedIn">
    </a>
</div>


<!-- ============================
CUERPO ARTÍCULO
============================ -->
<div class="class-blog-body">
    <div class="class-blog-container">

        <!-- SIDEBAR SOCIAL (solo desktop / tablet) -->
        <aside class="class-blog-social-sidebar">
            <a href="#" class="class-blog-social-link" aria-label="Twitter">
                <img src="{{ asset('image/icons/blog/twitter.svg') }}" width="28" height="28" alt="Twitter">
            </a>
            <a href="#" class="class-blog-social-link" aria-label="Facebook">
                <img src="{{ asset('image/icons/blog/facebook.svg') }}" width="28" height="28" alt="Facebook">
            </a>
            <a href="#" class="class-blog-social-link" aria-label="LinkedIn">
                <img src="{{ asset('image/icons/blog/linkedin.svg') }}" width="28" height="28" alt="LinkedIn">
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

            <!-- IMAGEN 2 -->
            <div class="class-blog-img-wrap">
                <img src="{{ asset('image/proyectos-mesa.png') }}" loading="lazy" decoding="async" alt="Mesa de comedor con sillas premium">
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

            <p class="class-blog-source">
                <em><span class="class-blog-source-label">Fuente</span>: International Ergonomics Association y la American Society of Interior Designers.</em>
            </p>

        </article>

    </div>
</div>

@endsection
