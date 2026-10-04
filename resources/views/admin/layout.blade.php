<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Panel') | Sedia Admin</title>

    {{-- Google Fonts: carga bloqueante a propósito. El panel usa Turbo Drive
    (ver abajo), así que este <head> solo se procesa una vez por sesión —
    el truco de carga async (pensado para el sitio público) solo causaba un
    parpadeo de fuente sin aplicar en cada navegación del panel. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    @vite(['resources/css/admin.css', 'resources/css/toast.css', 'resources/js/admin.js'])

    {{-- Turbo Drive: intercepta clics en enlaces y envíos de formularios del
    panel para traer la página nueva por fetch y reemplazar solo el <body>,
    en vez de recargar todo el documento en cada navegación. --}}
    <script src="https://cdn.jsdelivr.net/npm/@hotwired/turbo@8.0.12/dist/turbo.es2017-umd.min.js"></script>

    {{-- Alpine.js solo para el panel de administración — no toca el sitio público --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

    @if (session('success'))
        <script>window.__adminFlash = { type: 'success', title: 'Listo', message: @json(session('success')) };</script>
    @elseif ($errors->any())
        <script>window.__adminFlash = { type: 'error', title: 'Revisa el formulario', message: @json($errors->first()) };</script>
    @endif
</head>

<body class="class-admin">

    @include('partials.message-toast')

    <div class="class-admin-shell">

        <div id="classAdminSidebarOverlay" class="class-admin-sidebar-overlay"></div>

        <aside id="classAdminSidebar" class="class-admin-sidebar">

            <div class="class-admin-sidebar-brand">
                SEDIA
            </div>

            <nav class="class-admin-sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                    <x-admin-icon name="dashboard" />
                    Dashboard
                </a>
                <a href="{{ route('admin.pedidos.index') }}" class="{{ request()->routeIs('admin.pedidos.*') ? 'is-active' : '' }}">
                    <x-admin-icon name="bag" />
                    Pedidos
                </a>
                <a href="{{ route('admin.clientes.index') }}" class="{{ request()->routeIs('admin.clientes.*') ? 'is-active' : '' }}">
                    <x-admin-icon name="users" />
                    Clientes
                </a>
                <a href="{{ route('admin.inventario.index') }}" class="{{ request()->routeIs('admin.inventario.*') ? 'is-active' : '' }}">
                    <x-admin-icon name="archive" />
                    Inventario
                </a>
                <a href="{{ route('admin.conversaciones.index') }}" class="{{ request()->routeIs('admin.conversaciones.*') ? 'is-active' : '' }}">
                    <x-admin-icon name="chat" />
                    Conversaciones
                </a>
                <a href="{{ route('admin.configuraciones.index') }}" class="{{ request()->routeIs('admin.configuraciones.*') ? 'is-active' : '' }}">
                    <x-admin-icon name="settings" />
                    Configuraciones
                </a>

                <div class="class-admin-sidebar-divider"></div>

                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'is-active' : '' }}">
                    <x-admin-icon name="package" />
                    Productos
                </a>
                <a href="{{ route('admin.banners.index') }}" class="{{ request()->routeIs('admin.banners.*') ? 'is-active' : '' }}">
                    <x-admin-icon name="image" />
                    Banners
                </a>
            </nav>

            <div class="class-admin-sidebar-footer">
                <a href="{{ route('inicio') }}" target="_blank" class="class-admin-sidebar-store-link">
                    <x-admin-icon name="store" />
                    Volver a Sedia
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="class-admin-sidebar-logout">
                        <x-admin-icon name="logout" />
                        Cerrar Sesión
                    </button>
                </form>
            </div>

        </aside>

        <div class="class-admin-content">

            <header class="class-admin-topbar">
                <button id="classAdminHamburger" type="button" class="class-admin-hamburger" aria-label="Menú">
                    <x-admin-icon name="menu" />
                </button>

                <h1 class="class-admin-topbar-title">@yield('title', 'Panel')</h1>

                <div class="class-admin-topbar-actions">
                    <div class="class-admin-date-pill">
                        <span>{{ now()->format('d-m-y') }}</span>
                        <x-admin-icon name="chevron-down" />
                    </div>

                    <button type="button" class="class-admin-icon-btn class-admin-topbar-bell" title="Notificaciones">
                        <x-admin-icon name="bell" />
                    </button>

                    <button id="classAdminThemeToggle" type="button" class="class-admin-theme-toggle" title="Cambiar tema">
                        <x-admin-icon name="sun" class="class-admin-icon-sun" />
                        <x-admin-icon name="moon" class="class-admin-icon-moon" />
                    </button>

                    <div class="class-admin-avatar" title="{{ auth('admin')->user()?->name }}">
                        {{ strtoupper(substr(auth('admin')->user()?->name ?? 'A', 0, 1)) }}
                    </div>
                </div>
            </header>

            <div class="class-admin-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">
                    <x-admin-icon name="home" />
                </a>
            </div>

            <main class="class-admin-main">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>
