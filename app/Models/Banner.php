<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'key',
        'image',
        'video',
        'show_video',
    ];

    protected $casts = [
        'show_video' => 'boolean',
    ];

    /**
     * Banners administrables desde /dashboard/banners.
     * "image"/"video" son los archivos que se muestran mientras el
     * admin no haya subido los suyos propios.
     */
    public const CONFIG = [
        'home' => [
            'label' => 'Home',
            'image' => 'image/hero.webp',
            'video' => 'video/prueba.mp4',
            'supports_video' => true,
        ],
        'proyectos' => [
            'label' => 'Proyectos',
            'image' => 'image/proyectos-inicio.png',
            'video' => null,
            'supports_video' => false,
        ],
        'sobre_nosotros' => [
            'label' => 'Sobre Nosotros',
            'image' => 'image/sobre-nosotros-banner.png',
            'video' => null,
            'supports_video' => false,
        ],
        'productos' => [
            'label' => 'Catálogo de productos',
            'image' => 'image/sobre-nosotros-banner.png',
            'video' => null,
            'supports_video' => false,
        ],
        'blog' => [
            'label' => 'Blog (listado)',
            'image' => 'image/blog-1.png',
            'video' => null,
            'supports_video' => false,
        ],
        'blog_post' => [
            'label' => 'Blog (artículo)',
            'image' => 'image/restaurantes.png',
            'video' => null,
            'supports_video' => false,
        ],
    ];

    public static function forKey(string $key): self
    {
        return static::query()->firstOrCreate(
            ['key' => $key],
            ['show_video' => $key === 'home']
        );
    }

    public function label(): string
    {
        return static::CONFIG[$this->key]['label'] ?? $this->key;
    }

    public function supportsVideo(): bool
    {
        return static::CONFIG[$this->key]['supports_video'] ?? false;
    }

    public function imageUrl(): string
    {
        return $this->image
            ? asset('storage/'.$this->image)
            : asset(static::CONFIG[$this->key]['image'] ?? 'image/hero.webp');
    }

    public function videoUrl(): ?string
    {
        if (! $this->supportsVideo() || ! $this->show_video) {
            return null;
        }

        if ($this->video) {
            return asset('storage/'.$this->video);
        }

        $default = static::CONFIG[$this->key]['video'] ?? null;

        return $default ? asset($default) : null;
    }

    public function videoMimeType(): string
    {
        $path = $this->video ?? static::CONFIG[$this->key]['video'] ?? 'video.mp4';
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        return match ($extension) {
            'webm' => 'video/webm',
            'mov' => 'video/quicktime',
            default => 'video/mp4',
        };
    }
}
