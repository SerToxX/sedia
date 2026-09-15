<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'category',
        'price',
        'old_price',
        'image',
        'swatches',
        'stock',
        'description',
        'active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'old_price' => 'decimal:2',
            'swatches' => 'array',
            'stock' => 'integer',
            'active' => 'boolean',
        ];
    }

    /**
     * Genera (o regenera) un slug único a partir del nombre.
     */
    public static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }

    /**
     * URL pública de la imagen del producto (o null si no tiene).
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/'.$this->image) : null;
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    /**
     * Todas las URLs de imagen del producto: la portada primero,
     * seguida de la galería. Para la ficha pública de producto.
     */
    public function getGalleryUrlsAttribute(): array
    {
        $urls = [];

        if ($this->image) {
            $urls[] = asset('storage/'.$this->image);
        }

        foreach ($this->images as $image) {
            $urls[] = $image->url;
        }

        return $urls ?: [asset('image/comedor.png')];
    }

    /**
     * Precio efectivo a mostrar/cobrar: el precio con descuento si existe,
     * si no, el precio regular.
     */
    public function getDisplayPriceAttribute(): float
    {
        return (float) ($this->old_price ?? $this->price);
    }

    /**
     * Precio regular (tachado en la vitrina cuando hay descuento).
     */
    public function getRegularPriceAttribute(): float
    {
        return (float) $this->price;
    }

    public function getHasDiscountAttribute(): bool
    {
        return $this->old_price !== null && (float) $this->old_price < (float) $this->price;
    }
}
