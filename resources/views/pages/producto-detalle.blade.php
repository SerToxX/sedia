@extends('layouts.app')

@section('title', $product->name)
@section('description', $product->description ?: ($product->category.' — '.$product->name.' | Sedia'))

@section('body-class', 'class-producto-page')

@push('styles')
    @vite('resources/css/producto-detalle.css')
@endpush

@section('content')

<div class="class-producto" data-producto data-checkout-url="{{ route('checkout') }}">

    <div class="class-producto-container">

        <div class="class-producto-layout">

            {{-- ============ GALERÍA ============ --}}
            <div class="class-producto-gallery">

                @if ($product->category)
                    <span class="class-producto-breadcrumb">Productos/ {{ $product->category }}</span>
                @endif

                <div class="class-producto-gallery-main">
                    @foreach ($product->gallery_urls as $i => $url)
                        <div class="class-producto-main-img{{ $i === 0 ? ' is-active' : '' }}" data-image="{{ $i }}">
                            <img src="{{ $url }}" alt="{{ $product->name }}">

                            @if ($i === min(3, count($product->gallery_urls) - 1) && count($product->gallery_urls) > 4)
                                <a href="#" class="class-producto-more-link">VER MÁS IMÁGENES</a>
                            @endif
                        </div>
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
                            Color: <strong data-color-name>{{ is_array($product->swatches[0] ?? null) ? ($product->swatches[0]['name'] ?? '') : '' }}</strong>
                        </span>
                        <div class="class-producto-swatch-row">
                            @foreach ($product->swatches as $i => $swatch)
                                @php($swatchHex = is_array($swatch) ? ($swatch['hex'] ?? '#ccc') : $swatch)
                                <button type="button"
                                        class="class-producto-swatch{{ $i === 0 ? ' is-active' : '' }}"
                                        style="--swatch-color: {{ $swatchHex }};"
                                        data-swatch="{{ $i }}"
                                        data-swatch-name="{{ is_array($swatch) ? ($swatch['name'] ?? '') : '' }}">
                                    <span class="class-producto-swatch-fill" style="background: {{ $swatchHex }};"></span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="class-producto-buy-row">
                    <div class="class-producto-qty">
                        <button type="button" class="class-producto-qty-btn" data-qty-down aria-label="Disminuir cantidad">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><line x1="0.125" y1="7" x2="13.875" y2="7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </button>
                        <span class="class-producto-qty-num" data-qty-value>1</span>
                        <button type="button" class="class-producto-qty-btn" data-qty-up aria-label="Aumentar cantidad">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><line x1="7" y1="0.125" x2="7" y2="13.875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><line x1="0.125" y1="7" x2="13.875" y2="7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </button>
                    </div>

                    <button type="button"
                            class="class-producto-add-btn"
                            data-cart-id="{{ $product->slug }}"
                            data-cart-name="{{ $product->name }}"
                            data-cart-price="{{ $product->display_price }}"
                            data-cart-image="{{ $product->gallery_urls[0] ?? '' }}"
                            data-cart-category="{{ $product->category }}"
                            data-add-to-cart>
                        AÑADIR AL CARRITO
                    </button>
                </div>

                <button type="button" class="class-producto-buy-btn" data-buy-now>COMPRAR AHORA</button>

                <div class="class-producto-benefits">
                    <div class="class-producto-benefit">
                        <span class="class-producto-benefit-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="1" y="6" width="14" height="10" rx="1"/><path d="M15 10h4l3 3v3h-7z"/><circle cx="6" cy="18.5" r="1.6"/><circle cx="17.5" cy="18.5" r="1.6"/></svg>
                        </span>
                        <div>
                            <strong>Envíos a todo el Perú</strong>
                            <p>Realizamos envíos a todo el Perú mediante la agencia de tu preferencia, como Shalom, Marvisur u otra de tu elección.</p>
                        </div>
                    </div>

                    <div class="class-producto-benefit">
                        <span class="class-producto-benefit-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="12" r="9"/><path d="M12 7v10M9 9.5c0-1.1 1.3-2 3-2s3 .8 3 1.8c0 2.4-6 1-6 3.4 0 1 1.3 1.8 3 1.8s3-.9 3-2"/></svg>
                        </span>
                        <div>
                            <strong>El envío se calcula</strong>
                            <p>En provincia, el costo lo determina la agencia de transporte. En Lima, el delivery varía según la distancia de entrega.</p>
                        </div>
                    </div>

                    <div class="class-producto-benefit">
                        <span class="class-producto-benefit-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3" y="8" width="18" height="13" rx="1"/><path d="M3 12h18M12 8v13"/><path d="M12 8c-1.8 0-3.2-1-3.2-2.5S9.3 3 11 3c1.4 0 2 1.4 1 2.3M12 8c1.8 0 3.2-1 3.2-2.5S14.7 3 13 3c-1.4 0-2 1.4-1 2.3"/></svg>
                        </span>
                        <div>
                            <strong>Recibe tu pedido en 2-5 días</strong>
                            <p>El tiempo de entrega es referencial y puede variar según el destino y la agencia de transporte.</p>
                        </div>
                    </div>
                </div>

                @if ($product->description)
                    <div class="class-producto-description">
                        <h3>Descripción</h3>
                        <p>{{ $product->description }}</p>
                    </div>
                @endif

                <div class="class-producto-medidas">
                    <h3>Medidas</h3>
                    <ul>
                        <li>Alto: 55 cm</li>
                        <li>Ancho: 53 cm</li>
                        <li>Profundidad: 45 cm</li>
                    </ul>
                </div>

                <div class="class-producto-extra">
                    <h3>Información adicional</h3>
                    <div class="class-producto-extra-list">
                        <div class="class-producto-extra-item">
                            <span class="class-producto-extra-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 3s6 6.2 6 10.5A6 6 0 0 1 6 13.5C6 9.2 12 3 12 3z"/><path d="M9 14c0 1.4 1.2 2.5 3 2.5"/></svg>
                            </span>
                            <span>Antimanchas</span>
                        </div>
                        <div class="class-producto-extra-item">
                            <span class="class-producto-extra-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 16c0-5 3.6-9 8-9s8 4 8 9"/><rect x="3" y="16" width="18" height="4" rx="1"/></svg>
                            </span>
                            <span>Fácil limpieza</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    {{-- ============ MARCA / HISTORIA ============ --}}
    <section class="class-producto-brand">
        <h2>{{ Str::upper($product->name) }}</h2>
        <span class="class-producto-brand-tag">Diseño italiano moderno</span>
        <p>Producto italiano de un solo bloque con filtro UV, que garantiza su gran calidad, ya que está hecha con fibra de vidrio reforzado y tecnología de moldeo por aire.</p>
    </section>

    {{-- ============ IMAGEN AMBIENTE ============ --}}
    <section class="class-producto-lifestyle">
        <img src="{{ asset('image/ambiente1.png') }}" alt="{{ $product->name }} en ambiente" loading="lazy">
    </section>

    {{-- ============ RECOMENDADOS ============ --}}
    @if ($relacionados->isNotEmpty())
        <section class="class-producto-related-title-section">
            <h2 class="class-producto-related-title">Productos recomendados</h2>
        </section>

        <div class="class-producto-related">
            <div class="class-producto-related-grid">
                @foreach ($relacionados as $rel)
                    <x-product-card
                        :name="$rel->name"
                        :category="$rel->category"
                        :price="'S/ '.number_format($rel->display_price, 2)"
                        :old-price="$rel->has_discount ? 'S/ '.number_format($rel->regular_price, 2) : null"
                        :image="$rel->gallery_urls[0] ?? asset('image/comedor.png')"
                        :url="route('productos.show', $rel)"
                        :swatches="$rel->swatches ?: []"
                        :swatch-count="$rel->swatches ? '+'.count($rel->swatches) : null"
                    />
                @endforeach
            </div>
        </div>
    @endif


</div>

@endsection

@push('scripts')
    @vite('resources/js/producto-detalle.js')
@endpush
