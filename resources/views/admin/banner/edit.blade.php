@extends('admin.layout')

@section('title', 'Banner Home')

@section('content')

<div class="class-admin-page-header">
    <div class="class-admin-page-title-row">
        <span class="class-admin-page-icon"><x-admin-icon name="image" /></span>
        <div>
            <h1 class="class-admin-page-title">Banner del Home</h1>
            <p class="class-admin-page-subtitle">Imagen y video que se muestran en el banner principal de la página de inicio</p>
        </div>
    </div>
</div>

<div class="class-admin-card">
    <form method="POST"
          action="{{ route('admin.banner.update') }}"
          enctype="multipart/form-data"
          x-data="{ showVideo: {{ old('hero_show_video', $siteSetting->hero_show_video) ? 'true' : 'false' }} }">
        @csrf
        @method('PUT')

        <div class="class-admin-field">
            <label for="hero_image">Imagen del banner</label>
            <input type="file" id="hero_image" name="hero_image" class="class-admin-input" accept="image/*">
            <p class="class-admin-field-hint">
                Recomendado: 1920x1080px o más grande (JPG, PNG o WebP). Se recorta automáticamente
                para llenar toda la pantalla — mantén el elemento principal centrado en la foto.
            </p>
            @error('hero_image') <p class="class-admin-error">{{ $message }}</p> @enderror

            <div class="class-admin-image-current">
                <img src="{{ $siteSetting->heroImageUrl() }}" class="class-admin-thumb" alt="Banner actual">
                <span>Imagen actual — sube una nueva para reemplazarla.</span>
            </div>
        </div>

        <label class="class-admin-check">
            <input type="checkbox" name="hero_show_video" value="1" x-model="showVideo">
            Mostrar un video en el banner (en vez de solo la imagen)
        </label>

        <div class="class-admin-field" x-show="showVideo" x-cloak>
            <label for="hero_video">Video del banner</label>
            <input type="file" id="hero_video" name="hero_video" class="class-admin-input" accept="video/*">
            <p class="class-admin-field-hint">
                Formatos permitidos: MP4, MOV o WEBM — máximo 50MB. Mientras carga, se muestra la
                imagen de arriba como poster.
            </p>
            @error('hero_video') <p class="class-admin-error">{{ $message }}</p> @enderror

            @if ($siteSetting->hero_video)
                <div class="class-admin-image-current">
                    <video src="{{ $siteSetting->heroVideoUrl() }}" class="class-admin-thumb" muted playsinline></video>
                    <span>Video actual — sube uno nuevo para reemplazarlo.</span>
                </div>
            @endif
        </div>

        <button type="submit" class="class-admin-btn">Guardar cambios</button>
    </form>
</div>

@endsection
