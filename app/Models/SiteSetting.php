<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'hero_image',
        'hero_video',
        'hero_show_video',
    ];

    protected $casts = [
        'hero_show_video' => 'boolean',
    ];

    /**
     * Configuracion global del sitio (fila unica, id 1).
     */
    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1]);
    }

    public function heroImageUrl(): string
    {
        return $this->hero_image
            ? asset('storage/'.$this->hero_image)
            : asset('image/hero.webp');
    }

    public function heroVideoUrl(): ?string
    {
        if (! $this->hero_show_video) {
            return null;
        }

        return $this->hero_video
            ? asset('storage/'.$this->hero_video)
            : asset('video/prueba.mp4');
    }

    public function heroVideoMimeType(): string
    {
        $extension = strtolower(pathinfo($this->hero_video ?? 'prueba.mp4', PATHINFO_EXTENSION));

        return match ($extension) {
            'webm' => 'video/webm',
            'mov' => 'video/quicktime',
            default => 'video/mp4',
        };
    }
}
