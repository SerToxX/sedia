<header class="class-header-container">

    <nav class="class-header-nav">

        <!-- IZQUIERDA -->
        <div class="class-header-left">
            <span class="class-header-menu-icon">≡</span>
            <span class="class-header-menu-text">MENU</span>
        </div>

        <!-- CENTRO -->
        <div class="class-header-center">
            <h1 class="class-header-logo">SEDIA</h1>
        </div>

        <!-- DERECHA -->
        <div class="class-header-right">
            <span class="class-header-cart-text">CARRITO</span>
            <span class="class-header-cart-count">1</span>
        </div>

        <ul>
            <li><a href="/">Inicio</a></li>
            <li>
                <a href="{{ route('proyectos') }}">
                    Proyectos
                </a>
            </li>
            <li><a href="/productos">Productos</a></li>
            <li><a href="/contacto">Contacto</a></li>
        </ul>

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

            <a class="class-menu-link" href="{{ route('nosotros') }}">Sobre nosotros</a>
            <a class="class-menu-link" href="{{ route('proyectos') }}">Proyectos</a>
            <a class="class-menu-link">Contáctanos</a>
            <a class="class-menu-link">Blog</a>

        </div>


        <!-- PRODUCTOS -->
        <div class="class-menu-group">

            <div class="class-menu-title">
                Productos
            </div>

            <a class="class-menu-link">Promociones</a>


            <!-- SILLAS -->
            <div class="class-menu-dropdown">
                <span>Sillas</span>
                <span class="class-menu-arrow"></span>
            </div>

            <div class="class-menu-sub">
                <a>obj1</a>
                <a>obj2</a>
            </div>


            <!-- TABURETES -->
            <div class="class-menu-dropdown">
                <span>Taburetes</span>
                <span class="class-menu-arrow"></span>
            </div>

            <div class="class-menu-sub">
                <a>obj1</a>
                <a>obj2</a>
            </div>


            <!-- MESAS -->
            <div class="class-menu-dropdown">
                <span>Mesas</span>
                <span class="class-menu-arrow"></span>
            </div>

            <div class="class-menu-sub">
                <a>obj1</a>
                <a>obj2</a>
            </div>


            <a class="class-menu-link">Bases de mesa</a>
            <a class="class-menu-link">Tableros de mesa</a>


            <!-- MOBILIARIO -->
            <div class="class-menu-dropdown">
                <span>Mobiliario de Negocio</span>
                <span class="class-menu-arrow"></span>
            </div>

            <div class="class-menu-sub">
                <a>obj1</a>
                <a>obj2</a>
            </div>

        </div>

    </div>

</aside>