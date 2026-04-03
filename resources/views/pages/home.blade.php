@extends('layouts.app')

@section('body-class', 'class-home')

@section('content')

<section class="class-hero">

    <!-- VIDEO (opcional) -->
    <video class="class-hero-video" autoplay muted loop playsinline>
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

@endsection