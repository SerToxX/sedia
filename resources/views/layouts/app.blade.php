<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedia</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    @viteReactRefresh
    @vite([
    'resources/css/app.css',
    'resources/js/app.jsx',
    'resources/js/header.js'
    ])

</head>

<body class="@yield('body-class')">

    {{-- Header --}}
    @include('partials.header')

    {{-- Contenido --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Scripts por página --}}
    @stack('scripts')

</body>

</html>