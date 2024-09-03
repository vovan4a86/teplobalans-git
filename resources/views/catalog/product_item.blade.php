<div class="s-prods__item">
    <!--.prod-card-->
    <div class="prod-card">
        <a class="prod-card__view" href="{{ $item->url }}" title="{{ $item->name }}">
            <img class="prod-card__img" src="{{ $item->getProductImage(2) }}"
                 width="302" height="302" alt="{{ $item->name }}" />
        </a>
        <div class="prod-card__body">
            <div class="prod-card__title">{{ $item->name }}</div>
            <div class="prod-card__action">
                <button class="prod-card__btn btn-reset" type="button"
                        data-popup="data-popup" data-src="#request"
                        data-name="{{ $item->name }}" aria-label="Заказать">
                    <span>Заказать</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" fill="none">
                        <path stroke="currentColor" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="1.7" d="M1 6h11M11 9l3-3-3-3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
