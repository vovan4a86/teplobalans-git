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
        <nav class="pagination" aria-label="Выбор страницы">
            <ul class="pagination__list">
                {{--                @if ($paginator->currentPage() > 1)--}}
                <li class="pagination__item">
                    <a class="pagination__link {{ $paginator->previousPageUrl() ? '' : 'is-disabled' }}" href="{{ $paginator->previousPageUrl() }}" title="Назад">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none">
                            <path fill="currentColor" stroke="currentColor" stroke-width=".5" d="m2.107 7 4.435-4.435a.477.477 0 0 0-.675-.675L1.094 6.663a.477.477 0 0 0 0 .675l4.773 4.772a.476.476 0 0 0 .675 0 .477.477 0 0 0 0-.675L2.107 7Z" />
                            <path fill="currentColor" stroke="currentColor" stroke-width=".5" d="m7.675 7 4.435-4.435a.477.477 0 1 0-.675-.675L6.663 6.663a.477.477 0 0 0 0 .675l4.772 4.772a.475.475 0 0 0 .675 0 .477.477 0 0 0 0-.675L7.675 7Z" />
                        </svg>
                    </a>
                </li>
                {{--                @endif--}}

                @if($from > 1)
                    <li class="pagination__item">
                        <a class="pagination__link is-active" href="{{ $paginator->url(1) }}" title="Страница 1">1</a>
                    </li>
                @endif

                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    @if ($from < $i && $i < $to)
                        <li class="pagination__item">
                            <a class="pagination__link {{ $i == $paginator->currentPage() ? 'is-active' : '' }}"
                               href="{{ $paginator->url($i) }}" title="Страница {{ $i }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor

                @if($to < $paginator->lastPage())
{{--                    <a class="b-pagination__link" href="{{ $paginator->url($paginator->lastPage()) }}"--}}
{{--                       title="Последняя страница">...</a>--}}

                    <li class="pagination__item">
                        <span class="pagination__link" title="Последняя страница">...</span>
                    </li>
                @endif
                {{--                @if ($paginator->currentPage() < $paginator->lastPage())--}}
                <li class="pagination__item">
                    <a class="pagination__link {{ $paginator->nextPageUrl() ? '' : 'is-disabled' }}"
                       href="{{ $paginator->nextPageUrl() }}" title="Вперёд">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none">
                            <path fill="currentColor" stroke="currentColor" stroke-width=".5" d="M11.894 7 7.458 2.565a.477.477 0 0 1 .675-.675l4.773 4.773a.477.477 0 0 1 0 .675L8.133 12.11a.476.476 0 0 1-.675 0 .477.477 0 0 1 0-.675L11.894 7Z" />
                            <path fill="currentColor" stroke="currentColor" stroke-width=".5" d="M6.325 7 1.89 2.565a.477.477 0 1 1 .675-.675l4.773 4.773a.477.477 0 0 1 0 .675L2.565 12.11a.476.476 0 0 1-.675 0 .477.477 0 0 1 0-.675L6.325 7Z" />
                        </svg>
                    </a>
                </li>
            </ul>
            {{--                @endif--}}
        </nav>
    @endif
@endif
