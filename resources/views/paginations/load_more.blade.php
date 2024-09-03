@if($paginator instanceof \Illuminate\Pagination\LengthAwarePaginator
    && $paginator->hasPages()
    && $paginator->lastPage() > 1)

    @if($paginator->hasMorePages())
        <button class="c-load btn-reset" type="button" aria-label="Показать еще товары"
                data-url="{{ $paginator->nextPageUrl() }}">
            <span>Показать еще товары</span>
        </button>
    @endif
@endif