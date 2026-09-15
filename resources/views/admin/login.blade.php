<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Ingresar | Sedia Admin</title>

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

    @vite(['resources/css/admin.css'])
</head>

<body class="class-admin class-admin-login-page">

    <div class="class-admin-login-box">
        <div class="class-admin-login-brand">
            <span class="class-admin-logo-dot"></span>
            <span>Sedia Admin</span>
        </div>
        <p class="class-admin-login-title">Ingresar al panel</p>
        <p class="class-admin-login-subtitle">Administra el catálogo de productos.</p>

        @if ($errors->any())
            <div class="class-admin-alert class-admin-alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.attempt') }}">
            @csrf

            <div class="class-admin-field">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" class="class-admin-input"
                       value="{{ old('username') }}" autofocus required>
            </div>

            <div class="class-admin-field">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="class-admin-input" required>
            </div>

            <button type="submit" class="class-admin-btn class-admin-btn-block">Ingresar</button>
        </form>
    </div>

</body>

</html>
