<div class="header__city">
    <!--.b-city(x-data="{ listIsOpen: false }")-->
    <div class="b-city" x-data="{ listIsOpen: false }">
        <button class="b-city__btn btn-reset" type="button" aria-label="Изменить город" @click="listIsOpen = true"
                :class="listIsOpen &amp;&amp; 'is-active'">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                <path stroke="currentColor" stroke-width="1.7"
                      d="M19.15 10a9.15 9.15 0 1 1-18.3 0 9.15 9.15 0 0 1 18.3 0Z"/>
                <path stroke="currentColor" stroke-width="1.7"
                      d="M7.733 8.428a1.1 1.1 0 0 1 .695-.695l3.628-1.21a1.1 1.1 0 0 1 1.392 1.392l-1.21 3.628a1.1 1.1 0 0 1-.695.696l-3.628 1.209a1.1 1.1 0 0 1-1.392-1.392m1.21-3.628-1.21 3.628m1.21-3.628-1.21 3.628m1.21-3.628-1.21 3.628m5.312-4.68v.001Zm-4.458 4.46Z"
                />
            </svg>
            <span class="b-city__btn-label">
                @if(!isset($current_city) || !$current_city)
                    Россия
                @else
                    {{ $current_city->name }}
                @endif
            </span>
        </button>
        @if(isset($cities) && count($cities))
            <div class="b-city__wrapper" x-show="listIsOpen" @click.away="listIsOpen = false">
                <input type="hidden" name="current-url" value="{{ Request::path() }}">
                <ul class="b-city__list list-reset" data-scrollbar="data-scrollbar">
                    @if(isset($current_city) || $current_city)
                        <li class="b-city__item">
                            <a class="b-city__link" style="color: red;" href="#" data-ajax="{{ route('ajax.change-city', 0) }}">Сбросить</a>
                        </li>
                    @endif
                    @foreach($cities as $city)
                        <li class="b-city__item">
                            <a class="b-city__link {{ isset($current_city) && $current_city->id == $city->id ? 'is-current' : null }}"
                               href="{{ $city->url }}" data-ajax="{{ route('ajax.change-city', $city->id) }}">{{ $city->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>