@extends('admin.layout')

@section('title', 'Banners')

@section('content')

<div class="class-admin-page-header">
    <div class="class-admin-page-title-row">
        <span class="class-admin-page-icon"><x-admin-icon name="image" /></span>
        <div>
            <h1 class="class-admin-page-title">Banners</h1>
            <p class="class-admin-page-subtitle">Imagen (y video, cuando aplica) de cada banner del sitio público</p>
        </div>
    </div>
</div>

@foreach ($banners as $banner)
    <div class="class-admin-card" style="margin-bottom: 24px;">
        <h2 style="margin-top:0;">{{ $banner->label() }}</h2>

        <form method="POST"
              action="{{ route('admin.banners.update', $banner) }}"
              enctype="multipart/form-data"
              @if ($banner->supportsVideo())
                  x-data="{ showVideo: {{ old('show_video', $banner->show_video) ? 'true' : 'false' }} }"
              @endif>
            @csrf
            @method('PUT')

            <div class="class-admin-field">
                <label for="image-{{ $banner->key }}">Imagen del banner</label>
                <input type="file" id="image-{{ $banner->key }}" name="image" class="class-admin-input" accept="image/*">
                <p class="class-admin-field-hint">
                    Recomendado: 1920x1080px o más grande (JPG, PNG o WebP). Se recorta automáticamente
                    para llenar toda la pantalla — mantén el elemento principal centrado en la foto.
                </p>
                @error('image') <p class="class-admin-error">{{ $message }}</p> @enderror

                <div class="class-admin-image-current">
                    <img src="{{ $banner->imageUrl() }}" class="class-admin-thumb" alt="{{ $banner->label() }}">
                    <span>Imagen actual — sube una nueva para reemplazarla.</span>
                </div>
            </div>

            @if ($banner->supportsVideo())
                <label class="class-admin-check">
                    <input type="checkbox" name="show_video" value="1" x-model="showVideo">
                    Mostrar un video en este banner (en vez de solo la imagen)
                </label>

                <div class="class-admin-field" x-show="showVideo" x-cloak>
                    <label for="video-{{ $banner->key }}">Video del banner</label>
                    <input type="file" id="video-{{ $banner->key }}" name="video" class="class-admin-input" accept="video/*">
                    <p class="class-admin-field-hint">
                        Formatos permitidos: MP4, MOV o WEBM — máximo 50MB. Mientras carga, se muestra
                        la imagen de arriba como poster.
                    </p>
                    @error('video') <p class="class-admin-error">{{ $message }}</p> @enderror

                    @if ($banner->video)
                        <div class="class-admin-image-current">
                            <video src="{{ $banner->videoUrl() }}" class="class-admin-thumb" muted playsinline></video>
                            <span>Video actual — sube uno nuevo para reemplazarlo.</span>
                        </div>
                    @endif
                </div>
            @endif

            <button type="submit" class="class-admin-btn">Guardar cambios</button>
        </form>
    </div>
@endforeach

@endsection
