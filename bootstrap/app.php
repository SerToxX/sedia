<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Confía en las cabeceras X-Forwarded-* del proxy (Traefik en Coolify, o
        // cualquier túnel de desarrollo): sin esto, asset()/url() generan http://
        // aunque la petición haya llegado por https://, y el navegador bloquea los
        // assets por "mixed content".
        $middleware->trustProxies(at: '*');

        // Invitados que intentan entrar a /dashboard/* sin sesión -> login del panel.
        $middleware->redirectGuestsTo(function ($request) {
            return $request->is('dashboard*') ? route('admin.login') : '/';
        });

        // Admin ya logueado que visita /dashboard/login -> panel.
        $middleware->redirectUsersTo(function ($request) {
            return $request->is('dashboard*') ? route('admin.dashboard') : '/';
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
