<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all(['id', 'price', 'stock', 'active']);

        $stats = [
            'total' => $products->count(),
            'activos' => $products->where('active', true)->count(),
            'sin_stock' => $products->where('stock', 0)->count(),
            'valor_inventario' => $products->sum(fn ($p) => $p->price * $p->stock),
        ];

        $recientes = Product::orderByDesc('id')->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recientes'));
    }
}
