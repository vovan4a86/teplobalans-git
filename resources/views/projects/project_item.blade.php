<div class="projects__item">
    <div class="proj-card">
        <a class="proj-card__link" href="{{ $item->url }}"
           title="{{ $item->name }}"></a>
        <div class="proj-card__wrapper">
            <img class="proj-card__image" src="{{ $item->thumb(2) }}"
                 width="640" height="450" loading="lazy"
                 alt="{{ $item->name }}"/>
        </div>
        <div class="proj-card__body">
            <div class="proj-card__badge">
                <!--.b-label-->
                @if($item->place)
                    <div class="b-label">
                        <div class="b-label__wrapper">
                            <img class="b-label__icon" src="/static/images/common/ico_city.svg" alt="city_icon">
                        </div>
                        <div class="b-label__body">{{ $item->place }}</div>
                    </div>
                @endif
            </div>
            <div class="proj-card__footer">
                <h3 class="proj-card__title">{{ $item->name }}</h3>
                <div class="proj-card__action">
                    <div class="proj-card__btn">
                        <span>Посмотреть проект</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="M12 9a3 3 0 0 1 3 3 3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0 9.821 9.821 0 0 0-17.64 0"
                            />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>