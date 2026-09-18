<header class="class-header-container">

    <nav class="class-header-nav">

        <!-- IZQUIERDA -->
        <div class="class-header-left">
            <img src="{{ asset('image/svg/burger.svg') }}" alt="Menú" class="class-header-menu-icon">
            <span class="class-header-menu-text">MENU</span>
        </div>

        <!-- CENTRO -->
        <div class="class-header-center">
            <p class="class-header-logo"><a href="{{ route('inicio') }}">SEDIA</a></p>
        </div>

        <!-- DERECHA -->
        <div class="class-header-right">

            <!-- SEARCH -->

            <form class="class-header-search" action="{{ route('productos') }}" method="GET">

                <input
                    type="text"
                    name="q"
                    value="{{ request()->routeIs('productos') ? request('q') : '' }}"
                    placeholder="Buscar productos"
                    autocomplete="off"
                    class="class-header-search-input">

                <button type="submit" class="class-header-search-icon" aria-label="Buscar">
                    <img src="{{ asset('image/icons/header/icon-search.svg') }}" alt="Buscar">
                </button>

            </form>

            <!-- CARRITO -->
            <a href="/carrito" class="class-header-cart-icon class-desplegable-carrito-btn">
                <img src="{{ asset('image/icons/header/icon-cart.svg') }}" alt="Carrito">
            </a>

            <!-- CONTADOR -->
            <div class="class-header-cart-count">
                0
            </div>

        </div>
    </nav>

</header>

<div class="class-menu-overlay"></div>

<div class="class-desplegable-carrito-overlay"></div>

<aside class="class-desplegable-carrito-sidebar">

    <!-- TOP -->
    <div class="class-desplegable-carrito-top">
        <span class="class-desplegable-carrito-title">Tu Carrito</span>
        <div class="class-desplegable-carrito-close"></div>
    </div>

    <!-- ITEMS -->
    <div class="class-desplegable-carrito-content">

        <div class="class-desplegable-carrito-item">
            <img src="image/products/piu.jpg" alt="Piu" class="class-desplegable-carrito-item-img">
            <div class="class-desplegable-carrito-item-info">
                <span class="class-desplegable-carrito-item-name">Piu</span>
                <span class="class-desplegable-carrito-item-variant">Arena | 5 unidades</span>
                <div class="class-desplegable-carrito-item-prices">
                    <span class="class-desplegable-carrito-item-old">$50</span>
                    <span class="class-desplegable-carrito-item-new">$35</span>
                </div>
                <span class="class-desplegable-carrito-item-discount">(30% Dscto)</span>
            </div>
            <div class="class-desplegable-carrito-item-right">
                <button class="class-desplegable-carrito-item-delete" aria-label="Eliminar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                </button>
                <div class="class-desplegable-carrito-item-qty">
                    <button class="class-desplegable-carrito-qty-btn">−</button>
                    <span class="class-desplegable-carrito-qty-num">1</span>
                    <button class="class-desplegable-carrito-qty-btn">+</button>
                </div>
            </div>
        </div>

        <div class="class-desplegable-carrito-item">
            <img src="image/products/roma.jpg" alt="Roma" class="class-desplegable-carrito-item-img">
            <div class="class-desplegable-carrito-item-info">
                <span class="class-desplegable-carrito-item-name">Roma</span>
                <span class="class-desplegable-carrito-item-variant">Marron | 2 unidades</span>
                <div class="class-desplegable-carrito-item-prices">
                    <span class="class-desplegable-carrito-item-old">$238</span>
                    <span class="class-desplegable-carrito-item-new">$167</span>
                </div>
            </div>
            <div class="class-desplegable-carrito-item-right">
                <button class="class-desplegable-carrito-item-delete" aria-label="Eliminar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                </button>
                <div class="class-desplegable-carrito-item-qty">
                    <button class="class-desplegable-carrito-qty-btn">−</button>
                    <span class="class-desplegable-carrito-qty-num">1</span>
                    <button class="class-desplegable-carrito-qty-btn">+</button>
                </div>
            </div>
        </div>

        <div class="class-desplegable-carrito-item">
            <img src="image/products/itze.jpg" alt="Itze" class="class-desplegable-carrito-item-img">
            <div class="class-desplegable-carrito-item-info">
                <span class="class-desplegable-carrito-item-name">Itze</span>
                <span class="class-desplegable-carrito-item-variant">Marron | 2 unidades</span>
                <div class="class-desplegable-carrito-item-prices">
                    <span class="class-desplegable-carrito-item-old">$238</span>
                    <span class="class-desplegable-carrito-item-new">$167</span>
                </div>
            </div>
            <div class="class-desplegable-carrito-item-right">
                <button class="class-desplegable-carrito-item-delete" aria-label="Eliminar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                </button>
                <div class="class-desplegable-carrito-item-qty">
                    <button class="class-desplegable-carrito-qty-btn">−</button>
                    <span class="class-desplegable-carrito-qty-num">1</span>
                    <button class="class-desplegable-carrito-qty-btn">+</button>
                </div>
            </div>
        </div>

    </div>

    <!-- FOOTER -->
    <div class="class-desplegable-carrito-footer">
        <div class="class-desplegable-carrito-subtotal">
            <span>Subtotal <span class="class-desplegable-carrito-subtotal-count">(2 artículos)</span></span>
            <span class="class-desplegable-carrito-subtotal-price">$202</span>
        </div>
        <a href="/carrito" class="class-desplegable-carrito-btn-ver">VER CARRITO</a>
        <a href="/checkout" class="class-desplegable-carrito-btn-comprar">FINALIZAR COMPRA</a>
    </div>

