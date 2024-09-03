<div class="s-cat__list">
    @foreach($main_catalog as $item)
        <div class="s-cat__item">
            <div class="c-card">
                @if($item->image)
                    <div class="c-card__view">
                        <picture>
                            <img class="c-card__img" src="{{ $item->thumb(2) }}" width="408"
                                 height="580" alt="{{ $item->name }}"
                                 loading="lazy"/>
                        </picture>
                    </div>
                @endif
                <div class="c-card__body">
                    <div class="c-card__top">
                        <a class="b-link" href="{{ $item->url }}" title="Перейти">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                                <path stroke="currentColor" stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.7" d="M3.333 10h11M13.333 13l3-3-3-3"/>
                            </svg>
                        </a>
                    </div>
                    <div class="c-card__bottom">
                        <div class="c-card__head">
                            <div class="c-card__counter">
                                {{ $loop->iteration < 10 ? '0'.$loop->iteration : $loop->iteration }}
                            </div>
                            <div class="c-card__count">{{ $item->getRecurseProductsCountWithEnd() }}</div>
                        </div>
                        <a class="c-card__title" href="{{ $item->url }}">
                            {{ $item->name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>