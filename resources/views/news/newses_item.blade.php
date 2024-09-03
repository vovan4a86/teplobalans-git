<div class="s-newses__item">
    <div class="news-card">
        <a class="news-card__link" href="{{ $item->url }}"
           title="{{ $item->name }}"></a>
        <div class="news-card__wrapper">
            <img class="news-card__image" src="{{ isset($first) && $first === true ? $item->thumb(2) : $item->thumb(3) }}"
                 width="423" height="423" loading="lazy" alt="{{ $item->name }}"/>
        </div>
        <div class="news-card__body">
            <div class="news-card__heading">
                <div class="news-card__title">{{ $item->name }}</div>
            </div>
            <div class="news-card__footer">
                <div class="news-card__badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" fill="none">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.7" d="M1 6h11M11 9l3-3-3-3"/>
                    </svg>
                </div>
                <div class="news-card__badge">{{ $item->dateFormat('d F Y') }}</div>
            </div>
        </div>
    </div>
</div>