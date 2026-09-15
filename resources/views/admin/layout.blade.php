<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Panel') | Sedia Admin</title>

    {{-- Google Fonts de forma no bloqueante --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
          href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
          rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
              rel="stylesheet">
    </noscript>

    @vite(['resources/css/admin.css', 'resources/css/toast.css', 'resources/js/admin.js'])

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

        <header class="class-admin-topnav">
            <div class="class-admin-topnav-inner">
                <div class="class-admin-topnav-brand">
                    Sedia <span style="font-size: 15px; font-family: 'Poppins', sans-serif; font-weight: 500; color: hsl(var(--muted-foreground)); align-self: flex-end; margin-bottom: 4px;">Admin</span>
                </div>

                <nav class="class-admin-topnav-links">
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                        <x-admin-icon name="dashboard" />
                        Dashboard
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'is-active' : '' }}">
                        <x-admin-icon name="package" />
                        Productos
                    </a>
                </nav>

                <div class="class-admin-topnav-actions">
                    <span class="class-admin-badge-role">Admin</span>

                    <button id="classAdminThemeToggle" type="button" class="class-admin-theme-toggle" title="Cambiar tema">
                        <x-admin-icon name="sun" class="class-admin-icon-sun" />
                        <x-admin-icon name="moon" class="class-admin-icon-moon" />
                    </button>

                    <a href="{{ route('inicio') }}" target="_blank" class="class-admin-store-link class-admin-topnav-desktop-only">
                        Volver a Sedia
                    </a>

                    <form method="POST" action="{{ route('admin.logout') }}" class="class-admin-topnav-desktop-only">
                        @csrf
                        <button type="submit" class="class-admin-logout-btn">
                            <x-admin-icon name="logout" />
                            Cerrar sesión
                        </button>
                    </form>

                    <button id="classAdminHamburger" type="button" class="class-admin-icon-btn class-admin-hamburger" aria-label="Menú">
                        <x-admin-icon name="menu" />
                    </button>
                </div>
            </div>

            <div id="classAdminSidebarOverlay" class="class-admin-mobile-nav-overlay"></div>
            <nav id="classAdminSidebar" class="class-admin-mobile-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                    <x-admin-icon name="dashboard" />
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'is-active' : '' }}">
                    <x-admin-icon name="package" />
                    Productos
                </a>
                <div class="class-admin-mobile-nav-divider"></div>
                <a href="{{ route('inicio') }}" target="_blank">
                    Volver a Sedia
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit">
                        <x-admin-icon name="logout" />
                        Cerrar sesión
                    </button>
                </form>
            </nav>
        </header>

        <div class="class-admin-content">
            <div class="class-admin-main">
                @yield('content')
            </div>
        </div>

    </div>

</body>

</html>
