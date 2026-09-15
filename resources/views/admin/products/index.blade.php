@extends('admin.layout')

@section('title', 'Productos')

@section('content')

<div x-data="{ openModal: {{ old('_modal') ? "'".old('_modal')."'" : 'null' }} }">

    <div class="class-admin-page-header">
        <div class="class-admin-page-title-row">
            <span class="class-admin-page-icon"><x-admin-icon name="package" /></span>
            <div>
                <h1 class="class-admin-page-title">Productos</h1>
                <p class="class-admin-page-subtitle">{{ $products->total() }} producto{{ $products->total() === 1 ? '' : 's' }} en tu catálogo</p>
            </div>
        </div>
        <button type="button" class="class-admin-btn" @click="openModal = 'create'">
            <x-admin-icon name="plus" style="width:15px;height:15px" />
            Nuevo producto
        </button>
    </div>

    <form method="GET" action="{{ route('admin.products.index') }}" class="class-admin-toolbar">
        <div class="class-admin-search">
            <x-admin-icon name="search" />
            <input type="text" name="q" value="{{ $search }}" class="class-admin-input" placeholder="Buscar por nombre o categoría...">
        </div>
        @if ($search !== '')
            <a href="{{ route('admin.products.index') }}" class="class-admin-btn class-admin-btn-outline class-admin-btn-sm">Limpiar</a>
        @endif
    </form>

    @if ($products->isEmpty())
        <div class="class-admin-card">
            <div class="class-admin-empty">
                <x-admin-icon name="box-empty" />
                @if ($search !== '')
                    <p>No hay productos que coincidan con "{{ $search }}".</p>
                @else
                    <p>Todavía no has agregado productos.</p>
                    <button type="button" class="class-admin-btn class-admin-btn-sm" style="margin-top:10px;" @click="openModal = 'create'">
                        <x-admin-icon name="plus" style="width:13px;height:13px" /> Crear el primero
                    </button>
                @endif
            </div>
        </div>
    @else
        <div class="class-admin-product-grid">
            @foreach ($products as $product)
                <div class="class-admin-product-card">
                    <div class="class-admin-product-card-media">
                        @if ($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                        @else
                            <span class="class-admin-thumb-empty class-admin-product-card-noimg"><x-admin-icon name="image-off" /></span>
                        @endif

                        @if ($product->images_count > 0)
                            <span class="class-admin-product-card-gallery-badge">
                                +{{ $product->images_count }} foto{{ $product->images_count === 1 ? '' : 's' }}
                            </span>
                        @endif

                        <span class="class-admin-product-card-status {{ $product->active ? 'is-active' : 'is-inactive' }}"></span>

                        <div class="class-admin-product-card-actions">
                            <button type="button" class="class-admin-icon-btn" title="Editar" @click="openModal = 'edit-{{ $product->id }}'">
                                <x-admin-icon name="edit" />
                            </button>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                  onsubmit="return confirm('¿Eliminar {{ addslashes($product->name) }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="class-admin-icon-btn is-danger" title="Eliminar">
                                    <x-admin-icon name="trash" />
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="class-admin-product-card-body">
                        <div class="class-admin-product-card-top">
                            <span class="class-admin-product-name">{{ $product->name }}</span>
                            @if ($product->swatches)
                                <div class="class-admin-swatch-row">
                                    @foreach (array_slice($product->swatches, 0, 4) as $swatch)
                                        <span class="class-admin-swatch-dot" style="background:{{ is_array($swatch) ? ($swatch['hex'] ?? '#ccc') : $swatch }};" title="{{ is_array($swatch) ? ($swatch['name'] ?? '') : '' }}"></span>
                                    @endforeach
                                    @if (count($product->swatches) > 4)
                                        <span class="class-admin-swatch-more">+{{ count($product->swatches) - 4 }}</span>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <span class="class-admin-product-cat">{{ $product->category ?: '—' }}</span>

                        <div class="class-admin-product-card-bottom">
                            <div class="class-admin-product-card-prices">
                                @if ($product->has_discount)
                                    <span class="class-admin-product-price">S/ {{ number_format($product->display_price, 2) }}</span>
                                    <span class="class-admin-price-old">S/ {{ number_format($product->regular_price, 2) }}</span>
                                @else
                                    <span class="class-admin-product-price">S/ {{ number_format($product->regular_price, 2) }}</span>
                                @endif
                            </div>
                            <span class="{{ $product->stock === 0 ? 'class-admin-stock-out' : ($product->stock <= 5 ? 'class-admin-stock-low' : 'class-admin-product-stock') }}">
                                {{ $product->stock }} en stock
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if ($products->hasPages())
        <div class="class-admin-pagination">
            {{ $products->links() }}
        </div>
    @endif

    {{-- ============ PANEL LATERAL: NUEVO PRODUCTO ============ --}}
    <div x-show="openModal === 'create'" x-cloak class="class-admin-drawer-overlay" @click="openModal = null">
        <div class="class-admin-drawer-panel class-admin-drawer-transition"
             x-show="openModal === 'create'"
             x-transition:enter="class-admin-drawer-transition"
             x-transition:enter-start="class-admin-drawer-offscreen"
             x-transition:enter-end="class-admin-drawer-onscreen"
             x-transition:leave="class-admin-drawer-transition"
             x-transition:leave-start="class-admin-drawer-onscreen"
             x-transition:leave-end="class-admin-drawer-offscreen"
             @click.stop>
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" style="display:flex; flex-direction:column; height:100%;">
                <div class="class-admin-drawer-header">
                    <h2 class="class-admin-drawer-title">Nuevo producto</h2>
                    <button type="button" class="class-admin-icon-btn" @click="openModal = null"><x-admin-icon name="close" /></button>
                </div>
                <div class="class-admin-drawer-body">
                    @include('admin.products._form', ['product' => null, 'fieldPrefix' => 'create-'])
                </div>
                <div class="class-admin-drawer-footer">
                    <button type="button" class="class-admin-btn class-admin-btn-outline" @click="openModal = null">Cancelar</button>
                    <button type="submit" class="class-admin-btn">Crear producto</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ============ PANELES LATERALES: EDITAR (uno por producto) ============ --}}
    @foreach ($products as $product)
        <div x-show="openModal === 'edit-{{ $product->id }}'" x-cloak class="class-admin-drawer-overlay" @click="openModal = null">
            <div class="class-admin-drawer-panel class-admin-drawer-transition"
                 x-show="openModal === 'edit-{{ $product->id }}'"
                 x-transition:enter="class-admin-drawer-transition"
                 x-transition:enter-start="class-admin-drawer-offscreen"
                 x-transition:enter-end="class-admin-drawer-onscreen"
                 x-transition:leave="class-admin-drawer-transition"
                 x-transition:leave-start="class-admin-drawer-onscreen"
                 x-transition:leave-end="class-admin-drawer-offscreen"
                 @click.stop>
                <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" style="display:flex; flex-direction:column; height:100%;">
                    <div class="class-admin-drawer-header">
                        <h2 class="class-admin-drawer-title">Editar «{{ $product->name }}»</h2>
                        <button type="button" class="class-admin-icon-btn" @click="openModal = null"><x-admin-icon name="close" /></button>
                    </div>
                    <div class="class-admin-drawer-body">
                        @include('admin.products._form', ['product' => $product, 'fieldPrefix' => 'edit-'.$product->id.'-'])
                    </div>
                    <div class="class-admin-drawer-footer">
                        <button type="button" class="class-admin-btn class-admin-btn-outline" @click="openModal = null">Cancelar</button>
                        <button type="submit" class="class-admin-btn">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

</div>

@endsection
