@if($paginator instanceof \Illuminate\Pagination\LengthAwarePaginator
    && $paginator->hasPages()
    && $paginator->lastPage() > 1)
        <?
        /** @var \Illuminate\Pagination\LengthAwarePaginator $paginator */ ?>

        <?php
        // config
        $link_limit = 10; // maximum number of links (a little bit inaccurate, but will be ok for now)
        $half_total_links = floor($link_limit / 2);
        $from = $paginator->currentPage() - $half_total_links;
        $to = $paginator->currentPage() + $half_total_links;
        if ($paginator->currentPage() < $half_total_links) {
            $to += $half_total_links - $paginator->currentPage();
        }
        if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
            $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
        }
        ?>

    @if ($paginator->lastPage() > 1)
        <div class="pagination">
            <div class="pagination__pages">
                @if($from > 1)
                    <a class="pagination__page is-active" href="{{ $paginator->url(1) }}"
                       data-link="data-link" title="Открыть страницу 1">1</a>
                @endif
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    @if ($from < $i && $i < $to)
                        <a class="pagination__page {{ $i == $paginator->currentPage() ? 'is-active' : '' }}"
                           href="{{ $paginator->url($i) }}" data-link="data-link"
                           title="Открыть страницу {{ $i }}">{{ $i }}</a>
                    @endif
                @endfor
                @if($to < $paginator->lastPage())
                    <span class="pagination__page pagination__page--divider">...</span>
                @endif
            </div>
            <div class="pagination__controls">
                <a class="pagination__btn {{ $paginator->previousPageUrl() ? '' : 'pagination__btn--disabled' }}"
                   href="{{ $paginator->previousPageUrl() }}" title="Назад">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                        <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           clip-path="url(#a)">
                            <path d="M24.571 17H10.43M17.5 9.929 10.429 17l7.071 7.071"/>
                        </g>
                        <defs>
                            <clipPath id="a">
                                <path fill="currentColor" d="M17.5.03.53 17 17.5 33.97 34.47 17z"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <a class="pagination__btn {{ $paginator->nextPageUrl() ? '' : 'pagination__btn--disabled' }}"
                   href="{{ $paginator->nextPageUrl() }}" title="Вперед">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                        <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           clip-path="url(#a)">
                            <path d="M10.429 17H24.57M17.5 9.929 24.571 17 17.5 24.071"/>
                        </g>
                        <defs>
                            <clipPath id="a">
                                <path fill="currentColor" d="M17.5.03 34.47 17 17.5 33.97.53 17z"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
        </div>
    @endif
@endif
