@if($paginator instanceof \Illuminate\Pagination\LengthAwarePaginator
    && $paginator->hasPages()
    && $paginator->lastPage() > 1)

    @if($paginator->hasMorePages())
        <button class="btn btn--outlined btn-reset more-news" type="button" aria-label="Показать ещё"
                data-url="{{ $paginator->nextPageUrl() }}">
            <span>Показать ещё</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m4 8.5 8.167 7 8.166-7" />
            </svg>
        </button>
    @endif
@endif