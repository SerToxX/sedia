<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        $products = Product::query()
            ->withCount('images')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.products.index', compact('products', 'search'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        $validated['slug'] = Product::generateUniqueSlug($validated['name']);
        $validated['swatches'] = $this->parseSwatches($request->input('swatches'));
        $validated['active'] = $request->boolean('active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($validated);

        $this->storeGalleryImages($request, $product);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $this->validateData($request, $product->id);

        if ($validated['name'] !== $product->name) {
            $validated['slug'] = Product::generateUniqueSlug($validated['name'], $product->id);
        }

        $validated['swatches'] = $this->parseSwatches($request->input('swatches'));
        $validated['active'] = $request->boolean('active');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        $this->storeGalleryImages($request, $product);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto eliminado.');
    }

    public function destroyImage(ProductImage $productImage)
    {
        Storage::disk('public')->delete($productImage->path);
        $productImage->delete();

        return back()->with('success', 'Imagen eliminada.');
    }

    private function storeGalleryImages(Request $request, Product $product): void
    {
        if (! $request->hasFile('images')) {
            return;
        }

        $nextOrder = (int) $product->images()->max('sort_order') + 1;

        foreach ($request->file('images') as $file) {
            $path = $file->store('products', 'public');

            ProductImage::create([
                'product_id' => $product->id,
                'path' => $path,
                'sort_order' => $nextOrder++,
            ]);
        }
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'Formatos permitidos: jpg, jpeg, png, webp.',
            'image.max' => 'La imagen no debe superar 4MB.',
            'images.*.image' => 'Cada archivo de la galería debe ser una imagen.',
            'images.*.mimes' => 'Formatos permitidos en la galería: jpg, jpeg, png, webp.',
            'images.*.max' => 'Cada imagen de la galería no debe superar 4MB.',
        ]);
    }

    /**
     * Convierte:
     *   Negro, #1a1a1a
     *   Blanco, #ffffff
     * en [{"name":"Negro","hex":"#1a1a1a"}, {"name":"Blanco","hex":"#ffffff"}]
     */
    private function parseSwatches(?string $raw): ?array
    {
        if (! $raw) {
            return null;
        }

        $swatches = [];

        foreach (explode("\n", $raw) as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }

            $parts = array_map('trim', explode(',', $line, 2));

            if (count($parts) === 2) {
                [$name, $hex] = $parts;
            } else {
                // Solo se escribió el color: se usa el propio hex como nombre.
                $hex = $parts[0];
                $name = $parts[0];
            }

            if ($hex === '') {
                continue;
            }

            $swatches[] = ['name' => $name, 'hex' => $hex];
        }

        return $swatches ?: null;
    }
}
