<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('pages.home');
})->name('inicio');

Route::get('/productos', function () {
    return view('pages.productos');
})->name('productos');

Route::get('/contacto', function () {
    return view('pages.contacto.contacto');
})->name('contacto');

Route::get('/preguntas-frecuentes', function () {
    return view('pages.preguntas-frecuentes.preguntas-frecuentes');
})->name('faq');

Route::get('/terminos-condiciones', function () {
    return view('pages.terminos-condiciones.terminos-condiciones');
})->name('terminos');

Route::get('/politicas-devolucion', function () {
    return view('pages.politicas-devolucion.politicas-devolucion');
})->name('politicas-devolucion');

Route::get('/proyectos', function () {
    return view('pages.proyectos.proyectos');
})->name('proyectos');

Route::get('/sobre-nosotros', function () {
    return view('pages.sobre-nosotros.sobre-nosotros');
})->name('nosotros');

Route::post('/contacto', [ContactoController::class, 'enviar'])
    ->name('contacto.enviar');