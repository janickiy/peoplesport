@if ($paginator->hasPages())
    <div class="pagination">
        <div class="pagination__group">
            @if ($paginator->currentPage() >= 3)
                <a class="pagination__item pagination__item--start" href="{{ $paginator->url(1) }}"><i class="icon icon--angle-double-left"></i></a>
            @endif

            @if ($paginator->currentPage() == 2)
                <a class="pagination__item pagination__item--prev" href="{{ $paginator->previousPageUrl() }}"><i class="icon icon--angle-left"></i></a>
            @endif
        </div>

        <div class="pagination__group">
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <a class="pagination__item {{ ($paginator->currentPage() == $i) ? ' pagination__item--active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            @endfor
        </div>

        <div class="pagination__group">
            @if ($paginator->hasMorePages())
                <a class="pagination__item pagination__item--next" href="{{ $paginator->nextPageUrl() }}"><i class="icon icon--angle-right"></i></a>
            @endif

            @if ($paginator->lastPage() - $paginator->currentPage() > 1)
                <a class="pagination__item pagination__item--end" href="{{ $paginator->url($paginator->lastPage()) }}"><i class="icon icon--angle-double-right"></i></a>
            @endif
        </div>
    </div>
@endif
