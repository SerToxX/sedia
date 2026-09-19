@extends('layouts.app')

@section('title', 'Productos')
@section('description', 'Explora nuestra colección completa de sillas, taburetes, mesas y mobiliario de exterior e interior.')

@section('body-class', 'class-listing-page')

@push('styles')
    @vite('resources/css/listing.css')
@endpush

@section('content')

<!-- ============================
HERO
============================ -->
<section class="class-listing-hero">
    <img src="{{ $banner->imageUrl() }}" class="class-listing-hero-img" loading="eager" fetchpriority="high" alt="Sillas de exterior">
    <div class="class-listing-hero-overlay"></div>
    <div class="class-listing-hero-content">
        <h1 class="class-listing-hero-title">SILLAS DE<br>EXTERIOR</h1>
    </div>
</section>


<!-- ============================
FILTROS
============================ -->
<div class="class-listing-filters-bar">
    <div class="class-listing-filters-container">
        <button class="class-listing-filters-btn" type="button">
            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="0" y1="2" x2="14" y2="2" stroke="currentColor" stroke-width="1.5"/>
                <line x1="0" y1="6" x2="14" y2="6" stroke="currentColor" stroke-width="1.5"/>
                <line x1="0" y1="10" x2="14" y2="10" stroke="currentColor" stroke-width="1.5"/>
                <circle cx="4" cy="2" r="1.5" fill="white" stroke="currentColor" stroke-width="1.2"/>
                <circle cx="10" cy="6" r="1.5" fill="white" stroke="currentColor" stroke-width="1.2"/>
                <circle cx="5" cy="10" r="1.5" fill="white" stroke="currentColor" stroke-width="1.2"/>
            </svg>
            Filtros
        </button>
        <span class="class-listing-filters-count">
            @if ($products->total() > 0)
                Mostrando {{ $products->firstItem() }}–{{ $products->lastItem() }} de {{ $products->total() }} resultados
            @else
                Sin resultados
            @endif
        </span>
    </div>
</div>


<!-- ============================
FILTROS — SIDEBAR
============================ -->
<div class="class-filtros-overlay"></div>

<aside class="class-filtros-sidebar">

    <div class="class-filtros-top">
        <div class="class-filtros-close"></div>
    </div>

    <div class="class-filtros-content">

        <h2 class="class-filtros-title">FILTRAR POR:</h2>

        <!-- PRECIO -->
        <div class="class-filtros-section">

            <h3 class="class-filtros-heading">Precio</h3>

            <div class="class-filtros-price-slider">
                <div class="class-filtros-price-track">
                    <div class="class-filtros-price-range"></div>
                </div>
                <input type="range" class="class-filtros-price-input class-filtros-price-min" min="0" max="500" value="180" step="1">
                <input type="range" class="class-filtros-price-input class-filtros-price-max" min="0" max="500" value="225" step="1">
            </div>

            <div class="class-filtros-price-values">
                <span class="class-filtros-price-min-label">S/.180.00</span>
                <span class="class-filtros-price-max-label">S/.225.00</span>
            </div>

        </div>

        <!-- COLORES -->
        <div class="class-filtros-section">

            <h3 class="class-filtros-heading">Colores</h3>

            <div class="class-filtros-list">
                @foreach ([
                    ['Negro', 42], ['Gris', 17], ['Marrón', 14], ['Beige', 31],
                    ['Blanco', 7], ['Azul', 10], ['Taupe', 5], ['Amarillo', 53],
                    ['Rojo', 42], ['Verde jade', 17], ['Verde menta', 14], ['Arena', 31],
                    ['Terracota', 7], ['Capuccino', 10], ['Grafito', 5], ['Celeste', 53],
                ] as [$colorName, $colorCount])
                    <label class="class-filtros-item">
                        <span class="class-filtros-item-left">
                            <input type="checkbox" name="color[]" value="{{ $colorName }}">
                            <span>{{ $colorName }}</span>
                        </span>
                        <span class="class-filtros-item-count">{{ $colorCount }}</span>
                    </label>
                @endforeach
            </div>

        </div>

        <!-- MATERIAL -->
        <div class="class-filtros-section">

            <h3 class="class-filtros-heading">Material</h3>

            <div class="class-filtros-list">
                @foreach ([
                    ['Polipropileno', 42], ['Metal', 17], ['Madera', 14],
                ] as [$materialName, $materialCount])
                    <label class="class-filtros-item">
                        <span class="class-filtros-item-left">
                            <input type="checkbox" name="material[]" value="{{ $materialName }}">
                            <span>{{ $materialName }}</span>
                        </span>
                        <span class="class-filtros-item-count">{{ $materialCount }}</span>
                    </label>
                @endforeach
            </div>

        </div>

    </div>

</aside>


<!-- ============================
GRID PRODUCTOS
============================ -->
<div class="class-listing-body">
    <div class="class-listing-container">

        @if ($products->isEmpty())
            <p style="padding: 40px 0; text-align:center; color:#6b7280;">
                @if ($search !== '')
                    No encontramos productos que coincidan con "{{ $search }}".
                @else
                    Todavía no hay productos publicados. Vuelve pronto.
                @endif
            </p>
        @else
            <div class="class-listing-grid">
                @foreach ($products as $product)
                    <x-product-card
                        :name="$product->name"
                        :category="$product->category"
                        price="S/{{ number_format($product->display_price, 2) }}"
                        :old-price="$product->has_discount ? 'S/'.number_format($product->regular_price, 2) : null"
                        :image="$product->image ? 'storage/'.$product->image : 'image/comedor.png'"
                        :hover-image="optional($product->images->first())->path ? 'storage/'.$product->images->first()->path : null"
                        :swatches="$product->swatches ?? []"
                        :swatch-count="$product->swatches && count($product->swatches) > 1 ? '+'.(count($product->swatches) - 1) : null"
                        :url="route('productos.show', $product)"
                    />
                @endforeach
            </div>

            {{ $products->links('partials.pagination') }}
        @endif

    </div>
</div>

@endsection
