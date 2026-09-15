@csrf
@isset($product)
    @method('PUT')
    <input type="hidden" name="_modal" value="edit-{{ $product->id }}">
@else
    <input type="hidden" name="_modal" value="create">
@endisset

<div class="class-admin-form-grid">

    <div class="class-admin-field">
        <label for="{{ $fieldPrefix ?? '' }}name">Nombre *</label>
        <input type="text" id="{{ $fieldPrefix ?? '' }}name" name="name" class="class-admin-input"
               value="{{ old('name', $product->name ?? '') }}" required>
        @error('name') <p class="class-admin-error">{{ $message }}</p> @enderror
    </div>

    <div class="class-admin-field">
        <label for="{{ $fieldPrefix ?? '' }}category">Categoría</label>
        <input type="text" id="{{ $fieldPrefix ?? '' }}category" name="category" class="class-admin-input"
               placeholder="Ej: Comedor Exterior"
               value="{{ old('category', $product->category ?? '') }}">
    </div>

    <div class="class-admin-field">
        <label for="{{ $fieldPrefix ?? '' }}price">Precio (S/) *</label>
        <input type="number" step="0.01" min="0" id="{{ $fieldPrefix ?? '' }}price" name="price" class="class-admin-input"
               value="{{ old('price', $product->price ?? '') }}" required>
        @error('price') <p class="class-admin-error">{{ $message }}</p> @enderror
    </div>

    <div class="class-admin-field">
        <label for="{{ $fieldPrefix ?? '' }}old_price">Precio con descuento (S/)</label>
        <input type="number" step="0.01" min="0" id="{{ $fieldPrefix ?? '' }}old_price" name="old_price" class="class-admin-input"
               placeholder="Déjalo vacío si no está en oferta"
               value="{{ old('old_price', $product->old_price ?? '') }}">
    </div>

    <div class="class-admin-field">
        <label for="{{ $fieldPrefix ?? '' }}stock">Stock *</label>
        <input type="number" min="0" id="{{ $fieldPrefix ?? '' }}stock" name="stock" class="class-admin-input"
               value="{{ old('stock', $product->stock ?? 0) }}" required>
        @error('stock') <p class="class-admin-error">{{ $message }}</p> @enderror
    </div>

</div>

<div class="class-admin-field">
    <label for="{{ $fieldPrefix ?? '' }}swatches">Variaciones de color (una por línea: Nombre, #hex)</label>
    <textarea id="{{ $fieldPrefix ?? '' }}swatches" name="swatches" class="class-admin-textarea" rows="3"
              placeholder="Negro, #1a1a1a&#10;Blanco, #f5f5f5&#10;Verde salvia, #aab975">{{ old('swatches', isset($product) && $product->swatches ? implode("\n", array_map(fn ($s) => is_array($s) ? ($s['name'] ?? $s['hex']).', '.$s['hex'] : $s, $product->swatches)) : '') }}</textarea>
    <p class="class-admin-field-hint">Cada línea es una variación de color que el cliente podrá elegir en la ficha del producto.</p>
</div>

<div class="class-admin-field">
    <label for="{{ $fieldPrefix ?? '' }}description">Descripción</label>
    <textarea id="{{ $fieldPrefix ?? '' }}description" name="description" class="class-admin-textarea" rows="3">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="class-admin-field">
    <label for="{{ $fieldPrefix ?? '' }}image">Imagen principal (portada)</label>
    <input type="file" id="{{ $fieldPrefix ?? '' }}image" name="image" class="class-admin-input" accept="image/*">
    @error('image') <p class="class-admin-error">{{ $message }}</p> @enderror

    @isset($product)
        @if ($product->image)
            <div class="class-admin-image-current">
                <img src="{{ asset('storage/'.$product->image) }}" class="class-admin-thumb" alt="{{ $product->name }}">
                <span>Imagen actual — sube una nueva para reemplazarla.</span>
            </div>
        @endif
    @endisset
</div>

<div class="class-admin-field">
    <label for="{{ $fieldPrefix ?? '' }}images">Galería de imágenes</label>
    <input type="file" id="{{ $fieldPrefix ?? '' }}images" name="images[]" class="class-admin-input" accept="image/*" multiple>
    <p class="class-admin-field-hint">Puedes seleccionar varias fotos a la vez — se muestran en la ficha del producto.</p>
    @error('images.*') <p class="class-admin-error">{{ $message }}</p> @enderror

    @isset($product)
        @if ($product->images->isNotEmpty())
            <div class="class-admin-gallery-grid">
                @foreach ($product->images as $image)
                    <div class="class-admin-gallery-item" x-data>
                        <img src="{{ $image->url }}" alt="{{ $product->name }}">
                        <button type="button"
                                class="class-admin-gallery-remove"
                                title="Eliminar imagen"
                                @click.prevent="if (confirm('¿Eliminar esta imagen?')) { $refs.deleteImageForm.submit() }">
                            <x-admin-icon name="close" />
                        </button>
                        <form x-ref="deleteImageForm" method="POST" action="{{ route('admin.products.images.destroy', $image) }}" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    @endisset
</div>

<label class="class-admin-check">
    <input type="checkbox" name="active" value="1"
           {{ old('active', $product->active ?? true) ? 'checked' : '' }}>
    Visible / activo
</label>
