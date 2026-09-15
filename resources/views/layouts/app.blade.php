<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Sedia — Colección exclusiva de sillas, mesas y muebles de diseño para tu hogar.')">

    <title>@yield('title', 'Sedia') | Muebles exclusivos</title>

    {{-- Open Graph --}}
    <meta property="og:type"        content="website">
    <meta property="og:site_name"   content="Sedia">
    <meta property="og:title"       content="@yield('title', 'Sedia') | Muebles exclusivos">
    <meta property="og:description" content="@yield('description', 'Sedia — Colección exclusiva de sillas, mesas y muebles de diseño para tu hogar.')">

    {{-- Google Fonts de forma no bloqueante --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
          href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@400;500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@400;500&display=swap"
          rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@400;500&display=swap"
              rel="stylesheet">
    </noscript>

    {{-- CSS global: Tailwind + header + footer --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/header.js'])

    {{-- CSS específico de cada página --}}
    @stack('styles')

</head>

<body class="@yield('body-class')">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')

</body>

</html>
