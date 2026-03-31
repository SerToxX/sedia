<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/productos', function () {
    return view('pages.productos');
});

Route::get('/contacto', function () {
    return view('pages.contacto');
});