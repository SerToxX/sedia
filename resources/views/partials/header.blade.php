<header class="class-header-container">

    <nav class="class-header-nav">

        <!-- IZQUIERDA -->
        <div class="class-header-left">
            <span class="class-header-menu-icon">≡</span>
            <span class="class-header-menu-text">MENU</span>
        </div>

        <!-- CENTRO -->
        <div class="class-header-center">
            <h1 class="class-header-logo"> <a href="{{ route('inicio') }}">SEDIA</h1>
        </div>

        <!-- DERECHA -->
        <div class="class-header-right">
            <span class="class-header-cart-text">CARRITO</span>
            <span class="class-header-cart-count">1</span>
        </div>

    </nav>

</header>

<div class="class-menu-overlay"></div>

<aside class="class-menu-sidebar">

    <!-- HEADER MENU -->

    <div class="class-menu-top">

        <div class="class-menu-title">
            <span class="class-menu-icon">≡</span>
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

            <a class="class-menu-link {{ request()->routeIs('contacto') ? 'active' : '' }}" 
            href="{{ route('contacto') }}">
                Contáctanos
            </a>

            <a class="class-menu-link {{ request()->routeIs('blog') ? 'active' : '' }}" 
            href="{{ route('contacto') }}">
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