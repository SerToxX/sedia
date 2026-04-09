@extends('layouts.app')

@section('body-class', 'class-home')

@section('content')

<section class="class-hero">

    <!-- VIDEO -->
    <video
        class="class-hero-video"
        autoplay
        muted
        loop
        playsinline
        preload="metadata"
        poster="{{ asset('image/hero.webp') }}">
        <source src="{{ asset('video/prueba.mp4') }}" type="video/mp4">
    </video>

    <!-- OVERLAY -->
    <div class="class-hero-overlay"></div>

    <!-- CONTENIDO -->
    <div class="class-hero-content">

        <h1 class="class-hero-title">
            Colección de sillas <br> exclusivas
        </h1>

        <button class="class-hero-button">
            COMPRA AHORA
        </button>

    </div>


</section>

<section class="class-about">

    <div class="class-about-container">

        <h2 class="class-about-title">
            Estilo y confort diario que <br>
            inspiran hogar
        </h2>

        <p class="class-about-text">
            Al combinar diseño, comodidad e innovación, creamos sillas de hogar que aportan estilo y funcionalidad a cada espacio.
            Piezas pensadas para brindar confort diario sin renunciar a la estética, perfectas para acompañar la vida moderna con elegancia y personalidad.
        </p>

        <a href="/nosotros" class="class-about-button">
            LEE SOBRE NOSOTROS
        </a>

    </div>

</section>

<section class="class-categories">

    <h2 class="class-categories-title">
        Conoce nuestras categorías
    </h2>

    <div class="class-categories-row class-categories-row-top">

        <a href="#" class="class-category-item">
            <img src="{{ asset('image/taburetes.png') }}" alt="Taburetes">
            <div class="class-category-overlay">
                <h3>TABURETES</h3>
                <span>Ver todos</span>
            </div>
        </a>

        <a href="#" class="class-category-item">
            <img src="{{ asset('image/bases.png') }}" alt="Bases">
            <div class="class-category-overlay">
                <h3>BASES</h3>
                <span>Ver todos</span>
            </div>
        </a>

    </div>

    <div class="class-categories-row class-categories-row-bottom">

        <a href="#" class="class-category-item">
            <img src="{{ asset('image/mesas.png') }}" alt="Mesas">
            <div class="class-category-overlay">
                <h3>MESAS</h3>
                <span>Ver todos</span>
            </div>
        </a>

        <a href="#" class="class-category-item">
            <img src="{{ asset('image/comedor.png') }}" alt="Comedor">
            <div class="class-category-overlay">
                <h3>COMEDOR</h3>
                <span>Ver todos</span>
            </div>
        </a>

    </div>

</section>



<section class="class-benefits">

    <div class="class-benefits-container">

        <div class="class-benefit-item">
            <div class="class-benefit-icon">🛒</div>
            <h3>Delivery gratuito</h3>
            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipi Elit. Ipsum Dolor Sit Amet.</p>
        </div>

        <div class="class-benefit-item">
            <div class="class-benefit-icon">🛡️</div>
            <h3>100% Pago seguro</h3>
            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipi Elit. Ipsum Dolor Sit Amet.</p>
        </div>

        <div class="class-benefit-item">
            <div class="class-benefit-icon">🏅</div>
            <h3>Calidad garantizada</h3>
            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipi Elit. Ipsum Dolor Sit Amet.</p>
        </div>

        <div class="class-benefit-item">
            <div class="class-benefit-icon">👤</div>
            <h3>Guia personalizada</h3>
            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipi Elit. Ipsum Dolor Sit Amet.</p>
        </div>

    </div>

</section>

<section class="class-products">

<h2 class="class-products-title">
Disfruta nuestras promociones
</h2>

<div class="class-products-grid">


<!-- PRODUCTO 1 -->

<div class="class-product-card">

<div class="class-product-image">

<img class="img-main" src="{{ asset('image/productos/silla1.png') }}" alt="Roma">
<img class="img-hover" src="{{ asset('image/productos/silla1-hover.png') }}" alt="Roma">

<button class="add-cart">
Añadir al carrito
</button>

</div>

<div class="class-product-info">

<div class="class-product-header">

<h3>Roma</h3>

<div class="class-product-colors">
<span class="color" style="background:#6b4e44"></span>
<span>+3</span>
</div>

</div>

<p class="class-product-category">
Comedor Exterior
</p>

<div class="class-product-price">
<span class="price">£41.00</span>
<span class="old-price">£91.00</span>
</div>

</div>

</div>



<!-- PRODUCTO 2 -->

<div class="class-product-card">

<div class="class-product-image">

<img class="img-main" src="{{ asset('image/productos/silla2.png') }}">
<img class="img-hover" src="{{ asset('image/productos/silla2-hover.png') }}">

<button class="add-cart">
Añadir al carrito
</button>

</div>

<div class="class-product-info">

<div class="class-product-header">

<h3>Roma</h3>

<div class="class-product-colors">
<span class="color" style="background:#bdb5a7"></span>
<span>+3</span>
</div>

</div>

<p class="class-product-category">
Comedor Exterior
</p>

<div class="class-product-price">
<span class="price">£41.00</span>
<span class="old-price">£91.00</span>
</div>

</div>

</div>



<!-- PRODUCTO 3 -->

<div class="class-product-card">

<div class="class-product-image">

<img class="img-main" src="{{ asset('image/productos/silla3.png') }}">
<img class="img-hover" src="{{ asset('image/productos/silla3-hover.png') }}">

<button class="add-cart">
Añadir al carrito
</button>

</div>

<div class="class-product-info">

<div class="class-product-header">

<h3>Roma</h3>

<div class="class-product-colors">
<span class="color" style="background:#333"></span>
<span>+3</span>
</div>

</div>

<p class="class-product-category">
Comedor Exterior
</p>

<div class="class-product-price">
<span class="price">£41.00</span>
<span class="old-price">£91.00</span>
</div>

</div>

</div>



<!-- PRODUCTO 4 -->

<div class="class-product-card">

<div class="class-product-image">

<img class="img-main" src="{{ asset('image/productos/silla4.png') }}">
<img class="img-hover" src="{{ asset('image/productos/silla4-hover.png') }}">

<button class="add-cart">
Añadir al carrito
</button>

</div>

<div class="class-product-info">

<div class="class-product-header">

<h3>Roma</h3>

<div class="class-product-colors">
<span class="color" style="background:#8f847a"></span>
<span>+3</span>
</div>

</div>

<p class="class-product-category">
Comedor Exterior
</p>

<div class="class-product-price">
<span class="price">£41.00</span>
<span class="old-price">£91.00</span>
</div>

</div>

</div>


</div>
</section>



<script>
    document.addEventListener("DOMContentLoaded", () => {

        const video = document.querySelector(".class-hero-video")

        if (!video) return

        const observer = new IntersectionObserver((entries) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {
                    video.play()
                } else {
                    video.pause()
                }

            })

        }, {
            threshold: 0.2
        })

        observer.observe(video)

    })
</script>

@endsection