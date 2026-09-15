@extends('layouts.app')

@section('title', $product->name)
@section('description', $product->description ?: ($product->category.' — '.$product->name.' | Sedia'))

@section('body-class', 'class-producto-page')

@push('styles')
    @vite('resources/css/producto-detalle.css')
@endpush

@section('content')

<div class="class-producto" data-producto>

    <div class="class-producto-container">

        <nav class="class-producto-breadcrumb">
            <a href="{{ route('inicio') }}">Inicio</a>
            <span>/</span>
            <a href="{{ route('productos') }}">Productos</a>
            <span>/</span>
            <span>{{ $product->name }}</span>
        </nav>

        <div class="class-producto-layout">

            {{-- ============ GALERÍA ============ --}}
            <div class="class-producto-gallery">
                <div class="class-producto-gallery-main">
                    @foreach ($product->gallery_urls as $i => $url)
                        <img src="{{ $url }}" alt="{{ $product->name }}" class="class-producto-main-img{{ $i === 0 ? ' is-active' : '' }}" data-image="{{ $i }}">
                    @endforeach
                </div>

                @if (count($product->gallery_urls) > 1)
                    <div class="class-producto-gallery-thumbs">
                        @foreach ($product->gallery_urls as $i => $url)
                            <button type="button" class="class-producto-thumb{{ $i === 0 ? ' is-active' : '' }}" data-thumb="{{ $i }}">
                                <img src="{{ $url }}" alt="{{ $product->name }} {{ $i + 1 }}">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- ============ INFO ============ --}}
            <div class="class-producto-info">
                @if ($product->category)
                    <span class="class-producto-category">{{ $product->category }}</span>
                @endif

                <h1 class="class-producto-name">{{ $product->name }}</h1>

                <div class="class-producto-prices">
                    <span class="class-producto-price">S/ {{ number_format($product->display_price, 2) }}</span>
                    @if ($product->has_discount)
                        <span class="class-producto-price-old">S/ {{ number_format($product->regular_price, 2) }}</span>
                    @endif
                </div>

                @if ($product->swatches)
                    <div class="class-producto-swatches">
                        <span class="class-producto-swatches-label">
                            Color: <strong data-color-name>{{ $product->swatches[0]['name'] ?? '' }}</strong>
                        </span>
                        <div class="class-producto-swatch-row">
                            @foreach ($product->swatches as $i => $swatch)
                                <button type="button"
                                        class="class-producto-swatch{{ $i === 0 ? ' is-active' : '' }}"
                                        style="background: {{ is_array($swatch) ? ($swatch['hex'] ?? '#ccc') : $swatch }};"
                                        data-swatch="{{ $i }}"
                                        data-swatch-name="{{ is_array($swatch) ? ($swatch['name'] ?? '') : '' }}"></button>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="class-producto-stock {{ $product->stock > 0 ? 'is-in-stock' : 'is-out' }}">
                    <span class="class-producto-stock-dot"></span>
                    {{ $product->stock > 0 ? 'En stock' : 'Agotado' }}
                </div>

                @if ($product->description)
                    <div class="class-producto-description">
                        <p>{{ $product->description }}</p>
                    </div>
                @endif

                <a href="{{ route('productos') }}" class="class-producto-back">
                    ← Volver al catálogo
                </a>
            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')
    @vite('resources/js/producto-detalle.js')
@endpush
