@if ($paginator->hasPages())
    <nav class="class-pagination" aria-label="Paginación">

        <a
            @if ($paginator->onFirstPage())
                class="class-pagination-arrow class-pagination-prev is-disabled"
            @else
                class="class-pagination-arrow class-pagination-prev"
                href="{{ $paginator->previousPageUrl() }}"
            @endif
            aria-label="Anterior"
        ></a>

        @for ($page = 1; $page <= $paginator->lastPage(); $page++)
            <a
                href="{{ $paginator->url($page) }}"
                class="class-pagination-item {{ $page === $paginator->currentPage() ? 'active' : '' }}"
            >
                {{ $page }}
            </a>
        @endfor

        <a
            @if ($paginator->hasMorePages())
                class="class-pagination-arrow class-pagination-next"
                href="{{ $paginator->nextPageUrl() }}"
            @else
                class="class-pagination-arrow class-pagination-next is-disabled"
            @endif
            aria-label="Siguiente"
        ></a>

    </nav>
@endif