</aside>

<aside class="class-menu-sidebar">

    <!-- HEADER MENU -->

    <div class="class-menu-top">

        <div class="class-menu-title">
            <img src="{{ asset('image/svg/burger.svg') }}" alt="Menú" class="class-menu-icon">
            <span>MENU</span>
        </div>

        <div class="class-menu-close"></div>

    </div>


    <!-- MENU CONTENT -->

    <div class="class-menu-content">

        <!-- NOSOTROS -->
        <div class="class-menu-group">

            <div class="class-menu-title">
                Nosotros
            </div>

            <a class="class-menu-link {{ request()->routeIs('nosotros') ? 'active' : '' }}"
                href="{{ route('nosotros') }}">
                Sobre nosotros
            </a>

            <a class="class-menu-link {{ request()->routeIs('proyectos') ? 'active' : '' }}"
                href="{{ route('proyectos') }}">
                Proyectos
            </a>

            <a class="class-menu-link {{ request()->routeIs('contactanos') ? 'active' : '' }}"
                href="{{ route('contactanos') }}">
                Contáctanos
            </a>

            <a class="class-menu-link {{ request()->routeIs('blog') ? 'active' : '' }}"
                href="{{ route('blog') }}">
                Blog
            </a>

        </div>


        <!-- PRODUCTOS -->
        <div class="class-menu-group">

            <div class="class-menu-title">
                Productos
            </div>

            <a class="class-menu-link {{ request()->is('productos/promociones') ? 'active' : '' }}"
                href="/productos/promociones">
                Promociones
            </a>

            <a class="class-menu-link {{ request()->routeIs('productos') ? 'active' : '' }}"
                href="{{ route('productos') }}">
                Productos
            </a>


            <!-- SILLAS -->
            <div class="class-menu-dropdown">
                <span>Sillas</span>
                <span class="class-menu-arrow"></span>
            </div>

            <div class="class-menu-sub">
                <a class="{{ request()->is('productos/sillas/obj1') ? 'active' : '' }}" href="/productos/sillas/obj1">obj1</a>
                <a class="{{ request()->is('productos/sillas/obj2') ? 'active' : '' }}" href="/productos/sillas/obj2">obj2</a>
            </div>


            <!-- TABURETES -->
            <div class="class-menu-dropdown">
                <span>Taburetes</span>
                <span class="class-menu-arrow"></span>
            </div>

            <div class="class-menu-sub">
                <a class="{{ request()->is('productos/taburetes/obj1') ? 'active' : '' }}" href="/productos/taburetes/obj1">obj1</a>
                <a class="{{ request()->is('productos/taburetes/obj2') ? 'active' : '' }}" href="/productos/taburetes/obj2">obj2</a>
            </div>


            <!-- MESAS -->
            <div class="class-menu-dropdown">
                <span>Mesas</span>
                <span class="class-menu-arrow"></span>
            </div>

            <div class="class-menu-sub">
                <a class="{{ request()->is('productos/mesas/obj1') ? 'active' : '' }}" href="/productos/mesas/obj1">obj1</a>
                <a class="{{ request()->is('productos/mesas/obj2') ? 'active' : '' }}" href="/productos/mesas/obj2">obj2</a>
            </div>


            <a class="class-menu-link {{ request()->is('productos/bases-mesa') ? 'active' : '' }}"
                href="/productos/bases-mesa">
                Bases de mesa
            </a>

            <a class="class-menu-link {{ request()->is('productos/tableros-mesa') ? 'active' : '' }}"
                href="/productos/tableros-mesa">
                Tableros de mesa
            </a>


            <!-- MOBILIARIO -->
            <div class="class-menu-dropdown">
                <span>Mobiliario de Negocio</span>
                <span class="class-menu-arrow"></span>
            </div>

            <div class="class-menu-sub">
                <a class="{{ request()->is('productos/mobiliario/obj1') ? 'active' : '' }}" href="/productos/mobiliario/obj1">obj1</a>
                <a class="{{ request()->is('productos/mobiliario/obj2') ? 'active' : '' }}" href="/productos/mobiliario/obj2">obj2</a>
            </div>

        </div>

    </div>

</aside>