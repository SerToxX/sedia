<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function productos(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        $products = Product::where('active', true)
            ->with('images')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('id')
            ->paginate(16)
            ->withQueryString();

        return view('pages.productos', compact('products', 'search'));
    }

    public function productoDetalle(Product $product)
    {
        abort_unless($product->active, 404);

        return view('pages.producto-detalle', compact('product'));
    }

    public function preguntasFrecuentes()
    {
        return view('pages.preguntas-frecuentes.preguntas-frecuentes');
    }

    public function terminosCondiciones()
    {
        return view('pages.terminos-condiciones.terminos-condiciones');
    }

    public function politicasDevolucion()
    {
        return view('pages.politicas-devolucion.politicas-devolucion');
    }

    public function proyectos()
    {
        return view('pages.proyectos.proyectos');
    }

    public function sobreNosotros()
    {
        return view('pages.sobre-nosotros.sobre-nosotros');
    }

    public function libroReclamaciones()
    {
        return view('pages.libro-reclamaciones.libro-reclamaciones');
    }

    public function contactanos()
    {
        return view('pages.contactanos.contactanos');
    }

    public function checkout()
    {
        return view('pages.checkout.checkout');
    }

    public function blog()
    {
        return view('pages.blog.blog');
    }

    public function blogPost()
    {
        return view('pages.blog.blog-post');
    }
}
