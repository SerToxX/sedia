@props([
    'name',
    'category',
    'price',
    'oldPrice' => null,
    'image',
    'hoverImage' => null,
    'url' => '#',
    'swatches' => [],
    'swatchCount' => null,
    'variant' => null,
    'cartId' => null,
])

@php
    $resolvedCartId = $cartId ?? ($url !== '#' ? $url : \Illuminate\Support\Str::slug($name));
    $resolvedCartPrice = (float) preg_replace('/[^0-9.]/', '', (string) $price);
@endphp

<a href="{{ $url }}" class="class-product-card{{ $variant ? ' class-product-card--' . $variant : '' }}">
    <div class="class-product-card-img-wrap">
        <img class="class-product-card-img class-product-card-img--base" src="{{ asset($image) }}" loading="lazy" decoding="async" alt="{{ $name }}">
        <img class="class-product-card-img class-product-card-img--hover" src="{{ $hoverImage ? asset($hoverImage) : asset($image) }}" loading="lazy" decoding="async" alt="{{ $name }}">

        <button type="button" class="class-product-card-add"
                data-cart-id="{{ $resolvedCartId }}"
                data-cart-name="{{ $name }}"
                data-cart-price="{{ $resolvedCartPrice }}"
                data-cart-image="{{ asset($image) }}"
                data-cart-category="{{ $category }}">
            Añadir al carrito
        </button>
    </div>

    <div class="class-product-card-info">
        <div class="class-product-card-top">
            <span class="class-product-card-name">{{ $name }}</span>

            <div class="class-product-card-swatches">
                @if (!empty($swatches))
                    @php($firstSwatch = $swatches[0])
                    <span class="class-product-swatch"
                          style="background:{{ is_array($firstSwatch) ? ($firstSwatch['hex'] ?? '#ccc') : $firstSwatch }};"
                          title="{{ is_array($firstSwatch) ? ($firstSwatch['name'] ?? '') : '' }}"></span>
                @endif

                @if (!is_null($swatchCount))
                    <span class="class-product-swatch-count">{{ $swatchCount }}</span>
                @endif
            </div>
        </div>

        <span class="class-product-card-category">{{ $category }}</span>

        <div class="class-product-card-prices">
            <span class="class-product-price-sale">{{ $price }}</span>
            @if ($oldPrice)
                <span class="class-product-price-original">{{ $oldPrice }}</span>
            @endif
        </div>
    </div>
</a>
