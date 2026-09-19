<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SiteSettingController as AdminSiteSettingController;

Route::get('/', [PageController::class, 'home'])->name('inicio');

Route::get('/productos', [PageController::class, 'productos'])->name('productos');

Route::get('/productos/{product:slug}', [PageController::class, 'productoDetalle'])->name('productos.show');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

Route::get('/preguntas-frecuentes', [PageController::class, 'preguntasFrecuentes'])->name('faq');

Route::get('/terminos-condiciones', [PageController::class, 'terminosCondiciones'])->name('terminos');

Route::get('/politicas-devolucion', [PageController::class, 'politicasDevolucion'])->name('politicas-devolucion');

Route::get('/proyectos', [PageController::class, 'proyectos'])->name('proyectos');

Route::get('/sobre-nosotros', [PageController::class, 'sobreNosotros'])->name('nosotros');

Route::get('/libro-reclamaciones', [PageController::class, 'libroReclamaciones'])->name('libro-reclamaciones');

Route::get('/contactanos', [PageController::class, 'contactanos'])->name('contactanos');

Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');

Route::post('/contacto', [ContactoController::class, 'enviar'])
    ->name('contacto.enviar');

Route::post('/contactanos', [ContactoController::class, 'enviarContactanos'])
    ->name('contactanos.enviar');

Route::get('/blog', [PageController::class, 'blog'])->name('blog');

Route::get('/blog-post', [PageController::class, 'blogPost'])->name('blog-post');


// ============================
// PANEL DE ADMINISTRACIÓN (/dashboard)
// No afecta ninguna ruta ni vista del sitio público de arriba.
// ============================
Route::prefix('dashboard')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.attempt');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::get('/productos', [AdminProductController::class, 'index'])->name('products.index');
        Route::post('/productos', [AdminProductController::class, 'store'])->name('products.store');
        Route::put('/productos/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('/productos/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
        Route::delete('/productos/imagenes/{productImage}', [AdminProductController::class, 'destroyImage'])->name('products.images.destroy');

        Route::get('/banner', [AdminSiteSettingController::class, 'edit'])->name('banner.edit');
        Route::put('/banner', [AdminSiteSettingController::class, 'update'])->name('banner.update');
    });
});
