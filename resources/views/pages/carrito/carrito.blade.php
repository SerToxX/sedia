@extends('layouts.app')

@section('title', 'Carrito de compras')
@section('description', 'Revisa los productos de tu carrito de compras en Sedia.')

@section('body-class', 'class-carrito-page')

@push('styles')
    @vite('resources/css/carrito.css')
@endpush

@section('content')

<section class="class-carrito">

    <h1 class="class-carrito-title">Carrito de compras</h1>

    <div class="class-carrito-body">

        <!-- ============================
        COLUMNA IZQUIERDA — ITEMS
        ============================ -->

        <div class="class-carrito-items-col">

            <div class="class-carrito-items">

                <div class="class-carrito-item">
                    <div class="class-carrito-item-img-wrap">
                        <img src="{{ asset('image/productos/product-taupe.jpg') }}" alt="Piu" class="class-carrito-item-img">
                    </div>
                    <div class="class-carrito-item-info">
                        <div class="class-carrito-item-info-top">
                            <span class="class-carrito-item-name">Piu</span>
                            <span class="class-carrito-item-variant">Arena / 3 unidades</span>
                        </div>
                        <span class="class-carrito-item-price">$ 20,00</span>
                    </div>
                    <div class="class-carrito-item-right">
                        <button class="class-carrito-item-delete" aria-label="Eliminar">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><line x1="1" y1="1" x2="11" y2="11"/><line x1="11" y1="1" x2="1" y2="11"/></svg>
                        </button>
                        <div class="class-carrito-item-qty">
                            <button class="class-carrito-qty-btn class-carrito-qty-minus" type="button" disabled aria-label="Restar">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><line x1="0.125" y1="7" x2="13.875" y2="7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                            </button>
                            <span class="class-carrito-qty-num">1</span>
                            <button class="class-carrito-qty-btn class-carrito-qty-plus" type="button" aria-label="Sumar">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><line x1="7" y1="0.125" x2="7" y2="13.875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><line x1="0.125" y1="7" x2="13.875" y2="7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="class-carrito-item">
                    <div class="class-carrito-item-img-wrap">
                        <img src="{{ asset('image/productos/product-nd187.jpg') }}" alt="Roma" class="class-carrito-item-img">
                    </div>
                    <div class="class-carrito-item-info">
                        <div class="class-carrito-item-info-top">
                            <span class="class-carrito-item-name">Roma</span>
                            <span class="class-carrito-item-variant">Marron / 6 unidades</span>
                        </div>
                        <span class="class-carrito-item-price">$ 20,00</span>
                    </div>
                    <div class="class-carrito-item-right">
                        <button class="class-carrito-item-delete" aria-label="Eliminar">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><line x1="1" y1="1" x2="11" y2="11"/><line x1="11" y1="1" x2="1" y2="11"/></svg>
                        </button>
                        <div class="class-carrito-item-qty">
                            <button class="class-carrito-qty-btn class-carrito-qty-minus" type="button" disabled aria-label="Restar">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><line x1="0.125" y1="7" x2="13.875" y2="7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                            </button>
                            <span class="class-carrito-qty-num">1</span>
                            <button class="class-carrito-qty-btn class-carrito-qty-plus" type="button" aria-label="Sumar">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><line x1="7" y1="0.125" x2="7" y2="13.875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><line x1="0.125" y1="7" x2="13.875" y2="7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="class-carrito-item">
                    <div class="class-carrito-item-img-wrap">
                        <img src="{{ asset('image/productos/product-luna.jpg') }}" alt="Itze" class="class-carrito-item-img">
                    </div>
                    <div class="class-carrito-item-info">
                        <div class="class-carrito-item-info-top">
                            <span class="class-carrito-item-name">Itze</span>
                            <span class="class-carrito-item-variant">Marron / 4 unidades</span>
                        </div>
                        <span class="class-carrito-item-price">$ 20,00</span>
                    </div>
                    <div class="class-carrito-item-right">
                        <button class="class-carrito-item-delete" aria-label="Eliminar">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><line x1="1" y1="1" x2="11" y2="11"/><line x1="11" y1="1" x2="1" y2="11"/></svg>
                        </button>
                        <div class="class-carrito-item-qty">
                            <button class="class-carrito-qty-btn class-carrito-qty-minus" type="button" disabled aria-label="Restar">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><line x1="0.125" y1="7" x2="13.875" y2="7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                            </button>
                            <span class="class-carrito-qty-num">1</span>
                            <button class="class-carrito-qty-btn class-carrito-qty-plus" type="button" aria-label="Sumar">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><line x1="7" y1="0.125" x2="7" y2="13.875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><line x1="0.125" y1="7" x2="13.875" y2="7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- CUPÓN -->
            <div class="class-carrito-coupon">
                <p class="class-carrito-coupon-label">
                    Si tiene un código de cupón, por favor aplíquelo a continuación.
                </p>
                <div class="class-carrito-coupon-form">
                    <div class="class-carrito-coupon-field">
                        <input type="text" placeholder="Codigo del cupon" class="class-carrito-coupon-input">
                        <span class="class-carrito-coupon-underline"></span>
                    </div>
                    <button type="button" class="class-carrito-coupon-btn">APLICAR CUPON</button>
                </div>
            </div>

        </div>


        <!-- ============================
        COLUMNA DERECHA — TOTAL
        ============================ -->

        <div class="class-carrito-total-col">

            <h2 class="class-carrito-total-title">Total del carrito</h2>

            <div class="class-carrito-total-box">

                <div class="class-carrito-total-row class-carrito-total-subtotal">
                    <span>SUBTOTAL</span>
                    <span>$ 60,00</span>
                </div>

                <div class="class-carrito-total-row class-carrito-total-shipping">
                    <span>ENVIO</span>
                    <span>Los gastos de envío se calculan en base a la dirección.</span>
                </div>

                <div class="class-carrito-calcular-envio">CALCULAR ENVIO</div>

                <div class="class-carrito-zone-wrap">

                    <button type="button" class="class-carrito-zone-trigger" aria-expanded="false">
                        <span>Lima Metropolitana</span>
                        <svg class="class-carrito-zone-trigger-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none">
                            <path d="M1 1L5 5L9 1" stroke="#707070" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <div class="class-carrito-zone-panel" hidden>

                        @php
                            $zonas = [
                                ['nombre' => 'Zona Sur', 'distritos' => 'Chorrillos, San Juan de Miraflores, Villa El Salvador, Villa María del Triunfo, Pachacamac, Lurín', 'precio' => 'Gratis'],
                                ['nombre' => 'Zona Centro 1', 'distritos' => 'Surco, Surquillo, San Borja, San Luis, Miraflores, Barranco, Lince, San Isidro, La Victoria, Breña, Pueblo Libre, Magdalena del Mar, Jesús María', 'precio' => 'Gratis'],
                                ['nombre' => 'Zona Centro 2', 'distritos' => 'San Miguel, Cercado de Lima, Rímac', 'precio' => 'S/ 15.00'],
                                ['nombre' => 'Zona Este 1', 'distritos' => 'El Agustino, Santa Anita, San Luis, La Molina', 'precio' => 'S/ 15.00'],
                                ['nombre' => 'Zona Este 2', 'distritos' => 'San Juan de Lurigancho, Lurigancho, Ate, Chaclacayo, Cieneguilla', 'precio' => 'S/ 29.00'],
                                ['nombre' => 'Zona Norte 1', 'distritos' => 'San Martín de Porres, Los Olivos, Independencia', 'precio' => 'S/ 20.00'],
                                ['nombre' => 'Zona Norte 2', 'distritos' => 'Puente Piedra, Comas, Ventanilla, Mi Perú', 'precio' => 'S/ 35.00'],
                                ['nombre' => 'Callao', 'distritos' => 'Bellavista, La Perla, Carmen de la Legua Reynoso', 'precio' => 'S/ 25.00'],
                            ];
                        @endphp

                        @foreach ($zonas as $zona)
                            <div class="class-carrito-zone-item">
                                <label class="class-carrito-zone-header">
                                    <input type="checkbox" name="zona_envio" value="{{ $zona['nombre'] }}" class="class-carrito-zone-checkbox">
                                    <span class="class-carrito-zone-name">{{ $zona['nombre'] }}</span>
                                    <span class="class-carrito-zone-price">{{ $zona['precio'] }}</span>
                                </label>
                                <span class="class-carrito-zone-body">
                                    <span class="class-carrito-zone-districts">{{ $zona['distritos'] }}</span>
                                </span>
                            </div>
                        @endforeach

                    </div>

                </div>

                <div class="class-carrito-provincia-wrap">
                    <button type="button" class="class-carrito-provincia-trigger" id="carritoProvinciaTrigger" aria-expanded="false">
                        <span>Provincia</span>
                        <svg class="class-carrito-provincia-trigger-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none">
                            <path d="M1 1L5 5L9 1" stroke="#707070" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="class-carrito-agencia-fields" id="carritoAgenciaFields" hidden>

                    <div class="class-carrito-field">
                        <label class="class-carrito-field-label">Agencia de envío</label>
                        <input type="text" class="class-carrito-field-input" placeholder="Shalom, Olva, Cruz del Sur, etc">
                    </div>

                    <div class="class-carrito-field">
                        <label class="class-carrito-field-label">Dirección de agencia de envío</label>
                        <input type="text" class="class-carrito-field-input">
                    </div>

                </div>

                <div class="class-carrito-total-row class-carrito-total-final">
                    <span>TOTAL</span>
                    <span>$ 87,00</span>
                </div>

                <a href="{{ route('checkout') }}" class="class-carrito-checkout-btn">PROCEDER CON LA COMPRA</a>

            </div>

        </div>

    </div>

</section>

@endsection

@push('scripts')
    @vite('resources/js/carrito.js')
@endpush
